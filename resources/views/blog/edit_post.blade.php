<x-app-layout>
    <section class="bg-white ">
        <div class=" px-8 mx-auto lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 ">Edit post</h2>
            @error('title')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            <form id="update_post" action="{{ Route('blog.update', $post->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 ">Title</label>
                        <input type="text" name="title" id="title" value="{{ $post->title }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                            placeholder="Blog Title" required="">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 ">Slug</label>
                        <input type="text" name="slug" id="slug"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="Blog Title" required="" value="{{ $post->slug }}">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 ">Category</label>

                        <select
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            name="category_id" id="categories">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if ($category->id == $post->category->id) selected @endif>
                                    {{ ucwords($category->name) }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="sm:col-span-2">
                        <label for="content" class="block mb-2 text-sm font-medium text-gray-900 ">Content</label>
                        <textarea id="content" name="content" rows="8"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 "
                            placeholder="Your description here">{{ $post->content }}</textarea>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="featured" class="block mb-2 text-sm font-medium text-gray-900 ">Current Featured
                            Image</label>
                        <img width="400px" class="rounded-lg" src="{{ asset('storage') . '/' . $post->featured }}"
                            alt="" srcset="">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="featured" class="block mb-2 text-sm font-medium text-gray-900 ">Update Featured
                            Image</label>
                        <input class="w-full p-2.5 cursor-pointer block border border-gray-300 bg-gray-50 rounded-lg"
                            name="featured" id="featured" type="file">
                    </div>
                </div>
                <button type="submit" form="update_post"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-blue bg-blue-400 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Update Blog
                </button>
            </form>
        </div>
    </section>

</x-app-layout>
