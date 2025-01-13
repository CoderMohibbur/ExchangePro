<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl dark:text-white font-semibold">Manage Currency Transactions</h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-900">
                    <x-toast-success />
                    <x-toast-danger />
                    <x-toast-warning />
                    <!-- Search Form -->
                    <div class="flex justify-between p-4 items-center">
                        {{-- <form action="{{ route('currency_transactions.index') }}" method="GET" class="flex space-x-2">
                            <input type="text" name="search" placeholder="Search by currency or transaction ID" 
                                   value="{{ request('search') }}" 
                                   class="w-full px-4 py-2 border rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600" />
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 transition">
                                Search
                            </button>
                        </form> --}}
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Transactions</h2>
                        <a href="{{ route('currency_transactions.create') }}" 
                           class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 transition">
                           Add Transaction
                        </a>
                    </div>

                    <!-- Transactions Table -->
                    <div class="sm:px-5 px-0">
                        <table id="currencies"
                            class="w-full min-w-max table-auto bg-white dark:bg-gray-900 text-gray-700 dark:text-gray-200 border border-gray-300 dark:border-gray-700 rounded-lg">
                            <thead >
                                <tr>
                                    <th>
                                        <span class="flex items-center">
                                            Currency
                                             <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                            </svg>
                                        </span>
                                    </th>
                                    <th>
                                        <span class="flex items-center">
                                            Transaction Type
                                             <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                            </svg>
                                        </span>
                                    </th>
                                    <th>
                                        <span class="flex items-center">
                                            Amount
                                             <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                            </svg>
                                        </span>
                                    </th>
                                    <th>
                                        <span class="flex items-center">
                                            Transaction ID
                                             <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                            </svg>
                                        </span>
                                    </th>
                                    <th>
                                        <span class="flex items-center">
                                            Date
                                             <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                            </svg>
                                        </span>
                                    </th>
                                    <th class="px-4 py-2 text-center font-semibold">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($transactions as $transaction)
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <td class="px-4 py-3">{{ $transaction->currency->name }} ({{ $transaction->currency->code }})</td>
                                        <td class="px-4 py-3">{{ ucfirst($transaction->transaction_type) }}</td>
                                        <td class="px-4 py-3">{{ number_format($transaction->amount, 2) }}</td>
                                        <td class="px-4 py-3">{{ $transaction->reference ?? 'N/A' }}</td>
                                        <td class="px-4 py-3">{{ $transaction->created_at->format('Y-m-d H:i') }}</td>
                                        <td class="px-4 py-3 flex space-x-2 justify-center">
                                            <a href="{{ route('currency_transactions.edit', $transaction) }}" 
                                               class="px-3 py-1 text-sm font-semibold text-yellow-600 border border-yellow-600 rounded hover:bg-yellow-600 hover:text-white dark:text-yellow-400 dark:border-yellow-400 dark:hover:text-white transition duration-200">
                                               Edit
                                            </a>
                                            <form action="{{ route('currency_transactions.destroy', $transaction) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="px-3 py-1 text-sm font-semibold text-red-600 border border-red-600 rounded hover:bg-red-600 hover:text-white dark:text-white dark:border-red-400 dark:hover:bg-red-500 transition duration-200">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-4 py-3 text-center text-gray-500 dark:text-gray-400">
                                            No transactions found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    {{-- <div class="bg-gray-50 dark:bg-gray-900 p-4 rounded-b-lg">
                        <div class="flex items-center justify-between">
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Showing <span class="font-semibold">{{ $transactions->firstItem() }}</span> to <span class="font-semibold">{{ $transactions->lastItem() }}</span> of <span class="font-semibold">{{ $transactions->total() }}</span> results
                            </p>
                            <div class="flex">
                                {{ $transactions->links() }}
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.4"></script>
    <script>
            document.addEventListener("DOMContentLoaded", () => {
            const dataTable = new simpleDatatables.DataTable("#currencies", {
                searchable: true,
                sortable: true
            });
        });
    </script>
</x-app-layout>
