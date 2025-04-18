<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl dark:text-white font-semibold">Manage Bank Balances</h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800">
                    <x-toast-success />

                    <!-- Search Form -->
                    <div class="flex justify-between items-center p-4">
                        <form action="{{ route('bank_balances.index') }}" method="GET" class="flex space-x-2">
                            <input type="text" name="search" placeholder="Search by bank name or transaction ID"
                                   value="{{ request('search') }}"
                                   class="w-full px-4 py-2 border rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600" />
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 transition">
                                Search
                            </button>
                        </form>
                        <a href="{{ route('bank_balances.create') }}"
                           class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 transition">
                           Add New Balance Entry
                        </a>
                    </div>

                    <!-- Bank Balances Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full min-w-max table-auto bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th class="px-4 py-2 text-left font-semibold">Bank Name</th>
                                    <th class="px-4 py-2 text-left font-semibold">Amount</th>
                                    <th class="px-4 py-2 text-left font-semibold">Transaction ID</th>
                                    <th class="px-4 py-2 text-left font-semibold">Date</th>
                                    <th class="px-4 py-2 text-left font-semibold">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($balances as $balance)
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <td class="px-4 py-3">{{ $balance->bank->name }}</td>
                                        <td class="px-4 py-3">{{ number_format($balance->amount, 2) }} BDT</td>
                                        <td class="px-4 py-3">{{ $balance->transaction_id ?? 'N/A' }}</td>
                                        <td class="px-4 py-3">{{ \Carbon\Carbon::parse($balance->date_time)->format('Y-m-d h:i A') }}</td>
                                        <td class="px-4 py-3 flex space-x-2">
                                            <a href="{{ route('bank_balances.edit', $balance) }}"
                                               class="px-3 py-1 text-sm font-semibold text-yellow-600 border border-yellow-600 rounded hover:bg-yellow-600 hover:text-white dark:text-yellow-400 dark:border-yellow-400 dark:hover:text-white transition duration-200">
                                               Edit
                                            </a>
                                            <form action="{{ route('bank_balances.destroy', $balance) }}" method="POST" onsubmit="return confirm('Are you sure?')">
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
                                        <td colspan="5" class="px-4 py-3 text-center text-gray-500 dark:text-gray-400">
                                            No bank balances found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="bg-gray-50 dark:bg-gray-900 p-4 rounded-b-lg">
                        <div class="flex items-center justify-between">
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Showing <span class="font-semibold">{{ $balances->firstItem() }}</span> to <span class="font-semibold">{{ $balances->lastItem() }}</span> of <span class="font-semibold">{{ $balances->total() }}</span> results
                            </p>
                            <div class="flex">
                                {{ $balances->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
