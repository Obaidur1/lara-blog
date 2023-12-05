<div class="p-5">
    <form wire:submit.prevent="update">
        <div class="grid gap-4 mb-4 sm:grid-cols-2">
            <div>

                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                <input type="text" name="name" id="name" wire:model="user.name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ">
            </div>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                <input type="email" name="email" id="email" wire:model="user.email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ">
            </div>
            <div>
                <label for="user_role" class="block mb-2 text-sm font-medium text-gray-900 ">Role</label>
                <select id="user_role" wire:model = "user.user_role"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">
                    <option selected="" disabled>Select an option</option>
                    <option value="user">User</option>
                    <option value="author">Author</option>
                    <option value="admin">Admin</option>

                </select>
            </div>
            <div class="sm:col-span-2">
                <label for="about" class="block mb-2 text-sm font-medium text-gray-900 ">About</label>
                <textarea id="about" rows="5" wire:model="user.about"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500"></textarea>
            </div>
        </div>
        <div class="flex justify-between space-x-4">
            <button type="submit"
                class="bg-indigo-700 text-white hover:bg-blue-800 focus:ring-4
            focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                Update User
            </button>
            <button type="button" wire:click="delete_user" wire:confirm="Are you sure you want to delete this user?"
                class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d=" M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0
            100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1
            1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                </svg>
                Delete
            </button>
        </div>
    </form>
</div>
