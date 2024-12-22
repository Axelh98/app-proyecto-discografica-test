
// Configuración de PayPal
window.paypal
    .Buttons({
        style: {
            shape: "rect",
            layout: "vertical",
            color: "gold",
            label: "paypal",
        },

        // Crear orden utilizando los datos del producto seleccionado
        async createOrder() {
            if (!window.selectedPlan) {
                console.error("No se seleccionó ningún plan.");
                throw new Error("Debe seleccionar un plan antes de proceder.");
            }

            try {
                const response = await fetch("/create-order", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]')?.value,
                    },
                    body: JSON.stringify({
                        cart: [
                            {
                                id: window.selectedPlan.id, // Usar el ID único del producto (e.g., plan-1)
                                name: window.selectedPlan.name, // Nombre del plan
                                amount: window.selectedPlan.price, // Precio del plan
                                currency: "ARS",
                            },
                        ],
                    }),
                });

                const orderData = await response.json();
                console.log(orderData);
                console.log(orderData.id);

                if (orderData.id) {
                    return orderData.id; // Devuelve el ID de la orden para PayPal
                }

                const errorDetail = orderData?.details?.[0];
                const errorMessage = errorDetail
                    ? `${errorDetail.issue} ${errorDetail.description} (${orderData.debug_id})`
                    : JSON.stringify(orderData);

                throw new Error(errorMessage);
            } catch (error) {
                console.error(error);
            }
        },

        // Procesar el pago
        async onApprove(data, actions) {
            try {
                const response = await fetch(`/capture-order`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                });

                const orderData = await response.json();

                const errorDetail = orderData?.details?.[0];

                if (errorDetail?.issue === "INSTRUMENT_DECLINED") {
                    return actions.restart();
                } else if (errorDetail) {
                    throw new Error(
                        `${errorDetail.description} (${orderData.debug_id})`
                    );
                } else {
                    const transaction =
                        orderData?.purchase_units?.[0]?.payments?.captures?.[0] ||
                        orderData?.purchase_units?.[0]?.payments?.authorizations?.[0];
                    console.log(
                        `Transaction ${transaction.status}: ${transaction.id}`
                    );
                    alert(`Transaction successful: ${transaction.id}`);
                }
            } catch (error) {
                console.error(error);
                alert(
                    `Sorry, your transaction could not be processed. Error: ${error}`
                );
            }
        },
    })
    .render("#paypal-button-container");

console.log("PayPal script loaded");