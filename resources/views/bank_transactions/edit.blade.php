<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl dark:text-white font-semibold">Edit Bank Transaction</h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6">
                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                            <strong>Whoops!</strong> There were some problems with your input.
                            <ul class="mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('bank_transactions.update', $bankTransaction) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Bank -->
                        <div class="mb-4">
                            <label for="bank_id" class="block text-gray-700 dark:text-gray-300">Bank:</label>
                            <select name="bank_id" id="bank_id"
                                class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                required>
                                @foreach ($banks as $bank)
                                    <option value="{{ $bank->id }}"
                                        {{ $bankTransaction->bank_id == $bank->id ? 'selected' : '' }}>
                                        {{ $bank->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('bank_id')
                                <p class="text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Transaction Type -->
                        <div class="mb-4">
                            <label for="transaction_type" class="block text-gray-700 dark:text-gray-300">Transaction
                                Type:</label>
                            <select name="transaction_type" id="transaction_type"
                                class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                required>
                                <option value="credit"
                                    {{ $bankTransaction->transaction_type == 'credit' ? 'selected' : '' }}>Credit
                                </option>
                                <option value="debit"
                                    {{ $bankTransaction->transaction_type == 'debit' ? 'selected' : '' }}>Debit</option>
                            </select>
                            @error('transaction_type')
                                <p class="text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Amount -->
                        <div class="mb-4">
                            <label for="amount" class="block text-gray-700 dark:text-gray-300">Amount:</label>
                            <input type="number" name="amount" id="amount" value="{{ $bankTransaction->amount }}"
                                step="0.01"
                                class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                required>
                            @error('amount')
                                <p class="text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Balance Before (Hidden) -->
                        <input type="hidden" name="balance_before" id="balance_before">
                        @error('balance_before')
                            <p class="text-red-600 mt-1">{{ $message }}</p>
                        @enderror

                        <!-- Balance After (Hidden) -->
                        <input type="hidden" name="balance_after" id="balance_after">
                        @error('balance_after')
                            <p class="text-red-600 mt-1">{{ $message }}</p>
                        @enderror

                        <!-- Notes -->
                        <div class="mb-4">
                            <label for="notes" class="block text-gray-700 dark:text-gray-300">Notes
                                (optional):</label>
                            <textarea name="notes" id="notes" rows="3"
                                class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">{{ $bankTransaction->notes }}</textarea>
                            @error('notes')
                                <p class="text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition duration-200">
                            Update Transaction
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
