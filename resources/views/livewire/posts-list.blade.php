<div class=" px-3 lg:px-7 py-6">
    <div class="flex justify-between items-center border-b border-gray-100">
        <div class="text-gray-800 text-md font-bold">
            @if ($this->activeCategory || $search)
                <button wire:click="resetFilter()"
                    class="inline-flex items-center px-2 pb-1 rounded-md border-2 border-transparent text-xl font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 transition duration-150 ease-in-out">x</button>
            @endif
            @if ($this->activeCategory())
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
