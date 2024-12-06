<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl dark:text-white font-semibold">Manage Blocked IPs</h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800">
                    <x-toast-success />
                    <x-toast-danger />
                    <x-toast-warning />
                    <!-- Search Form and Error Messages -->
                    <div class="flex justify-between items-center p-4">
                        <form action="{{ route('blocked-ips.index') }}" method="GET" class="flex space-x-2">
                            <input type="text" name="search" placeholder="Search by IP address"
                                value="{{ request('search') }}"
                                class="w-full px-4 py-2 border rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600" />
                            <button type="submit"
                                class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 transition">
                                Search
                            </button>
                        </form>
                        <button id="defaultModalButton" data-modal-target="defaultModal"
                            data-modal-toggle="defaultModal"
                            class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 transition">
                            Block New IP
                        </button>
                    </div>

                    <!-- Error Message Handling -->
                    @if ($errors->any())
                        <div
                            class="p-4 mb-4 text-sm text-red-600 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Blocked IPs Table -->
                    <div class="overflow-x-auto">
                        <table
                            class="w-full min-w-max table-auto bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th class="px-4 py-2 text-left font-semibold">IP Address</th>
                                    <th class="px-4 py-2 text-left font-semibold">Date Blocked</th>
                                    <th class="px-4 py-2 text-left font-semibold">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blockedIps as $blockedIp)
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <td class="px-4 py-3">{{ $blockedIp->ip_address }}</td>
                                        <td class="px-4 py-3">{{ $blockedIp->created_at->format('Y-m-d H:i') }}</td>
                                        <td class="px-4 py-3">
                                            <!-- Add any action buttons here, like delete -->
                                            <form action="{{ route('blocked-ips.destroy', $blockedIp) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-3 py-1 text-sm font-semibold text-red-600 border border-red-600 rounded hover:bg-red-600 hover:text-white dark:text-white dark:border-red-400 dark:hover:bg-red-500 transition duration-200">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal toggle -->
    <div id="defaultModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex justify-center items-center">
        <div class="relative p-4 w-full max-w-lg h-auto md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div
                    class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Add Blocked IP
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="defaultModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal content -->
                <form method="POST" action="{{ route('blocked-ips.store') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="ip_address" class="block text-sm font-medium text-gray-700 dark:text-gray-200">IP
                            Address</label>
                        <input type="text" name="ip_address" id="ip_address"
                            class="form-input mt-1 block w-full rounded-md bg-gray-100 dark:bg-gray-700 dark:text-white dark:border-gray-600"
                            placeholder="Enter IP address to block" required>
                    </div>

                    <div class="flex justify-end">
                        <button id="defaultModalButton" data-modal-target="defaultModal"
                            data-modal-toggle="defaultModal"
                            class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 transition">
                            Block New IP
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
