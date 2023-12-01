@extends('admin.index')
@section('content')
    <div class="flex flex-wrap gap-10 justify-center">
        <div class="m-3 p-3 gap-5 bg-white w-64 rounded-lg shadow flex justify-evenly items-center">
            <div class="items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-16 h-16 bg-indigo-600 text-white p-3 rounded-lg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                </svg>
            </div>
            <div class="text-gray-800">
                <h1 class="text-5xl font-bold">{{ $user_count }}</h1>
                <h1 class="text-xl font-medium">Users</h1>
            </div>
        </div>
        <div class="flex gap-10">
            <div class="m-3 p-3 gap-5 bg-white w-64 rounded-lg shadow flex justify-evenly items-center">
                <div class="items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-16 h-16 bg-indigo-600 text-white p-3 rounded-lg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                </div>
                <div class="text-gray-800">
                    <h1 class="text-5xl font-bold">{{ $post_count }}</h1>
                    <h1 class="text-xl font-medium">Blogs</h1>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap gap-10">
            <div class="m-3 p-3 gap-5 bg-white w-64 rounded-lg shadow flex justify-evenly items-center">
                <div class="items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-16 h-16 bg-indigo-600 text-white p-3 rounded-lg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>
                </div>
                <div class="text-gray-800">
                    <h1 class="text-5xl font-bold">{{ $author_count }}</h1>
                    <h1 class="text-xl font-medium">Authors</h1>
                </div>
            </div>

        </div>
        <div class="flex flex-wrap gap-10">
            <div class="m-3 p-3 gap-5 bg-white w-64 rounded-lg shadow flex justify-evenly items-center">
                <div class="items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-16 h-16 bg-indigo-600 text-white p-3 rounded-lg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                    </svg>
                </div>
                <div class="text-gray-800">
                    <h1 class="text-5xl font-bold">{{ $view_count }}</h1>
                    <h1 class="text-xl font-medium">Views</h1>
                </div>
            </div>

        </div>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">

        </svg>

    </div>
@endsection
