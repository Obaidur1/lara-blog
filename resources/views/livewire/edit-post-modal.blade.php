<div class="p-5">

    <form wire:submit.prevent='updateBlog' enctype="multipart/form-data">
        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
            <div class="sm:col-span-2">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 ">Title</label>
                <input type="text" name="title" id="title" wire:model="blog.title"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                    placeholder="Blog Title" required="">
            </div>
            <div class="sm:col-span-2">
                <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 ">Slug</label>
                <input type="text" name="slug" id="slug"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                    placeholder="Blog Title" required="" wire:model='blog.slug'>
            </div>
            <div class="sm:col-span-2">
                <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 ">Category</label>

                <select
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    name="category_id" id="categories" wire:model='blog.category_id'>
                    @foreach ($this->categories as $category)
                        <option value="{{ $category->id }}">
                            {{ ucwords($category->name) }}</option>
                    @endforeach
                </select>
            </div>


            <div class="sm:col-span-2">
                <label for="content" class="block mb-2 text-sm font-medium text-gray-900 ">Content</label>
                <textarea id="content" name="content" rows="8"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 "
                    placeholder="Your description here" wire:model='blog.content'></textarea>
            </div>
            <div class="sm:col-span-2">
                <label for="featured" class="block mb-2 text-sm font-medium text-gray-900 ">Current Featured
                    Image</label>
                <img width="400px" class="rounded-lg" alt="" srcset="" wire:model='blog.featured'>
            </div>
            <div class="sm:col-span-2">
                <label for="featured" class="block mb-2 text-sm font-medium text-gray-900 ">Update Featured
                    Image</label>
                <input class="w-full p-2.5 cursor-pointer block border border-gray-300 bg-gray-50 rounded-lg"
                    name="featured" id="featured" type="file" wire:model='blog.featured'>
            </div>
        </div>
        <div class="flex justify-between space-x-4 py-5">
            <button type="submit"
                class="bg-indigo-700 text-white hover:bg-blue-800 focus:ring-4
            focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                Update User
            </button>
            <button type="button" wire:click="deleteBlog" wire:confirm="Are you sure you want to delete this Blog?"
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
