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
                        <div class="grid gap-6 sm:grid-cols-2 sm:gap-4">

                            <!-- Exchange Type -->
                            <div>
                                <label for="exchange_type" class="block text-gray-700 dark:text-gray-300">Exchange
                                    Type:</label>
                                <select name="exchange_type" id="exchange_type"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required onchange="toggleUserFieldLabel(); toggleAmountFieldLabel();">
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
                                        placeholder="Search for a user..." oninput="debounceSearchUsers()" required>
                                    <button type="button" id="defaultModalButton"
                                        data-modal-target="createUserdefaultModal"
                                        data-modal-toggle="createUserdefaultModal"
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
                                <label id="paid_to_seller_bdt_label" for="paid_to_seller_bdt"
                                    class="block text-gray-700 dark:text-gray-300">Paid to
                                    Seller (BDT):</label>
                                <input type="number" name="paid_to_seller_bdt" id="paid_to_seller_bdt"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    step="0.01" required oninput="updatePaymentStatus()">
                            </div>

                            <!-- Bank Selection -->
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

                            <!-- Bank Transaction Fees -->
                            <div id="bank_transaction_fees" class="">
                                <label for="bank_transaction_fee" class="block text-gray-700 dark:text-gray-300">Bank
                                    Transaction Fee:</label>
                                <select name="bank_transaction_fee" id="bank_transaction_fee"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                                    <option value="">Select Bank Transaction Fee</option>
                                    <option value="npsb_fee">NPSB Fee</option>
                                    <option value="eft_beftn_fee">EFT/BEFTN Fee</option>
                                </select>
                            </div>

                            <!-- Currency Transaction Fees -->
                            <div id="currency_transaction_fees" class="">
                                <label for="currency_transaction_fee"
                                    class="block text-gray-700 dark:text-gray-300">Currency Transaction Fee:</label>
                                <select name="currency_transaction_fee" id="currency_transaction_fee"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                                    <option value="">Select Currency Transaction Fee</option>
                                    <option value="fixed_currency_fee">Fixed Currency Fee</option>
                                    <option value="percent_currency_fee">Percentage Currency Fee</option>
                                </select>
                            </div>
                            <!-- Exchange Status -->
                            <div>
                                <label for="exchange_status" class="block text-gray-700 dark:text-gray-300">Exchange
                                    Status:</label>
                                <select name="exchange_status" id="exchange_status"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required>
                                    <option value="approved">Approved</option>
                                    <option value="pending">Pending</option>
                                    <option value="canceled">Canceled</option>
                                </select>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                            Create Exchange
                        </button>
                        <a href="{{ route('exchanges.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-75 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-500 transition duration-200">
                            Cancel
                        </a>
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
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form id="createUserForm">
                    @csrf
                    <div class=" grid grid-cols-2 gap-4">
                        <!-- First Name -->
                        {{-- <div class="col-span-2"> --}}
                        <div>
                            <label for="first_name" class="block text-gray-700 dark:text-gray-300">Full Name:</label>
                            <input type="text" name="first_name" id="first_name"
                                class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                required>
                        </div>

                        {{-- <div class="hidden">
                            <label for="full_name" class="block text-gray-700 dark:text-gray-300">Full Name:</label>
                            <input type="text" name="full_name" id="full_name"
                                class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                        </div> --}}

                        <!-- Last Name -->
                        {{-- <div>
                            <label for="last_name" class="block text-gray-700 dark:text-gray-300">Last Name:</label>
                            <input type="text" name="last_name" id="last_name"
                                class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                required>
                        </div> --}}

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-gray-700 dark:text-gray-300">Email:</label>
                            <input type="email" name="email" id="email"
                                class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                        </div>

                        <!-- Phone Number -->
                        <div>
                            <label for="phone_number" class="block text-gray-700 dark:text-gray-300">Phone
                                Number:</label>
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
                            <label for="user_type_id" class="block text-gray-700 dark:text-gray-300">User
                                Type:</label>
                            <select name="user_type_id" id="user_type_id"
                                class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                                @foreach ($userTypes as $userType)
                                    <option value="{{ $userType->id }}">{{ $userType->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Username -->
                        {{-- <div>
                            <label for="username" class="block text-gray-700 dark:text-gray-300">Username:</label>
                            <input type="text" name="username" id="username"
                                class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                        </div> --}}

                        <!-- Password -->
                        {{-- <div>
                            <label for="password" class="block text-gray-700 dark:text-gray-300">Password:</label>
                            <input type="password" name="password" id="password"
                                class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                        </div> --}}

                        <!-- Confirm Password -->
                        {{-- <div>
                            <label for="password_confirmation" class="block text-gray-700 dark:text-gray-300">Confirm
                                Password:</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                        </div> --}}

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
                            <label for="allow_login"
                                class="inline-flex items-center text-gray-700 dark:text-gray-300">
                                <input type="checkbox" id="allow_login" name="allow_login"
                                    class="form-checkbox h-4 w-4 text-blue-500 dark:text-blue-400">
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
        document.getElementById('createUserForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            let formData = new FormData(this); // Get form data

            // Make the AJAX request using fetch
            fetch("{{ route('users.storesave') }}", {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Close the modal
                        document.querySelector('[data-modal-toggle="createUserdefaultModal"]')
                            .click(); // Manually trigger closing

                        // Select the newly created user in the dropdown
                        // let userDropdown = document.getElementById('user_id');
                        // let option = document.createElement('option');
                        // option.value = data.data.id;
                        // option.text = `${data.data.first_name} ${data.data.last_name}`;
                        // userDropdown.appendChild(option);
                        // userDropdown.value = data.data.id; // Select the newly created user

                        // Set the first_name in the input field
                        document.getElementById('user_search').value = data.data.first_name;

                        // Set the user_id in the hidden field
                        document.getElementById('user_id').value = data.data.id;

                        // Optionally, display a success message
                        alert('User created successfully');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred. Please try again.');
                });
        });
    </script>
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

        function toggleAmountFieldLabel() {
            const exchangeType = document.getElementById('exchange_type').value;
            const amountLabel = document.getElementById('paid_to_seller_bdt_label'); // Get the label by ID
            amountLabel.innerText = exchangeType === 'buy' ? 'Paid To Seller (BDT):' : 'Received From Buyer (BDT):';
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
        toggleAmountFieldLabel();
    </script>
    <script>
        document.getElementById('bank_id').addEventListener('change', function() {
            const bankId = this.value;
            if (bankId) {
                fetch(`/get-bank-fees/${bankId}`)
                    .then(response => response.json())
                    .then(data => {
                        const bankFeesDropdown = document.getElementById('bank_transaction_fee');
                        bankFeesDropdown.innerHTML = `
                            <option value="${data.npsb_fee}">NPSB Fee (${data.npsb_fee})</option>
                            <option value="${data.eft_beftn_fee}">EFT/BEFTN Fee (${data.eft_beftn_fee})</option>
                            <option value="0">No Fee</option>
                        `;
                    });
            }
        });

        document.getElementById('currency_id').addEventListener('change', function() {
            const currencyId = this.value;
            if (currencyId) {
                fetch(`/get-currency-fees/${currencyId}`)
                    .then(response => response.json())
                    .then(data => {
                        const currencyFeesDropdown = document.getElementById('currency_transaction_fee');
                        currencyFeesDropdown.innerHTML = `
                            <option value="0">No Fee</option>
                            <option value="${data.percent_charge_for_sell}">Percentage Currency Fee (${data.percent_charge_for_sell}%)</option>
                            <option value="${data.fixed_charge_for_sell}">Fixed Currency Fee (${data.fixed_charge_for_sell})</option>
                        `;
                    });
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const bankId = document.getElementById('bank_id').value;
            const currencyId = document.getElementById('currency_id').value;
            if (bankId) document.getElementById('bank_id').dispatchEvent(new Event('change'));
            if (currencyId) document.getElementById('currency_id').dispatchEvent(new Event('change'));
        });

        document.getElementById('exchange_type').addEventListener('change', function () {
    const exchangeType = this.value;
    const bankTransactionFeeField = document.getElementById('bank_transaction_fee');

    if (exchangeType === 'sell') {
        bankTransactionFeeField.innerHTML = `
            <option value="0" selected>No Fee</option>
        `;
        bankTransactionFeeField.value = 0;
        bankTransactionFeeField.setAttribute('disabled', true); // Disable the field
    } else {
        bankTransactionFeeField.removeAttribute('disabled'); // Enable the field
        const bankId = document.getElementById('bank_id').value; // Get selected bank
        if (bankId) {
            fetch(`/get-bank-fees/${bankId}`)
                .then(response => response.json())
                .then(data => {
                    bankTransactionFeeField.innerHTML = `
                        <option value="${data.npsb_fee}">NPSB Fee (${data.npsb_fee})</option>
                        <option value="${data.eft_beftn_fee}">EFT/BEFTN Fee (${data.eft_beftn_fee})</option>
                        <option value="0">No Fee</option>
                    `;
                    bankTransactionFeeField.value = data.npsb_fee; // Default to NPSB Fee
                });
        }
    }
});
        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            const exchangeType = document.getElementById('exchange_type').value;
            const bankTransactionFeeField = document.getElementById('bank_transaction_fee');

            if (exchangeType === 'sell') {
                bankTransactionFeeField.value = 0;
                bankTransactionFeeField.setAttribute('disabled', true);
            }
        });
    </script>
</x-app-layout>