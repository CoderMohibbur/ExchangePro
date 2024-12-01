<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl dark:text-white font-semibold">View Bank Details</h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Bank Details</h2>
                        <a href="{{ route('banks.index') }}" 
                           class="px-4 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600 dark:bg-gray-600 dark:hover:bg-gray-700 transition">
                           Back to Bank List
                        </a>
                    </div>
                    
                    <!-- Bank Details Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Bank Name -->
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                            <h3 class="font-semibold text-gray-700 dark:text-gray-200">Bank Name</h3>
                            <p class="text-gray-600 dark:text-gray-400">{{ $bank->name }}</p>
                        </div>

                        <!-- Beneficiary Name -->
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                            <h3 class="font-semibold text-gray-700 dark:text-gray-200">Beneficiary Name</h3>
                            <p class="text-gray-600 dark:text-gray-400">{{ $bank->beneficiary_name }}</p>
                        </div>

                        <!-- Account Number -->
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                            <h3 class="font-semibold text-gray-700 dark:text-gray-200">Account Number</h3>
                            <p class="text-gray-600 dark:text-gray-400">{{ $bank->account_number }}</p>
                        </div>

                        <!-- Account Type -->
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                            <h3 class="font-semibold text-gray-700 dark:text-gray-200">Account Type</h3>
                            <p class="text-gray-600 dark:text-gray-400">{{ $bank->account_type }}</p>
                        </div>

                        <!-- Routing -->
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                            <h3 class="font-semibold text-gray-700 dark:text-gray-200">Routing</h3>
                            <p class="text-gray-600 dark:text-gray-400">{{ $bank->routing }}</p>
                        </div>

                        <!-- Bank Address -->
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                            <h3 class="font-semibold text-gray-700 dark:text-gray-200">Bank Address</h3>
                            <p class="text-gray-600 dark:text-gray-400">{{ $bank->address }}</p>
                        </div>

                        <!-- Total Balance -->
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                            <h3 class="font-semibold text-gray-700 dark:text-gray-200">Total Balance (BDT)</h3>
                            <p class="text-gray-600 dark:text-gray-400">{{ number_format($bank->total_balance, 2) }} BDT</p>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="mt-6 text-center">
                        <a href="{{ route('banks.edit', $bank->id) }}" 
                           class="px-4 py-2 bg-yellow-500 text-white font-semibold rounded-md hover:bg-yellow-600 dark:bg-yellow-600 dark:hover:bg-yellow-700 transition">
                           Edit Bank Details
                        </a>
                        {{-- <form action="{{ route('banks.destroy', $bank->id) }}" method="POST" class="inline-block ml-4">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white font-semibold rounded-md hover:bg-red-600 dark:bg-red-600 dark:hover:bg-red-700 transition">
                                Delete Bank
                            </button>
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
