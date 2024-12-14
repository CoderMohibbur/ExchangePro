<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl dark:text-white font-semibold">Transaction Details</h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6">
                    <div class="mb-4">
                        <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Currency:</h2>
                        <p class="text-gray-700 dark:text-gray-300">{{ $currencyReserveTransaction->currency->name }} ({{ $currencyReserveTransaction->currency->code }})</p>
                    </div>
                    <div class="mb-4">
                        <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Transaction Type:</h2>
                        <p class="text-gray-700 dark:text-gray-300">{{ ucfirst($currencyReserveTransaction->transaction_type) }}</p>
                    </div>
                    <div class="mb-4">
                        <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Amount:</h2>
                        <p class="text-gray-700 dark:text-gray-300">{{ number_format($currencyReserveTransaction->amount, 2) }}</p>
                    </div>
                    <div class="mb-4">
                        <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Transaction ID:</h2>
                        <p class="text-gray-700 dark:text-gray-300">{{ $currencyReserveTransaction->reference ?? 'N/A' }}</p>
                    </div>
                    <div class="mb-4">
                        <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Date:</h2>
                        <p class="text-gray-700 dark:text-gray-300">{{ $currencyReserveTransaction->created_at->format('Y-m-d H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
