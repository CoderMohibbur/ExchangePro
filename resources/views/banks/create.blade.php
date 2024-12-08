<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl font-semibold text-gray-800 dark:text-white">Create New Bank</h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6">
                    <form action="{{ route('banks.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <!-- Bank Name Input -->
                            <div>
                                <label for="name" class="block text-gray-700 dark:text-gray-300">Bank Name:</label>
                                <input type="text" name="name" id="name"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required>
                            </div>

                            <!-- Beneficiary Name Input -->
                            <div>
                                <label for="beneficiary_name" class="block text-gray-700 dark:text-gray-300">Beneficiary Name:</label>
                                <input type="text" name="beneficiary_name" id="beneficiary_name"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required>
                            </div>

                            <!-- Account Number Input -->
                            <div>
                                <label for="account_number" class="block text-gray-700 dark:text-gray-300">Account Number:</label>
                                <input type="text" name="account_number" id="account_number"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required>
                            </div>

                            <!-- Account Type Input -->
                            <div>
                                <label for="account_type" class="block text-gray-700 dark:text-gray-300">Account Type:</label>
                                <select name="account_type" id="account_type"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required>
                                    <option value="checking">Checking</option>
                                    <option value="savings">Savings</option>
                                </select>
                            </div>

                            <!-- Routing Input -->
                            <div>
                                <label for="routing" class="block text-gray-700 dark:text-gray-300">Routing:</label>
                                <input type="text" name="routing" id="routing"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required>
                            </div>

                            <!-- Bank Address Input -->
                            <div>
                                <label for="bank_address" class="block text-gray-700 dark:text-gray-300">Bank Address:</label>
                                <input type="text" name="bank_address" id="bank_address"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required>
                            </div>

                            <!-- NPSB Fee Input -->
                            <div >
                                <label for="npsb_fee" class="block text-gray-700 dark:text-gray-300">NPSB Fee (BDT):</label>
                                <input type="number" step="0.01" name="npsb_fee" id="npsb_fee"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required>
                            </div>

                            <!-- EFT/BEFTN Fee Input -->
                            <div >
                                <label for="eft_beftn_fee" class="block text-gray-700 dark:text-gray-300">EFT/BEFTN Fee (BDT):</label>
                                <input type="number" step="0.01" name="eft_beftn_fee" id="eft_beftn_fee"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required>
                            </div>

                            <!-- Bank Logo Upload -->
                            <div class="mb-4">
                                <label for="logo" class="block text-gray-700 dark:text-gray-300">Bank Logo:</label>
                                <input type="file" name="logo" id="logo" 
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    accept="image/*">
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-500 transition duration-200">
                            Create Bank
                        </button>

                        <a href="{{ route('banks.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-75 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-500 transition duration-200">
                            Cancel
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>