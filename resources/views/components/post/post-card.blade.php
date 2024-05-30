@props(['post'])
<div>
    <div class=" col-span-4">
        <a wire:navigate href="{{ route('post.show', $post->slug) }}">
            <div>
                <img class="w-55 h-40 rounded-xl" src="{{ $post->getThumbnailImage() }}">
            </div>
        </a>
        <div class="mt-3">
            <div class="flex items-center mb-2 gap-2">
                @foreach ($post->categories as $category)
                    <x-badge wire:navigate href="{{ route('post.index', ['category' => $category->slug]) }}"
                        :textColor="$category->text_color" :bgColor="$category->bg_color">
                        {{ $category->title }}
                    </x-badge>
                @endforeach
                <p class="mx-auto text-gray-500 text-sm">{{ $post->published_at->diffForHumans() }}</p>
            </div>
            <a wire:navigate href="{{ route('post.show', $post->slug) }}"
                class="text-xl font-bold text-gray-900">{{ $post->title }}</a>
        </div>

    </div>
</div>
