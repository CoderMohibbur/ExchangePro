<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl dark:text-white font-semibold">Edit Bank Balance Entry</h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6">
                    <form action="{{ route('bank_balances.update', $bankBalance->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Bank -->
                        <div class="mb-4">
                            <label for="bank_id" class="block text-gray-700 dark:text-gray-300">Bank:</label>
                            <select name="bank_id" id="bank_id" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" required>
                                @foreach($banks as $bank)
                                    <option value="{{ $bank->id }}" {{ $bank->id == $bankBalance->bank_id ? 'selected' : '' }}>
                                        {{ $bank->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Amount -->
                        <div class="mb-4">
                            <label for="amount" class="block text-gray-700 dark:text-gray-300">Amount:</label>
                            <input type="number" name="amount" id="amount" value="{{ $bankBalance->amount }}" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" step="0.01" required>
                        </div>

                        <!-- Transaction ID (Optional) -->
                        <div class="mb-4">
                            <label for="transaction_id" class="block text-gray-700 dark:text-gray-300">Transaction ID (Optional):</label>
                            <input type="text" name="transaction_id" id="transaction_id" value="{{ $bankBalance->transaction_id }}" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-500 transition duration-200">
                            Update Balance Entry
                        </button>

                        <!-- Cancel Button -->
                        <a href="{{ route('bank_balances.index') }}" class="px-4 py-2 ml-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-75 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-500 transition duration-200">
                            Cancel
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
