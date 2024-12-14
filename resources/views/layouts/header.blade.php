<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                    </svg>
                </button>
                <a href="/dashboard" class="flex ms-2 md:me-24">
                    <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 me-3" alt="FlowBite Logo" />
                    <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">ExchangePro</span>
                </a>
            </div>
            <div class="flex items-center space-x-8">
                <!-- Metrics Section -->
                <div class="hidden md:flex flex-row text-sm font-semibold text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-lg">
                    <span class="hover:bg-gray-100 dark:hover:bg-gray-700 px-4 rounded-md transition-all">
                        <span class="font-medium">USD Buy Today:</span><br>
                        <strong class="text-blue-600">{{ $navbarMetrics['totalUsdBoughtToday'] }}</strong>
                    </span>
                    <span class="hover:bg-gray-100 dark:hover:bg-gray-700 px-4 rounded-md transition-all">
                        <span class="font-medium">USD Sell Today:</span> <br>
                        <strong class="text-green-600">{{ $navbarMetrics['totalUsdSoldToday'] }}</strong>
                    </span>
                    <span class="hover:bg-gray-100 dark:hover:bg-gray-700 px-4 rounded-md transition-all">
                        <span class="font-medium">Available USD:</span> <br>
                        <strong class="text-yellow-500">{{ $navbarMetrics['remainingUsdToSell'] }}</strong>
                    </span>
                    <span class="hover:bg-gray-100 dark:hover:bg-gray-700 px-4 rounded-md transition-all">
                        <span class="font-medium">Profit Today:</span> <br>
                        <strong class="text-teal-600">{{ $navbarMetrics['profitOfTheDay'] }}</strong> BDT
                    </span>
                    <span class="hover:bg-gray-100 dark:hover:bg-gray-700 px-4 rounded-md transition-all">
                        <span class="font-medium">Bank Balance:</span> <br>
                        <strong class="text-indigo-600">{{ $navbarMetrics['totalBankBalance'] }}</strong> BDT
                    </span>
                    <span class="hover:bg-gray-100 dark:hover:bg-gray-700 px-4 rounded-md transition-all">
                        <span class="font-medium">Today Due:</span> <br>
                        <strong class="text-red-600">{{ $navbarMetrics['amountDueToSellersToday'] }}</strong> BDT
                    </span>
                </div>
                    <!-- Button to open the modal -->
                <svg id="openModal" class="cursor-pointer w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M11 4.717c-2.286-.58-4.16-.756-7.045-.71A1.99 1.99 0 0 0 2 6v11c0 1.133.934 2.022 2.044 2.007 2.759-.038 4.5.16 6.956.791V4.717Zm2 15.081c2.456-.631 4.198-.829 6.956-.791A2.013 2.013 0 0 0 22 16.999V6a1.99 1.99 0 0 0-1.955-1.993c-2.885-.046-4.76.13-7.045.71v15.081Z" clip-rule="evenodd"/>
                </svg>
                  
                
                <!-- Dark Mode Toggle Button -->
                <button @click="darkMode = !darkMode; localStorage.setItem('dark-mode', darkMode)" class="p-2 text-gray-600 bg-gray-200 rounded-full dark:bg-gray-700 dark:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300 dark:focus:ring-gray-600">
                    <svg x-show="!darkMode" class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 0 1-.5-17.986V3c-.354.966-.5 1.911-.5 3a9 9 0 0 0 9 9c.239 0 .254.018.488 0A9.004 9.004 0 0 1 12 21Z"/>
                    </svg>
                    <svg x-show="darkMode" class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M13 3a1 1 0 1 0-2 0v2a1 1 0 1 0 2 0V3ZM6.343 4.929A1 1 0 0 0 4.93 6.343l1.414 1.414a1 1 0 0 0 1.414-1.414L6.343 4.929Zm12.728 1.414a1 1 0 0 0-1.414-1.414l-1.414 1.414a1 1 0 0 0 1.414 1.414l1.414-1.414ZM12 7a5 5 0 1 0 0 10 5 5 0 0 0 0-10Zm-9 4a1 1 0 1 0 0 2h2a1 1 0 1 0 0-2H3Zm16 0a1 1 0 1 0 0 2h2a1 1 0 1 0 0-2h-2ZM7.757 17.657a1 1 0 1 0-1.414-1.414l-1.414 1.414a1 1 0 1 0 1.414 1.414l1.414-1.414Zm9.9-1.414a1 1 0 0 0-1.414 1.414l1.414 1.414a1 1 0 0 0 1.414-1.414l-1.414-1.414ZM13 19a1 1 0 1 0-2 0v2a1 1 0 1 0 2 0v-2Z" clip-rule="evenodd"/>
                    </svg>
                </button>

                <!-- User Profile -->
                <div class="flex items-center ms-3">
                    <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                    </button>
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm text-gray-900 dark:text-white" role="none">{{ Auth::user()->full_name }}</p>
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">{{ Auth::user()->email }}</p>
                        </div>
                        <ul class="py-1" role="none">
                            <li>
                                <a href="/dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Dashboard</a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white cursor-pointer" role="menuitem">
                                       Sign Out
                                    </a>
                                </form>                            
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Modal -->
<div id="mobileMetricsModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 z-50 flex justify-center items-center">
    <div class="bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-lg w-11/12 md:w-1/3 p-6">
        <div class="flex justify-between items-center">
            <h3 class="text-xl font-semibold">Metrics</h3>
            <button id="closeModal" class="text-gray-400 hover:text-gray-600 dark:text-gray-200 dark:hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <div class="mt-4 space-y-4">
            <div class="flex justify-between text-sm">
                <span class="font-medium">USD Buy Today:</span>
                <strong class="text-blue-600">{{ $navbarMetrics['totalUsdBoughtToday'] }} USD</strong>
            </div>
            <div class="flex justify-between text-sm">
                <span class="font-medium">USD Sell Today:</span>
                <strong class="text-green-600">{{ $navbarMetrics['totalUsdSoldToday'] }} USD</strong>
            </div>
            <div class="flex justify-between text-sm">
                <span class="font-medium">Available USD:</span>
                <strong class="text-yellow-500">{{ $navbarMetrics['remainingUsdToSell'] }} USD</strong>
            </div>
            <div class="flex justify-between text-sm">
                <span class="font-medium">Profit Today:</span>
                <strong class="text-teal-600">{{ $navbarMetrics['profitOfTheDay'] }} BDT</strong> 
            </div>
            <div class="flex justify-between text-sm">
                <span class="font-medium">Bank Balance:</span>
                <strong class="text-indigo-600">{{ $navbarMetrics['totalBankBalance'] }} BDT</strong>
            </div>
            <div class="flex justify-between text-sm">
                <span class="font-medium">Today Due:</span>
                <strong class="text-red-600">{{ $navbarMetrics['amountDueToSellersToday'] }} BDT</strong>
            </div>
        </div>
    </div>
</div>

<!-- Add JavaScript to handle modal toggle -->
<script>
    // Get the modal and buttons
    const openModalButton = document.getElementById('openModal');
    const closeModalButton = document.getElementById('closeModal');
    const mobileMetricsModal = document.getElementById('mobileMetricsModal');

    // Open the modal when the button is clicked
    openModalButton.addEventListener('click', function() {
        mobileMetricsModal.classList.remove('hidden');
    });

    // Close the modal when the close button is clicked
    closeModalButton.addEventListener('click', function() {
        mobileMetricsModal.classList.add('hidden');
    });

    // Close modal if the overlay (background) is clicked
    mobileMetricsModal.addEventListener('click', function(e) {
        if (e.target === mobileMetricsModal) {
            mobileMetricsModal.classList.add('hidden');
        }
    });
</script>

</nav>
