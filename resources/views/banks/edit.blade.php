<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl dark:text-white font-semibold">Edit Bank</h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6">
                    <form action="{{ route('banks.update', $bank->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Bank Name -->
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 dark:text-gray-300">Bank Name:</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $bank->name) }}" required
                                class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                        </div>

                        <!-- Beneficiary Name -->
                        <div class="mb-4">
                            <label for="beneficiary_name" class="block text-gray-700 dark:text-gray-300">Beneficiary Name:</label>
                            <input type="text" name="beneficiary_name" id="beneficiary_name" value="{{ old('beneficiary_name', $bank->beneficiary_name) }}" required
                                class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                        </div>

                        <!-- Account Number -->
                        <div class="mb-4">
                            <label for="account_number" class="block text-gray-700 dark:text-gray-300">Account Number:</label>
                            <input type="text" name="account_number" id="account_number" value="{{ old('account_number', $bank->account_number) }}" required
                                class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                        </div>

                        <!-- Account Type -->
                        <div class="mb-4">
                            <label for="account_type" class="block text-gray-700 dark:text-gray-300">Account Type:</label>
                            <select name="account_type" id="account_type" required
                                class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                                <option value="checking" {{ old('account_type', $bank->account_type) == 'checking' ? 'selected' : '' }}>Checking</option>
                                <option value="savings" {{ old('account_type', $bank->account_type) == 'savings' ? 'selected' : '' }}>Savings</option>
                            </select>
                        </div>

                        <!-- Routing -->
                        <div class="mb-4">
                            <label for="routing" class="block text-gray-700 dark:text-gray-300">Routing:</label>
                            <input type="text" name="routing" id="routing" value="{{ old('routing', $bank->routing) }}" required
                                class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                        </div>

                        <!-- Bank Address -->
                        <div class="mb-4">
                            <label for="bank_address" class="block text-gray-700 dark:text-gray-300">Bank Address:</label>
                            <input type="text" name="bank_address" id="bank_address" value="{{ old('bank_address', $bank->bank_address) }}" required
                                class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                        </div>

                        <!-- NPSB Fee -->
                        <div class="mb-4">
                            <label for="npsb_fee" class="block text-gray-700 dark:text-gray-300">NPSB Fee (BDT):</label>
                            <input type="number" step="0.01" name="npsb_fee" id="npsb_fee" value="{{ old('npsb_fee', $bank->npsb_fee) }}" required
                                class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                        </div>

                        <!-- EFT/BEFTN Fee -->
                        <div class="mb-4">
                            <label for="eft_beftn_fee" class="block text-gray-700 dark:text-gray-300">EFT/BEFTN Fee (BDT):</label>
                            <input type="number" step="0.01" name="eft_beftn_fee" id="eft_beftn_fee" value="{{ old('eft_beftn_fee', $bank->eft_beftn_fee) }}" required
                                class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-500 transition duration-200">
                            Update Bank
                        </button>

                        <a href="{{ route('banks.index') }}" class="px-4 py-2 ml-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600 dark:bg-gray-600 dark:hover:bg-gray-700 transition duration-200">
                            Cancel
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>