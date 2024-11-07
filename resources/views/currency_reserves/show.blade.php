<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl dark:text-white font-semibold">Currency Reserve Details</h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Currency: {{ $currencyReserve->currency->name }} ({{ $currencyReserve->currency->code }})</h2>
                    <p class="text-gray-700 dark:text-gray-300 mb-2"><strong>Balance:</strong> {{ number_format($currencyReserve->balance, 2) }}</p>
                    <p class="text-gray-700 dark:text-gray-300"><strong>Last Updated:</strong> {{ $currencyReserve->updated_at->format('d M Y, h:i A') }}</p>
                    <div class="mt-4">
                        <a href="{{ route('currency_reserves.index') }}" class="px-4 py-2 bg-gray-500 text-white font-semibold rounded hover:bg-gray-600">Back to List</a>
                        <a href="{{ route('currency_reserves.edit', $currencyReserve) }}" class="px-4 py-2 bg-yellow-500 text-white font-semibold rounded hover:bg-yellow-600">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
