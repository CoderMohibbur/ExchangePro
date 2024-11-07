<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl dark:text-white font-semibold">Edit Currency Reserve</h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6">
                    <form action="{{ route('currency_reserves.update', $currencyReserve) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-300">Currency</label>
                            <select name="currency_id" class="w-full mt-1 border rounded p-2 dark:bg-gray-700 dark:text-gray-300">
                                @foreach($currencies as $currency)
                                    <option value="{{ $currency->id }}" {{ $currencyReserve->currency_id == $currency->id ? 'selected' : '' }}>
                                        {{ $currency->name }} ({{ $currency->code }})
                                    </option>
                                @endforeach
                            </select>
                            @error('currency_id')
                                <p class="text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-300">Balance</label>
                            <input type="number" name="balance" step="0.01" value="{{ $currencyReserve->balance }}" class="w-full mt-1 border rounded p-2 dark:bg-gray-700 dark:text-gray-300">
                            @error('balance')
                                <p class="text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600">Update Reserve</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
