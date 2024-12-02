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
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">ExchangePro</span>
            </a>
            <div class="flex items-center md:order-2 space-x-1 md:space-x-2 rtl:space-x-reverse">
                <a href="login"
                    class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Login</a>
                <a href="register"
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
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">Company</a>
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
        data-background="/img/background image.png" style="background-image:url('/img/background image.png');">
        <div class="container mx-auto py-12 px-4 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="text-3xl lg:text-4xl font-bold text-white bg-blue-600 max-w-fit m-auto p-3">
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
                                <option value="16">Bkash -

                                </option>
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
    <div class="flex flex-col items-center gap-8 p-8 bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-300">
        <div class="text-center">
            <h2 class="text-4xl font-bold text-gray-900 dark:text-gray-100 mb-4">Our Special Features</h2>
            <p class="text-lg text-gray-600 dark:text-gray-400">
                We support the most secure services and features. This secured website supports a user-friendly
                interface and various attractive features that are ready to use.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- Platform Card -->
            <div
                class="flex flex-col items-start p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg transition-transform transform hover:scale-105">
                <div class="mb-4 text-blue-600 dark:text-blue-500">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M6.672 1.911a1 1 0 10-1.932.518l.259.966a1 1 0 001.932-.518l-.26-.966zM2.429 4.74a1 1 0 10-.517 1.932l.966.259a1 1 0 00.517-1.932l-.966-.26zm8.814-.569a1 1 0 00-1.415-1.414l-.707.707a1 1 0 101.415 1.415l.707-.708zm-7.071 7.072l.707-.707A1 1 0 003.465 9.12l-.708.707a1 1 0 001.415 1.415zm3.2-5.171a1 1 0 00-1.3 1.3l4 10a1 1 0 001.823.075l1.38-2.759 3.018 3.02a1 1 0 001.414-1.415l-3.019-3.02 2.76-1.379a1 1 0 00-.076-1.822l-10-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">Platform</h3>
                <p class="text-gray-600 dark:text-gray-400">
                    We keep Flowbite secure and free of spam and abuse so that it can be the platform where developers
                    come together to create.
                </p>
            </div>

            <!-- Open Source Card -->
            <div
                class="flex flex-col items-start p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg transition-transform transform hover:scale-105">
                <div class="mb-4 text-blue-600 dark:text-blue-500">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">Open source</h3>
                <p class="text-gray-600 dark:text-gray-400">
                    Our Flowbite Security Lab is a world-class R&D team inspiring and enabling the community to secure
                    open source projects.
                </p>
            </div>

            <!-- Premium Products Card -->
            <div
                class="flex flex-col items-start p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg transition-transform transform hover:scale-105">
                <div class="mb-4 text-blue-600 dark:text-blue-500">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M11 3a1 1 0 10-2 0v1a1 1 0 102 0V3zM15.657 5.757a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM5.05 6.464A1 1 0 106.464 5.05l-.707-.707a1 1 0 00-1.414 1.414l.707.707zM5 10a1 1 0 01-1 1H3a1 1 0 110-2h1a1 1 0 011 1zM8 16v-1h4v1a2 2 0 11-4 0zM12 14c.015-.34.208-.646.477-.859a4 4 0 10-4.954 0c.27.213.462.519.476.859h4.002z">
                        </path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">Premium products</h3>
                <p class="text-gray-600 dark:text-gray-400">
                    We embody the shift toward investments in safe and secure software design practices with our
                    world-class front-end products.
                </p>
            </div>

            <!-- Customization Card -->
            <div
                class="flex flex-col items-start p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg transition-transform transform hover:scale-105">
                <div class="mb-4 text-blue-600 dark:text-blue-500">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4 2a2 2 0 00-2 2v11a3 3 0 106 0V4a2 2 0 00-2-2H4zm1 14a1 1 0 100-2 1 1 0 000 2zm5-1.757l4.9-4.9a2 2 0 000-2.828L13.485 5.1a2 2 0 00-2.828 0L10 5.757v8.486zM16 18H9.071l6-6H16a2 2 0 012 2v2a2 2 0 01-2 2z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">Customization</h3>
                <p class="text-gray-600 dark:text-gray-400">
                    It's easy to customize and style Flowbite. Tweak the look and feel of your UI with CSS and add
                    features with HTML.
                </p>
            </div>

            <!-- Features Card -->
            <div
                class="flex flex-col items-start p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg transition-transform transform hover:scale-105">
                <div class="mb-4 text-blue-600 dark:text-blue-500">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">Features</h3>
                <p class="text-gray-600 dark:text-gray-400">
                    Start with thousands of actions and applications from our community to accelerate your automated
                    workflows.
                </p>
            </div>

            <!-- Data Privacy Card -->
            <div
                class="flex flex-col items-start p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg transition-transform transform hover:scale-105">
                <div class="mb-4 text-blue-600 dark:text-blue-500">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M6.625 2.655A9 9 0 0119 11a1 1 0 11-2 0 7 7 0 00-9.625-6.492 1 1 0 11-.75-1.853zM4.662 4.959A1 1 0 014.75 6.37 6.97 6.97 0 003 11a1 1 0 11-2 0 8.97 8.97 0 012.25-5.953 1 1 0 011.412-.088z"
                            clip-rule="evenodd"></path>
                        <path fill-rule="evenodd"
                            d="M5 11a5 5 0 1110 0 1 1 0 11-2 0 3 3 0 10-6 0c0 1.677-.345 3.276-.968 4.729a1 1 0 11-1.838-.789A9.964 9.964 0 005 11zm8.921 2.012a1 1 0 01.831 1.145 19.86 19.86 0 01-.545 2.436 1 1 0 11-1.92-.558c.207-.713.371-1.445.49-2.192a1 1 0 011.144-.83z"
                            clip-rule="evenodd"></path>
                        <path fill-rule="evenodd"
                            d="M10 10a1 1 0 011 1c0 2.236-.46 4.368-1.29 6.304a1 1 0 01-1.838-.789A13.952 13.952 0 009 11a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">Data privacy</h3>
                <p class="text-gray-600 dark:text-gray-400">
                    Flowbite is committed to developer privacy, ensuring a high standard of protection for all
                    customers.
                </p>
            </div>

            <!-- Support 24/7 Card -->
            <div
                class="flex flex-col items-start p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg transition-transform transform hover:scale-105">
                <div class="mb-4 text-blue-600 dark:text-blue-500">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">Support 24/7</h3>
                <p class="text-gray-600 dark:text-gray-400">
                    We provide high-quality services worldwide with personal assistance through our 24/7 premium
                    service.
                </p>
            </div>

            <!-- GDPR Card -->
            <div
                class="flex flex-col items-start p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg transition-transform transform hover:scale-105">
                <div class="mb-4 text-blue-600 dark:text-blue-500">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">GDPR</h3>
                <p class="text-gray-600 dark:text-gray-400">
                    Our project is fully GDPR compliant, demonstrating strong certification actions.
                </p>
            </div>

        </div>
    </div>
    <div class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 p-6">
        <div class="text-center">
            <h2 class="text-4xl font-bold text-gray-900 dark:text-gray-100 mb-4">Frequently Asked Questions</h2>
            <p class="text-lg text-gray-600 dark:text-gray-400">
                Some frequently asked questions.
            </p>
        </div>
        <div class="flex items-center">
            <!-- Left Section with Image -->
            <div class="md:w-1/2 mb-6 md:mb-0">
                <img src="https://script.viserlab.com/changalab/demo/assets/images/frontend/faq/63a82d9468bb31671966100.png"
                    alt="FAQ Image"w-10 class=" h-auto rounded-lg">
            </div>
            <!-- Right Section with FAQs -->
            <div class="md:w-1/2 md:pl-6">
                <div class="space-y-4">
                    <!-- FAQ Item 1 -->
                    <details class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg">
                        <summary class="font-semibold cursor-pointer">
                            Can I use Flowbite in open-source projects?
                        </summary>
                        <p class="mt-2 text-gray-700 dark:text-gray-300">
                            Flowbite is an open-source library of interactive components built on top of Tailwind CSS,
                            including buttons, dropdowns, modals, navbars, and more.
                            Check out this guide to learn how to <a href="#"
                                class="text-blue-600 dark:text-blue-400">get started</a> and start developing websites
                            even faster with components on top of Tailwind CSS.
                        </p>
                    </details>

                    <!-- FAQ Item 2 -->
                    <details class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg">
                        <summary class="font-semibold cursor-pointer">
                            Is Two-Factor Authentication (2FA) mandatory?
                        </summary>
                        <p class="mt-2 text-gray-700 dark:text-gray-300">
                            Yes, Two-Factor Authentication (2FA) is mandatory for all clients who have signed up on our
                            site. It adds an extra layer of security by requiring additional authorization at key
                            stages.
                        </p>
                    </details>

                    <!-- FAQ Item 3 -->
                    <details class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg">
                        <summary class="font-semibold cursor-pointer">
                            How To Exchange Currency?
                        </summary>
                        <p class="mt-2 text-gray-700 dark:text-gray-300">
                            Always decline if given the opportunity to charge your purchase in USD. Insist that all
                            purchases are charged in the local currency.
                        </p>
                    </details>

                    <!-- FAQ Item 4 -->
                    <details class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg">
                        <summary class="font-semibold cursor-pointer">
                            How To Create a Changylab Account?
                        </summary>
                        <p class="mt-2 text-gray-700 dark:text-gray-300">
                            If you want to open an account for personal use, you can do it over the phone or online.
                            Opening an account online should only take a few minutes.
                        </p>
                    </details>

                    <!-- FAQ Item 5 -->
                    <details class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg">
                        <summary class="font-semibold cursor-pointer">
                            In which forms can I buy foreign exchange?
                        </summary>
                        <p class="mt-2 text-gray-700 dark:text-gray-300">
                            You can choose to buy foreign exchange in cash, traveller’s cheques, or prepaid
                            multi-currency forex cards.
                        </p>
                    </details>
                </div>
            </div>
        </div>
    </div>

    <section class="py-8 md:py-12 bg-gray-100 dark:bg-gray-900">
        <div class="container mx-auto">
            <div class="flex flex-wrap justify-center">
                <div class="w-full lg:w-7/12 px-4 mb-8">
                    <div class="bg-white shadow-lg rounded-lg p-6 md:p-8 relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-blue-400 opacity-30 rounded-lg">
                        </div>
                        <div class="relative z-10 text-center mb-6">
                            <h2 class="text-4xl font-bold text-gray-900 dark:text-gray-100 md:text-5xl">Our Latest
                                Exchange</h2>
                            <p class="text-lg text-gray-800 dark:text-gray-300 mt-4">Transfer funds around the world
                                from the comfort of your home with our easy-to-use online platform.</p>
                        </div>

                    </div>
                </div>


                <div class="w-full lg:w-12/12 px-4">
                    <div
                        class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg transition-shadow duration-300 hover:shadow-2xl">
                        <div class="overflow-x-auto">
                            <table class="min-w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-300 dark:bg-gray-700">
                                        <th class="py-3 px-4 text-left text-gray-900 dark:text-gray-100 font-semibold">
                                            User</th>
                                        <th class="py-3 px-4 text-left text-gray-900 dark:text-gray-100 font-semibold">
                                            Sent</th>
                                        <th class="py-3 px-4 text-left text-gray-900 dark:text-gray-100 font-semibold">
                                            Received</th>
                                        <th class="py-3 px-4 text-left text-gray-900 dark:text-gray-100 font-semibold">
                                            Amount</th>
                                        <th class="py-3 px-4 text-left text-gray-900 dark:text-gray-100 font-semibold">
                                            Date</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300" data-label="User">
                                            dssarx pzxoim</td>
                                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300" data-label="Sent">
                                            <span class="inline-block w-6 h-6">
                                                <img src="https://script.viserlab.com/changalab/demo/assets/images/currency/634ce62fefa191665984047.png"
                                                    alt="currency image" class="rounded-full">
                                            </span>
                                            Bkash
                                        </td>
                                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300" data-label="Received">
                                            <span class="inline-block w-6 h-6">
                                                <img src="https://script.viserlab.com/changalab/demo/assets/images/currency/6363475fc84051667450719.jpg"
                                                    alt="currency image" class="rounded-full">
                                            </span>
                                            Payoneer
                                        </td>
                                        <td class="py-3 px-4 text-green-600 font-bold" data-label="Amount">1,281.18
                                            BDT<i class="la la-arrow-right ml-2"></i>9.96 USD</td>
                                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300" data-label="Date">
                                            <div>
                                                <span class="block">2024-07-30 06:02 AM</span>
                                                <span class="text-gray-500">2 months ago</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300" data-label="User">
                                            dssarx pzxoim</td>
                                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300" data-label="Sent">
                                            <span class="inline-block w-6 h-6">
                                                <img src="https://script.viserlab.com/changalab/demo/assets/images/currency/634ce62fefa191665984047.png"
                                                    alt="currency image" class="rounded-full">
                                            </span>
                                            Bkash
                                        </td>
                                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300" data-label="Received">
                                            <span class="inline-block w-6 h-6">
                                                <img src="https://script.viserlab.com/changalab/demo/assets/images/currency/63d79313684cb1675072275.jpg"
                                                    alt="currency image" class="rounded-full">
                                            </span>
                                            PayTm
                                        </td>
                                        <td class="py-3 px-4 text-green-600 font-bold" data-label="Amount">10.00 BDT<i
                                                class="la la-arrow-right ml-2"></i>5.64 INR</td>
                                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300" data-label="Date">
                                            <div>
                                                <span class="block">2024-07-29 11:43 AM</span>
                                                <span class="text-gray-500">2 months ago</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300" data-label="User">
                                            dssarx pzxoim</td>
                                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300" data-label="Sent">
                                            <span class="inline-block w-6 h-6">
                                                <img src="https://script.viserlab.com/changalab/demo/assets/images/currency/634ce5b0b4ec41665983920.jpg"
                                                    alt="currency image" class="rounded-full">
                                            </span>
                                            Bitcoin
                                        </td>
                                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300" data-label="Received">
                                            <span class="inline-block w-6 h-6">
                                                <img src="https://script.viserlab.com/changalab/demo/assets/images/currency/634ce62fefa191665984047.png"
                                                    alt="currency image" class="rounded-full">
                                            </span>
                                            Bkash
                                        </td>
                                        <td class="py-3 px-4 text-green-600 font-bold" data-label="Amount">50.00 BTC<i
                                                class="la la-arrow-right ml-2"></i>1,640.00 BDT</td>
                                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300" data-label="Date">
                                            <div>
                                                <span class="block">2024-07-28 01:47 PM</span>
                                                <span class="text-gray-500">3 months ago</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300" data-label="User">John
                                            Doe</td>
                                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300" data-label="Sent">
                                            <span class="inline-block w-6 h-6">
                                                <img src="https://script.viserlab.com/changalab/demo/assets/images/currency/63d782ac127d51675068076.jpg"
                                                    alt="currency image" class="rounded-full">
                                            </span>
                                            Payoneer
                                        </td>
                                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300" data-label="Received">
                                            <span class="inline-block w-6 h-6">
                                                <img src="https://script.viserlab.com/changalab/demo/assets/images/currency/634ce62fefa191665984047.png"
                                                    alt="currency image" class="rounded-full">
                                            </span>
                                            Bkash
                                        </td>
                                        <td class="py-3 px-4 text-green-600 font-bold" data-label="Amount">50.00 EUR<i
                                                class="la la-arrow-right ml-2"></i>53.33 BDT</td>
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
                        <p class="mt-4 text-gray-200">Stay updated with the latest news and exclusive discounts by
                            subscribing to our newsletter!</p>
                        <form class="mt-6">
                            <input type="email" placeholder="Enter your email address"
                                class="border border-gray-300 rounded-lg p-3 w-full md:w-2/3 focus:outline-none focus:ring-2 focus:ring-blue-400"
                                required>
                            <button type="submit"
                                class="mt-4 bg-white text-blue-600 font-semibold py-2 px-4 rounded-lg shadow hover:bg-gray-200 transition duration-200">Subscribe</button>
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
                <button
                    class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
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
    <footer class="bg-gray-50 dark:bg-gray-800">
        <div class="p-4 md:px-8 lg:px-10 max-w-screen-xl mx-auto">
            <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6">
                <div class="sm:col-span-2">
                    <a href="/" class="flex items-center space-x-3 mb-2 text-xl font-semibold text-gray-900 dark:text-white">
                      <svg class="w-8 h-8" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M25.2696 13.126C25.1955 13.6364 24.8589 14.3299 24.4728 14.9328C23.9856 15.6936 23.2125 16.2264 22.3276 16.4114L18.43 17.2265C17.8035 17.3575 17.2355 17.6853 16.8089 18.1621L14.2533 21.0188C13.773 21.5556 13.4373 21.4276 13.4373 20.7075C13.4315 20.7342 12.1689 23.9903 15.5149 25.9202C16.8005 26.6618 18.6511 26.3953 19.9367 25.6538L26.7486 21.7247C29.2961 20.2553 31.0948 17.7695 31.6926 14.892C31.7163 14.7781 31.7345 14.6639 31.7542 14.5498L25.2696 13.126Z" fill="url(#paint0_linear_11430_22515)"></path><path d="M23.5028 9.20133C24.7884 9.94288 25.3137 11.0469 25.3137 12.53C25.3137 12.7313 25.2979 12.9302 25.2694 13.1261L28.0141 14.3051L31.754 14.5499C32.2329 11.7784 31.2944 8.92561 29.612 6.65804C28.3459 4.9516 26.7167 3.47073 24.7581 2.34097C23.167 1.42325 21.5136 0.818599 19.8525 0.486816L17.9861 2.90382L17.3965 5.67918L23.5028 9.20133Z" fill="url(#paint1_linear_11430_22515)"></path><path d="M1.5336 11.2352C1.5329 11.2373 1.53483 11.238 1.53556 11.2358C1.67958 10.8038 1.86018 10.3219 2.08564 9.80704C3.26334 7.11765 5.53286 5.32397 8.32492 4.40943C11.117 3.49491 14.1655 3.81547 16.7101 5.28323L17.3965 5.67913L19.8525 0.486761C12.041 -1.07341 4.05728 3.51588 1.54353 11.2051C1.54233 11.2087 1.53796 11.2216 1.5336 11.2352Z" fill="url(#paint2_linear_11430_22515)"></path><path d="M19.6699 25.6538C18.3843 26.3953 16.8003 26.3953 15.5147 25.6538C15.3402 25.5531 15.1757 25.4399 15.0201 25.3174L12.7591 26.8719L10.8103 30.0209C12.9733 31.821 15.7821 32.3997 18.589 32.0779C20.7013 31.8357 22.7995 31.1665 24.7582 30.0368C26.3492 29.1191 27.7 27.9909 28.8182 26.7195L27.6563 23.8962L25.7762 22.1316L19.6699 25.6538Z" fill="url(#paint3_linear_11430_22515)"></path><path d="M15.0201 25.3175C14.0296 24.5373 13.4371 23.3406 13.4371 22.0588V21.931V11.2558C13.4371 10.6521 13.615 10.5494 14.1384 10.8513C13.3323 10.3864 11.4703 8.79036 9.17118 10.1165C7.88557 10.858 6.8269 12.4949 6.8269 13.978V21.8362C6.8269 24.775 8.34906 27.8406 10.5445 29.7966C10.6313 29.874 10.7212 29.9469 10.8103 30.0211L15.0201 25.3175Z" fill="url(#paint4_linear_11430_22515)"></path><path d="M28.6604 5.49565C28.6589 5.49395 28.6573 5.49532 28.6589 5.49703C28.9613 5.83763 29.2888 6.23485 29.6223 6.68734C31.3648 9.05099 32.0158 12.0447 31.4126 14.9176C30.8093 17.7906 29.0071 20.2679 26.4625 21.7357L25.7761 22.1316L28.8181 26.7195C34.0764 20.741 34.09 11.5388 28.6815 5.51929C28.6789 5.51641 28.67 5.50622 28.6604 5.49565Z" fill="url(#paint5_linear_11430_22515)"></path><path d="M7.09355 13.978C7.09354 12.4949 7.88551 11.1244 9.17113 10.3829C9.34564 10.2822 9.52601 10.1965 9.71002 10.1231L9.49304 7.38962L7.96861 4.26221C5.32671 5.23364 3.1897 7.24125 2.06528 9.83067C1.2191 11.7793 0.75001 13.9294 0.75 16.1888C0.75 18.0243 1.05255 19.7571 1.59553 21.3603L4.62391 21.7666L7.09355 21.0223V13.978Z" fill="url(#paint6_linear_11430_22515)"></path><path d="M9.71016 10.1231C10.8817 9.65623 12.2153 9.74199 13.3264 10.3829L13.4372 10.4468L22.3326 15.5777C22.9566 15.9376 22.8999 16.2918 22.1946 16.4392L22.7078 16.332C23.383 16.1908 23.9999 15.8457 24.4717 15.3428C25.2828 14.4782 25.5806 13.4351 25.5806 12.5299C25.5806 11.0468 24.7886 9.67634 23.503 8.93479L16.6911 5.00568C14.1436 3.53627 11.0895 3.22294 8.29622 4.14442C8.18572 4.18087 8.07756 4.2222 7.96875 4.26221L9.71016 10.1231Z" fill="url(#paint7_linear_11430_22515)"></path><path d="M20.0721 31.8357C20.0744 31.8352 20.0739 31.8332 20.0717 31.8337C19.6252 31.925 19.1172 32.0097 18.5581 32.0721C15.638 32.3978 12.7174 31.4643 10.5286 29.5059C8.33986 27.5474 7.09347 24.7495 7.09348 21.814L7.09347 21.0222L1.59546 21.3602C4.1488 28.8989 12.1189 33.5118 20.0411 31.8421C20.0449 31.8413 20.0582 31.8387 20.0721 31.8357Z" fill="url(#paint8_linear_11430_22515)"></path>
                      <defs>
                      <linearGradient id="paint0_linear_11430_22515" x1="20.8102" y1="23.9532" x2="23.9577" y2="12.9901" gradientUnits="userSpaceOnUse"><stop stop-color="#1724C9"></stop><stop offset="1" stop-color="#1C64F2"></stop></linearGradient>
                      <linearGradient id="paint1_linear_11430_22515" x1="28.0593" y1="10.5837" x2="19.7797" y2="2.33321" gradientUnits="userSpaceOnUse"><stop stop-color="#1C64F2"></stop><stop offset="1" stop-color="#0092FF"></stop></linearGradient>
                      <linearGradient id="paint2_linear_11430_22515" x1="16.9145" y1="5.2045" x2="4.42432" y2="5.99375" gradientUnits="userSpaceOnUse"><stop stop-color="#0092FF"></stop><stop offset="1" stop-color="#45B2FF"></stop></linearGradient>
                      <linearGradient id="paint3_linear_11430_22515" x1="16.0698" y1="28.846" x2="27.2866" y2="25.8192" gradientUnits="userSpaceOnUse"><stop stop-color="#1C64F2"></stop><stop offset="1" stop-color="#0092FF"></stop></linearGradient>
                      <linearGradient id="paint4_linear_11430_22515" x1="8.01881" y1="15.8661" x2="15.9825" y2="24.1181" gradientUnits="userSpaceOnUse"><stop stop-color="#1724C9"></stop><stop offset="1" stop-color="#1C64F2"></stop></linearGradient>
                      <linearGradient id="paint5_linear_11430_22515" x1="26.2004" y1="21.8189" x2="31.7569" y2="10.6178" gradientUnits="userSpaceOnUse"><stop stop-color="#0092FF"></stop><stop offset="1" stop-color="#45B2FF"></stop></linearGradient>
                      <linearGradient id="paint6_linear_11430_22515" x1="6.11387" y1="9.31427" x2="3.14054" y2="20.4898" gradientUnits="userSpaceOnUse"><stop stop-color="#1C64F2"></stop><stop offset="1" stop-color="#0092FF"></stop></linearGradient>
                      <linearGradient id="paint7_linear_11430_22515" x1="21.2932" y1="8.78271" x2="10.4278" y2="11.488" gradientUnits="userSpaceOnUse"><stop stop-color="#1724C9"></stop><stop offset="1" stop-color="#1C64F2"></stop></linearGradient>
                      <linearGradient id="paint8_linear_11430_22515" x1="7.15667" y1="21.5399" x2="14.0824" y2="31.9579" gradientUnits="userSpaceOnUse"><stop stop-color="#0092FF"></stop><stop offset="1" stop-color="#45B2FF"></stop></linearGradient>
                      </defs>
                      </svg>
                      <span>ExchangePro</span>
                    </a>
                    <p class="text-gray-500 dark:text-gray-400 mb-4 text-sm">
                      Flowbite is an open-source library of over 400+ web components and interactive elements built with Tailwind CSS.
                    </p>
                    <ul class="flex space-x-6">
                      <!-- Facebook -->
                      <li>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                          </svg>
                        </a>
                      </li>
                      <!-- Instagram -->
                      <li>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
                          </svg>
                        </a>
                      </li>
                      <!-- Twitter -->
                      <li>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                          </svg>
                        </a>
                      </li>
                      <!-- GitHub -->
                      <li>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path>
                          </svg>
                        </a>
                      </li>
                      <!-- Dribbble -->
                      <li>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd"></path>
                          </svg>
                        </a>
                      </li>
                    </ul>
                  </div>
                <div>
                    <h2 class="mb-4 text-sm font-semibold text-gray-900 dark:text-white uppercase">Company</h2>
                    <ul class="space-y-2 text-gray-500 dark:text-gray-400">
                        <li><a href="#" class="hover:underline">About</a></li>
                        <li><a href="#" class="hover:underline">Careers</a></li>
                        <li><a href="#" class="hover:underline">Brand Center</a></li>
                        <li><a href="#" class="hover:underline">Blog</a></li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-4 text-sm font-semibold text-gray-900 dark:text-white uppercase">Help center</h2>
                    <ul class="space-y-2 text-gray-500 dark:text-gray-400">
                        <li><a href="#" class="hover:underline">Discord Server</a></li>
                        <li><a href="#" class="hover:underline">Twitter</a></li>
                        <li><a href="#" class="hover:underline">Facebook</a></li>
                        <li><a href="#" class="hover:underline">Contact Us</a></li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-4 text-sm font-semibold text-gray-900 dark:text-white uppercase">Legal</h2>
                    <ul class="space-y-2 text-gray-500 dark:text-gray-400">
                        <li><a href="#" class="hover:underline">Privacy Policy</a></li>
                        <li><a href="#" class="hover:underline">Licensing</a></li>
                        <li><a href="#" class="hover:underline">Terms</a></li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-4 text-sm font-semibold text-gray-900 dark:text-white uppercase">Download</h2>
                    <ul class="space-y-2 text-gray-500 dark:text-gray-400">
                        <li><a href="#" class="hover:underline">iOS</a></li>
                        <li><a href="#" class="hover:underline">Android</a></li>
                        <li><a href="#" class="hover:underline">Windows</a></li>
                        <li><a href="#" class="hover:underline">MacOS</a></li>
                    </ul>
                </div>
            </div>
            <hr class="my-8 border-gray-200 dark:border-gray-700">
            <span class="block text-sm text-center text-gray-500 dark:text-gray-400">
                © 2021-2024 <a href="https://japanbangladeshit.com" class="hover:underline">Japan Bangladesh IT</a>. All Rights Reserved.
            </span>
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
        document.getElementById('mega-menu-dropdown-button').addEventListener('click', function() {
            var dropdown = document.getElementById('mega-menu-dropdown');
            dropdown.classList.toggle('hidden');
        });
    </script>

</body>

</html>
