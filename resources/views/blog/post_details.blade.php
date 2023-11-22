@include('blog.header')
<style>
    h1 {
        font-size: 2rem;
        line-height: 2.5rem;
        font-weight: 800;
        color: #1f3446;

    }

    h2 {
        font-size: 1.5rem;
        line-height: 1.75rem;
        font-weight: 700;
        color: #1f3446;
    }

    h3 {
        font-size: 1.25rem;
        line-height: 1.5rem;
        font-weight: 700;
        color: #1f3446;
    }

    h4 {
        font-size: 1rem;
        line-height: 1.25rem;
        font-weight: 700;
        color: #1f3446;
    }

    h5 {
        font-size: 0.875rem;
        line-height: 1rem;
        font-weight: 700;
        color: #1f3446;
    }

    h6 {
        font-size: 0.75rem;
        line-height: 0.875rem;
        font-weight: 700;
        color: #1f3446;
    }

    p {
        margin-bottom: 0.75rem;

    }
</style>
<div class="container mx-auto flex flex-wrap py-6">
    <!-- Post Section -->
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">

        <article class="flex flex-col my-4">
            <!-- Article Image -->
            <div class="hover:cursor-pointer p-5">
                <img style="border-radius: 10px;" src="{{ asset('storage/' . $post->featured) }}" class="shadow-md">
            </div>
            <div class="bg-white flex flex-col justify-start p-6">
                <a href="{{ Route('home_categorized', $post->category->name) }}"
                    class="text-blue-700 text-sm font-bold uppercase pb-4"><i
                        class="fa fa-hashtag"></i>{{ $post->category->name }}</a>
                <a href="#"
                    class="text-4xl font-bold text-gray-800 hover:text-gray-700 pb-4">{{ $post->title }}</a>

                <div class="flex justify-start gap-5">
                    <p href="#" class="text-sm pb-8">
                        <a href="#" class="font-semibold hover:text-gray-800"><i class="fa fa-user"></i>
                            {{ $post->user->name }}</a>,
                        Published {{ $post->humanized_created_at() }}
                    </p>
                    <p><i class="fa fa-eye"></i> Views {{ $post->views }}</p>
                </div>

                {!! $post->content !!}
            </div>
        </article>



        <div
            class="w-full flex flex-col text-center md:text-left md:flex-row border rounded-lg  bg-white mt-10 mb-10 p-6">
            <div class="w-full md:w-1/5 flex justify-center md:justify-start pb-4">
                <img src="{{ asset('storage/' . $post->user->avatar) }}" class="rounded-full shadow h-32 w-32">
            </div>
            <div class="flex-1 flex flex-col justify-center md:justify-start">
                <p class="font-semibold text-2xl">{{ $post->user->name }}</p>
                <p class="pt-2">{{ $post->user->about }}</p>
                <div class="flex items-center justify-center md:justify-start text-2xl no-underline text-blue-800 pt-4">
                    <a class="" href="#">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a class="pl-4" href="#">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="pl-4" href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="pl-4" href="#">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </div>
        </div>

    </section>

    <!-- Sidebar Section -->
    <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

        <div class="w-full bg-white border rounded-lg flex flex-col my-4 p-6">
            <p class="text-xl font-semibold pb-5">About Us</p>
            <p class="pb-2">Our mission is to provide a user-friendly platform that empowers bloggers and writers to
                express themselves freely. </p>

        </div>

        <div class="w-full bg-white border rounded-lg flex flex-col my-4 p-6">
            <p class="text-xl font-semibold pb-5">Latest Posts</p>
            <div>
                @foreach ($latest_posts as $item)
                    <div
                        class="flex justify-between p-2 m-2 bg-white border-b-2 border-t-2 border-dashed rounded-lg md:flex-row md:max-w-xl hover:bg-gray-100 ">
                        <a href="{{ Route('home') . '/' . $item->slug }}"
                            class="mb-2 w-3/4 text-lg font-semibold tracking-tight text-gray-900 ">
                            {{ $item->title }}
                        </a>
                        <img width="100px" height="60px" class="w-1/4 object-contain"
                            src="{{ asset('storage') . '/' . $item->featured }}" alt="">
                    </div>
                @endforeach
            </div>
        </div>

    </aside>


</div>

@if (count($related_posts) > 0)
    <div class="container mx-auto p-5">
        <h4 class="text-2xl font-bold dark:text-white">Related Posts</h4>
        <div class="flex flex-wrap mt-3 gap-5">
            @foreach ($related_posts as $rpost)
                <div style="width: 400px" class=" bg-white border border-gray-200 rounded-lg shadow">
                    <a href="{{ route('home') . '/' . $rpost->slug }}">
                        <img class="rounded-t-lg" src="{{ asset('storage/' . $rpost->featured) }}" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="{{ route('home') . '/' . $rpost->slug }}">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $rpost->title }}
                            </h5>
                            <div class="flex " style="justify-content: space-between;">
                                <p class="text-blue-700 text-sm font-bold uppercase pb-4"><i
                                        class="fa fa-hashtag"></i>{{ $post->category->name }}
                                </p>
                                <p>{{ $rpost->humanized_created_at() }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
@include('blog.comment')
@include('blog.footer')
