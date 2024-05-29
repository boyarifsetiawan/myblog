<x-app-layout>
    @section('hero')
        <div class="w-full text-center py-32">
            <h1 class="text-2xl md:text-3xl font-bold text-center lg:text-5xl text-gray-700">
                Welcome to <span class="text-yellow-500">&lt;YELO&gt;</span> <span class="text-gray-900"> News</span>
            </h1>
            <p class="text-gray-500 text-lg mt-1">Best Blog in the universe</p>
            <a class="px-3 py-2 text-lg text-white bg-gray-800 rounded mt-5 inline-block"
                href="http://127.0.0.1:8000/blog">Start
                Reading</a>
        </div>
    @endsection
    <main class="container mx-auto px-5 flex flex-grow">
        <div class="mb-10 w-full">
            <div class="mb-10">
                <h2 class="mt-16 mb-5 text-3xl text-yellow-500 font-bold">Featured Posts</h2>
                <div class="w-full">
                    <div class="grid grid-cols-4 gap-8 w-full">
                        @foreach ($featuredPost as $post)
                            <x-post.post-card :post="$post" />
                        @endforeach
                    </div>
                </div>
                <a class="mt-10 block text-center text-lg text-yellow-500 font-semibold"
                    href="http://127.0.0.1:8000/blog">More
                    Posts</a>
            </div>
            <hr>

            <h2 class="mt-10 mb-5 text-3xl text-yellow-500 font-bold">Latest Posts</h2>
            <div class="w-full mb-5">
                <div class="grid grid-cols-4 gap-8 gap-y-10 w-full">
                    @foreach ($latestPost as $post)
                        <x-post.post-card :post="$post" />
                    @endforeach
                </div>
            </div>
            <a class="mt-10 block text-center text-lg text-yellow-500 font-semibold"
                href="http://127.0.0.1:8000/blog">More
                Posts</a>
        </div>
    </main>
</x-app-layout>
