<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $status ?? 'All' }} Tickets
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">{{ $status ?? 'All' }} Tickets</h1>

                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-300">ID</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Subject</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Description</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Status</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                            @forelse ($tickets as $ticket)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $ticket->id }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $ticket->subject }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $ticket->description }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $ticket->status }}</td>
                                    <td class="px-4 py-2 text-sm">
                                        <a href="{{ route('tickets.show', $ticket->id) }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800">View</a>
                                        <a href="{{ route('tickets.edit', $ticket->id) }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 ml-4">Edit</a>

                                        <!-- Delete Form -->
                                        <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this ticket?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 dark:text-red-400 hover:text-red-800 ml-4">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-2 text-center text-sm text-gray-500 dark:text-gray-400">No tickets found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
