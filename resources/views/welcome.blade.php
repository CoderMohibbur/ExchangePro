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


    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400&display=swap" rel="stylesheet">


</head>

<body>


    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl mx-auto p-4">
            <a href="https://flowbite.com" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">ExchangePro</span>
            </a>
            <div class="flex items-center md:order-2 space-x-1 md:space-x-2 rtl:space-x-reverse">
                <a href="http://127.0.0.1:8000/login"
                    class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Login</a>
                <a href="http://127.0.0.1:8000/register"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Sign
                    up</a>
                <button data-collapse-toggle="mega-menu" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="mega-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div id="mega-menu" class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">
                <ul class="flex flex-col mt-4 font-medium md:flex-row md:mt-0 md:space-x-8 rtl:space-x-reverse">
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-blue-600 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-blue-500 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <button id="mega-menu-dropdown-button" data-dropdown-toggle="mega-menu-dropdown"
                            class="flex items-center justify-between w-full py-2 px-3 font-medium text-gray-900 border-b border-gray-100 md:w-auto hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">
                            Company <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <div id="mega-menu-dropdown"
                            class="absolute z-10 grid hidden w-auto grid-cols-2 text-sm bg-white border border-gray-100 rounded-lg shadow-md dark:border-gray-700 md:grid-cols-3 dark:bg-gray-700">
                            <div class="p-4 pb-0 text-gray-900 md:pb-4 dark:text-white">
                                <ul class="space-y-4" aria-labelledby="mega-menu-dropdown-button">
                                    <li>
                                        <a href="#"
                                            class="text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500">
                                            About Us
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500">
                                            Library
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500">
                                            Resources
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500">
                                            Pro Version
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="p-4 pb-0 text-gray-900 md:pb-4 dark:text-white">
                                <ul class="space-y-4">
                                    <li>
                                        <a href="#"
                                            class="text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500">
                                            Blog
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500">
                                            Newsletter
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500">
                                            Playground
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500">
                                            License
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="p-4">
                                <ul class="space-y-4">
                                    <li>
                                        <a href="#"
                                            class="text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500">
                                            Contact Us
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500">
                                            Support Center
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500">
                                            Terms
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">Team</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <section class="banner-section bg-fixed bg-img banner-overlay dark:bg-gray-900"
        data-background="/img/background image.png"
        style="background-image:url('/img/background image.png');">
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
                <h2
                    class="text-3xl md:text-4xl font-great-vibes text-gray-900 dark:text-gray-100 mb-4 border-b-2 border-gray-300 dark:border-gray-600 pb-2">
                    Our Special Features
                </h2>

                <p class="text-gray-700 dark:text-gray-300 mt-4 font-lora">
                    We support the most secure services and features. This secured website supports a user-friendly
                    interface and various attractive features that are ready to use.
                </p>
            </div>


            <div class="flex flex-wrap justify-center">
                <!-- Feature Item 1 -->
                <div class="w-full md:w-1/2 xl:w-1/3 px-4 mb-8">
                    <div
                        class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg text-center transition-transform transform hover:scale-105">
                        <div class="text-5xl text-blue-500 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-12 h-12 mx-auto">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                            </svg>
                        </div>
                        <h5
                            class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-3 tracking-wide uppercase">
                            24/7 Support
                        </h5>
                        <p class="text-gray-700 dark:text-gray-300">
                            We’re here for you, anytime, day or night. Our dedicated support team is committed to
                            providing round-the-clock assistance through email and support tickets.you have a
                            question,we ensure you receive prompt and reliable support.friendly deposit and withdrawal
                            system Your satisfaction is our priority.

                        </p>
                    </div>
                </div>




                <!-- Feature Item 2 -->
                <div class="w-full md:w-1/2 xl:w-1/3 px-4 mb-8">
                    <div
                        class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg text-center transition-transform transform hover:scale-105 hover:shadow-xl">
                        <div class="text-6xl text-blue-500 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-16 h-16 mx-auto">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </div>
                        <h5
                            class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-3 tracking-wide uppercase">
                            Crypto
                        </h5>
                        <p class="text-gray-700 dark:text-gray-300">
                            Our platform embraces the future of finance by supporting all types of cryptocurrency.With a
                            user-friendly deposit and withdrawal system,friendly deposit and withdrawal system,we make
                            it easy for you to manage your digital assets,easy for you to manage your assets seamlessly.
                        </p>
                    </div>
                </div>


                <!-- Feature Item 3 -->
                <div class="w-full md:w-1/2 xl:w-1/3 px-4 mb-8">
                    <div
                        class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg text-center transition-transform transform hover:scale-105">
                        <div class="text-5xl text-blue-500 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-12 h-12 mx-auto">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                            </svg>
                        </div>
                        <h5 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">Reliable</h5>
                        <p class="text-gray-700 dark:text-gray-300">


                            We pride ourselves on being a highly reliable platform, trusted by thousands of users
                            worldwide. and we implement robust measures to protect your personal and financial
                            information. With our commitment to transparency and integrity, you can have peace of mind
                            knowing that your assets are in safe hands. Count on us for a dependable service that you
                            can trust every step of the way.
                        </p>

                    </div>
                </div>

                <!-- Feature Item 4 -->
                <div class="w-full md:w-1/2 xl:w-1/3 px-4 mb-8">
                    <div
                        class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg text-center transition-transform transform hover:scale-105">
                        <div class="text-5xl text-blue-500 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-12 h-12 mx-auto">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2" />
                            </svg>
                        </div>
                        <h5 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">Fast Transactions</h5>
                        <p class="text-gray-700 dark:text-gray-300">
                            sending money is simple, quick, and hassle-free.technology and a user-friendly interface,
                            you can send money securely and instantly, allowing you to focus on what truly matters.
                            Experience the convenience of fast transactions today!


                        </p>

                    </div>
                </div>

                <!-- Feature Item 5 -->
                <div class="w-full md:w-1/2 xl:w-1/3 px-4 mb-8">
                    <div
                        class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg text-center transition-transform transform hover:scale-105">
                        <div class="text-5xl text-blue-500 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-12 h-12 mx-auto">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m3.75 9v7.5m2.25-6.466a9.016 9.016 0 0 0-3.461-.203c-.536.072-.974.478-1.021 1.017a4.559 4.559 0 0 0-.018.402c0 .464.336.844.775.994l2.95 1.012c.44.15.775.53.775.994 0 .136-.006.27-.018.402-.047.539-.485.945-1.021 1.017a9.077 9.077 0 0 1-3.461-.203M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                        </div>
                        <h5 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">Low Transparent Fee
                        </h5>
                        <p class="text-gray-700 dark:text-gray-300">
                            Enjoy our highly competitive exchange rates designed to maximize your transactions.Whether
                            you're sending funds locally or internationally, we provide an efficient and cost-effective
                            way to transfer your hard-earned cash.
                        </p>

                    </div>
                </div>


                <!-- Feature Item 6 -->
                <div class="w-full md:w-1/2 xl:w-1/3 px-4 mb-8">
                    <div
                        class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg text-center transition-transform transform hover:scale-105">
                        <div class="text-5xl text-blue-500 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-12 h-12 mx-auto">
                                {{--
                                    This icon represents a positive action or success.
                                    The first path (commented out) can be used for a different visual cue.
                                --}}
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                            </svg>
                        </div>

                        <h5 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">
                            Safe and Secure
                        </h5>
                        <p class="text-gray-700 dark:text-gray-300">
                            We value your money and your privacy.
                            Our dedicated team has deployed the best systems to ensure that your money and your account
                            remain safe. allowing you to focus on what truly matters—your financial goals.
                        </p>
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
                    <div class="text-left mb-12 p-8 bg-gradient-to-r from-blue-500 to-blue-400 rounded-lg shadow-xl">
                        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                            Frequently Asked Questions
                        </h2>
                        <p class="text-lg text-black opacity-90 mb-4">
                            Some frequently asked questions
                        </p>

                    </div>





                    <div class="space-y-6">
                        <div x-data="{ open: false }" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg mb-4">
                            <div @click="open = !open" class="flex justify-between items-center cursor-pointer">
                                <h6 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Is Two-Factor
                                    Authentication (2FA) mandatory?</h6>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    class="w-6 h-6 text-gray-900 dark:text-gray-100 transition-transform duration-200 ease-in-out"
                                    :class="{ 'rotate-180': open }">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 9-7 7-7-7" />
                                </svg>



                            </div>
                            <div x-show="open"
                                class="mt-4 text-gray-700 dark:text-gray-300 transition-all duration-200 ease-in-out"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 transform -translate-y-2"
                                x-transition:enter-end="opacity-100 transform translate-y-0"
                                x-transition:leave="transition ease-in duration-200"
                                x-transition:leave-start="opacity-100 transform translate-y-0"
                                x-transition:leave-end="opacity-0 transform -translate-y-2">
                                Yes, Two-Factor Authentication (2FA) is mandatory for all clients who have signed up on
                                our site. It adds an extra layer of security by requiring additional authorization at
                                key stages, including: <ul class="list-disc list-inside">
                                    <li>Login: To access your account securely.</li>
                                    <li>Adding or Managing Beneficiaries: To ensure that only authorized users can make
                                        changes.
                                    </li>
                                    <li>Instructing a Payment or Booking: To protect your financial transactions.
                                    </li>
                                    Implementing 2FA helps safeguard your account against unauthorized access and
                                    ensures a more secure experience.







                                </ul>
                            </div>
                        </div>

                        <!-- Include Alpine.js for dropdown functionality -->
                        <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>

                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg mb-4">
                            <div class="flex justify-between items-center cursor-pointer"
                                onclick="toggleDropdown(this)">
                                <h6 class="text-xl font-semibold text-gray-900 dark:text-gray-100">How To Create a
                                    Changylab Account?</h6>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    class="w-6 h-6 text-gray-900 dark:text-gray-100 transition-transform duration-200 ease-in-out transform rotate-0 dropdown-icon">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 9-7 7-7-7" />
                                </svg>
                            </div>
                            <div class="mt-4 text-gray-700 dark:text-gray-300 hidden dropdown-content">
                                If you want to open an account for personal use, you can do it over the phone or online.
                                <div class="mt-2">Opening an account online should only take a few minutes.</div>
                                <div class="mt-2">You need to register on the site and just log in using your user ID
                                    and password.</div>
                            </div>
                        </div>

                        <script>
                            function toggleDropdown(element) {
                                const content = element.nextElementSibling;
                                const icon = element.querySelector('.dropdown-icon');

                                if (content.classList.contains('hidden')) {
                                    content.classList.remove('hidden');
                                    icon.classList.add('rotate-180');
                                } else {
                                    content.classList.add('hidden');
                                    icon.classList.remove('rotate-180');
                                }
                            }
                        </script>




                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg mb-4">
                            <div class="flex justify-between items-center cursor-pointer"
                                onclick="toggleDropdown(this)">
                                <h6 class="text-xl font-semibold text-gray-900 dark:text-gray-100">In which forms can I
                                    buy foreign exchange?</h6>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    class="w-6 h-6 text-gray-900 dark:text-gray-100 transition-transform duration-200 ease-in-out transform rotate-0 dropdown-icon">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 9-7 7-7-7" />
                                </svg>
                            </div>
                            <div class="mt-4 text-gray-700 dark:text-gray-300 hidden dropdown-content">
                                You can choose to buy foreign exchange in one or more of these modes: cash/currency
                                notes, traveller’s cheques, and prepaid multi-currency forex cards. Most people prefer
                                to carry their currency in a combination of cash (generally for smaller expenses) and
                                prepaid multi-currency cards, which can be swiped at merchant outlets or used to
                                withdraw cash at an ATM.
                            </div>
                        </div>

                        <script>
                            function toggleDropdown(element) {
                                const content = element.nextElementSibling;
                                const icon = element.querySelector('.dropdown-icon');

                                if (content.classList.contains('hidden')) {
                                    content.classList.remove('hidden');
                                    icon.classList.add('rotate-180');
                                } else {
                                    content.classList.add('hidden');
                                    icon.classList.remove('rotate-180');
                                }
                            }
                        </script>

                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg mb-4">
                            <div class="flex justify-between items-center cursor-pointer"
                                onclick="toggleDropdown(this)">
                                <h6 class="text-xl font-semibold text-gray-900 dark:text-gray-100">How To Exchange
                                    Currency?</h6>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    class="w-6 h-6 text-gray-900 dark:text-gray-100 transition-transform duration-200 ease-in-out transform rotate-0 dropdown-icon">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 9-7 7-7-7" />
                                </svg>
                            </div>
                            <div class="mt-4 text-gray-700 dark:text-gray-300 hidden dropdown-content">
                                Always decline if given the opportunity to charge your purchase in USD. This may bring
                                hidden transaction and conversion fees that will amount to much more than charging your
                                purchase in the local currency. Insist that all purchases are charged in the local
                                currency. There are always financial risks involved with traveling internationally,
                                which is why it is important to take extra precautions when making exchanges, purchases,
                                or withdrawals abroad.
                            </div>
                        </div>

                        <script>
                            function toggleDropdown(element) {
                                const content = element.nextElementSibling;
                                const icon = element.querySelector('.dropdown-icon');

                                if (content.classList.contains('hidden')) {
                                    content.classList.remove('hidden');
                                    icon.classList.add('rotate-180');
                                } else {
                                    content.classList.add('hidden');
                                    icon.classList.remove('rotate-180');
                                }
                            }
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-8 md:py-12 bg-gray-100 dark:bg-gray-900">
        <div class="container mx-auto">
            <div class="flex flex-wrap justify-center">
                <div class="w-full lg:w-7/12 px-4 mb-8">
                    <div class="bg-white shadow-lg rounded-lg p-6 md:p-8 relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-blue-400 opacity-30 rounded-lg"></div>
                        <div class="relative z-10 text-center mb-6">
                            <h2 class="text-4xl font-bold text-gray-900 dark:text-gray-100 md:text-5xl">Our Latest Exchange</h2>
                            <p class="text-lg text-gray-800 dark:text-gray-300 mt-4">Transfer funds around the world from the comfort of your home with our easy-to-use online platform.</p>
                        </div>
                        <div class="relative z-10">
                            <button class="mt-4 bg-blue-500 text-white font-semibold py-3 px-6 rounded-lg shadow hover:bg-blue-600 transition duration-200">
                                Get Started
                            </button>
                        </div>
                    </div>
                </div>


                <div class="w-full lg:w-12/12 px-4">
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg transition-shadow duration-300 hover:shadow-2xl">
                        <div class="overflow-x-auto">
                            <table class="min-w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-300 dark:bg-gray-700">
                                        <th class="py-3 px-4 text-left text-gray-900 dark:text-gray-100 font-semibold">User</th>
                                        <th class="py-3 px-4 text-left text-gray-900 dark:text-gray-100 font-semibold">Sent</th>
                                        <th class="py-3 px-4 text-left text-gray-900 dark:text-gray-100 font-semibold">Received</th>
                                        <th class="py-3 px-4 text-left text-gray-900 dark:text-gray-100 font-semibold">Amount</th>
                                        <th class="py-3 px-4 text-left text-gray-900 dark:text-gray-100 font-semibold">Date</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300" data-label="User">dssarx pzxoim</td>
                                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300" data-label="Sent">
                                            <span class="inline-block w-6 h-6">
                                                <img src="https://script.viserlab.com/changalab/demo/assets/images/currency/634ce62fefa191665984047.png" alt="currency image" class="rounded-full">
                                            </span>
                                            Bkash
                                        </td>
                                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300" data-label="Received">
                                            <span class="inline-block w-6 h-6">
                                                <img src="https://script.viserlab.com/changalab/demo/assets/images/currency/6363475fc84051667450719.jpg" alt="currency image" class="rounded-full">
                                            </span>
                                            Payoneer
                                        </td>
                                        <td class="py-3 px-4 text-green-600 font-bold" data-label="Amount">1,281.18 BDT<i class="la la-arrow-right ml-2"></i>9.96 USD</td>
                                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300" data-label="Date">
                                            <div>
                                                <span class="block">2024-07-30 06:02 AM</span>
                                                <span class="text-gray-500">2 months ago</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300" data-label="User">dssarx pzxoim</td>
                                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300" data-label="Sent">
                                            <span class="inline-block w-6 h-6">
                                                <img src="https://script.viserlab.com/changalab/demo/assets/images/currency/634ce62fefa191665984047.png" alt="currency image" class="rounded-full">
                                            </span>
                                            Bkash
                                        </td>
                                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300" data-label="Received">
                                            <span class="inline-block w-6 h-6">
                                                <img src="https://script.viserlab.com/changalab/demo/assets/images/currency/63d79313684cb1675072275.jpg" alt="currency image" class="rounded-full">
                                            </span>
                                            PayTm
                                        </td>
                                        <td class="py-3 px-4 text-green-600 font-bold" data-label="Amount">10.00 BDT<i class="la la-arrow-right ml-2"></i>5.64 INR</td>
                                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300" data-label="Date">
                                            <div>
                                                <span class="block">2024-07-29 11:43 AM</span>
                                                <span class="text-gray-500">2 months ago</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300" data-label="User">dssarx pzxoim</td>
                                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300" data-label="Sent">
                                            <span class="inline-block w-6 h-6">
                                                <img src="https://script.viserlab.com/changalab/demo/assets/images/currency/634ce5b0b4ec41665983920.jpg" alt="currency image" class="rounded-full">
                                            </span>
                                            Bitcoin
                                        </td>
                                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300" data-label="Received">
                                            <span class="inline-block w-6 h-6">
                                                <img src="https://script.viserlab.com/changalab/demo/assets/images/currency/634ce62fefa191665984047.png" alt="currency image" class="rounded-full">
                                            </span>
                                            Bkash
                                        </td>
                                        <td class="py-3 px-4 text-green-600 font-bold" data-label="Amount">50.00 BTC<i class="la la-arrow-right ml-2"></i>1,640.00 BDT</td>
                                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300" data-label="Date">
                                            <div>
                                                <span class="block">2024-07-28 01:47 PM</span>
                                                <span class="text-gray-500">3 months ago</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300" data-label="User">John Doe</td>
                                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300" data-label="Sent">
                                            <span class="inline-block w-6 h-6">
                                                <img src="https://script.viserlab.com/changalab/demo/assets/images/currency/63d782ac127d51675068076.jpg" alt="currency image" class="rounded-full">
                                            </span>
                                            Payoneer
                                        </td>
                                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300" data-label="Received">
                                            <span class="inline-block w-6 h-6">
                                                <img src="https://script.viserlab.com/changalab/demo/assets/images/currency/634ce62fefa191665984047.png" alt="currency image" class="rounded-full">
                                            </span>
                                            Bkash
                                        </td>
                                        <td class="py-3 px-4 text-green-600 font-bold" data-label="Amount">50.00 EUR<i class="la la-arrow-right ml-2"></i>53.33 BDT</td>
                                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300" data-label="Date">
                                            <div>
                                                <span class="block">2022-12-24 02:59 PM</span>
                                                <span class="text-gray-500">1 year ago</span>
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
                    <div class="bg-blue-600 rounded-lg p-8 shadow-lg text-center mb-8 md:mb-12">
                        <h2 class="text-3xl md:text-4xl font-semibold text-white">Subscribe to Our Newsletter</h2>
                        <p class="mt-4 text-gray-200">Stay updated with the latest news and exclusive discounts by subscribing to our newsletter!</p>
                        <form class="mt-6">
                            <input type="email" placeholder="Enter your email address" class="border border-gray-300 rounded-lg p-3 w-full md:w-2/3 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                            <button type="submit" class="mt-4 bg-white text-blue-600 font-semibold py-2 px-4 rounded-lg shadow hover:bg-gray-200 transition duration-200">Subscribe</button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <section class="py-8 md:py-12 bg-gray-100 dark:bg-gray-900">
        <div class="container mx-auto">
            <div class="text-center mb-8 p-6 bg-gray-100 dark:bg-gray-800 rounded-lg shadow-md">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-3">Our Latest News</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-4">
                    Discover the latest updates and insights from our team. Stay informed with our news.
                </p>
                <button class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Learn More
                </button>
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
    <footer class="overflow-hidden bg-gray-100 dark:bg-gray-900">
        <div class="py-8 md:py-12">
            <div class="container mx-auto">
                <div class="flex flex-wrap justify-between">
                    <!-- Logo Section -->
                    <div class="w-full lg:w-1/4 px-4 mb-8">
                        <div class="footer-widget">
                            <div class="footer-logo mb-4">
                                <a href="#">
                                    {{-- <img src="img/oliva.png" alt="ChangaLab" title="ChangaLab" class="h-12"> --}}
                                </a>
                            </div>
                            <p class="text-gray-700 dark:text-gray-300">
                                Changalab - Secure and Suitable Currency Exchange Platform
                            </p>
                        </div>
                    </div>

                    <!-- Support Links -->
                    <div class="w-full lg:w-1/4 px-4 mb-8">
                        <div class="footer-widget">
                            <h5 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Support</h5>
                            <ul class="space-y-2">
                                <li><a class="text-gray-700 dark:text-gray-300 hover:text-blue-500 transition">Contact</a></li>
                                <li><a class="text-gray-700 dark:text-gray-300 hover:text-blue-500 transition">Blog</a></li>
                                <li><a class="text-gray-700 dark:text-gray-300 hover:text-blue-500 transition">Login</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Exchange Gateways -->
                    <div class="w-full lg:w-1/4 px-4 mb-8">
                        <div class="footer-widget">
                            <h5 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Exchange Gateways</h5>
                            <ul class="space-y-2">
                                <li><a class="text-gray-700 dark:text-gray-300 hover:text-blue-500 transition">Perfect Money</a></li>
                                <li><a class="text-gray-700 dark:text-gray-300 hover:text-blue-500 transition">Bkash</a></li>
                                <li><a class="text-gray-700 dark:text-gray-300 hover:text-blue-500 transition">PayTm</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Useful Links -->
                    <div class="w-full lg:w-1/4 px-4 mb-8">
                        <div class="footer-widget">
                            <h5 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Useful Links</h5>
                            <ul class="space-y-2">
                                <li><a class="text-gray-700 dark:text-gray-300 hover:text-blue-500 transition">Privacy Policy</a></li>
                                <li><a class="text-gray-700 dark:text-gray-300 hover:text-blue-500 transition">Terms of Service</a></li>
                                <li><a class="text-gray-700 dark:text-gray-300 hover:text-blue-500 transition">Refund Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Section -->
        <div class="py-4 bg-gray-800 dark:bg-gray-700">
            <div class="container mx-auto flex flex-wrap justify-between items-center">
                <p class="text-gray-300">
                    &copy; 2024 <a class="text-blue-500 hover:text-blue-400 transition" href="https://japanbangladeshit.com/">Japan Bangladesh IT</a>. All Rights Reserved
                </p>
                <ul class="flex space-x-4">
                    <li>
                        <a href="https://www.facebook.com/" target="_blank" class="text-gray-300 hover:text-blue-500 transition">
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://x.com/" target="_blank" class="text-gray-300 hover:text-blue-500 transition">
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M13.795 10.533 20.68 2h-3.073l-5.255 6.517L7.69 2H1l7.806 10.91L1.47 22h3.074l5.705-7.07L15.31 22H22l-8.205-11.467Zm-2.38 2.95L9.97 11.464 4.36 3.627h2.31l4.528 6.317 1.443 2.02 6.018 8.409h-2.31l-4.934-6.89Z" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/" target="_blank" class="text-gray-300 hover:text-blue-500 transition">
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path fill="currentColor" fill-rule="evenodd" d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/" target="_blank" class="text-gray-300 hover:text-blue-500 transition">
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdowns = document.querySelectorAll('[data-collapse-toggle]');

            dropdowns.forEach((dropdown) => {
                const dropdownId = dropdown.getAttribute('data-collapse-toggle');
                const submenu = document.getElementById(dropdownId);
                const activeSubmenuItem = submenu?.querySelector('.active');

                if (activeSubmenuItem) {
                    dropdown.setAttribute('aria-expanded', 'true');
                    submenu.classList.remove('hidden');
                }
            });
        });
    </script>
    <script>
        window.onload = function() {
            const anchorTags = document.querySelectorAll('a');
            anchorTags.forEach(function(a) {
                a.addEventListener('click', function(ev) {
                    ev.preventDefault();
                })
            });
            const dropdownEl = document.querySelector('[data-dropdown-toggle]');
            if (dropdownEl) {
                dropdownEl.click();
            }
            const modalEl = document.querySelector('[data-modal-toggle]');
            if (modalEl) {
                modalEl.click();
            }
            const dateRangePickerEl = document.querySelector('[data-rangepicker] input');
            if (dateRangePickerEl) {
                dateRangePickerEl.focus();
            }
            const drawerEl = document.querySelector('[data-drawer-show]');
            if (drawerEl) {
                drawerEl.click();
            }
        }
    </script>

    <script>
        document.getElementById('mega-menu-dropdown-button').addEventListener('click', function() {
            var dropdown = document.getElementById('mega-menu-dropdown');
            dropdown.classList.toggle('hidden');
        });
    </script>

</body>

</html>
