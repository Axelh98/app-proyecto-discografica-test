<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- Contenedor con el Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 p-6">
                    <!-- Tarjeta 1 -->
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <h3 class="text-lg font-semibold text-gray-800">Plan de 1 Canción</h3>
                        <p class="mt-4 text-gray-600">Almacena 1 canción en tu cuenta.</p>
                        <div class="mt-6">
                            <button onclick="openModal()" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">Pagar</button>
                        </div>
                    </div>

                    <!-- Tarjeta 2 -->
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <h3 class="text-lg font-semibold text-gray-800">Plan de 5 Canciones</h3>
                        <p class="mt-4 text-gray-600">Almacena hasta 5 canciones en tu cuenta.</p>
                        <div class="mt-6">
                            <button onclick="openModal()" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">Pagar</button>
                        </div>
                    </div>

                    <!-- Tarjeta 3 -->
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <h3 class="text-lg font-semibold text-gray-800">Plan de 10 Canciones</h3>
                        <p class="mt-4 text-gray-600">Almacena hasta 10 canciones en tu cuenta.</p>
                        <div class="mt-6">
                            <button onclick="openModal()" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">Pagar</button>
                        </div>
                    </div>

                    <!-- Tarjeta 4 -->
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <h3 class="text-lg font-semibold text-gray-800">Plan de 20 Canciones</h3>
                        <p class="mt-4 text-gray-600">Almacena hasta 20 canciones en tu cuenta.</p>
                        <div class="mt-6">
                            <button onclick="openModal()" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">Pagar</button>
                        </div>
                    </div>

                    <!-- Tarjeta 5 -->
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <h3 class="text-lg font-semibold text-gray-800">Plan de 50 Canciones</h3>
                        <p class="mt-4 text-gray-600">Almacena hasta 50 canciones en tu cuenta.</p>
                        <div class="mt-6">
                            <button onclick="openModal()" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">Pagar</button>
                        </div>
                    </div>

                    <!-- Tarjeta 6 -->
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <h3 class="text-lg font-semibold text-gray-800">Plan de 100 Canciones</h3>
                        <p class="mt-4 text-gray-600">Almacena hasta 100 canciones en tu cuenta.</p>
                        <div class="mt-6">
                            <button onclick="openModal()" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">Pagar</button>
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
                            <button
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


        <script>
            function openModal() {
                document.getElementById('paymentModal').classList.remove('hidden');
            }

            function closeModal() {
                document.getElementById('paymentModal').classList.add('hidden');
            }
        </script>
</x-app-layout>