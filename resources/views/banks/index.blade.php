<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
        <h1 class="text-xl dark:text-white font-semibold">Manage Banks</h1>
        <h1 class="text-xl dark:text-white font-semibold">Total Bank Blance: {{ number_format($banks->sum('balance'), 2) }}</h1>
    </div>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800">
                    <x-toast-success />
                    <x-toast-danger />
                    <x-toast-warning />
                    <div class="flex justify-between p-4">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Banks</h2>
                        <a href="{{ route('banks.create') }}"
                            class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 transition">
                            Add New Bank
                        </a>
                    </div>
                    <div class="overflow-x-auto">
                        <table
                            class="w-full min-w-max table-auto bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th class="px-4 py-2 text-left font-semibold">Bank Name</th>
                                    <th class="px-4 py-2 text-left font-semibold">Beneficiary Name</th>
                                    <th class="px-4 py-2 text-left font-semibold">Account Number</th>
                                    {{-- <th class="px-4 py-2 text-left font-semibold">Account Type</th>
                                    <th class="px-4 py-2 text-left font-semibold">Routing</th>
                                    <th class="px-4 py-2 text-left font-semibold">Bank Address</th> --}}
                                    <th class="px-4 py-2 text-center font-semibold">Total Balance (BDT)</th>
                                    <th class="px-4 py-2 text-center font-semibold">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($banks as $bank)
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <td class="px-4 py-3 flex ">
                                            <img class="{{ $bank->logo ? 'max-w-6 rounded-full' : 'max-w-6 rounded-full p-1 bg-white' }}"
                                            src="{{ $bank->logo ? asset('storage/' . $bank->logo) : asset('images/bank-mini.png') }}"
                                            alt="Bank Logo">
                                            <a href="{{ route('banks.show', $bank->id) }}"
                                                class="text-blue-500 ml-2 hover:underline">
                                                {{ $bank->name }}
                                                <!-- SVG Icon after bank name -->
                                            </a>
                                            {{-- <svg class="w-6 h-6 text-gray-800 dark:text-white cursor-pointer" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" onclick="copyBankInfo('{{ $bank->name }}', '{{ $bank->beneficiary_name }}', '{{ $bank->account_number }}', '{{ $bank->account_type }}', '{{ $bank->routing }}', '{{ $bank->bank_address }}')">
                                                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M9 8v3a1 1 0 0 1-1 1H5m11 4h2a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1h-7a1 1 0 0 0-1 1v1m4 3v10a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1v-7.13a1 1 0 0 1 .24-.65L7.7 8.35A1 1 0 0 1 8.46 8H13a1 1 0 0 1 1 1Z"/>
                                            </svg>                                               --}}
                                        </td>
                                        <td class="px-4 py-3">{{ $bank->beneficiary_name }}</td>
                                        <td class="px-4 py-3">{{ $bank->account_number }}</td>
                                        {{-- <td class="px-4 py-3">{{ $bank->account_type }}</td>
                                        <td class="px-4 py-3">{{ $bank->routing }}</td>
                                        <td class="px-4 py-3">{{ $bank->bank_address }}</td> --}}
                                        <td class="px-4 py-3 text-center">{{ number_format($bank->balance, 2) }}</td>
                                        <td class="px-4 py-3 flex space-x-2 justify-center">
                                            <a href="{{ route('banks.edit', $bank->id) }}"
                                                class="px-3 py-1 text-sm font-semibold text-yellow-600 border border-yellow-600 rounded hover:bg-yellow-600 hover:text-white transition duration-200">
                                                Edit
                                            </a>
                                            <form action="{{ route('banks.destroy', $bank->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this bank?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-3 py-1 text-sm font-semibold text-red-600 border border-red-600 rounded hover:bg-red-600 hover:text-white transition duration-200">
                                                    Delete
                                                </button>
                                            </form>
                                            <a href="{{ route('banks.withdrawForm', $bank->id) }}"
                                                class="px-3 py-1 text-sm font-semibold text-blue-500 border border-blue-500 rounded hover:bg-blue-500 hover:text-white transition duration-200">
                                                Withdraw
                                            </a>
                                            <a href="{{ route('banks.depositForm', $bank->id) }}"
                                                class="px-3 py-1 text-sm font-semibold text-green-500 border border-green-500 rounded hover:bg-green-500 hover:text-white transition duration-200">
                                                Deposit
                                            </a>

                                            <!-- Copy Info Button -->
                                            <button type="button"
                                                class="px-3 py-1 text-sm font-semibold text-blue-500 border border-blue-500 rounded hover:bg-blue-500 hover:text-white transition duration-200"
                                                onclick="copyBankInfo('{{ $bank->name }}', '{{ $bank->beneficiary_name }}', '{{ $bank->account_number }}', '{{ $bank->account_type }}', '{{ $bank->routing }}', '{{ $bank->bank_address }}')">
                                                Copy Info
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8"
                                            class="px-4 py-3 text-center text-gray-500 dark:text-gray-400">
                                            No banks found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Copying Info -->
    <script>
        function copyBankInfo(name, beneficiaryName, accountNumber, accountType, routing, bankAddress) {
            // Create the text to be copied
            const info =
                `Bank name:\n${name}\n\nBank address:\n${bankAddress}\n\nRouting (ABA):\n${routing}\n\nAccount number:\n${accountNumber}\n\nAccount type:\n${accountType}\n\nBeneficiary name:\n${beneficiaryName}`;

            // Create a temporary textarea to copy the text
            const textarea = document.createElement('textarea');
            textarea.value = info;
            document.body.appendChild(textarea);

            // Select and copy the text
            textarea.select();
            document.execCommand('copy');

            // Remove the temporary textarea
            document.body.removeChild(textarea);

            // Alert the user
            alert('Bank information copied to clipboard!');
        }
    </script>
</x-app-layout>
