<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PaypalServerSdkLib\Authentication\ClientCredentialsAuthCredentialsBuilder;
use PaypalServerSdkLib\Environment;
use PaypalServerSdkLib\PaypalServerSDKClientBuilder;
use PaypalServerSdkLib\Models\Builders\AmountWithBreakdownBuilder;
use PaypalServerSdkLib\Models\Builders\OrderRequestBuilder;
use PaypalServerSdkLib\Models\Builders\PurchaseUnitRequestBuilder;
use Exception;
use Illuminate\Support\Facades\Log;

class PaypalController extends Controller
{
    private $client;

    public function __construct()
    {
        $PAYPAL_CLIENT_ID = env('PAYPAL_CLIENT_ID');
        $PAYPAL_CLIENT_SECRET = env('PAYPAL_CLIENT_SECRET');

        $this->client = PaypalServerSdkClientBuilder::init()
            ->clientCredentialsAuthCredentials(
                ClientCredentialsAuthCredentialsBuilder::init(
                    $PAYPAL_CLIENT_ID,
                    $PAYPAL_CLIENT_SECRET
                )
            )
            ->environment(Environment::SANDBOX)
            ->build();
    }

    public function createOrder(Request $request)
    {
        Log::info('Creando orden de pago con PayPal');

        // Paso 1: Obtener la información del producto desde la solicitud JSON
        $product = $request->input('cart')[0]; // Tomar el primer elemento del carrito

        if (empty($product) || !is_array($product)) {
            return response()->json(['error' => 'Los datos del producto son requeridos.'], 400);
        }
        
        $orderRequest = OrderRequestBuilder::init("CAPTURE", [
            PurchaseUnitRequestBuilder::init(
                AmountWithBreakdownBuilder::init($product['currency'], $product['amount'])->build()
            )->build(),
        ])->build();

        try {
            $apiResponse = $this->client->getOrdersController()->ordersCreate(['body' => $orderRequest]);

            $orderData = json_decode($apiResponse->getBody(), true);

            return response()->json([
                'id' => $orderData['id'],
                'status' => $orderData['status'],
                'links' => $orderData['links'],
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function captureOrder(Request $request)
    {
        Log::info('Capturando pago con PayPal');
        $orderID = $request->input('order_id'); // ID de la orden creada previamente

        if (empty($orderID)) {
            return response()->json(['error' => 'El ID de la orden es requerido.'], 400);
        }

        try {
            $captureResponse = $this->client->getOrdersController()->ordersCapture(['id' => $orderID]);

            $captureData = json_decode($captureResponse->getBody(), true);

            return response()->json([
                'status' => $captureData['status'],
                'purchase_units' => $captureData['purchase_units'],
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
