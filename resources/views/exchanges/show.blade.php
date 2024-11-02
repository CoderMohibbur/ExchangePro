<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl dark:text-white font-semibold">Exchange Details</h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-6">Exchange ID: {{ $exchange->id }}</h2>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
                        <div class="flex items-center">
                            <span class="font-semibold text-gray-700 dark:text-gray-300 mr-2">Type:</span>
                            <span class="text-gray-800 dark:text-gray-200">{{ ucfirst($exchange->exchange_type) }}</span>
                        </div>

                        <div class="flex items-center">
                            <span class="font-semibold text-gray-700 dark:text-gray-300 mr-2">Currency:</span>
                            <span class="text-gray-800 dark:text-gray-200">{{ $exchange->currency->name }} ({{ $exchange->currency->code }})</span>
                        </div>

                        <div class="flex items-center">
                            <span class="font-semibold text-gray-700 dark:text-gray-300 mr-2">Quantity:</span>
                            <span class="text-gray-800 dark:text-gray-200">{{ $exchange->quantity }}</span>
                        </div>

                        <div class="flex items-center">
                            <span class="font-semibold text-gray-700 dark:text-gray-300 mr-2">Rate:</span>
                            <span class="text-gray-800 dark:text-gray-200">{{ $exchange->rate }}</span>
                        </div>

                        <div class="flex items-center">
                            <span class="font-semibold text-gray-700 dark:text-gray-300 mr-2">Status:</span>
                            <span class="px-2 py-1 rounded-full text-sm font-medium 
                                {{ $exchange->status === 'approved' ? 'bg-green-200 text-green-700' : ($exchange->status === 'pending' ? 'bg-yellow-200 text-yellow-700' : 'bg-red-200 text-red-700') }}">
                                {{ ucfirst($exchange->status) }}
                            </span>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('exchanges.index') }}" 
                           class="px-4 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-gray-200 transition duration-200">
                            Back to All Exchanges
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
