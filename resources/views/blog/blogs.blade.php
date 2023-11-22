<div class="flex flex-wrap px-4 m-auto justify-center">
    @foreach ($posts as $blog)
        <div style="width: 400px" class="m-4 bg-white border border-gray-200 rounded-lg  ">
            <a href="{{ route('home') . '/' . $blog->slug }}">
                <img class="rounded-t-lg" src="{{ asset('storage/' . $blog->featured) }}" alt="" />
            </a>
            <div class="p-5">
                <a href="{{ route('home') . '/' . $blog->slug }}">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $blog->title }}
                    </h5>
                    <div class="flex " style="justify-content: space-between;">
                        <p class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $blog->category->name }}</p>
                        <p>{{ $blog->humanized_created_at() }}</p>
                    </div>
                </a>

            </div>
        </div>
    @endforeach

</div>
<div class="m-4 flex justify-center">
    {{ $posts->links() }}
</div>
