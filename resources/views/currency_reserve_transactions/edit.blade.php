<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl dark:text-white font-semibold">Edit Currency Reserve Transaction</h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6">
                    <form action="{{ route('currency_reserve_transactions.update', $currencyReserveTransaction->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Currency -->
                        <div class="mb-4">
                            <label for="currency_id" class="block text-gray-700 dark:text-gray-300">Currency:</label>
                            <select name="currency_id" id="currency_id" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" required>
                                @foreach($currencies as $currency)
                                    <option value="{{ $currency->id }}" {{ $currency->id == $currencyReserveTransaction->currency_id ? 'selected' : '' }}>
                                        {{ $currency->name }} ({{ $currency->code }})
                                    </option>
                                @endforeach
                            </select>
                            @error('currency_id')<p class="text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Transaction Type -->
                        <div class="mb-4">
                            <label for="transaction_type" class="block text-gray-700 dark:text-gray-300">Transaction Type:</label>
                            <select name="transaction_type" id="transaction_type" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" required>
                                <option value="credit" {{ $currencyReserveTransaction->transaction_type == 'credit' ? 'selected' : '' }}>Credit</option>
                                <option value="debit" {{ $currencyReserveTransaction->transaction_type == 'debit' ? 'selected' : '' }}>Debit</option>
                            </select>
                            @error('transaction_type')<p class="text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Amount -->
                        <div class="mb-4">
                            <label for="amount" class="block text-gray-700 dark:text-gray-300">Amount:</label>
                            <input type="number" name="amount" id="amount" step="0.01" value="{{ $currencyReserveTransaction->amount }}" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" required>
                            @error('amount')<p class="text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Reference -->
                        <div class="mb-4">
                            <label for="reference" class="block text-gray-700 dark:text-gray-300">Transaction ID:</label>
                            <input type="text" name="reference" id="reference" value="{{ $currencyReserveTransaction->reference }}" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                            @error('reference')<p class="text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition duration-200">
                            Update Transaction
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
