<x-app-layout>
    <article class="col-span-4 md:col-span-3 mx-auto pb-5 w-full" style="max-width:700px">
        <div class="w-full my-2 flex justify-center rounded-lg shadow-md">
            <img class="w-90 my-2 rounded-lg" src="{{ $post->getThumbnailImage() }}" alt="thumbnail"
                style="max-height: 350px">
        </div>
        <h1 class="text-4xl font-bold text-left text-gray-800">
            {{ $post->title }}
        </h1>
        <div class="mt-2 flex justify-between items-center">
            <div class="flex py-5 text-base items-center">
                <img class="w-10 h-10 rounded-full mr-3" src="{{ $post->author->profile_photo_url }}" alt="avatar">
                <span class="mr-1">{{ $post->author->name }} , </span>
                <span
                    class="text-gray-500 text-sm">{{ Str::macro('readDuration', function (...$body) {
                        $totalWords = str_word_count(implode(' ', $body));
                        $minutesToRead = round($totalWords / 200);
                    
                        return (int) max(1, $minutesToRead);
                    }) }}
                    {{ Str::readDuration($post->body) }} min read</span>
            </div>
            <div class="flex items-center">
                <span class="text-gray-500 mr-2">{{ $post->published_at->diffForHumans() }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.3"
                    stroke="currentColor" class="w-5 h-5 text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>

        <div
            class="article-actions-bar my-6 flex text-sm items-center justify-between border-t border-b border-gray-100 py-4 px-2">
            <div>
                <div class="flex items-center">

                    <div class="article-content py-3 text-gray-800 text-lg text-justify">
                        {!! $post->body !!}
                    </div>

                </div>
            </div>
        </div>
        <livewire:button-like :key="$post->id" :post="$post" />


        <div class="flex items-center space-x-4 mt-10">
            @foreach ($post->categories as $category)
                <x-badge wire:navigate href="{{ route('post.index', ['category' => $category->slug]) }}"
                    :textColor="$category->text_color" :bgColor="$category->bg_color">
                    {{ $category->title }}
                </x-badge>
            @endforeach
        </div>

        <livewire:comment :key="$post->id" :post="$post" />


    </article>
</x-app-layout>
