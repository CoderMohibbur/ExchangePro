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
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" class="size-10">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 1 0-8 0 4 4 0 0 0 8 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 20a7 7 0 0 1 14 0H5z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.5 7.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM6.5 7.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
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
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" class="size-12">
                                    <!-- User Icon -->
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 1 0-8 0 4 4 0 0 0 8 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 20a7 7 0 0 1 14 0H5z"/>
                                    <!-- Check Mark for Active Status -->
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l2 2 4-4" />
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
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" class="size-10">
                                    <!-- Envelope Icon -->
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l9 6 9-6M5 19h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2z"/>
                                    <!-- Exclamation Mark for Unverified Status -->
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 11v4m0 2h.01" />
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
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" class="size-10">
                                    <!-- Mobile Phone Icon -->
                                    <rect x="7" y="4" width="10" height="16" rx="2" ry="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01"/>
                                    
                                    <!-- Exclamation Mark for Unverified Status -->
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v4m0 2h.01" />
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
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" class="size-10">
                                    <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.5"/>
                                    <path d="M9 12l2 2 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
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
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.678 48.678 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3-3 3"/>
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
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
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
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" class="size-10">
                                    <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.5"/>
                                    <line x1="8" y1="8" x2="16" y2="16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
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
            <h2 class=" text-xl font-semibold">Reserved Currencies</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mt-4">
                <!-- Paypal - USD Widget -->
                <div class="p-4 rounded-lg bg-white dark:bg-gray-800 shadow-lg flex items-center space-x-4 transition-transform transform hover:scale-105">
                    <div class="flex-shrink-0">
                        <img class="w-16 h-16 rounded-full" src="https://script.viserlab.com/changalab/demo/assets/images/currency/634d135eb50b11665995614.jpg" alt="Paypal">
                    </div>
                    <div>
                        <h4 class="text-xl font-semibold text-gray-800 dark:text-white">Paypal - USD</h4>
                        <p class="text-lg text-gray-600 dark:text-gray-400">10,000.00 USD</p>
                    </div>
                </div>
            
                <!-- Perfect Money - USD Widget -->
                <div class="p-4 rounded-lg bg-white dark:bg-gray-800 shadow-lg flex items-center space-x-4 transition-transform transform hover:scale-105">
                    <div class="flex-shrink-0">
                        <img class="w-16 h-16 rounded-full" src="https://script.viserlab.com/changalab/demo/assets/images/currency/63d797ac989e11675073452.jpg" alt="Perfect Money">
                    </div>
                    <div>
                        <h4 class="text-xl font-semibold text-gray-800 dark:text-white">Perfect Money - USD</h4>
                        <p class="text-lg text-gray-600 dark:text-gray-400">99,633.63 USD</p>
                    </div>
                </div>
            
                <!-- Bkash - BDT Widget -->
                <div class="p-4 rounded-lg bg-white dark:bg-gray-800 shadow-lg flex items-center space-x-4 transition-transform transform hover:scale-105">
                    <div class="flex-shrink-0">
                        <img class="w-16 h-16 rounded-full" src="https://script.viserlab.com/changalab/demo/assets/images/currency/634ce62fefa191665984047.png" alt="Bkash">
                    </div>
                    <div>
                        <h4 class="text-xl font-semibold text-gray-800 dark:text-white">Bkash - BDT</h4>
                        <p class="text-lg text-gray-600 dark:text-gray-400">8,035,230.15 BDT</p>
                    </div>
                </div>
            
                <!-- PayTm - INR Widget -->
                <div class="p-4 rounded-lg bg-white dark:bg-gray-800 shadow-lg flex items-center space-x-4 transition-transform transform hover:scale-105">
                    <div class="flex-shrink-0">
                        <img class="w-16 h-16 rounded-full" src="https://script.viserlab.com/changalab/demo/assets/images/currency/63d79313684cb1675072275.jpg" alt="PayTm">
                    </div>
                    <div>
                        <h4 class="text-xl font-semibold text-gray-800 dark:text-white">PayTm - INR</h4>
                        <p class="text-lg text-gray-600 dark:text-gray-400">79,996.44 INR</p>
                    </div>
                </div>
            
                <!-- Bitcoin - BTC Widget -->
                <div class="p-4 rounded-lg bg-white dark:bg-gray-800 shadow-lg flex items-center space-x-4 transition-transform transform hover:scale-105">
                    <div class="flex-shrink-0">
                        <img class="w-16 h-16 rounded-full" src="https://script.viserlab.com/changalab/demo/assets/images/currency/634ce5b0b4ec41665983920.jpg" alt="Bitcoin">
                    </div>
                    <div>
                        <h4 class="text-xl font-semibold text-gray-800 dark:text-white">Bitcoin - BTC</h4>
                        <p class="text-lg text-gray-600 dark:text-gray-400">80,000,051.50 BTC</p>
                    </div>
                </div>
            
                <!-- Web Money - USD Widget -->
                <div class="p-4 rounded-lg bg-white dark:bg-gray-800 shadow-lg flex items-center space-x-4 transition-transform transform hover:scale-105">
                    <div class="flex-shrink-0">
                        <img class="w-16 h-16 rounded-full" src="https://script.viserlab.com/changalab/demo/assets/images/currency/63d7826d88e8e1675068013.png" alt="Web Money">
                    </div>
                    <div>
                        <h4 class="text-xl font-semibold text-gray-800 dark:text-white">Web Money - USD</h4>
                        <p class="text-lg text-gray-600 dark:text-gray-400">60,000,000.00 USD</p>
                    </div>
                </div>
            
                <!-- Rocket - BDT Widget -->
                <div class="p-4 rounded-lg bg-white dark:bg-gray-800 shadow-lg flex items-center space-x-4 transition-transform transform hover:scale-105">
                    <div class="flex-shrink-0">
                        <img class="w-16 h-16 rounded-full" src="https://script.viserlab.com/changalab/demo/assets/images/currency/63d78ff91fec11675071481.jpg" alt="Rocket">
                    </div>
                    <div>
                        <h4 class="text-xl font-semibold text-gray-800 dark:text-white">Rocket - BDT</h4>
                        <p class="text-lg text-gray-600 dark:text-gray-400">6,000.00 BDT</p>
                    </div>
                </div>
            
                <!-- Payoneer - USD Widget -->
                <div class="p-4 rounded-lg bg-white dark:bg-gray-800 shadow-lg flex items-center space-x-4 transition-transform transform hover:scale-105">
                    <div class="flex-shrink-0">
                        <img class="w-16 h-16 rounded-full" src="https://script.viserlab.com/changalab/demo/assets/images/currency/6363475fc84051667450719.jpg" alt="Payoneer">
                    </div>
                    <div>
                        <h4 class="text-xl font-semibold text-gray-800 dark:text-white">Payoneer - USD</h4>
                        <p class="text-lg text-gray-600 dark:text-gray-400">4,990.69 USD</p>
                    </div>
                </div>
            
                <!-- Skrill - USD Widget -->
                <div class="p-4 rounded-lg bg-white dark:bg-gray-800 shadow-lg flex items-center space-x-4 transition-transform transform hover:scale-105">
                    <div class="flex-shrink-0">
                        <img class="w-16 h-16 rounded-full" src="https://script.viserlab.com/changalab/demo/assets/images/currency/63d79ba643fd91675074470.jpg" alt="Skrill">
                    </div>
                    <div>
                        <h4 class="text-xl font-semibold text-gray-800 dark:text-white">Skrill - USD</h4>
                        <p class="text-lg text-gray-600 dark:text-gray-400">10,000.00 USD</p>
                    </div>
                </div>
            
                <!-- Payoneer - EUR Widget -->
                <div class="p-4 rounded-lg bg-white dark:bg-gray-800 shadow-lg flex items-center space-x-4 transition-transform transform hover:scale-105">
                    <div class="flex-shrink-0">
                        <img class="w-16 h-16 rounded-full" src="https://script.viserlab.com/changalab/demo/assets/images/currency/63d782ac127d51675068076.jpg" alt="Payoneer EUR">
                    </div>
                    <div>
                        <h4 class="text-xl font-semibold text-gray-800 dark:text-white">Payoneer - EUR</h4>
                        <p class="text-lg text-gray-600 dark:text-gray-400">49,999,932.04 EUR</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
