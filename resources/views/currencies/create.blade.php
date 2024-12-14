<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl dark:text-white font-semibold">Add New Currency</h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6">
                    <form action="{{ route('currencies.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="grid gap-4 grid-cols-2">
                            <!-- Name -->
                            <div>
                                <label class="block text-gray-700 dark:text-gray-300">Currency Name</label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                    class="w-full mt-1 border rounded p-2 dark:bg-gray-700 dark:text-gray-300" required>
                                @error('name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Code -->
                            <div>
                                <label class="block text-gray-700 dark:text-gray-300">Currency Code</label>
                                <input type="text" name="code" value="{{ old('code') }}"
                                    class="w-full mt-1 border rounded p-2 dark:bg-gray-700 dark:text-gray-300" required>
                                @error('code')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Exchange Rate -->
                            <div>
                                <label class="block text-gray-700 dark:text-gray-300">Exchange Rate</label>
                                <input type="number" name="exchange_rate" step="0.0001"
                                    value="{{ old('exchange_rate') }}"
                                    class="w-full mt-1 border rounded p-2 dark:bg-gray-700 dark:text-gray-300">
                                @error('exchange_rate')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Currency Symbol -->
                            <div>
                                <label class="block text-gray-700 dark:text-gray-300">Currency Symbol</label>
                                <input type="text" name="cur_sym" value="{{ old('cur_sym') }}"
                                    class="w-full mt-1 border rounded p-2 dark:bg-gray-700 dark:text-gray-300">
                                @error('cur_sym')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Reserve Amount -->
                            <div class="hidden">
                                <label class="block text-gray-700 dark:text-gray-300">Reserve Amount</label>
                                <input type="number" name="reserve" step="0.01" value="0"
                                    class="w-full mt-1 border rounded p-2 dark:bg-gray-700 dark:text-gray-300">
                                @error('reserve')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                             <!-- Fixed Charge for Buy -->
                             <div>
                                <label class="block text-gray-700 dark:text-gray-300">Fixed Charge for Buy</label>
                                <input type="number" name="fixed_charge_for_buy" step="0.01"
                                    value="{{ old('fixed_charge_for_buy') }}"
                                    class="w-full mt-1 border rounded p-2 dark:bg-gray-700 dark:text-gray-300">
                                @error('fixed_charge_for_buy')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Percentage Charge for Buy -->
                            <div>
                                <label class="block text-gray-700 dark:text-gray-300">Percentage Charge for Buy</label>
                                <input type="number" name="percent_charge_for_buy" step="0.01"
                                    value="{{ old('percent_charge_for_buy') }}"
                                    class="w-full mt-1 border rounded p-2 dark:bg-gray-700 dark:text-gray-300">
                                @error('percent_charge_for_buy')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Fixed Charge for Sell -->
                            <div>
                                <label class="block text-gray-700 dark:text-gray-300">Fixed Charge for Sell</label>
                                <input type="number" name="fixed_charge_for_sell" step="0.01"
                                    value="{{ old('fixed_charge_for_sell') }}"
                                    class="w-full mt-1 border rounded p-2 dark:bg-gray-700 dark:text-gray-300">
                                @error('fixed_charge_for_sell')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Percentage Charge for Sell -->
                            <div>
                                <label class="block text-gray-700 dark:text-gray-300">Percentage Charge for Sell</label>
                                <input type="number" name="percent_charge_for_sell" step="0.01"
                                    value="{{ old('percent_charge_for_sell') }}"
                                    class="w-full mt-1 border rounded p-2 dark:bg-gray-700 dark:text-gray-300">
                                @error('percent_charge_for_sell')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Image Upload -->
                            <div class="mb-4">
                                <label class="block text-gray-700 dark:text-gray-300">Currency Image</label>
                                <input type="file" name="image"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                                @error('image')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600">Save Currency
                        </button>
                        <a href="{{ route('currencies.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-75 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-500 transition duration-200">
                            Cancel
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
