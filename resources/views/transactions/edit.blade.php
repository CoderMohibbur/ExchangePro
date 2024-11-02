<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl dark:text-white font-semibold">Edit Transaction</h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6">
                    <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- User -->
                        <div class="mb-4">
                            <label for="user_id" class="block text-gray-700 dark:text-gray-300">User:</label>
                            <select name="user_id" id="user_id" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" required>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $transaction->user_id == $user->id ? 'selected' : '' }}>{{ $user->full_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Transaction Type -->
                        <div class="mb-4">
                            <label for="transaction_type" class="block text-gray-700 dark:text-gray-300">Transaction Type:</label>
                            <select name="transaction_type" id="transaction_type" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" required>
                                <option value="credit" {{ $transaction->transaction_type == 'credit' ? 'selected' : '' }}>Credit</option>
                                <option value="debit" {{ $transaction->transaction_type == 'debit' ? 'selected' : '' }}>Debit</option>
                            </select>
                        </div>

                        <!-- Amount -->
                        <div class="mb-4">
                            <label for="amount" class="block text-gray-700 dark:text-gray-300">Amount:</label>
                            <input type="number" name="amount" value="{{ $transaction->amount }}" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" step="0.01" required>
                        </div>

                        <!-- Currency -->
                        <div class="mb-4">
                            <label for="currency_id" class="block text-gray-700 dark:text-gray-300">Currency:</label>
                            <select name="currency_id" id="currency_id" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" required>
                                @foreach($currencies as $currency)
                                    <option value="{{ $currency->id }}" {{ $transaction->currency_id == $currency->id ? 'selected' : '' }}>{{ $currency->name }} ({{ $currency->code }})</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Status -->
                        <div class="mb-4">
                            <label for="status" class="block text-gray-700 dark:text-gray-300">Status:</label>
                            <select name="status" id="status" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" required>
                                <option value="pending" {{ $transaction->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="completed" {{ $transaction->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="failed" {{ $transaction->status == 'failed' ? 'selected' : '' }}>Failed</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-500 transition duration-200">
                            Update Transaction
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
