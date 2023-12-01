<section class="container mx-auto bg-white py-8 lg:py-16 load_comment">
    <div class="m-3 p-3 sm:m-0 sm:p-0">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg lg:text-2xl font-bold text-gray-900 ">Discussion ({{ count($post->comment) }})</h2>
        </div>
        @auth
        <form class="mb-6" method="POST" id="CommentForm">
            @csrf
            <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 ">
                <label for="content" class="sr-only">Your comment</label>
                <textarea id="content" rows="6" name="content"
                    class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none  "
                    placeholder="Write a comment..." required></textarea>
            </div>
            <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" id="blog_id" name="blog_id" value="{{ $post->id }}">
            <button type="submit"
                class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ease-in duration-300">
                Post comment
            </button>
        </form>
        @endauth
        @guest
        <div class="flex items-center p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium"><a href="{{ route('login') }}">Login</a></span> to post a comment!
            </div>
        </div>
        @endguest
        @foreach ($post->comment as $comment)
        <article class="p-6 mt-3 text-base bg-white rounded-lg shadow">
            <footer class="flex justify-between items-center mb-2">
                <div class="flex items-center">
                    <p class="inline-flex items-center mr-3 text-lg text-gray-900  font-semibold"><img
                            class="mr-2 w-16 h-16 rounded-full"
                            src="{{ $comment->user->avatar ? asset('storage/' . $comment->user->avatar) : 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png' }}"
                            alt="Michael Gough">{{ $comment->user->name }}</p>
                    <p class="text-sm text-gray-600 "><time pubdate datetime="2022-02-08" title="February 8th, 2022">{{
                            $comment->formatted_created_at() }}</time></p>
                </div>
                <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500  bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 "
                    type="button">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 16 3">
                        <path
                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                    </svg>
                    <span class="sr-only">Comment settings</span>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownComment1" class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow ">
                    <ul class="py-1 text-sm text-gray-700 " aria-labelledby="dropdownMenuIconHorizontalButton">
                        <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 ">Edit</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 ">Remove</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 ">Report</a>
                        </li>
                    </ul>
                </div>
            </footer>
            <p class="text-gray-800 text-lg">{{ $comment->content }}</p>
        </article>
        @endforeach
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script>
    document.getElementById('CommentForm').addEventListener('submit', function (event) {
        event.preventDefault();
        let formData = new FormData(this);
        fetch('/comment', {
            method: 'POST',
            body: formData,
        }).then(response => response.json())
            .then(data => {
                console.log(data);
                if (data.success) {
                    document.getElementById('CommentForm').reset();
                    $('.load_comment').load(location.href + ' .load_comment');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });

    })
</script>