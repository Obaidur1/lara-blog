<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            @if (count($posts) > 0)
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Your Blogs
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Views
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Published
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $blog)
                            <tr class="odd:bg-white  even:bg-gray-50  border-b ">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    <a href="{{ Route('home') . '/' . $blog->slug }}">{{ $blog->title }}</a>
                                </th>
                                <td class="px-6 py-4">
                                    {{ $blog->views }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ ucwords($blog->category->name) }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $blog->humanized_created_at() }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ Route('blog.edit', $blog->id) }}"
                                        class="font-medium text-blue-600  hover:underline">Edit</a>
                                    <a href="{{ Route('blog.delete', $blog->id) }}" class="text-red-600"
                                        onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>
                                </td>
                            </tr>
                        @endforeach



                    </tbody>
                </table>
                <div class="m-3">
                    {{ $posts->links() }}</div>
            @else
                <p>No posts yet!</p>
            @endif

        </div>

    </div>
</div>
