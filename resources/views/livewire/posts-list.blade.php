<div class=" px-3 lg:px-7 py-6">
    <div class="flex justify-between items-center border-b border-gray-100">
        <div class="text-gray-800 text-md font-bold">
            @if ($this->activeCategory || $search)
                <button wire:click="resetFilter()" class="mx-5 px-2 border-b-2 border-2 hover:border-b-4">x</button>
            @endif
            @if ($this->activeCategory())
                All Posts From :
                <x-badge wire:navigate href="{{ route('post.index', ['category' => $this->activeCategory->slug]) }}"
                    :textColor="$this->activeCategory->text_color" :bgColor="$this->activeCategory->bg_color">
                    {{ $this->activeCategory->title }}
                </x-badge>
            @endif
            @if ($search)
                Containing {{ $search }}
            @endif
        </div>
        <div class="flex items-center space-x-4 font-light ">
            <button class="{{ $this->sort === 'desc' ? 'border-b-2 border-gray-900' : '' }} text-gray-500 py-2"
                wire:click="setSort('desc')">Latest</button>
            <button class="{{ $this->sort === 'asc' ? 'border-b-2 border-gray-900' : '' }} text-gray-900 py-2"
                wire:click="setSort('asc')">Oldest</button>
        </div>
    </div>
    <div class="py-4">
        @foreach ($this->posts as $post)
            <x-post.post-item :post="$post" />
        @endforeach
    </div>
    <div class="py-3">
        {{ $this->posts->onEachSide(1)->links() }}
    </div>
</div>
