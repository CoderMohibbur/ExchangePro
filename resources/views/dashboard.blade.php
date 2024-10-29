<x-app-layout>
    <x-slot name="header">
        <h1 class=" text-xl font-semibold">Dashboard</h1>
    </x-slot>
   
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
                <!-- Total Users Widget -->
                <a href="https://script.viserlab.com/changalab/demo/admin/users" class="block">
                    <div class="p-6 rounded-lg bg-blue-500 dark:bg-blue-700 text-white shadow-lg transition-transform transform hover:scale-105">
                        <div class="flex items-center justify-between">
                            <span class="text-4xl">
                                <svg class="w-10 h-10" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm0 18c-2.385 0-4.535-.835-6.217-2.217A7.93 7.93 0 0 0 12 16c2.385 0 4.535.835 6.217 2.217A7.93 7.93 0 0 0 12 20zm-4-6c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3zm8 0c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3z"/>
                                </svg>
                            </span>
                            <div class="text-right">
                                <p class="text-lg font-medium">Total Users</p>
                                <h3 class="text-3xl font-bold">2597</h3>
                            </div>
                        </div>
                    </div>
                </a>
            
                <!-- Active Users Widget -->
                <a href="https://script.viserlab.com/changalab/demo/admin/users/active" class="block">
                    <div class="p-6 rounded-lg bg-green-500 dark:bg-green-700 text-white shadow-lg transition-transform transform hover:scale-105">
                        <div class="flex items-center justify-between">
                            <span class="text-4xl">
                                <svg class="w-10 h-10" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M12 2a10 10 0 100 20 10 10 0 000-20zm0 18a8 8 0 110-16 8 8 0 010 16zm-1-9V7h2v4h4v2h-6z"/>
                                </svg>
                            </span>
                            <div class="text-right">
                                <p class="text-lg font-medium">Active Users</p>
                                <h3 class="text-3xl font-bold">2597</h3>
                            </div>
                        </div>
                    </div>
                </a>
            
                <!-- Email Unverified Users Widget -->
                <a href="https://script.viserlab.com/changalab/demo/admin/users/email-unverified" class="block">
                    <div class="p-6 rounded-lg bg-red-500 dark:bg-red-700 text-white shadow-lg transition-transform transform hover:scale-105">
                        <div class="flex items-center justify-between">
                            <span class="text-4xl">
                                <svg class="w-10 h-10" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M12 2a10 10 0 100 20 10 10 0 000-20zm0 18a8 8 0 110-16 8 8 0 010 16zM10.293 9.293L12 10.586l1.707-1.293A1 1 0 1115 9.586L12.707 12 15 14.414a1 1 0 11-1.414 1.414L12 13.414l-1.707 1.707A1 1 0 019 14.414L11.293 12 9 9.586a1 1 0 111.293-1.293z"/>
                                </svg>
                            </span>
                            <div class="text-right">
                                <p class="text-lg font-medium">Email Unverified Users</p>
                                <h3 class="text-3xl font-bold">0</h3>
                            </div>
                        </div>
                    </div>
                </a>
            
                <!-- Mobile Unverified Users Widget -->
                <a href="https://script.viserlab.com/changalab/demo/admin/users/mobile-unverified" class="block">
                    <div class="p-6 rounded-lg bg-yellow-500 dark:bg-yellow-700 text-white shadow-lg transition-transform transform hover:scale-105">
                        <div class="flex items-center justify-between">
                            <span class="text-4xl">
                                <svg class="w-10 h-10" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M17 7h-2V4a3 3 0 10-6 0v3H7a5 5 0 000 10h10a5 5 0 000-10zm-3-3a1 1 0 012 0v3h-2V4zM7 18a3 3 0 010-6h10a3 3 0 010 6H7z"/>
                                </svg>
                            </span>
                            <div class="text-right">
                                <p class="text-lg font-medium">Mobile Unverified Users</p>
                                <h3 class="text-3xl font-bold">0</h3>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mt-2 mb-5">
                <!-- Approved Exchanges Widget -->
                <a href="https://script.viserlab.com/changalab/demo/admin/exchange/approved" class="block">
                    <div class="p-6 rounded-lg bg-green-500 dark:bg-green-700 text-white shadow-lg transition-transform transform hover:scale-105">
                        <div class="flex items-center justify-between">
                            <span class="text-4xl">
                                <svg class="w-10 h-10" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10 15l5.5-5.5-1.41-1.41L10 12.17l-1.59-1.59L7 11.5z"/>
                                </svg>
                            </span>
                            <div class="text-right">
                                <p class="text-lg font-medium">Approved Exchanges</p>
                                <h3 class="text-3xl font-bold">32</h3>
                            </div>
                        </div>
                    </div>
                </a>
            
                <!-- Pending Exchange Widget -->
                <a href="https://script.viserlab.com/changalab/demo/admin/exchange/pending" class="block">
                    <div class="p-6 rounded-lg bg-yellow-500 dark:bg-yellow-700 text-white shadow-lg transition-transform transform hover:scale-105">
                        <div class="flex items-center justify-between">
                            <span class="text-4xl">
                                <svg class="w-10 h-10" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M19 12a7 7 0 1 1-7-7 7 7 0 0 1 7 7zm-7 8a8 8 0 1 0-8-8 8 8 0 0 0 8 8zm.59-4.59L12 17l-1.59-1.59a1 1 0 1 1 1.42-1.42l.59.58.58-.59a1 1 0 0 1 1.42 1.42z"/>
                                </svg>
                            </span>
                            <div class="text-right">
                                <p class="text-lg font-medium">Pending Exchange</p>
                                <h3 class="text-3xl font-bold">605</h3>
                            </div>
                        </div>
                    </div>
                </a>
            
                <!-- Refunded Exchanges Widget -->
                <a href="https://script.viserlab.com/changalab/demo/admin/exchange/refunded" class="block">
                    <div class="p-6 rounded-lg bg-gray-800 dark:bg-gray-600 text-white shadow-lg transition-transform transform hover:scale-105">
                        <div class="flex items-center justify-between">
                            <span class="text-4xl">
                                <svg class="w-10 h-10" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M18 6v2H6V6H4v12h2v-2h12v2h2V6h-2zM6 12v-2h8v2H6z"/>
                                </svg>
                            </span>
                            <div class="text-right">
                                <p class="text-lg font-medium">Refunded Exchanges</p>
                                <h3 class="text-3xl font-bold">1</h3>
                            </div>
                        </div>
                    </div>
                </a>
            
                <!-- Canceled Exchanges Widget -->
                <a href="https://script.viserlab.com/changalab/demo/admin/exchange/canceled" class="block">
                    <div class="p-6 rounded-lg bg-red-500 dark:bg-red-700 text-white shadow-lg transition-transform transform hover:scale-105">
                        <div class="flex items-center justify-between">
                            <span class="text-4xl">
                                <svg class="w-10 h-10" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M5 13h14v2H5v-2zm14 4v2H5v-2h14zM5 7v2h14V7H5z"/>
                                </svg>
                            </span>
                            <div class="text-right">
                                <p class="text-lg font-medium">Canceled Exchanges</p>
                                <h3 class="text-3xl font-bold">2</h3>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            
            <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                </p>
            </div>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                        <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 1v16M1 9h16" />
                        </svg>
                    </p>
                </div>
                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                        <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 1v16M1 9h16" />
                        </svg>
                    </p>
                </div>
                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                        <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 1v16M1 9h16" />
                        </svg>
                    </p>
                </div>
                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                        <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 1v16M1 9h16" />
                        </svg>
                    </p>
                </div>
            </div>
            <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                </p>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                        <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M9 1v16M1 9h16" />
                        </svg>
                    </p>
                </div>
                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                        <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M9 1v16M1 9h16" />
                        </svg>
                    </p>
                </div>
                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                        <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M9 1v16M1 9h16" />
                        </svg>
                    </p>
                </div>
                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                        <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M9 1v16M1 9h16" />
                        </svg>
                    </p>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
