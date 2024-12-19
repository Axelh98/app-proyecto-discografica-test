<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

    </x-slot>

    <!-- MENSAJES DE ESTADO DE PAGO -->
    @if (session('success'))
    <div class="py-12">
        <div id="success-message"
            class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden flex justify-center items-center duration-300"
            role="alert">
            <strong class="font-bold">¡Éxito!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    </div>
    @endif

    @if (session('error'))
    <div class="py-12">
        <div id="error-message"
            class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden flex justify-center items-center duration-200"
            role="alert">
            <strong class="font-bold">Error:</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
     </div>   
    @endif


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- Contenedor con el Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 p-6">
                    <!-- Tarjeta 1 -->
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <h3 class="text-lg font-semibold text-gray-800">1 Canción</h3>
                        <p class="mt-4 text-gray-600">Almacena 1 canción en tu cuenta.</p>
                        <p class="mt-4 text-lg font-semibold text-gray-800">$49</p>
                        <div class="mt-6">
                        <!-- AGREGARLE AL BOTON EL VALOR Y EL TITULO. FALTA LA DESCRIPCION -->
                            <button onclick="openModal('Plan de 1 Canción', 49.00)" 
                                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">Pagar</button>
                        </div>
                    </div>

                    <!-- Tarjeta 2 -->
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <h3 class="text-lg font-semibold text-gray-800">5 Canciones</h3>
                        <p class="mt-4 text-gray-600">Almacena hasta 5 canciones en tu cuenta.</p>
                        <p class="mt-4 text-lg font-semibold text-gray-800">$219</p>
                        <div class="mt-6">
                            <button onclick="openModal('Plan de 5 Canciones', 219.00)"
                                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">Pagar</button>
                        </div>
                    </div>

                    <!-- Tarjeta 3 -->
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <h3 class="text-lg font-semibold text-gray-800">10 Canciones</h3>
                        <p class="mt-4 text-gray-600">Almacena hasta 10 canciones en tu cuenta.</p>
                        <p class="mt-4 text-lg font-semibold text-gray-800">$399</p>
                        <div class="mt-6">
                            <button onclick="openModal('Plan de 10 Canciones', 399.00)"
                                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">Pagar</button>
                        </div>
                    </div>

                    <!-- Tarjeta 4 -->
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <h3 class="text-lg font-semibold text-gray-800">20 Canciones</h3>
                        <p class="mt-4 text-gray-600">Almacena hasta 20 canciones en tu cuenta.</p>
                        <p class="mt-4 text-lg font-semibold text-gray-800">$699</p>
                        <div class="mt-6">
                            <button onclick="openModal('Plan de 20 Canciones', 699.00)"
                                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">Pagar</button>
                        </div>
                    </div>

                    <!-- Tarjeta 5 -->
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <h3 class="text-lg font-semibold text-gray-800">50 Canciones</h3>
                        <p class="mt-4 text-gray-600">Almacena hasta 50 canciones en tu cuenta.</p>
                        <p class="mt-4 text-lg font-semibold text-gray-800">$1499</p>
                        <div class="mt-6">
                            <button onclick="openModal('Plan de 50 Canciones', 1499.00)"
                                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">Pagar</button>
                        </div>
                    </div>

                    <!-- Tarjeta 6 -->
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <h3 class="text-lg font-semibold text-gray-800">100 Canciones</h3>
                        <p class="mt-4 text-gray-600">Almacena hasta 100 canciones en tu cuenta.</p>
                        <p class="mt-4 text-lg font-semibold text-gray-800">$2499</p>
                        <div class="mt-6">
                            <button onclick="openModal('Plan de 100 Canciones', 2499.00)"
                                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">Pagar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Opciones de Pago -->
    <div class="py-12">
        <div id="paymentModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden flex justify-center items-center">
            <div class="bg-white rounded-lg p-8 w-1/3">
                <h3 class="text-xl font-semibold text-gray-800 mb-6">Selecciona un método de pago</h3>

                <div class="grid grid-cols-1 gap-4">
                    <!-- Tarjeta Mercado Pago -->
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <h4 class="text-lg font-semibold text-gray-800">Mercado Pago</h4>
                        <p class="mt-4 text-gray-600">Paga con Mercado Pago de forma rápida y segura.</p>
                        <div class="mt-6">
                            <button id="checkout-btn"
                                class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition duration-200">Seleccionar
                                Mercado Pago</button>
                        </div>
                    </div>

                    <!-- Tarjeta PayPal -->
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <h4 class="text-lg font-semibold text-gray-800">PayPal</h4>
                        <p class="mt-4 text-gray-600">Paga con tu cuenta de PayPal.</p>
                        <div class="mt-6">
                            <button
                                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">Seleccionar
                                PayPal</button>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <button onclick="closeModal()"
                        class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-200 w-full">Cerrar</button>
                </div>
            </div>
        </div>

        <script src="https://sdk.mercadopago.com/js/v2"></script>
        <script>

            function openModal(planName, planPrice) {
                // Establecer los valores del plan al hacer clic en "Pagar"
                window.selectedPlan = {
                    name: planName,
                    price: planPrice
                };

                // Mostrar el modal
                document.getElementById('paymentModal').classList.remove('hidden');
            }

            function closeModal() {
                // Ocultar el modal
                document.getElementById('paymentModal').classList.add('hidden');
            }

            // Inicializar Mercado Pago
            const mp = new MercadoPago("APP_USR-fb222e12-9761-40c4-98ff-5a119ce3ed95");

            //console.log("{{ env('MERCADO_PAGO_PUBLIC_KEY') }}");

            document.getElementById('checkout-btn').addEventListener('click', function () {
                // Crear el objeto 'orderData' solo con el plan seleccionado
                const orderData = {
                    product: [{
                        title: window.selectedPlan.name,
                        description: 'Descripción del producto', // Ajusta si es necesario
                        currency_id: "ARS",
                        quantity: 1,
                        unit_price: window.selectedPlan.price
                    }]
                };

                console.log('Datos del pedido:', orderData);

                // Hacer la solicitud a tu servidor para crear la preferencia
                fetch('/create-preference', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                    body: JSON.stringify(orderData)
                })
                    .then(response => response.json())
                    .then(preference => {
                        if (preference.error) {
                            throw new Error(preference.error);
                        }

                        // Redirigir al usuario a la URL de pago
                        window.location.href = preference.init_point; // Aquí rediriges usando el enlace correcto
                    })
                    .catch(error => console.error('Error al crear la preferencia:', error));

            });
        </script>
    </div>


</x-app-layout>