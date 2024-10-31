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

                        <div class="mb-4">
                            <label for="exchange_type" class="block text-gray-700 dark:text-gray-300">Exchange Type:</label>
                            <select name="exchange_type" id="exchange_type" class="form-control w-full mt-1" required>
                                <option value="buy">Buy</option>
                                <option value="sell">Sell</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="currency_id" class="block text-gray-700 dark:text-gray-300">Currency:</label>
                            <select name="currency_id" id="currency_id" class="form-control w-full mt-1" required>
                                @foreach($currencies as $currency)
                                    <option value="{{ $currency->id }}">{{ $currency->name }} ({{ $currency->code }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="quantity" class="block text-gray-700 dark:text-gray-300">Quantity:</label>
                            <input type="number" name="quantity" class="form-control w-full mt-1" step="0.01" required>
                        </div>

                        <div class="mb-4">
                            <label for="rate" class="block text-gray-700 dark:text-gray-300">Rate:</label>
                            <input type="number" name="rate" class="form-control w-full mt-1" step="0.01" required>
                        </div>

                        <div class="mb-4">
                            <label for="status" class="block text-gray-700 dark:text-gray-300">Status:</label>
                            <select name="status" id="status" class="form-control w-full mt-1" required>
                                <option value="pending">Pending</option>
                                <option value="approved">Approved</option>
                                <option value="canceled">Canceled</option>
                            </select>
                        </div>

                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-500 transition duration-200">
                            Create Exchange
                        </button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
