import "./bootstrap";

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
// Función para hacer desaparecer el mensaje después de 3 segundos
setTimeout(function () {
    var successMessage = document.getElementById("success-message");
    var errorMessage = document.getElementById("error-message");

    if (successMessage) {
        successMessage.classList.add("opacity-0");
        successMessage.classList.add("pointer-events-none"); // Para evitar interacciones mientras desaparece
    }

    if (errorMessage) {
        errorMessage.classList.add("opacity-0");
        errorMessage.classList.add("pointer-events-none"); // Para evitar interacciones mientras desaparece
    }
}, 3000); // 3000 ms = 3 segundos
