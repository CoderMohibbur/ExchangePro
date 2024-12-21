<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl dark:text-white font-semibold">Edit Exchange</h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6">
                    <form action="{{ route('exchanges.update', $exchange) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid gap-6 sm:grid-cols-2 sm:gap-4">
                            <!-- Exchange Type -->
                            <div>
                                <label for="exchange_type" class="block text-gray-700 dark:text-gray-300">Exchange Type:</label>
                                <select name="exchange_type" id="exchange_type"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required>
                                    <option value="buy" {{ $exchange->exchange_type == 'buy' ? 'selected' : '' }}>Buy</option>
                                    <option value="sell" {{ $exchange->exchange_type == 'sell' ? 'selected' : '' }}>Sell</option>
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
                                    <button type="button" id="defaultModalButton"
                                        data-modal-target="createUserdefaultModal"
                                        data-modal-toggle="createUserdefaultModal"
                                        class="text-white absolute end-2 bottom-1.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-1 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
                                </div>
                                <div id="user_results"
                                    class="border border-gray-300 rounded-md bg-white dark:bg-gray-800 mt-2 hidden">
                                </div>
                                <input type="hidden" name="user_id" id="user_id" value="{{ $exchange->user_id }}">
                            </div>

                            <!-- Currency -->
                            <div>
                                <label for="currency_id" class="block text-gray-700 dark:text-gray-300">Currency:</label>
                                <select name="currency_id" id="currency_id"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required>
                                    @foreach ($currencies as $currency)
                                        <option value="{{ $currency->id }}" {{ $exchange->currency_id == $currency->id ? 'selected' : '' }}>
                                            {{ $currency->name }} ({{ $currency->code }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Quantity -->
                            <div>
                                <label for="quantity" class="block text-gray-700 dark:text-gray-300">Quantity:</label>
                                <input type="number" name="quantity" id="quantity" class="form-control w-full mt-1"
                                    value="{{ $exchange->quantity }}" step="0.01" required>
                            </div>

                            <!-- Rate -->
                            <div>
                                <label for="rate" class="block text-gray-700 dark:text-gray-300">Rate:</label>
                                <input type="number" name="rate" id="rate" class="form-control w-full mt-1"
                                    value="{{ $exchange->rate }}" step="0.01" required>
                            </div>

                            <!-- Total Amount -->
                            <div>
                                <label for="total_amount" class="block text-gray-700 dark:text-gray-300">Total Amount:</label>
                                <input type="text" name="total_amount" id="total_amount"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    value="{{ $exchange->total_amount }}" readonly>
                            </div>

                            <!-- Paid Amount -->
                            <div>
                                <label for="paid_to_seller_bdt" class="block text-gray-700 dark:text-gray-300">Paid to Seller (BDT):</label>
                                <input type="number" name="paid_to_seller_bdt" id="paid_to_seller_bdt"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    value="{{ $exchange->paid_to_seller_bdt }}" step="0.01" oninput="updatePaymentStatus()">
                            </div>

                            <!-- Bank Selection -->
                            <div>
                                <label for="bank_id" class="block text-gray-700 dark:text-gray-300">Bank:</label>
                                <select name="bank_id" id="bank_id"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required>
                                    @foreach ($banks as $bank)
                                        <option value="{{ $bank->id }}" {{ $exchange->bank_id == $bank->id ? 'selected' : '' }}>
                                            {{ $bank->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Bank Transaction Fees -->
                            <div id="bank_transaction_fees" class="">
                                <label for="bank_transaction_fee" class="block text-gray-700 dark:text-gray-300">Bank Transaction Fee:</label>
                                <select name="bank_transaction_fee" id="bank_transaction_fee"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                                    <option value="">Select Bank Transaction Fee</option>
                                    <option value="npsb_fee" {{ $exchange->npsb_fee ? 'selected' : '' }}>NPSB Fee</option>
                                    <option value="eft_beftn_fee" {{ $exchange->eft_beftn_fee ? 'selected' : '' }}>EFT/BEFTN Fee</option>
                                </select>
                            </div>

                            <!-- Currency Transaction Fees -->
                            <div id="currency_transaction_fees" class="">
                                <label for="currency_transaction_fee" class="block text-gray-700 dark:text-gray-300">Currency Transaction Fee:</label>
                                <select name="currency_transaction_fee" id="currency_transaction_fee"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                                    <option value="">Select Currency Transaction Fee</option>
                                    <option value="fixed_currency_fee" {{ $exchange->fixed_currency_fee ? 'selected' : '' }}>Fixed Currency Fee</option>
                                    <option value="percent_currency_fee" {{ $exchange->percent_currency_fee ? 'selected' : '' }}>Percentage Currency Fee</option>
                                </select>
                            </div>

                            <!-- Exchange Status -->
                            <div>
                                <label for="exchange_status" class="block text-gray-700 dark:text-gray-300">Exchange Status:</label>
                                <select name="exchange_status" id="exchange_status"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required>
                                    <option value="approved" {{ $exchange->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                    <option value="pending" {{ $exchange->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="canceled" {{ $exchange->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                                </select>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                            Update Exchange
                        </button>
                        <a href="{{ route('exchanges.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600 transition duration-200">
                            Cancel
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
    <script>
        document.getElementById('bank_id').addEventListener('change', function() {
            const bankId = this.value;
            if (bankId) {
                fetch(`/get-bank-fees/${bankId}`)
                    .then(response => response.json())
                    .then(data => {
                        const bankFeesDropdown = document.getElementById('bank_transaction_fee');
                        bankFeesDropdown.innerHTML = `
                            <option value="npsb_fee">NPSB Fee (${data.npsb_fee})</option>
                            <option value="eft_beftn_fee">EFT/BEFTN Fee (${data.eft_beftn_fee})</option>
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
                            <option value="percent_currency_fee">Percentage Currency Fee (${data.percent_charge_for_sell}%)</option>
                            <option value="fixed_currency_fee">Fixed Currency Fee (${data.fixed_charge_for_sell})</option>
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
    </script>
</x-app-layout>
