<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl dark:text-white font-semibold">Add New Currency Reserve Transaction</h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6">

                    <!-- Display error message if transaction creation fails -->
                    @if ($errors->any())
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                            <p class="font-bold">Error</p>
                            <p>{{ $errors->first() }}</p>
                        </div>
                    @endif

                    <form action="{{ route('currency_reserve_transactions.store') }}" method="POST">
                        @csrf
                        <div class=" grid gap-4 grid-cols-2">
                            <!-- Currency -->
                            <div class="">
                                <label for="currency_id"
                                    class="block text-gray-700 dark:text-gray-300">Currency:</label>
                                <select name="currency_id" id="currency_id"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required>
                                    @foreach ($currencies as $currency)
                                        <option value="{{ $currency->id }}">{{ $currency->name }}
                                            ({{ $currency->code }})</option>
                                    @endforeach
                                </select>
                                @error('currency_id')
                                    <p class="text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Transaction Type -->
                            <div class="">
                                <label for="transaction_type" class="block text-gray-700 dark:text-gray-300">Transaction
                                    Type:</label>
                                <select name="transaction_type" id="transaction_type"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required>
                                    <option value="credit">Credit</option>
                                    <option value="debit">Debit</option>
                                </select>
                                @error('transaction_type')
                                    <p class="text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Amount -->
                            <div class="mb-4">
                                <label for="amount" class="block text-gray-700 dark:text-gray-300">Amount:</label>
                                <input type="number" name="amount" id="amount" step="0.01"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required>
                                @error('amount')
                                    <p class="text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <input type="hidden" name="balance_before" id="balance_before" value="">
                            <input type="hidden" name="balance_after" id="balance_after" value="">

                            <!-- Reference -->
                            <div class="mb-4">
                                <label for="reference" class="block text-gray-700 dark:text-gray-300">Transaction
                                    ID:</label>
                                <input type="text" name="reference" id="reference"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                                @error('reference')
                                    <p class="text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition duration-200">
                            Create Transaction
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>