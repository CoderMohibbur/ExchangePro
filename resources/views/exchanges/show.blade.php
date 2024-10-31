<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl dark:text-white font-semibold">Exchange Details</h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Exchange ID: {{ $exchange->id }}</h2>

                    <div class="mb-4">
                        <strong>Type:</strong> {{ ucfirst($exchange->exchange_type) }}
                    </div>

                    <div class="mb-4">
                        <strong>Currency:</strong> {{ $exchange->currency->name }} ({{ $exchange->currency->code }})
                    </div>

                    <div class="mb-4">
                        <strong>Quantity:</strong> {{ $exchange->quantity }}
                    </div>

                    <div class="mb-4">
                        <strong>Rate:</strong> {{ $exchange->rate }}
                    </div>

                    <div class="mb-4">
                        <strong>Status:</strong> 
                        <span class="px-2 py-1 rounded-full text-sm font-medium {{ $exchange->status === 'approved' ? 'bg-green-200 text-green-700' : ($exchange->status === 'pending' ? 'bg-yellow-200 text-yellow-700' : 'bg-red-200 text-red-700') }}">
                            {{ ucfirst($exchange->status) }}
                        </span>
                    </div>

                    <a href="{{ route('exchanges.index') }}" class="btn btn-secondary">Back to All Exchanges</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
