<div>
    <div id="items-container" class="{{ $containerClass }}">
        @foreach ($items as $item)
            @if ($itemView)
                @include($itemView, ['item' => $item] + $with)
            @else
                {{ $item }}
            @endif
        @endforeach
    </div>

    <div x-data="{
            observe() {
                let observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            @this.call('loadMore')
                        }
                    })
                }, { threshold: 0.5 })

                observer.observe(this.$el)
            }
        }" x-init="observe()" id="load-more-trigger" style="height: 10px;">
        {{-- This empty div acts as the trigger --}}
    </div>

    {{-- Loading indicator --}}
    <div wire:loading wire:target="loadMore" class="text-center p-4">
        {{ $loadingText }}
    </div>

    {{-- Message when all items are loaded --}}
    @if (!$items->hasMorePages())
        <div class="text-center p-4 text-gray-500">
            {{ $noMoreItemsText }}
        </div>
    @endif
</div> 