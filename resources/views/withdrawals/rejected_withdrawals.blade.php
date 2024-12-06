<x-app-layout>
    <x-slot name="header">
        <h1 class=" text-xl dark:text-white font-semibold">Manage Currency
        </h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800">
                    <x-toast-success />
                    <x-toast-danger />
                    <x-toast-warning />
                    <div class="overflow-hidden overflow-x-auto">
                        <table
                            class="w-full min-w-max table-auto bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th class="px-4 py-2 text-left font-semibold">Gateway | Transaction	</th>
                                    <th class="px-4 py-2 text-left font-semibold">Initiated </th>
                                    <th class="px-4 py-2 text-left font-semibold">User</th>
                                    <th class="px-4 py-2 text-left font-semibold">Send Amount</th>
                                    <th class="px-4 py-2 text-left font-semibold">Conversion</th>
                                    <th class="px-4 py-2 text-left font-semibold">After Charge	</th>
                                    <th class="px-4 py-2 text-left font-semibold">Status</th>
                                    <th class="px-4 py-2 text-left font-semibold">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <td class="px-4 py-3">
                                        <span class="font-bold">PHHBIH4KD92B</span><br>
                                        <small class="text-gray-500 dark:text-gray-400">2024-10-29 12:18 PM</small>
                                    </td>
                                    <td class="px-4 py-3">
                                        <span class="block">ely omer</span>
                                        <a href="https://script.viserlab.com/changalab/demo/admin/users/detail/3566"
                                            class="text-blue-500 hover:underline">@elyfour</a>
                                    </td>
                                    <td class="px-4 py-3">
                                        <span class="block">Rocket</span>
                                        <span class="text-blue-500">BDT</span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <span class="block">5,000.00 BDT</span>
                                        <span>5,000.00</span> +
                                        <span class="text-red-500">77.00</span> =
                                        <span>5,077.00 BDT</span>
                                    </td>

                                    <td class="px-4 py-3">
                                        <span class="block">5,000.00 BDT</span>
                                        <span>5,000.00</span> +
                                        <span class="text-red-500">77.00</span> =
                                        <span>5,077.00 BDT</span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <span class="block">5,000.00 BDT</span>
                                        <span>5,000.00</span> +
                                        <span class="text-red-500">77.00</span> =
                                        <span>5,077.00 BDT</span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <span
                                            class="px-2 py-1 rounded-full text-sm font-medium bg-yellow-200 text-yellow-700 dark:bg-yellow-500 dark:text-yellow-100">Pending</span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <a href="https://script.viserlab.com/changalab/demo/admin/exchange/details/2951"
                                            class="px-4 py-1 text-sm font-semibold text-blue-500 border border-blue-500 rounded hover:bg-blue-500 hover:text-white dark:hover:bg-blue-700 dark:hover:border-blue-700 dark:border-blue-500 dark:text-blue-400 transition duration-200">
                                            <i class="las la-desktop"></i> Details
                                        </a>
                                    </td>
                                </tr>
                                <!-- Repeat table rows as necessary -->
                            </tbody>
                        </table>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-900 p-4 rounded-b-lg">
                        <div class="flex items-center justify-between">
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Showing <span class="font-semibold">1</span> to <span class="font-semibold">20</span> of
                                <span class="font-semibold">640</span> results
                            </p>
                            <div class="flex">
                                <button
                                    class="px-3 py-1 text-gray-400 bg-gray-200 rounded-l-md hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600"
                                    disabled>‹</button>
                                <button
                                    class="px-3 py-1 text-gray-800 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600">1</button>
                                <button
                                    class="px-3 py-1 text-gray-800 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600">2</button>
                                <button
                                    class="px-3 py-1 text-gray-800 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600">3</button>
                                <button
                                    class="px-3 py-1 text-gray-800 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600">4</button>
                                <button
                                    class="px-3 py-1 text-gray-800 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600">5</button>
                                <button
                                    class="px-3 py-1 text-gray-800 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600">6</button>
                                <button
                                    class="px-3 py-1 text-gray-400 bg-gray-200 rounded-r-md hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600">›</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
