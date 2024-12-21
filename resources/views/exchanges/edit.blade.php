<x-app-layout>
    <x-slot name="title">
        Edit Exchange
    </x-slot>
    <x-slot name="header">
        <h1 class="text-xl dark:text-white font-semibold">Edit Exchange</h1>
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
                    <form action="{{ route('exchanges.update', $exchange->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid gap-6 sm:grid-cols-2 sm:gap-4">

                            <!-- Exchange Type -->
                            <div>
                                <label for="exchange_type" class="block text-gray-700 dark:text-gray-300">Exchange
                                    Type:</label>
                                <select name="exchange_type" id="exchange_type"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required onchange="toggleUserFieldLabel(); toggleAmountFieldLabel();">
                                    <option value="buy" {{ $exchange->exchange_type === 'buy' ? 'selected' : '' }}>Buy
                                    </option>
                                    <option value="sell" {{ $exchange->exchange_type === 'sell' ? 'selected' : '' }}>Sell
                                    </option>
                                </select>
                            </div>

                            <!-- User Name -->
                            <div>
                                <label id="user_field_label" for="user_search"
                                    class="block text-gray-700 dark:text-gray-300">User:</label>
                                <div class="relative">
                                    <input type="text" name="user_search" id="user_search"
                                        class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                        placeholder="Search for a user..." oninput="debounceSearchUsers()"
                                        value="{{ $exchange->user->first_name }}" required>
                                    <input type="hidden" name="user_id" id="user_id"
                                        value="{{ $exchange->user_id }}">
                                </div>
                                <div id="user_results"
                                    class="border border-gray-300 rounded-md bg-white dark:bg-gray-800 mt-2 hidden">
                                </div>
                            </div>

                            <!-- Currency -->
                            <div>
                                <label for="currency_id"
                                    class="block text-gray-700 dark:text-gray-300">Currency:</label>
                                <select name="currency_id" id="currency_id"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required>
                                    @foreach ($currencies as $currency)
                                        <option value="{{ $currency->id }}"
                                            {{ $exchange->currency_id == $currency->id ? 'selected' : '' }}>
                                            {{ $currency->name }} ({{ $currency->code }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Quantity -->
                            <div>
                                <label for="quantity" class="block text-gray-700 dark:text-gray-300">Quantity:</label>
                                <input type="number" name="quantity" id="quantity"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    step="0.01" required value="{{ $exchange->quantity }}" oninput="calculateTotal()">
                            </div>

                            <!-- Rate -->
                            <div>
                                <label for="rate" class="block text-gray-700 dark:text-gray-300">Rate:</label>
                                <input type="number" name="rate" id="rate"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    step="0.01" required value="{{ $exchange->rate }}" oninput="calculateTotal()">
                            </div>

                            <!-- Total Amount -->
                            <div>
                                <label for="total_amount" class="block text-gray-700 dark:text-gray-300">Total
                                    Amount:</label>
                                <input type="text" name="total_amount" id="total_amount"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    readonly value="{{ $exchange->total_amount }}">
                            </div>

                            <!-- Paid Amount -->
                            <div>
                                <label id="paid_to_seller_bdt_label" for="paid_to_seller_bdt"
                                    class="block text-gray-700 dark:text-gray-300">Paid to
                                    Seller (BDT):</label>
                                <input type="number" name="paid_to_seller_bdt" id="paid_to_seller_bdt"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    step="0.01" required value="{{ $exchange->paid_to_seller_bdt }}"
                                    oninput="updatePaymentStatus()">
                            </div>

                            <!-- Bank Selection -->
                            <div>
                                <label for="bank_id" class="block text-gray-700 dark:text-gray-300">Bank:</label>
                                <select name="bank_id" id="bank_id"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required>
                                    @foreach ($banks as $bank)
                                        <option value="{{ $bank->id }}"
                                            {{ $exchange->bank_id == $bank->id ? 'selected' : '' }}>
                                            {{ $bank->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Exchange Status -->
                            <div>
                                <label for="exchange_status" class="block text-gray-700 dark:text-gray-300">Exchange
                                    Status:</label>
                                <select name="exchange_status" id="exchange_status"
                                    class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm"
                                    required>
                                    <option value="approved"
                                        {{ $exchange->exchange_status === 'approved' ? 'selected' : '' }}>Approved</option>
                                    <option value="pending"
                                        {{ $exchange->exchange_status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="canceled"
                                        {{ $exchange->exchange_status === 'canceled' ? 'selected' : '' }}>Canceled</option>
                                </select>
                            </div>

                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                            Update Exchange
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

    <!-- JavaScript for dynamic field label and search functionality -->
    <script>
        function toggleUserFieldLabel() {
            const exchangeType = document.getElementById('exchange_type').value;
            const userFieldLabel = document.getElementById('user_field_label');
            userFieldLabel.innerText = exchangeType === 'buy' ? 'Seller Name:' : 'Buyer Name:';
        }

        function toggleAmountFieldLabel() {
            const exchangeType = document.getElementById('exchange_type').value;
            const amountLabel = document.getElementById('paid_to_seller_bdt_label');
            amountLabel.innerText = exchangeType === 'buy' ? 'Paid To Seller (BDT):' : 'Received From Buyer (BDT):';
        }

        function calculateTotal() {
            const quantity = parseFloat(document.getElementById('quantity').value) || 0;
            const rate = parseFloat(document.getElementById('rate').value) || 0;
            const totalAmount = quantity * rate;
            document.getElementById('total_amount').value = totalAmount.toFixed(2);
        }

        toggleUserFieldLabel();
        calculateTotal();
        toggleAmountFieldLabel();
    </script>
</x-app-layout>