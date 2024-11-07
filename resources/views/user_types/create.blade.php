<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl dark:text-white font-semibold">{{ isset($userType) ? 'Edit' : 'Add New' }} User Type</h1>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="container mx-auto px-4 py-4">
                <div class="rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6">
                    <form action="{{ isset($userType) ? route('user_types.update', $userType) : route('user_types.store') }}" method="POST">
                        @csrf
                        @if(isset($userType))
                            @method('PUT')
                        @endif

                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 dark:text-gray-300">Name:</label>
                            <input type="text" name="name" value="{{ old('name', $userType->name ?? '') }}" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 dark:text-gray-300">Description:</label>
                            <textarea name="description" rows="3" class="form-control w-full mt-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-md shadow-sm">{{ old('description', $userType->description ?? '') }}</textarea>
                        </div>

                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 transition duration-200">
                            {{ isset($userType) ? 'Update' : 'Create' }} User Type
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
