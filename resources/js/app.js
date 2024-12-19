import "./bootstrap";

// Función para abrir el modal
function openModal() {
    document.getElementById("paymentModal").classList.remove("hidden");
}

// Función para cerrar el modal
function closeModal() {
    document.getElementById("paymentModal").classList.add("hidden");
}
