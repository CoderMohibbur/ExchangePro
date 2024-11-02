<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl dark:text-white font-semibold">Create New Exchange</h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6">
                    <form action="{{ route('exchanges.store') }}" method="POST">
                        @csrf

                        <!-- Exchange Type -->
                        <div class="mb-4">
                            <label for="exchange_type" class="block text-gray-700 dark:text-gray-300">Exchange Type:</label>
                            <select name="exchange_type" id="exchange_type" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" required onchange="toggleFields()">
                                <option value="buy">Buy</option>
                                <option value="sell">Sell</option>
                            </select>
                        </div>

                        <!-- Seller Name (Shown if Exchange Type is 'Buy') -->
                        <div class="mb-4" id="seller_name_field" style="display: none;">
                            <label for="seller_name" class="block text-gray-700 dark:text-gray-300">Seller Name:</label>
                            <input type="text" name="seller_name" id="seller_name" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                        </div>

                        <!-- Buyer Name (Shown if Exchange Type is 'Sell') -->
                        <div class="mb-4" id="buyer_name_field" style="display: none;">
                            <label for="buyer_name" class="block text-gray-700 dark:text-gray-300">Buyer Name:</label>
                            <input type="text" name="buyer_name" id="buyer_name" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                        </div>

                        <!-- Currency -->
                        <div class="mb-4">
                            <label for="currency_id" class="block text-gray-700 dark:text-gray-300">Currency:</label>
                            <select name="currency_id" id="currency_id" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" required>
                                @foreach($currencies as $currency)
                                    <option value="{{ $currency->id }}">{{ $currency->name }} ({{ $currency->code }})</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Quantity -->
                        <div class="mb-4">
                            <label for="quantity" class="block text-gray-700 dark:text-gray-300">Quantity:</label>
                            <input type="number" name="quantity" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" step="0.01" required>
                        </div>

                        <!-- Rate -->
                        <div class="mb-4">
                            <label for="rate" class="block text-gray-700 dark:text-gray-300">Rate:</label>
                            <input type="number" name="rate" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" step="0.01" required>
                        </div>

                        <!-- Paid to Seller in BDT (Optional) -->
                        <div class="mb-4">
                            <label for="paid_to_seller_bdt" class="block text-gray-700 dark:text-gray-300">Paid to Seller (BDT):</label>
                            <input type="number" name="paid_to_seller_bdt" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" step="0.01">
                        </div>

                        <!-- Status -->
                        <div class="mb-4">
                            <label for="status" class="block text-gray-700 dark:text-gray-300">Status:</label>
                            <select name="status" id="status" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" required>
                                <option value="pending">Pending</option>
                                <option value="approved">Approved</option>
                                <option value="canceled">Canceled</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-500 transition duration-200">
                            Create Exchange
                        </button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to toggle visibility of Seller Name and Buyer Name fields based on Exchange Type -->
    <script>
        function toggleFields() {
            const exchangeType = document.getElementById('exchange_type').value;
            document.getElementById('seller_name_field').style.display = exchangeType === 'buy' ? 'block' : 'none';
            document.getElementById('buyer_name_field').style.display = exchangeType === 'sell' ? 'block' : 'none';
        }
        toggleFields(); // Call once on load to set initial state
    </script>
</x-app-layout>
