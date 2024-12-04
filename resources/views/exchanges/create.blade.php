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
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                            <strong class="font-bold">Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('exchanges.store') }}" method="POST">
                        @csrf
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                            <!-- Exchange Type -->
                            <div>
                                <label for="exchange_type" class="block text-gray-700 dark:text-gray-300">Exchange
                                    Type:</label>
                                <select name="exchange_type" id="exchange_type"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required onchange="toggleUserFieldLabel()">
                                    <option value="buy">Buy</option>
                                    <option value="sell">Sell</option>
                                </select>
                            </div>

                            <!-- User Name (Dynamic Dropdown with Search) -->
                            <div>
                                <label id="user_field_label" for="user_search"
                                    class="block text-gray-700 dark:text-gray-300">User:</label>
                                <div class="relative">
                                    <input type="text" name="user_search" id="user_search"
                                        class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                        placeholder="Search for a user..." oninput="debounceSearchUsers()">
                                    <button type="button" id="defaultModalButton" data-modal-target="createUserdefaultModal" data-modal-toggle="createUserdefaultModal"
                                        class="text-white absolute end-2 bottom-1.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-1 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
                                </div>
                                <div id="user_results"
                                    class="border border-gray-300 rounded-md bg-white dark:bg-gray-800 mt-2 hidden">
                                </div>
                                <input type="hidden" name="user_id" id="user_id">
                            </div>
                            <!-- Currency -->
                            <div>
                                <label for="currency_id"
                                    class="block text-gray-700 dark:text-gray-300">Currency:</label>
                                <select name="currency_id" id="currency_id"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required>
                                    @foreach ($currencies as $currency)
                                        <option value="{{ $currency->id }}">{{ $currency->name }}
                                            ({{ $currency->code }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Quantity -->
                            <div>
                                <label for="quantity" class="block text-gray-700 dark:text-gray-300">Quantity:</label>
                                <input type="number" name="quantity" id="quantity"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    step="0.01" required oninput="calculateTotal()">
                            </div>

                            <!-- Rate -->
                            <div>
                                <label for="rate" class="block text-gray-700 dark:text-gray-300">Rate:</label>
                                <input type="number" name="rate" id="rate"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    step="0.01" required oninput="calculateTotal()">
                            </div>

                            <!-- Total Amount -->
                            <div>
                                <label for="total_amount" class="block text-gray-700 dark:text-gray-300">Total
                                    Amount:</label>
                                <input type="text" name="total_amount" id="total_amount"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    readonly>
                            </div>

                            <!-- Paid Amount -->
                            <div>
                                <label for="paid_to_seller_bdt" class="block text-gray-700 dark:text-gray-300">Paid to
                                    Seller (BDT):</label>
                                <input type="number" name="paid_to_seller_bdt" id="paid_to_seller_bdt"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    step="0.01" oninput="updatePaymentStatus()">
                            </div>

                            <div>
                                <label for="bank_id" class="block text-gray-700 dark:text-gray-300">Bank:</label>
                                <select name="bank_id" id="bank_id"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required>
                                    @foreach ($banks as $bank)
                                        <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Status -->
                            <div>
                                <label for="status" class="block text-gray-700 dark:text-gray-300">Status:</label>
                                <select name="status" id="status"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required>
                                    <option value="pending">Pending</option>
                                    <option value="approved">Approved</option>
                                    <option value="canceled">Canceled</option>
                                </select>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                            Create Exchange
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add user Modal -->
    <div id="createUserdefaultModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div
                    class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Add New User
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="createUserdefaultModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path> </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class=" grid grid-cols-2 gap-4">
                        <!-- First Name -->
                        <div>
                            <label for="first_name" class="block text-gray-700 dark:text-gray-300">First Name:</label>
                            <input type="text" name="first_name" id="first_name"
                                class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                required>
                        </div>

                        <!-- Last Name -->
                        <div>
                            <label for="last_name" class="block text-gray-700 dark:text-gray-300">Last Name:</label>
                            <input type="text" name="last_name" id="last_name"
                                class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                required>
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-gray-700 dark:text-gray-300">Email:</label>
                            <input type="email" name="email" id="email"
                                class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                required>
                        </div>

                        <!-- Phone Number -->
                        <div>
                            <label for="phone_number" class="block text-gray-700 dark:text-gray-300">Phone Number:</label>
                            <input type="text" name="phone_number" id="phone_number"
                                class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                        </div>

                        <!-- Role -->
                        <div>
                            <label for="role_id" class="block text-gray-700 dark:text-gray-300">Role:</label>
                            <select name="role_id" id="role_id"
                                class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- User Type -->
                        <div>
                            <label for="user_type_id" class="block text-gray-700 dark:text-gray-300">User Type:</label>
                            <select name="user_type_id" id="user_type_id"
                                class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                                @foreach ($userTypes as $userType)
                                    <option value="{{ $userType->id }}">{{ $userType->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Username -->
                        <div>
                            <label for="username" class="block text-gray-700 dark:text-gray-300">Username:</label>
                            <input type="text" name="username" id="username"
                                class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-gray-700 dark:text-gray-300">Password:</label>
                            <input type="password" name="password" id="password"
                                class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="password_confirmation" class="block text-gray-700 dark:text-gray-300">Confirm Password:</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                        </div>

                        <!-- Active Status -->
                        <div>
                            <label for="active_status" class="block text-gray-700 dark:text-gray-300">Status:</label>
                            <select name="active_status" id="active_status"
                                class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <!-- Allow Login Checkbox -->
                        <div class="mb-4">
                            <label for="allow_login" class="inline-flex items-center text-gray-700 dark:text-gray-300">
                                <input type="checkbox" id="allow_login" name="allow_login" class="form-checkbox h-4 w-4 text-blue-500 dark:text-blue-400">
                                <span class="ml-2">Allow User Login?</span>
                            </label>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition duration-200">
                        Create User
                    </button>
                </form>
            </div>
        </div>
    </div>


    <!-- JavaScript for dynamic field label and search functionality -->
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            document.getElementById('defaultModalButton').click();
        });
    </script>
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

        function updatePaymentStatus() {
            const totalAmount = parseFloat(document.getElementById('total_amount').value) || 0;
            const paidAmount = parseFloat(document.getElementById('paid_to_seller_bdt').value) || 0;

            if (paidAmount >= totalAmount) {
                document.getElementById('status').value = 'Paid';
            } else if (paidAmount > 0) {
                document.getElementById('status').value = 'Partial';
            } else {
                document.getElementById('status').value = 'Due';
            }
        }

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
                        item.classList.add('p-2', 'text-gray-700', 'dark:text-white', 'cursor-pointer',
                            'hover:bg-gray-200', 'dark:hover:bg-gray-700');
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

        toggleUserFieldLabel();
        calculateTotal();
        updatePaymentStatus();
    </script>
</x-app-layout>
