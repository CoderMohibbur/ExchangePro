<x-app-layout>
    <x-slot name="title">
        Create New Exchange
    </x-slot>
    <x-slot name="header">
        <h1 class="text-xl dark:text-white font-semibold">Create New Exchange</h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6">
                    <form action="{{ route('exchanges.store') }}" method="POST">
                        @csrf

                        <!-- Exchange Type -->
                        <div class="mb-4">
                            <label for="exchange_type" class="block text-gray-700 dark:text-gray-300">Exchange Type:</label>
                            <select name="exchange_type" id="exchange_type" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" required onchange="toggleUserFieldLabel()">
                                <option value="buy">Buy</option>
                                <option value="sell">Sell</option>
                            </select>
                        </div>

                        <!-- User Name (Dynamic Dropdown with Search) -->
                        <div class="mb-4">
                            <label id="user_field_label" for="user_search" class="block text-gray-700 dark:text-gray-300">User:</label>
                            <input type="text" name="user_search" id="user_search" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" placeholder="Search for a user..." oninput="debounceSearchUsers()">
                            <div id="user_results" class="border border-gray-300 rounded-md bg-white dark:bg-gray-800 mt-2 hidden"></div>
                            <input type="hidden" name="user_id" id="user_id">
                        </div>

                        <!-- Currency -->
                        <div class="mb-4">
                            <label for="currency_id" class="block text-gray-700 dark:text-gray-300">Currency:</label>
                            <select name="currency_id" id="currency_id" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" required>
                                @foreach($currencies as $currency)
                                    <option value="{{ $currency->id }}">{{ $currency->name }} ({{ $currency->code }})</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Quantity -->
                        <div class="mb-4">
                            <label for="quantity" class="block text-gray-700 dark:text-gray-300">Quantity:</label>
                            <input type="number" name="quantity" id="quantity" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" step="0.01" required oninput="calculateTotal()">
                        </div>

                        <!-- Rate -->
                        <div class="mb-4">
                            <label for="rate" class="block text-gray-700 dark:text-gray-300">Rate:</label>
                            <input type="number" name="rate" id="rate" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" step="0.01" required oninput="calculateTotal()">
                        </div>

                        <!-- Total Amount -->
                        <div class="mb-4">
                            <label for="total_amount" class="block text-gray-700 dark:text-gray-300">Total Amount:</label>
                            <input type="text" id="total_amount" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" readonly>
                        </div>

                        <!-- Status -->
                        <div class="mb-4">
                            <label for="status" class="block text-gray-700 dark:text-gray-300">Status:</label>
                            <select name="status" id="status" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" required>
                                <option value="pending">Pending</option>
                                <option value="approved">Approved</option>
                                <option value="canceled">Canceled</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-500 transition duration-200">
                            Create Exchange
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for dynamic field label and search functionality -->
    <script>
        function toggleUserFieldLabel() {
            const exchangeType = document.getElementById('exchange_type').value;
            const userFieldLabel = document.getElementById('user_field_label');
            userFieldLabel.innerText = exchangeType === 'buy' ? 'Seller Name:' : 'Buyer Name:';
        }

        function calculateTotal() {
            const quantity = parseFloat(document.getElementById('quantity').value) || 0;
            const rate = parseFloat(document.getElementById('rate').value) || 0;
            const totalAmount = quantity * rate;
            document.getElementById('total_amount').value = totalAmount.toFixed(2);
        }

        // Debounce search to reduce API calls
        let debounceTimeout;
        function debounceSearchUsers() {
            clearTimeout(debounceTimeout);
            debounceTimeout = setTimeout(searchUsers, 300);
        }

        function searchUsers() {
            const query = document.getElementById('user_search').value;
            if (query.length < 1) {
                document.getElementById('user_results').classList.add('hidden');
                return;
            }

            fetch(`/api/users/search?q=${query}`)
                .then(response => response.json())
                .then(data => {
                    const resultsContainer = document.getElementById('user_results');
                    resultsContainer.innerHTML = '';
                    resultsContainer.classList.toggle('hidden', data.length === 0);

                    data.forEach(user => {
                        const item = document.createElement('div');
                        item.classList.add('p-2', 'text-gray-700', 'dark:text-white', 'cursor-pointer', 'hover:bg-gray-200', 'dark:hover:bg-gray-700');
                        item.innerText = `${user.first_name} (@${user.username})`;
                        item.onclick = () => selectUser(user);
                        resultsContainer.appendChild(item);
                    });
                })
                .catch(error => {
                    console.error('Error fetching users:', error);
                    document.getElementById('user_results').classList.add('hidden');
                });
        }

        function selectUser(user) {
            document.getElementById('user_search').value = `${user.first_name} (@${user.username})`;
            document.getElementById('user_id').value = user.id;
            document.getElementById('user_results').classList.add('hidden');
        }

        // Initialize field visibility and calculations
        toggleUserFieldLabel();
        calculateTotal();
    </script>
</x-app-layout>
