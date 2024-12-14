<x-app-layout>
    <x-slot name="title">
        All Exchanges
    </x-slot>
    <x-slot name="header">
        <h1 class="text-xl dark:text-white font-semibold">All Exchanges</h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800">
                    <x-toast-success />
                    <x-toast-danger />
                    <x-toast-warning />
                    <!-- Search Form -->
                    <div class="flex justify-between items-center p-4">
                        <form action="{{ route('exchanges.index') }}" method="GET" class="flex space-x-2">
                            <input type="text" name="search" placeholder="Search by user or exchange ID" 
                                   value="{{ request('search') }}" 
                                   class="w-full px-4 py-2 border rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600" />
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 transition">
                                Search
                            </button>
                        </form>
                        <a href="{{ route('exchanges.create') }}" 
                           class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 transition">
                           Add New Exchange
                        </a>
                    </div>

                    <!-- Exchanges Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full min-w-max table-auto bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th class="px-4 py-2 text-left font-semibold">Exchange ID</th>
                                    <th class="px-4 py-2 text-left font-semibold">User</th>
                                    <th class="px-4 py-2 text-left font-semibold">Received Method</th>
                                    <th class="px-4 py-2 text-left font-semibold">Received Amount</th>
                                    <th class="px-4 py-2 text-left font-semibold">Send Method</th>
                                    <th class="px-4 py-2 text-left font-semibold">Send Amount</th>
                                    <th class="px-4 py-2 text-center font-semibold">Status</th>
                                    <th class="px-4 py-2 text-center font-semibold">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($exchanges as $exchange)
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <td class="px-4 py-3">
                                            <span class="font-bold">{{ $exchange->id }} | {{ ucfirst($exchange->exchange_type) }}</span><br>
                                            <small class="text-gray-500 dark:text-gray-400">{{ \Carbon\Carbon::parse($exchange->date_time)->format('Y-m-d h:i A') }}</small>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="block">{{ $exchange->user->full_name ?? 'N/A' }}</span>
                                            <small><a href="users/{{ $exchange->user->id }}" class="text-blue-500 hover:underline">{{ $exchange->user->username ?? 'N/A' }}</a></small>
                                        </td>
                        
                                        <!-- Received Method (Dynamic) -->
                                        <td class="px-4 py-3">
                                            @if($exchange->exchange_type == 'buy')
                                                <span class="block">{{ $exchange->currency->name ?? 'N/A' }}</span>
                                                <small class="text-blue-500">{{ $exchange->currency->code ?? '' }}</small>
                                            @else
                                                <span class="block">{{ $exchange->bank->name ?? 'N/A' }}</span>
                                                <small class="text-blue-500">BDT</small>
                                            @endif
                                        </td>
                        
                                        <!-- Received Amount (Dynamic) -->
                                        <td class="px-4 py-3">
                                            @if($exchange->exchange_type == 'buy')
                                                <span class="block">{{ number_format($exchange->quantity, 2) }} {{ $exchange->currency->code ?? '' }}</span>
                                                <span>{{ number_format($exchange->quantity, 2) }}</span> x
                                                <span class="text-red-500">{{ number_format($exchange->rate ?? 0, 2) }}</span> =
                                                <span>{{ number_format($exchange->quantity * $exchange->rate, 2) }} BDT</span>
                                            @else
                                                <span class="block">{{ number_format($exchange->total_amount ?? 0, 2) }} BDT</span>
                                                <span>{{ number_format($exchange->total_amount ?? 0, 2) }}</span> +
                                                <span class="text-red-500">{{ number_format($exchange->send_fee ?? 0, 2) }}</span> =
                                                <span>{{ number_format(($exchange->total_amount ?? 0) + ($exchange->send_fee ?? 0), 2) }} BDT</span>
                                            @endif
                                        </td>
                        
                                        <!-- Send Method (Dynamic) -->
                                        <td class="px-4 py-3">
                                            @if($exchange->exchange_type == 'buy')
                                                <span class="block">{{ $exchange->bank->name ?? 'N/A' }}</span>
                                                <small class="text-blue-500">BDT</small>
                                            @else
                                                <span class="block">{{ $exchange->currency->name ?? 'N/A' }}</span>
                                                <small class="text-blue-500">{{ $exchange->currency->code ?? '' }}</small>
                                            @endif
                                        </td>
                        
                                        <!-- Send Amount (Dynamic) -->
                                        <td class="px-4 py-3">
                                            @if($exchange->exchange_type == 'buy')
                                            <span class="block">{{ number_format($exchange->total_amount ?? 0, 2) }} BDT</span>
                                            <span>{{ number_format($exchange->total_amount ?? 0, 2) }}</span> +
                                            <span class="text-red-500">{{ number_format($exchange->send_fee ?? 0, 2) }}</span> =
                                            <span>{{ number_format(($exchange->total_amount ?? 0) + ($exchange->send_fee ?? 0), 2) }} BDT</span>
                                            @else
                                                <span class="block">{{ number_format($exchange->quantity, 2) }} {{ $exchange->currency->code ?? '' }}</span>
                                                <span>{{ number_format($exchange->quantity, 2) }}</span> x
                                                <span class="text-red-500">{{ number_format($exchange->rate ?? 0, 2) }}</span> =
                                                <span>{{ number_format($exchange->quantity * $exchange->rate, 2) }} BDT</span>
                                            @endif
                                        </td>
                        
                                        <td class="px-4 py-3">
                                            <span class="px-2 py-1 rounded-full text-sm font-medium 
                                                {{ $exchange->payment_status == 'Partial' ? 'bg-yellow-200 text-yellow-700 dark:bg-yellow-500 dark:text-yellow-100' : 
                                                ($exchange->payment_status == 'Paid' ? 'bg-green-200 text-green-700 dark:bg-green-500 dark:text-green-100' : 
                                                'bg-red-200 text-red-700 dark:bg-red-500 dark:text-red-100') }}">
                                                {{ ucfirst($exchange->payment_status) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 flex space-x-2">
                                            <a href="{{ route('exchanges.payment', $exchange->id) }}" 
                                                class="px-4 py-1 text-sm font-semibold text-green-500 border border-green-500 rounded hover:bg-green-500 hover:text-white dark:hover:bg-green-700 dark:hover:border-green-700 dark:border-green-500 dark:text-green-400 transition duration-200">
                                                <i class="las la-money-bill"></i> Pay
                                            </a>
                                            {{-- <a href="{{ route('exchanges.edit', $exchange->id) }}" class="px-4 py-1 text-sm font-semibold text-yellow-500 border border-yellow-500 rounded hover:bg-yellow-500 hover:text-white dark:hover:bg-yellow-700 dark:hover:border-yellow-700 dark:border-yellow-500 dark:text-yellow-400 transition duration-200">
                                                <i class="las la-edit"></i> Edit
                                            </a> --}}
                                            <form action="{{ route('exchanges.destroy', $exchange->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this exchange?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-4 py-1 text-sm font-semibold text-red-500 border border-red-500 rounded hover:bg-red-500 hover:text-white dark:hover:bg-red-700 dark:hover:border-red-700 dark:border-red-500 dark:text-red-400 transition duration-200">
                                                    <i class="las la-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="px-4 py-3 text-center text-gray-500 dark:text-gray-400">
                                            No exchanges found.
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
                                Showing <span class="font-semibold">{{ $exchanges->firstItem() }}</span> to <span class="font-semibold">{{ $exchanges->lastItem() }}</span> of <span class="font-semibold">{{ $exchanges->total() }}</span> results
                            </p>
                            <div class="flex">
                                {{ $exchanges->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
