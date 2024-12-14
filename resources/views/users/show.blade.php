<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl dark:text-white font-semibold">User Details for {{ $user->first_name }} {{ $user->last_name }}</h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6">
                    <form method="GET">
                        <div class="grid grid-cols-2 gap-4">
                            <!-- First Name -->
                            <div>
                                <label for="first_name" class="block text-gray-700 dark:text-gray-300">First Name:</label>
                                <input type="text" id="first_name" value="{{ $user->first_name }}" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" disabled>
                            </div>

                            <!-- Last Name -->
                            <div>
                                <label for="last_name" class="block text-gray-700 dark:text-gray-300">Last Name:</label>
                                <input type="text" id="last_name" value="{{ $user->last_name }}" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" disabled>
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-gray-700 dark:text-gray-300">Email:</label>
                                <input type="email" id="email" value="{{ $user->email }}" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" disabled>
                            </div>

                            <!-- Phone Number -->
                            <div>
                                <label for="phone_number" class="block text-gray-700 dark:text-gray-300">Phone Number:</label>
                                <input type="text" id="phone_number" value="{{ $user->phone_number ?? 'N/A' }}" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" disabled>
                            </div>

                            <!-- Role -->
                            <div>
                                <label for="role_id" class="block text-gray-700 dark:text-gray-300">Role:</label>
                                <input type="text" id="role_id" value="{{ $user->role->name ?? 'N/A' }}" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" disabled>
                            </div>

                            <!-- User Type -->
                            <div>
                                <label for="user_type_id" class="block text-gray-700 dark:text-gray-300">User Type:</label>
                                <input type="text" id="user_type_id" value="{{ $user->userType->name ?? 'N/A' }}" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" disabled>
                            </div>

                            <!-- Username -->
                            <div>
                                <label for="username" class="block text-gray-700 dark:text-gray-300">Username:</label>
                                <input type="text" id="username" value="{{ $user->username ?? 'N/A' }}" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" disabled>
                            </div>

                            <!-- Active Status -->
                            <div>
                                <label for="active_status" class="block text-gray-700 dark:text-gray-300">Status:</label>
                                <input type="text" id="active_status" value="{{ $user->active_status == 1 ? 'Active' : 'Inactive' }}" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" disabled>
                            </div>

                            <!-- Allow Login -->
                            <div>
                                <label for="allow_login" class="block text-gray-700 dark:text-gray-300">Allow Login?</label>
                                <input type="text" id="allow_login" value="{{ $user->allow_login ? 'Yes' : 'No' }}" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" disabled>
                            </div>
                        </div>
                        <!-- Cancel Button -->
                        <div class="mt-4">
                            <a href="{{ route('users.index') }}" class="px-4 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600 transition duration-200">Back to Users List</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
