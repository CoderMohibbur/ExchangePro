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
                            <div class=" grid gap-4 grid-cols-2">
                            <!-- Bank -->
                            <div >
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
                            <div >
                                <label for="transaction_type" class="block text-gray-700 dark:text-gray-300">Transaction
                                    Type:</label>
                                <select name="transaction_type" id="transaction_type"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required>
                                    <option value="credit"
                                        {{ $bankTransaction->transaction_type == 'credit' ? 'selected' : '' }}>Credit
                                    </option>
                                    <option value="debit"
                                        {{ $bankTransaction->transaction_type == 'debit' ? 'selected' : '' }}>Debit
                                    </option>
                                </select>
                                @error('transaction_type')
                                    <p class="text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Amount -->
                            <div >
                                <label for="amount" class="block text-gray-700 dark:text-gray-300">Amount:</label>
                                <input type="number" name="amount" id="amount"
                                    value="{{ $bankTransaction->amount }}" step="0.01"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required>
                                @error('amount')
                                    <p class="text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Transaction Purpose -->
                            <div >
                                <label for="transaction_purpose"
                                    class="block text-gray-700 dark:text-gray-300">Transaction
                                    Purpose:</label>
                                <select name="transaction_purpose" id="transaction_purpose"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required>
                                    <option value="expense"
                                        {{ $bankTransaction->transaction_purpose == 'expense' ? 'selected' : '' }}>
                                        Expense
                                    </option>
                                    <option value="balance_adjustment"
                                        {{ $bankTransaction->transaction_purpose == 'balance_adjustment' ? 'selected' : '' }}>
                                        Balance Adjustment</option>
                                    <option value="opening_balance"
                                        {{ $bankTransaction->transaction_purpose == 'opening_balance' ? 'selected' : '' }}>
                                        Opening Balance</option>
                                    <option value="transaction_fee"
                                        {{ $bankTransaction->transaction_purpose == 'transaction_fee' ? 'selected' : '' }}>
                                        Transaction Fee</option>
                                </select>
                                @error('transaction_purpose')
                                    <p class="text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Transaction Status -->
                            <div>
                                <label for="transaction_status"
                                    class="block text-gray-700 dark:text-gray-300">Transaction
                                    Status:</label>
                                <select name="transaction_status" id="transaction_status"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required>
                                    <option value="completed"
                                        {{ $bankTransaction->transaction_status == 'completed' ? 'selected' : '' }}>
                                        Completed</option>
                                    <option value="pending"
                                        {{ $bankTransaction->transaction_status == 'pending' ? 'selected' : '' }}>
                                        Pending
                                    </option>
                                    <option value="failed"
                                        {{ $bankTransaction->transaction_status == 'failed' ? 'selected' : '' }}>Failed
                                    </option>
                                </select>
                                @error('transaction_status')
                                    <p class="text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Transaction Date (Optional) -->
                            <div>
                                <label for="transaction_date" class="block text-gray-700 dark:text-gray-300">Transaction
                                    Date:</label>
                                <input type="datetime-local" name="transaction_date" id="transaction_date"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    value="{{ old('transaction_date', $bankTransaction->transaction_date ? \Carbon\Carbon::parse($bankTransaction->transaction_date)->format('Y-m-d\TH:i') : (now()->format('Y-m-d\TH:i'))) }}" />
                                    @error('transaction_date')
                                    <p class="text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Transaction Description -->
                            <div>
                                <label for="transaction_description"
                                    class="block text-gray-700 dark:text-gray-300">Transaction Description:</label>
                                <textarea name="transaction_description" id="transaction_description" rows="3"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">{{ old('transaction_description', $bankTransaction->transaction_description) }}</textarea>
                                @error('transaction_description')
                                    <p class="text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                            <!-- Submit Button -->
                            <button type="submit"
                                class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition duration-200">
                                Update Transaction
                            </button>

                            <a href="{{ route('bank_transactions.index') }}"
                                class="px-4 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-75 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-500 transition duration-200">
                                Cancel
                            </a>
                        </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
