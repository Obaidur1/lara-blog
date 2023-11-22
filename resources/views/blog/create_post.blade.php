<x-app-layout>
    <section class="bg-white ">
        <div class=" px-8 mx-auto lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 ">Add a new blog</h2>
            <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 ">Title</label>
                        <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Blog Title" required="">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 ">Slug</label>
                        <input type="text" name="slug" id="slug" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Blog Title" required="">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 ">Category</label>
                        
                        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="category_id" id="categories">
                            <option selected>Choose a Category</option>
                            <option value="1">Technology</option>
                            <option value="2">Automotive</option>
                            <option value="3">Finance</option>
                            <option value="4">Politics</option>
                            <option value="5">Culture</option>
                            <option value="6">Sports</option>
                        </select>
                    </div>
                    
                    
                    <div class="sm:col-span-2">
                        <label for="content" class="block mb-2 text-sm font-medium text-gray-900 ">Content</label>
                        <textarea id="content" name="content" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 " placeholder="Your description here"></textarea>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="featured" class="block mb-2 text-sm font-medium text-gray-900 ">Featured Image</label>
                        <input class="w-full p-2.5 cursor-pointer block border border-gray-300 bg-gray-50 rounded-lg" name="featured" id="featured" type="file">
                    </div>
                </div>
                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-blue bg-blue-400 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Post Blog
                </button>
            </form>
        </div>
      </section>
      
</x-app-layout>