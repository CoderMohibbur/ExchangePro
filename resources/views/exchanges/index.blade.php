<x-app-layout>
    <x-slot name="title">
        All Exchanges
    </x-slot>
    {{-- <x-slot name="header">
        <h1 class="text-xl dark:text-white font-semibold">All Exchanges</h1>
    </x-slot> --}}
    <div class="p-4 sm:ml-64">
        <div class="flex justify-between p-4 items-center">
            {{-- <form action="{{ route('exchanges.index') }}" method="GET" class="flex space-x-2">
                <input type="text" name="search" placeholder="Search by user or exchange ID" 
                       value="{{ request('search') }}" 
                       class="w-full px-4 py-2 border rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600" />
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 transition">
                    Search
                </button>
            </form> --}}
            <h1 class="text-xl dark:text-white font-semibold">All Exchanges</h1>
            <div class="flex space-x-2">
            <a href="{{ route('exchanges.buy') }}" 
                class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 transition">
                Buy
             </a>
             <a href="{{ route('exchanges.sell') }}" 
                class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 transition">
                Sell
             </a>
            </div>
        </div>
    </div>

    <div class="p-4 sm:ml-64">
        <div class="p-6 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-900">
                    <x-toast-success />
                    <x-toast-danger />
                    <x-toast-warning />
                    <!-- Search Form -->
                    

                    <!-- Exchanges Table -->
                    {{-- <div class="sm:px-5 px-0"> --}}
                    <div >
                        <table id="currencies"
                            class="w-full min-w-max table-auto bg-white dark:bg-gray-900 text-gray-700 dark:text-gray-200 border border-gray-300 dark:border-gray-700 rounded-lg">
                            <thead>
                                <tr>
                                    <th>
                                        <span class="flex items-center">
                                            Exchange ID
                                             <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                            </svg>
                                        </span>
                                    </th>
                                    <th>
                                        <span class="flex items-center">
                                            User
                                             <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                            </svg>
                                        </span>
                                    </th>
                                    <th>
                                        <span class="flex items-center">
                                            Received Method
                                             <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                            </svg>
                                        </span>
                                    </th>
                                    <th>
                                        <span class="flex items-center">
                                            Received Amount
                                             <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                            </svg>
                                        </span>
                                    </th>
                                    <th>
                                        <span class="flex items-center">
                                            Send Method
                                             <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                            </svg>
                                        </span>
                                    </th>
                                    <th>
                                        <span class="flex items-center">
                                            Send Amount
                                             <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                            </svg>
                                        </span>
                                    </th>
                                    <th>
                                        <span class="flex items-center">
                                            Status
                                             <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                            </svg>
                                        </span>
                                    </th>
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
                                        <td class="px-4 py-6 flex items-center space-x-2">
                                            <a href="{{ route('exchanges.payment', $exchange->id) }}" 
                                                class="px-4 py-1 text-sm font-semibold text-green-500 border border-green-500 rounded hover:bg-green-500 hover:text-white dark:hover:bg-green-700 dark:hover:border-green-700 dark:border-green-500 dark:text-green-400 transition duration-200">
                                                <i class="las la-money-bill"></i> Pay
                                            </a>
                                            <a href="{{ route('exchanges.edit', $exchange->id) }}" class="px-4 py-1 text-sm font-semibold text-yellow-500 border border-yellow-500 rounded hover:bg-yellow-500 hover:text-white dark:hover:bg-yellow-700 dark:hover:border-yellow-700 dark:border-yellow-500 dark:text-yellow-400 transition duration-200">
                                                <i class="las la-edit"></i> Edit
                                            </a>
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
                    {{-- <div class="bg-gray-50 dark:bg-gray-900 p-4 rounded-b-lg">
                        <div class="flex items-center justify-between">
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Showing <span class="font-semibold">{{ $exchanges->firstItem() }}</span> to <span class="font-semibold">{{ $exchanges->lastItem() }}</span> of <span class="font-semibold">{{ $exchanges->total() }}</span> results
                            </p>
                            <div class="flex">
                                {{ $exchanges->links() }}
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
                sortable: true,
                firstLast: true,
            });
        });
    </script>
</x-app-layout>
