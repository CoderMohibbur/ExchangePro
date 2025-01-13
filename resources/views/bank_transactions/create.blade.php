<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl dark:text-white font-semibold">Add New Bank Transaction</h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6">
                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                            <strong>Whoops!</strong> There were some problems with your input.
                            <ul class="mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('bank_transactions.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">

                            <!-- Bank -->
                            <div>
                                <label for="bank_id" class="block text-gray-700 dark:text-gray-300">Bank:</label>
                                <select name="bank_id" id="bank_id"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required>
                                    @foreach ($banks as $bank)
                                        <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                    @endforeach
                                </select>
                                @error('bank_id')
                                    <p class="text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Transaction Type -->
                            <div>
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
                            <div>
                                <label for="amount" class="block text-gray-700 dark:text-gray-300">Amount:</label>
                                <input type="number" name="amount" id="amount" step="0.01"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required>
                                @error('amount')
                                    <p class="text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Transaction Purpose -->
                            <div>
                                <label for="transaction_purpose" class="block text-gray-700 dark:text-gray-300">Transaction
                                    Purpose:</label>
                                <select name="transaction_purpose" id="transaction_purpose"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required>
                                    <option value="expense">Expense</option>
                                    <option value="balance_adjustment">Balance Adjustment</option>
                                    <option value="opening_balance">Opening Balance</option>
                                    <option value="transaction_fee">Transaction Fee</option>
                                </select>
                                @error('transaction_purpose')
                                    <p class="text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Transaction Status -->
                            <div>
                                <label for="transaction_status" class="block text-gray-700 dark:text-gray-300">Transaction
                                    Status:</label>
                                <select name="transaction_status" id="transaction_status"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required>
                                    <option value="completed">Completed</option>
                                    <option value="pending">Pending</option>
                                    <option value="failed">Failed</option>
                                </select>
                                @error('transaction_status')
                                    <p class="text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Transaction Date (Optional) -->
                            <div>
                                <label for="transaction_date" class="block text-gray-700 dark:text-gray-300">Transaction Date:</label>
                                <input type="datetime-local" name="transaction_date" id="transaction_date"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    value="{{ old('transaction_date', now()->format('Y-m-d\TH:i')) }}" />
                                @error('transaction_date')
                                    <p class="text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Transaction Description -->
                            <div class="mb-4">
                                <label for="transaction_description" class="block text-gray-700 dark:text-gray-300">Transaction
                                    Description:</label>
                                <textarea name="transaction_description" id="transaction_description" rows="3"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"></textarea>
                                @error('transaction_description')
                                    <p class="text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition duration-200">
                            Save Transaction
                        </button>
                        <a href="{{ route('bank_transactions.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-75 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-500 transition duration-200">
                            Cancel
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </script>
</x-app-layout>
