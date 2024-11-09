<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl dark:text-white font-semibold">Transaction Details</h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6">
                    <h2 class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-200">Transaction Information</h2>

                    <div class="mb-4">
                        <strong class="text-gray-700 dark:text-gray-300">Bank Name:</strong>
                        <p class="text-gray-900 dark:text-gray-100">{{ $bankTransaction->bank->name }}</p>
                    </div>

                    <div class="mb-4">
                        <strong class="text-gray-700 dark:text-gray-300">Transaction Type:</strong>
                        <p class="text-gray-900 dark:text-gray-100">{{ ucfirst($bankTransaction->transaction_type) }}</p>
                    </div>

                    <div class="mb-4">
                        <strong class="text-gray-700 dark:text-gray-300">Amount:</strong>
                        <p class="text-gray-900 dark:text-gray-100">{{ number_format($bankTransaction->amount, 2) }} BDT</p>
                    </div>

                    <div class="mb-4">
                        <strong class="text-gray-700 dark:text-gray-300">Balance Before Transaction:</strong>
                        <p class="text-gray-900 dark:text-gray-100">{{ number_format($bankTransaction->balance_before, 2) }} BDT</p>
                    </div>

                    <div class="mb-4">
                        <strong class="text-gray-700 dark:text-gray-300">Balance After Transaction:</strong>
                        <p class="text-gray-900 dark:text-gray-100">{{ number_format($bankTransaction->balance_after, 2) }} BDT</p>
                    </div>

                    <div class="mb-4">
                        <strong class="text-gray-700 dark:text-gray-300">Notes:</strong>
                        <p class="text-gray-900 dark:text-gray-100">{{ $bankTransaction->notes ?? 'N/A' }}</p>
                    </div>

                    <div class="mb-4">
                        <a href="{{ route('bank_transactions.index') }}" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition duration-200">
                            Back to Transactions
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
