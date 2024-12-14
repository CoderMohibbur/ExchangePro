<x-app-layout>
    <x-slot name="title">Deposit to {{ $bank->name }}</x-slot>
    <x-slot name="header">
        <h1 class="text-xl dark:text-white font-semibold">Deposit Money to {{ $bank->name }}</h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6">
                    <form action="{{ route('banks.processDeposit', $bank->id) }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <!-- Deposit Amount -->
                            <div>
                                <label for="amount" class="block text-gray-700 dark:text-gray-300">Deposit
                                    Amount:</label>
                                <input type="number" name="amount" id="amount"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    step="0.01" required>
                                <small class="text-gray-500 dark:text-gray-400">Please enter your Deposit
                                    Amount.</small>
                            </div>
                            <!-- Transaction Date (Optional) -->
                            <div>
                                <label for="transaction_date" class="block text-gray-700 dark:text-gray-300">Transaction
                                    Date:</label>
                                <input type="text" name="transaction_date" id="transaction_date" datepicker
                                    datepicker-autohide
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    value="{{ old('transaction_date', now()->format('d/m/Y')) }}">
                                <small class="text-gray-500 dark:text-gray-400">Leave blank to use today's date.</small>
                            </div>
                            <!-- Notes -->
                            <div class="mb-4">
                                <label for="transaction_description"
                                    class="block text-gray-700 dark:text-gray-300">Transaction Description:</label>
                                <textarea name="transaction_description" id="transaction_description"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">{{ old('transaction_description', 'Bank Deposit') }}</textarea>
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <div class="flex space-x-4">
                            <button type="submit"
                                class="px-4 py-2 bg-green-500 text-white font-semibold rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-500 transition duration-200">
                                Deposit
                            </button>

                            <a href="{{ route('banks.index') }}"
                                class="px-4 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-75 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-500 transition duration-200">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
