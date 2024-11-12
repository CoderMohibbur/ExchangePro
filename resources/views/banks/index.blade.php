<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl dark:text-white font-semibold">Manage Banks</h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800">
                    <div class="flex justify-between p-4">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Banks</h2>
                        <a href="{{ route('banks.create') }}" 
                           class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 transition">
                           Add New Bank
                        </a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full min-w-max table-auto bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th class="px-4 py-2 text-left font-semibold">Bank Name</th>
                                    <th class="px-4 py-2 text-center font-semibold">Total Balance (BDT)</th>
                                    <th class="px-4 py-2 text-center font-semibold">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($banks as $bank)
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <td class="px-4 py-3">{{ $bank->name }}</td>
                                        <td class="px-4 py-3 text-center">{{ number_format($bank->balance, 2) }}</td>
                                        <td class="px-4 py-3 flex space-x-2 justify-center">
                                            <a href="{{ route('banks.edit', $bank->id) }}" 
                                               class="px-3 py-1 text-sm font-semibold text-yellow-600 border border-yellow-600 rounded hover:bg-yellow-600 hover:text-white transition duration-200">
                                               Edit
                                            </a>
                                            <form action="{{ route('banks.destroy', $bank->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this bank?');">
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
                                        </td>
                                        
                                        
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-4 py-3 text-center text-gray-500 dark:text-gray-400">
                                            No banks found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-900 p-4 rounded-b-lg">
                        <div class="flex items-center justify-between">
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Showing <span class="font-semibold">{{ $banks->firstItem() }}</span> to <span class="font-semibold">{{ $banks->lastItem() }}</span> of <span class="font-semibold">{{ $banks->total() }}</span> results
                            </p>
                            <div class="flex">
                                {{ $banks->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
