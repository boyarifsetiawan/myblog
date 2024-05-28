@props(['post'])
<div>
    <div class=" col-span-4">
        <a href="#">
            <div>
                <img class="w-55 h-40 rounded-xl" src="{{ $post->getThumbnailImage() }}">
            </div>
        </a>
        <div class="mt-3">
            <div class="flex items-center mb-2">
                <a href="#"
                    class="bg-red-600
                    text-white
                    rounded-xl px-3 py-1 text-sm mr-3">
                    category
                </a>
                <p class="text-gray-500 text-sm">{{ $post->published_at }}</p>
            </div>
            <a href="#" class="text-xl font-bold text-gray-900">{{ $post->title }}</a>
        </div>

    </div>
</div>
