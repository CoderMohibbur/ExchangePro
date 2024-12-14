<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl dark:text-white font-semibold">Edit Currency Transaction</h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6">
                    <form action="{{ route('currency_transactions.update', $currencyTransaction->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid gap-4 grid-cols-2">

                            <!-- Currency -->
                            <div>
                                <label for="currency_id" class="block text-gray-700 dark:text-gray-300">Currency:</label>
                                <select name="currency_id" id="currency_id"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required>
                                    @foreach ($currencies as $currency)
                                        <option value="{{ $currency->id }}"
                                            {{ $currency->id == $currencyTransaction->currency_id ? 'selected' : '' }}>
                                            {{ $currency->name }} ({{ $currency->code }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('currency_id')
                                    <p class="text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Transaction Type -->
                            <div>
                                <label for="transaction_type" class="block text-gray-700 dark:text-gray-300">Transaction Type:</label>
                                <select name="transaction_type" id="transaction_type"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required>
                                    <option value="credit" {{ $currencyTransaction->transaction_type == 'credit' ? 'selected' : '' }}>Credit</option>
                                    <option value="debit" {{ $currencyTransaction->transaction_type == 'debit' ? 'selected' : '' }}>Debit</option>
                                </select>
                                @error('transaction_type')
                                    <p class="text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Amount -->
                            <div>
                                <label for="amount" class="block text-gray-700 dark:text-gray-300">Amount:</label>
                                <input type="number" name="amount" id="amount" step="0.01" value="{{ $currencyTransaction->amount }}"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required>
                                @error('amount')
                                    <p class="text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Transaction Purpose -->
                            <div>
                                <label for="transaction_purpose" class="block text-gray-700 dark:text-gray-300">Transaction Purpose:</label>
                                <select name="transaction_purpose" id="transaction_purpose"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required>
                                    <option value="expense" {{ $currencyTransaction->transaction_purpose == 'expense' ? 'selected' : '' }}>Expense</option>
                                    <option value="balance_adjustment" {{ $currencyTransaction->transaction_purpose == 'balance_adjustment' ? 'selected' : '' }}>Balance Adjustment</option>
                                    <option value="opening_balance" {{ $currencyTransaction->transaction_purpose == 'opening_balance' ? 'selected' : '' }}>Opening Balance</option>
                                    <option value="transaction_fee" {{ $currencyTransaction->transaction_purpose == 'transaction_fee' ? 'selected' : '' }}>Transaction Fee</option>
                                    <option value="withdraw" {{ $currencyTransaction->transaction_purpose == 'withdraw' ? 'selected' : '' }}>Withdraw</option>
                                    <option value="deposit" {{ $currencyTransaction->transaction_purpose == 'deposit' ? 'selected' : '' }}>Deposit</option>
                                </select>
                                @error('transaction_purpose')
                                    <p class="text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Transaction Status -->
                            <div>
                                <label for="transaction_status" class="block text-gray-700 dark:text-gray-300">Transaction Status:</label>
                                <select name="transaction_status" id="transaction_status"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required>
                                    <option value="completed" {{ $currencyTransaction->transaction_status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="pending" {{ $currencyTransaction->transaction_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="failed" {{ $currencyTransaction->transaction_status == 'failed' ? 'selected' : '' }}>Failed</option>
                                </select>
                                @error('transaction_status')
                                    <p class="text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Transaction Date -->
                            <div>
                                <label for="transaction_date" class="block text-gray-700 dark:text-gray-300">Transaction Date:</label>
                                <input type="datetime-local" name="transaction_date" id="transaction_date"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    value="{{ old('transaction_date', $currencyTransaction->transaction_date ? \Carbon\Carbon::parse($currencyTransaction->transaction_date)->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i')) }}" />
                                    @error('transaction_date')
                                    <p class="text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Transaction Description -->
                            <div>
                                <label for="transaction_description" class="block text-gray-700 dark:text-gray-300">Transaction Description:</label>
                                <textarea name="transaction_description" id="transaction_description" rows="3"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">{{ old('transaction_description', $currencyTransaction->transaction_description) }}</textarea>
                                @error('transaction_description')
                                    <p class="text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Reference -->
                            {{-- <div>
                                <label for="reference" class="block text-gray-700 dark:text-gray-300">Transaction ID:</label>
                                <input type="text" name="reference" id="reference" 
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    value="{{ old('reference', $currencyTransaction->reference) }}">
                                @error('reference')
                                    <p class="text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div> --}}

                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition duration-200">
                            Update Transaction
                        </button>
                        <a href="{{ route('currency_transactions.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-75 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-500 transition duration-200">
                            Cancel
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
