<x-app-layout>
    <x-slot name="title">
        Complete Partial Payment
    </x-slot>
    <x-slot name="header">
        <h1 class="text-xl dark:text-white font-semibold">Complete Payment for Exchange #{{ $exchange->id }}</h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6">
                    @if ($errors->any())
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                            <p class="font-bold">Error</p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('exchanges.completePartialPayment', $exchange->id) }}" method="POST">
                        @csrf
                        <div class="grid gap-4 grid-cols-3">

                            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                                <h3 class="font-semibold text-gray-700 dark:text-gray-200">Total Amount:</h3>
                                <p class="text-gray-600 dark:text-gray-400">
                                    {{ number_format($exchange->total_amount, 2) }} BDT</p>
                            </div>

                            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                                <h3 class="font-semibold text-gray-700 dark:text-gray-200">Paid Amount:</h3>
                                <p class="text-gray-600 dark:text-gray-400">
                                    {{ number_format($exchange->paid_to_seller_bdt, 2) }} BDT</p>
                            </div>

                            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                                <h3 class="font-semibold text-gray-700 dark:text-gray-200">Remaining Due:</h3>
                                <p class="text-gray-600 dark:text-gray-400">
                                    {{ number_format($exchange->due_amount, 2) }} BDT</p>
                            </div>

                            <!-- Additional Payment Input -->
                            <div class="mb-4">
                                <label for="additional_payment" class="block text-gray-700 dark:text-gray-300">Enter
                                    Additional Payment:</label>
                                <input type="number" name="additional_payment" id="additional_payment" step="0.01"
                                    max="{{ $exchange->due_amount }}"
                                    class="form-control mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    value="{{ $exchange->due_amount }}" required>
                                @error('additional_payment')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Transaction Date (Optional) -->
                            <div>
                                <label for="transaction_date" class="block text-gray-700 dark:text-gray-300">Transaction
                                    Date:</label>
                                <input type="datetime-local" name="transaction_date" id="transaction_date"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    value="{{ old('transaction_date', now()->format('Y-m-d\TH:i')) }}" />
                                @error('transaction_date')
                                    <p class="text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="bank_id" class="block text-gray-700 dark:text-gray-300">Bank:</label>
                                <select name="bank_id" id="bank_id"
                                        class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                        required>
                                    @foreach ($banks as $bank)
                                        <option value="{{ $bank->id }}" 
                                            {{ $bank->id == $exchange->bank_id ? 'selected' : '' }}>
                                            {{ $bank->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('bank_id')
                                    <p class="text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="hidden">
                                <label for="transaction_type" class="block text-gray-700 dark:text-gray-300">Transaction Type:</label>
                                <select name="transaction_type" id="transaction_type"
                                        class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                        required>
                                    <option value="debit" {{ old('transaction_type') == 'debit' ? 'selected' : '' }}>Debit</option>
                                    <option value="credit" {{ old('transaction_type') == 'credit' ? 'selected' : '' }}>Credit</option>
                                </select>
                                @error('transaction_type')
                                    <p class="text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                        </div>
                        <!-- Submit Button -->
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-500 transition duration-200">
                            Complete Payment
                        </button>
                        <a href="{{ route('exchanges.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-75 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-500 transition duration-200">
                            Cancel
                        </a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
