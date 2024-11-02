<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl dark:text-white font-semibold">{{ isset($balance) ? 'Edit' : 'Add' }} Bank Balance</h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6">
                    <form action="{{ isset($balance) ? route('bank_balances.update', $balance) : route('bank_balances.store') }}" method="POST">
                        @csrf
                        @isset($balance)
                            @method('PUT')
                        @endisset

                        <div class="mb-4">
                            <label for="bank_id" class="block text-gray-700 dark:text-gray-300">Bank:</label>
                            <select name="bank_id" id="bank_id" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" required>
                                @foreach($banks as $bank)
                                    <option value="{{ $bank->id }}" @if(isset($balance) && $balance->bank_id == $bank->id) selected @endif>{{ $bank->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="amount" class="block text-gray-700 dark:text-gray-300">Amount:</label>
                            <input type="number" name="amount" value="{{ old('amount', $balance->amount ?? '') }}" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="transaction_id" class="block text-gray-700 dark:text-gray-300">Transaction ID (Optional):</label>
                            <input type="text" name="transaction_id" value="{{ old('transaction_id', $balance->transaction_id ?? '') }}" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                        </div>

                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-500 transition duration-200">
                            {{ isset($balance) ? 'Update' : 'Add' }} Balance
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
