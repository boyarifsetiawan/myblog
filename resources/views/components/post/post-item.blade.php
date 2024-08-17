@props(['post'])
<article class="[&:not(:last-child)]:border-b border-gray-100 pb-10">
    <div class="article-body grid grid-cols-12 gap-3 mt-5 items-start">
        <div class="article-thumbnail col-span-4 flex items-center">
            <a wire:navigate href="{{ route('post.show', $post->slug) }}">
                <img class="mx-auto rounded-xl" src="{{ $post->getThumbnailImage() }}" alt="thumbnail">
            </a>
        </div>
        <div class="col-span-8">
            <div class="article-meta flex py-1 text-sm items-center">
                <img class="w-7 h-7 rounded-full mr-3" src="{{ $post->author->profile_photo_url }}" alt="avatar">
                <span class="mr-1 text-xs">{{ $post->author->name }}</span>
                <span class="text-gray-500 text-xs">. {{ $post->published_at->diffForHumans() }}</span>
            </div>
            <h2 class="text-xl font-bold text-gray-900">
                <a wire:navigate href="{{ route('post.show', $post->slug) }}">
                    {{ $post->title }}
                </a>
            </h2>

            <p class="mt-2 text-base text-gray-700 font-light">
                {!! $post->body !!}
            </p>
            <div class="article-actions-bar mt-6 flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="flex gap-2">
                        @foreach ($post->categories as $category)
                            <x-badge wire:navigate href="{{ route('post.index', ['category' => $category->slug]) }}"
                                :textColor="$category->text_color" :bgColor="$category->bg_color">
                                {{ $category->title }}
                            </x-badge>
                        @endforeach
                    </div>
                    <span
                        class="text-gray-500 text-sm">{{ Str::macro('readDuration', function (...$body) {
                            $totalWords = str_word_count(implode(' ', $body));
                            $minutesToRead = round($totalWords / 200);
                        
                            return (int) max(1, $minutesToRead);
                        }) }}
                        {{ Str::readDuration($post->body) }} min read</span>
                </div>
                <div>
                    <livewire:button-like :key="$post->id" :post="$post" />
                </div>
            </div>
        </div>
    </div>
</article>
