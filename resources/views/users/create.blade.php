<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl dark:text-white font-semibold">Create New User</h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf

                        <!-- First Name -->
                        <div class="mb-4">
                            <label for="first_name" class="block text-gray-700 dark:text-gray-300">First Name:</label>
                            <input type="text" name="first_name" id="first_name" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <!-- Last Name -->
                        <div class="mb-4">
                            <label for="last_name" class="block text-gray-700 dark:text-gray-300">Last Name:</label>
                            <input type="text" name="last_name" id="last_name" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 dark:text-gray-300">Email:</label>
                            <input type="email" name="email" id="email" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <!-- Phone Number -->
                        <div class="mb-4">
                            <label for="phone_number" class="block text-gray-700 dark:text-gray-300">Phone Number:</label>
                            <input type="text" name="phone_number" id="phone_number" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                        </div>

                        <!-- Role -->
                        <div class="mb-4">
                            <label for="role_id" class="block text-gray-700 dark:text-gray-300">Role:</label>
                            <select name="role_id" id="role_id" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- User Type -->
                        <div class="mb-4">
                            <label for="user_type_id" class="block text-gray-700 dark:text-gray-300">User Type:</label>
                            <select name="user_type_id" id="user_type_id" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                                @foreach($userTypes as $userType)
                                    <option value="{{ $userType->id }}">{{ $userType->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Checkbox to Add Login Credentials -->
                        <div class="mb-4">
                            <label for="add_credentials" class="inline-flex items-center text-gray-700 dark:text-gray-300">
                                <input type="checkbox" id="add_credentials" name="add_credentials" class="form-checkbox h-4 w-4 text-blue-500 dark:text-blue-400" onclick="toggleCredentials()">
                                <span class="ml-2">Add Username and Password?</span>
                            </label>
                        </div>

                        <!-- Username, Password, and Login Permission Fields -->
                        <div id="credentials_fields" class="hidden">
                            <!-- Username -->
                            <div class="mb-4">
                                <label for="username" class="block text-gray-700 dark:text-gray-300">Username:</label>
                                <input type="text" name="username" id="username" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                            </div>

                            <!-- Password -->
                            <div class="mb-4">
                                <label for="password" class="block text-gray-700 dark:text-gray-300">Password:</label>
                                <input type="password" name="password" id="password" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-4">
                                <label for="password_confirmation" class="block text-gray-700 dark:text-gray-300">Confirm Password:</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                            </div>

                            <!-- Allow Login Checkbox -->
                            <div class="mb-4">
                                <label for="allow_login" class="inline-flex items-center text-gray-700 dark:text-gray-300">
                                    <input type="checkbox" id="allow_login" name="allow_login" class="form-checkbox h-4 w-4 text-blue-500 dark:text-blue-400">
                                    <span class="ml-2">Allow User Login?</span>
                                </label>
                            </div>
                        </div>

                        <!-- Active Status -->
                        <div class="mb-4">
                            <label for="active_status" class="block text-gray-700 dark:text-gray-300">Status:</label>
                            <select name="active_status" id="active_status" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition duration-200">
                            Create User
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle visibility of Username and Password fields
        function toggleCredentials() {
            const credentialsFields = document.getElementById('credentials_fields');
            const addCredentialsCheckbox = document.getElementById('add_credentials');
            credentialsFields.style.display = addCredentialsCheckbox.checked ? 'block' : 'none';
        }
    </script>
</x-app-layout>
