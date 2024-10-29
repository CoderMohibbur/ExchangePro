<!doctype html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> ExchangePro - Dashboard</title>

    <meta name="title" Content="ChangaLab - Dashboard">
    <meta name="description"
        content="ChangaLab can be explained as a network of buyers and sellers, who transfer currency between each other or for their own. It is the means by which individuals, and companies convert one currency into another. This Currency Exchange Platform is the most advanced script in Codecanyon. The Currency Exchange Platform is endlessly appealing, feature-loaded, customized, and possesses the remarkable capability of running on all devices and operating systems.">
    <meta name="keywords"
        content="exchange platform,currency exchange platform,changalab,usd to inr,currency exchnage,easy exchange,money exhcngae,bitcoin to usd,money exchange,crypto currency exchange,crypto currency">
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Vite directive -->

</head>

<body>
    <header class="bg-white dark:bg-gray-800">
        <div class="py-4">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center">
                    <div class="logo">
                        <a href="/" class="flex ms-2 md:me-24">
                            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 me-3" alt="FlowBite Logo" />
                            <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">ExchangePro</span>
                          </a>
                    </div>
                    <div class="flex justify-between items-center space-x-8">
                        <nav class="flex space-x-4">
                            <a class="text-gray-600 dark:text-gray-300">Dashboard</a>
                            <a class="text-gray-600 dark:text-gray-300">Affiliation</a>
                            <a class="text-gray-600 dark:text-gray-300">About</a>
                            <a class="text-gray-600 dark:text-gray-300">Blog</a>
                            <a class="text-gray-600 dark:text-gray-300">Contact</a>
                        </nav>
                        <div class="hidden lg:flex space-x-4">
                            <a href="/login"
                                class="border border-gray-300 text-gray-600 dark:text-gray-300 rounded-md py-2 px-4">Login</a>
                            <a href="/register" class="bg-blue-600 text-white rounded-md py-2 px-4">Register</a>
                        </div>
                    </div>
                    <div class="lg:hidden">
                        <button class="flex flex-col space-y-1">
                            <span class="block w-8 h-1 bg-gray-600 dark:bg-gray-300"></span>
                            <span class="block w-8 h-1 bg-gray-600 dark:bg-gray-300"></span>
                            <span class="block w-8 h-1 bg-gray-600 dark:bg-gray-300"></span>
                        </button>
                    </div>
                    
                </div>
            </div>
        </div>
    </header>

    <section class="banner-section bg-fixed bg-img banner-overlay dark:bg-gray-900"
        data-background="https://script.viserlab.com/changalab/demo/assets/images/frontend/banner/66a6225d149331722163805.jpg"
        style="background-image:url('https://script.viserlab.com/changalab/demo/assets/images/frontend/banner/66a6225d149331722163805.jpg');">
        <div class="container mx-auto py-12 px-4 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="text-3xl lg:text-4xl font-bold text-white dark:text-gray-200">
                    ExchangePro - Currency Exchange Platform
                </h2>
            </div>
            <!-- Currency Converter Form -->
            <div class="bg-white dark:bg-gray-800/60 p-4 mt-8 rounded-lg shadow-sm max-w-md mx-auto">
                <form
                    class="exchange-form space-y-4 p-4 bg-white shadow-md rounded-lg max-w-lg mx-auto border border-gray-200"
                    method="POST" action="https://script.viserlab.com/changalab/demo/exchange" id="exchange-form">
                    <input type="hidden" name="_token" value="xFmeveLkdHq8smlgD80buIisNGVwOYEV8PVTzl0R"
                        autocomplete="off">
                    <!-- Sending Currency Section -->
                    <div class="form-group">
                        <label for="sending_amount" class="block text-gray-700 font-semibold mb-1">You Send</label>
                        <div class="flex gap-3">
                            <input type="number" step="any" name="sending_amount" id="sending_amount"
                                class="form-control block w-full border-gray-300 rounded-lg p-2.5 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                placeholder="Enter amount" required>

                            <select name="sending_currency" id="sending_currency"
                                class="form-control block w-full border-gray-300 rounded-lg p-2.5 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                required>
                                <option value="" selected disabled>Select Currency</option>
                                <option value="18">Bitcoin - BTC</option>
                                <option value="16">Bkash - BDT</option>
                                <option value="30">Payoneer - USD</option>
                                <option value="32">Payoneer - EUR</option>
                                <option value="14">Paypal - USD</option>
                                <!-- Add additional options here -->
                            </select>
                        </div>
                    </div>
                    <!-- Exchange Icon -->
                    <div class="text-center my-4 text-gray-500">
                        <i class="fas fa-exchange-alt text-xl"></i>
                    </div>
                    <!-- Receiving Currency Section -->
                    <div class="form-group">
                        <label for="receiving_amount" class="block text-gray-700 font-semibold mb-1">You Get</label>
                        <div class="flex gap-3">
                            <input type="number" step="any" name="receiving_amount" id="receiving_amount"
                                class="form-control block w-full border-gray-300 rounded-lg p-2.5 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                placeholder="Enter amount" required>

                            <select name="receiving_currency" id="receiving_currency"
                                class="form-control block w-full border-gray-300 rounded-lg p-2.5 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                required>
                                <option value="" selected disabled>Select Currency</option>
                                <option value="18">Bitcoin - BTC</option>
                                <option value="16">Bkash - BDT</option>
                                <option value="30">Payoneer - USD</option>
                                <option value="32">Payoneer - EUR</option>
                                <option value="14">Paypal - USD</option>
                                <!-- Add additional options here -->
                            </select>
                        </div>
                    </div>
                    <!-- Exchange Button -->
                    <div class="text-center">
                        <button type="submit"
                            class="w-full bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold shadow-md transition duration-200">Exchange</button>
                    </div>
                </form>
            </div>
            <!-- Tracking Form -->
            <div class="bg-white dark:bg-gray-800/60 p-4 mt-8 rounded-lg shadow-sm max-w-md mx-auto">
                <form id="tracking-form" action="https://script.viserlab.com/changalab/demo/exchange/tracking"
                    method="GET" class="flex flex-col lg:flex-row gap-4">
                    <input type="hidden" name="_token" value="xFmeveLkdHq8smlgD80buIisNGVwOYEV8PVTzl0R"
                        autocomplete="off">
                    <input type="text" name="exchange_id" id="exchange_id"
                        class="form-control w-full p-2 border border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-700 dark:text-white text-white placeholder-white dark:placeholder-white"
                        placeholder="Enter your exchange ID" autocomplete="off">
                    <button type="submit"
                        class="btn-primary w-full lg:w-auto bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-md transition-colors duration-200 dark:bg-blue-700 dark:hover:bg-blue-800">
                        Track
                    </button>
                </form>
            </div>

        </div>
    </section>
    <section class="py-8 md:py-12 bg-gray-100 dark:bg-gray-900">
        <div class="container mx-auto">
            <div class="text-center mb-8 md:mb-12">
                <h2 class="text-3xl md:text-4xl font-semibold text-gray-900 dark:text-gray-100">Our Special Features
                </h2>
                <p class="text-gray-700 dark:text-gray-300 mt-4">
                    We support the most secure services and features. This secured website supports a user-friendly
                    interface
                    and various attractive features that are ready to use.
                </p>
            </div>
            <div class="flex flex-wrap justify-center">
                <!-- Feature Item 1 -->
                <div class="w-full md:w-1/2 xl:w-1/3 px-4 mb-8">
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg text-center">
                        <div class="text-5xl text-blue-500 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-12 h-12 mx-auto">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                    d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                            </svg>
                        </div>
                        <h5 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">24/7 Support</h5>
                        <p class="text-gray-700 dark:text-gray-300">We are here for you. We provide 24/7 customer
                            support through e-mail and support tickets.</p>
                    </div>
                </div>
                <!-- Feature Item 2 -->
                <div class="w-full md:w-1/2 xl:w-1/3 px-4 mb-8">
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg text-center">
                        <div class="text-5xl text-blue-500 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-12 h-12 mx-auto">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </div>
                        <h5 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">Crypto</h5>
                        <p class="text-gray-700 dark:text-gray-300">Our platform supports all types of cryptocurrency
                            with an easy deposit and withdrawal system.</p>
                    </div>
                </div>
                <!-- Feature Item 3 -->
                <div class="w-full md:w-1/2 xl:w-1/3 px-4 mb-8">
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg text-center">
                        <div class="text-5xl text-blue-500 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-12 h-12 mx-auto">

                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                            </svg>



                        </div>
                        <h5 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">Reliable</h5>
                        <p class="text-gray-700 dark:text-gray-300">We are highly reliable and trusted by thousands of
                            people. Your security is our top priority.</p>
                    </div>
                </div>
                <!-- Feature Item 4 -->
                <div class="w-full md:w-1/2 xl:w-1/3 px-4 mb-8">
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg text-center">
                        <div class="text-5xl text-blue-500 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-12 h-12 mx-auto">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2" />
                            </svg>
                        </div>
                        <h5 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">Fast Transaction</h5>
                        <p class="text-gray-700 dark:text-gray-300">We support fast transactions all over the world.
                            With changalab sending money is simple, quick, and hassle-free.</p>
                    </div>
                </div>
                <!-- Feature Item 5 -->
                <div class="w-full md:w-1/2 xl:w-1/3 px-4 mb-8">
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg text-center">
                        <div class="text-5xl text-blue-500 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-12 h-12 mx-auto">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m3.75 9v7.5m2.25-6.466a9.016 9.016 0 0 0-3.461-.203c-.536.072-.974.478-1.021 1.017a4.559 4.559 0 0 0-.018.402c0 .464.336.844.775.994l2.95 1.012c.44.15.775.53.775.994 0 .136-.006.27-.018.402-.047.539-.485.945-1.021 1.017a9.077 9.077 0 0 1-3.461-.203M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                        </div>
                        <h5 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">Low Transparent Fee
                        </h5>
                        <p class="text-gray-700 dark:text-gray-300">We make sure that you are able to send as much
                            money as possible, offering the best exchange rates possible here.</p>
                    </div>
                </div>
                <!-- Feature Item 6 -->
                <div class="w-full md:w-1/2 xl:w-1/3 px-4 mb-8">
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg text-center">
                        <div class="text-5xl text-blue-500 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-12 h-12 mx-auto">
                                {{-- <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" /> --}}

                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                            </svg>
                        </div>
                        <h5 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">Safe and Secure</h5>
                        <p class="text-gray-700 dark:text-gray-300">We value your money and your privacy. We have
                            deployed the best systems to ensure that your money and your account remain safe.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-8 md:py-12 bg-gray-100 dark:bg-gray-900">
        <div class="container mx-auto">
            <div class="flex flex-wrap">
                <div class="hidden lg:block lg:w-1/2 rtl">
                    <img src="https://script.viserlab.com/changalab/demo/assets/images/frontend/faq/63a82d9468bb31671966100.png"
                        alt="faq image" class="rounded-lg shadow-lg">
                </div>
                <div class="w-full lg:w-1/2 px-4">
                    <div class="text-left mb-8">
                        <h2 class="text-3xl md:text-4xl font-semibold text-gray-900 dark:text-gray-100">Frequently
                            Asked Question</h2>
                        <p class="text-gray-700 dark:text-gray-300 mt-4">Some frequently Asked Questions</p>
                    </div>
                    <div class="space-y-6">
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
                            <div class="flex justify-between items-center cursor-pointer">
                                <h6 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Is Two-Factor
                                    Authentication (2FA) mandatory?</h6>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" class="w-6 h-6 text-gray-900 dark:text-gray-100">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 12h14" />
                                </svg>
                            </div>
                            <div class="mt-4 text-gray-700 dark:text-gray-300">All the clients who have signed up to on
                                the site are required to perform additional authorization at the following stages
                                online: - Login - Adding or managing beneficiaries - Instructing a payment or booking a
                                site</div>
                        </div>
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
                            <div class="flex justify-between items-center cursor-pointer">
                                <h6 class="text-xl font-semibold text-gray-900 dark:text-gray-100">How To Create a
                                    Changylab account?</h6>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" class="w-6 h-6 text-gray-900 dark:text-gray-100">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 12h14" />
                                </svg>
                            </div>
                            <div class="mt-4 text-gray-700 dark:text-gray-300">If you want to open an account for
                                personal use you can do it over the phone or online.<div>Opening an account online
                                    should only take a few minutes</div>
                                <div>You need to register to the site and just login to the site using the user ID and
                                    password</div>
                            </div>
                        </div>
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
                            <div class="flex justify-between items-center cursor-pointer">
                                <h6 class="text-xl font-semibold text-gray-900 dark:text-gray-100">In which forms can I
                                    buy foreign exchange?</h6>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" class="w-6 h-6 text-gray-900 dark:text-gray-100">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 12h14" />
                                </svg>
                            </div>
                            <div class="mt-4 text-gray-700 dark:text-gray-300">You can choose to buy foreign exchange
                                in one or more of these modes: cash/currency notes, traveller’s cheques and prepaid
                                multi-currency forex cards. Most people prefer to carry their currency in a combination
                                of cash (generally for smaller expenses) and prepaid multi-currency cards which can be
                                swiped at merchant outlets or used to withdraw cash at an ATM.</div>
                        </div>
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
                            <div class="flex justify-between items-center cursor-pointer">
                                <h6 class="text-xl font-semibold text-gray-900 dark:text-gray-100">How To Exchange
                                    Currency?</h6>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" class="w-6 h-6 text-gray-900 dark:text-gray-100">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 12h14" />
                                </svg>
                            </div>
                            <div class="mt-4 text-gray-700 dark:text-gray-300">Always decline if given the opportunity
                                to charge your purchase in USD. This may bring hidden transaction and conversion fees
                                that will amount to much more than charging your purchase in the local currency. Insist
                                that all purchases are charged in the local currency. There are always financial risks
                                involved with traveling internationally, which is why it is important to take extra
                                precautions when making exchanges, purchases, or withdrawals abroad.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-8 md:py-12 bg-gray-100 dark:bg-gray-900">
        <div class="container mx-auto">
            <div class="flex flex-wrap justify-center">
                <div class="w-full lg:w-7/12 px-4 mb-8">
                    <div class="text-center mb-8 md:mb-12">
                        <h2 class="text-3xl md:text-4xl font-semibold text-gray-900 dark:text-gray-100">Our Latest
                            Exchange</h2>
                        <p class="text-gray-700 dark:text-gray-300 mt-4">Transfer funds around the world from the
                            comfort of your home with our easy-to-use online.</p>
                    </div>
                </div>
                <div class="w-full lg:w-12/12 px-4">
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
                        <div class="overflow-x-auto">
                            <table class="min-w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-200 dark:bg-gray-700">
                                        <th class="py-2 px-4 text-left text-gray-900 dark:text-gray-100">User</th>
                                        <th class="py-2 px-4 text-left text-gray-900 dark:text-gray-100">Sent</th>
                                        <th class="py-2 px-4 text-left text-gray-900 dark:text-gray-100">Received</th>
                                        <th class="py-2 px-4 text-left text-gray-900 dark:text-gray-100">Amount</th>
                                        <th class="py-2 px-4 text-left text-gray-900 dark:text-gray-100">Date</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    <tr>
                                        <td class="py-2 px-4 text-gray-700 dark:text-gray-300" data-label="User">
                                            dssarx pzxoim</td>
                                        <td class="py-2 px-4 text-gray-700 dark:text-gray-300" data-label="Sent">
                                            <span class="inline-block w-6 h-6">
                                                <img src="https://script.viserlab.com/changalab/demo/assets/images/currency/634ce62fefa191665984047.png"
                                                    alt="currency image" class="rounded-full">
                                            </span>
                                            Bkash
                                        </td>
                                        <td class="py-2 px-4 text-gray-700 dark:text-gray-300" data-label="Received">
                                            <span class="inline-block w-6 h-6">
                                                <img src="https://script.viserlab.com/changalab/demo/assets/images/currency/6363475fc84051667450719.jpg"
                                                    alt="currency image" class="rounded-full">
                                            </span>
                                            Payoneer
                                        </td>
                                        <td class="py-2 px-4 text-gray-700 dark:text-gray-300" data-label="Amount">
                                            1,281.18 BDT<i class="la la-arrow-right ml-2"></i>9.96 USD
                                        </td>
                                        <td class="py-2 px-4 text-gray-700 dark:text-gray-300" data-label="Date">
                                            <div>
                                                <span class="block">2024-07-30 06:02 AM</span>
                                                <span>2 months ago</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Repeat for other rows -->
                                    <tr>
                                        <td class="py-2 px-4 text-gray-700 dark:text-gray-300" data-label="User">
                                            dssarx pzxoim</td>
                                        <td class="py-2 px-4 text-gray-700 dark:text-gray-300" data-label="Sent">
                                            <span class="inline-block w-6 h-6">
                                                <img src="https://script.viserlab.com/changalab/demo/assets/images/currency/634ce62fefa191665984047.png"
                                                    alt="currency image" class="rounded-full">
                                            </span>
                                            Bkash
                                        </td>
                                        <td class="py-2 px-4 text-gray-700 dark:text-gray-300" data-label="Received">
                                            <span class="inline-block w-6 h-6">
                                                <img src="https://script.viserlab.com/changalab/demo/assets/images/currency/63d79313684cb1675072275.jpg"
                                                    alt="currency image" class="rounded-full">
                                            </span>
                                            PayTm
                                        </td>
                                        <td class="py-2 px-4 text-gray-700 dark:text-gray-300" data-label="Amount">
                                            10.00 BDT<i class="la la-arrow-right ml-2"></i>5.64 INR
                                        </td>
                                        <td class="py-2 px-4 text-gray-700 dark:text-gray-300" data-label="Date">
                                            <div>
                                                <span class="block">2024-07-29 11:43 AM</span>
                                                <span>2 months ago</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 px-4 text-gray-700 dark:text-gray-300" data-label="User">
                                            dssarx pzxoim</td>
                                        <td class="py-2 px-4 text-gray-700 dark:text-gray-300" data-label="Sent">
                                            <span class="inline-block w-6 h-6">
                                                <img src="https://script.viserlab.com/changalab/demo/assets/images/currency/634ce5b0b4ec41665983920.jpg"
                                                    alt="currency image" class="rounded-full">
                                            </span>
                                            Bitcoin
                                        </td>
                                        <td class="py-2 px-4 text-gray-700 dark:text-gray-300" data-label="Received">
                                            <span class="inline-block w-6 h-6">
                                                <img src="https://script.viserlab.com/changalab/demo/assets/images/currency/634ce62fefa191665984047.png"
                                                    alt="currency image" class="rounded-full">
                                            </span>
                                            Bkash
                                        </td>
                                        <td class="py-2 px-4 text-gray-700 dark:text-gray-300" data-label="Amount">
                                            50.00 BTC<i class="la la-arrow-right ml-2"></i>1,640.00 BDT
                                        </td>
                                        <td class="py-2 px-4 text-gray-700 dark:text-gray-300" data-label="Date">
                                            <div>
                                                <span class="block">2024-07-28 01:47 PM</span>
                                                <span>3 months ago</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 px-4 text-gray-700 dark:text-gray-300" data-label="User">John
                                            Doe</td>
                                        <td class="py-2 px-4 text-gray-700 dark:text-gray-300" data-label="Sent">
                                            <span class="inline-block w-6 h-6">
                                                <img src="https://script.viserlab.com/changalab/demo/assets/images/currency/63d782ac127d51675068076.jpg"
                                                    alt="currency image" class="rounded-full">
                                            </span>
                                            Payoneer
                                        </td>
                                        <td class="py-2 px-4 text-gray-700 dark:text-gray-300" data-label="Received">
                                            <span class="inline-block w-6 h-6">
                                                <img src="https://script.viserlab.com/changalab/demo/assets/images/currency/634ce62fefa191665984047.png"
                                                    alt="currency image" class="rounded-full">
                                            </span>
                                            Bkash
                                        </td>
                                        <td class="py-2 px-4 text-gray-700 dark:text-gray-300" data-label="Amount">
                                            50.00 EUR<i class="la la-arrow-right ml-2"></i>53.33 BDT
                                        </td>
                                        <td class="py-2 px-4 text-gray-700 dark:text-gray-300" data-label="Date">
                                            <div>
                                                <span class="block">2022-12-24 02:59 PM</span>
                                                <span>1 year ago</span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-8 md:py-12 bg-gray-100 dark:bg-gray-900"
        style="background-image: url('https://script.viserlab.com/changalab/demo/assets/images/frontend/subscribe/66a62730b2b5b1722165040.png'); background-size: cover; background-position: center;">
        <div class="container mx-auto">
            <div class="flex flex-wrap justify-center">
                <div class="w-full lg:w-7/12 px-4 mb-8">
                    <div class="text-center mb-8 md:mb-12 text-white">
                        <h2 class="text-3xl md:text-4xl font-semibold">Subscribe Our Newsletter</h2>
                        <p class="mt-4">Subscribe Our Newsletter Now to get all the updates and Discount Offer News
                        </p>
                    </div>
                </div>
                <div class="w-full md:w-7/12 px-4">
                    <form class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg flex items-center" method="POST"
                        id="newsletter-form">
                        <input type="hidden" name="_token" value="xFmeveLkdHq8smlgD80buIisNGVwOYEV8PVTzl0R"
                            autocomplete="off">
                        <input type="email" placeholder="Enter Your Email..." name="email"
                            class="flex-1 p-4 rounded-l-lg bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                            required>
                        <button type="submit" id="subscribe"
                            class="p-4 bg-blue-500 text-white rounded-r-lg hover:bg-blue-600 transition-colors">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M3.478 2.404a.75.75 0 0 0-.926.941l2.432 7.905H13.5a.75.75 0 0 1 0 1.5H4.984l-2.432 7.905a.75.75 0 0 0 .926.94 60.519 60.519 0 0 0 18.445-8.986.75.75 0 0 0 0-1.218A60.517 60.517 0 0 0 3.478 2.404Z" />

                            </svg>



                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="py-8 md:py-12 bg-gray-100 dark:bg-gray-900">
        <div class="container mx-auto">
            <div class="text-center mb-8">
                <h2 class="text-3xl md:text-4xl font-semibold text-gray-900 dark:text-gray-100">Our Latest News</h2>
                <p class="text-gray-700 dark:text-gray-300 mt-4">
                    Lorem ipsum dolor sit amet consectetuer adipiscing elit. Aenean modo lula eget dolor. Aenean massa.
                </p>
            </div>
            <div class="flex flex-wrap justify-center space-y-6 md:space-y-0 md:space-x-6">
                <!-- Blog Post 1 -->
                <div class="w-full md:w-1/2 xl:w-1/3 px-4 mb-8">
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                        <a class="block">
                            <img src="https://script.viserlab.com/changalab/demo/assets/images/frontend/blog/thumb_63d0e81b972c41674635291.jpg"
                                alt="blog image" class="w-full h-48 object-cover">
                        </a>
                        <div class="p-6">
                            <div class="mb-4">
                                <span class="text-gray-600 dark:text-gray-400 text-sm flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 12h14" />
                                    </svg>
                                    Jan 25, 2023
                                </span>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">
                                <a>
                                    Streamline Your Financial Transactions: How to Use Online Currency Exchange
                                    Platforms
                                </a>
                            </h3>
                            <p class="text-gray-700 dark:text-gray-300">
                                Online currency exchange platforms are a convenient and efficient way to manage your
                                international financial transactions...
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Blog Post 2 -->
                <div class="w-full md:w-1/2 xl:w-1/3 px-4 mb-8">
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                        <a class="block">
                            <img src="https://script.viserlab.com/changalab/demo/assets/images/frontend/blog/thumb_63d0e839971a31674635321.jpg"
                                alt="blog image" class="w-full h-48 object-cover">
                        </a>
                        <div class="p-6">
                            <div class="mb-4">
                                <span class="text-gray-600 dark:text-gray-400 text-sm flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 12h14" />
                                    </svg>
                                    Jan 25, 2023
                                </span>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">
                                <a>
                                    Currency Trading 101: Understanding the Risks and Rewards
                                </a>
                            </h3>
                            <p class="text-gray-700 dark:text-gray-300">
                                Currency trading, also known as forex trading or foreign exchange trading, is the
                                process of buying and selling different...
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Blog Post 3 -->
                <div class="w-full md:w-1/2 xl:w-1/3 px-4 mb-8">
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                        <a class="block">
                            <img src="https://script.viserlab.com/changalab/demo/assets/images/frontend/blog/thumb_63d0e8547bb101674635348.png"
                                alt="blog image" class="w-full h-48 object-cover">
                        </a>
                        <div class="p-6">
                            <div class="mb-4">
                                <span class="text-gray-600 dark:text-gray-400 text-sm flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 12h14" />
                                    </svg>
                                    Jan 25, 2023
                                </span>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">
                                <a>
                                    The Future of Currency Exchange: How Technology is Changing the Game
                                </a>
                            </h3>
                            <p class="text-gray-700 dark:text-gray-300">
                                Currency exchange, also known as foreign exchange or forex, has come a long way since
                                the days of physically exchanging...
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="overflow-hidden">
        <div class="py-8 md:py-12 bg-gray-100 dark:bg-gray-900">
            <div class="container mx-auto">
                <div class="flex flex-wrap justify-between">
                    <div class="w-full lg:w-1/4 px-4 mb-8">
                        <div class="footer-widget">
                            <div class="footer-logo mb-4">
                                <a <img src="img/oliva.png" alt="ChangaLab" title="ChangaLab" class="h-12">
                                </a>
                            </div>
                            <p class="text-gray-700 dark:text-gray-300">Changalab - Secure and Suitable Currency
                                Exchange Platform</p>
                        </div>
                    </div>
                    <div class="w-full lg:w-1/4 px-4 mb-8">
                        <div class="footer-widget">
                            <h5 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Support</h5>
                            <ul class="space-y-2">
                                <li><a class="text-gray-700 dark:text-gray-300 hover:text-blue-500">Contact</a></li>
                                <li><a class="text-gray-700 dark:text-gray-300 hover:text-blue-500">Blog</a></li>
                                <li><a class="text-gray-700 dark:text-gray-300 hover:text-blue-500">Login</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="w-full lg:w-1/4 px-4 mb-8">
                        <div class="footer-widget">
                            <h5 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Exchange Gateways
                            </h5>
                            <ul class="space-y-2">
                                <li><a class="text-gray-700 dark:text-gray-300 hover:text-blue-500">Perfect Money</a>
                                </li>
                                <li><a class="text-gray-700 dark:text-gray-300 hover:text-blue-500">Bkash</a></li>
                                <li><a class="text-gray-700 dark:text-gray-300 hover:text-blue-500">PayTm</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="w-full lg:w-1/4 px-4 mb-8">
                        <div class="footer-widget">
                            <h5 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Useful Links</h5>
                            <ul class="space-y-2">
                                <li><a class="text-gray-700 dark:text-gray-300 hover:text-blue-500">Privacy Policy</a>
                                </li>
                                <li><a class="text-gray-700 dark:text-gray-300 hover:text-blue-500">Terms of
                                        Service</a></li>
                                <li><a class="text-gray-700 dark:text-gray-300 hover:text-blue-500">Refund Policy</a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-4 bg-gray-800 dark:bg-gray-700">
            <div class="container mx-auto flex flex-wrap justify-between items-center">
                <p class="text-gray-300">
                    &copy; 2024
                    <a class="text-blue-500" href="https://japanbangladeshit.com/">Japan Bangaldesh IT</a>.
                    All Rights Reserved

                </p>
                <ul class="flex space-x-4">
                    <li><a href="https://www.facebook.com/" target="_blank"
                            class="text-gray-300 hover:text-blue-500">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z"
                                    clip-rule="evenodd" />

                            </svg>


                    <li><a href="https://x.com/" target="_blank" class="text-gray-300 hover:text-blue-500">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M13.795 10.533 20.68 2h-3.073l-5.255 6.517L7.69 2H1l7.806 10.91L1.47 22h3.074l5.705-7.07L15.31 22H22l-8.205-11.467Zm-2.38 2.95L9.97 11.464 4.36 3.627h2.31l4.528 6.317 1.443 2.02 6.018 8.409h-2.31l-4.934-6.89Z" />
                            </svg>
                        </a></li>
                    <li><a href="https://www.instagram.com/" target="_blank"
                            class="text-gray-300 hover:text-blue-500">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z"
                                    clip-rule="evenodd" />
                            </svg>

                        </a></li>
                    <li><a href="https://www.youtube.com/" target="_blank" class="text-gray-300 hover:text-blue-500">
                            <svg class="w-6 h-6 text-gray-100 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M2 10a8 8 0 1 1 16 0 8 8 0 0 1-16 0Zm6.39-2.908a.75.75 0 0 1 .766.027l3.5 2.25a.75.75 0 0 1 0 1.262l-3.5 2.25A.75.75 0 0 1 8 12.25v-4.5a.75.75 0 0 1 .39-.658Z"
                                    clip-rule="evenodd" />

                            </svg>




                        </a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>

</html>
