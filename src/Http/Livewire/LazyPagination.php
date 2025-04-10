<?php

namespace YourVendor\LazyPagination\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class LazyPagination extends Component
{
    use WithPagination;

    public $items;
    public $itemView;
    public $containerClass;
    public $loadingText = 'Loading more items...';
    public $noMoreItemsText = 'No more items to load';
    public $with = [];

    public function mount($items, $itemView = null, $containerClass = '', $loadingText = null, $noMoreItemsText = null, $with = [])
    {
        $this->items = $items;
        $this->itemView = $itemView;
        $this->containerClass = $containerClass;
        $this->loadingText = $loadingText ?? $this->loadingText;
        $this->noMoreItemsText = $noMoreItemsText ?? $this->noMoreItemsText;
        $this->with = $with;
    }

    public function loadMore()
    {
        if ($this->items->hasMorePages()) {
            $this->items = $this->items->concat($this->items->nextPageItems());
        }
    }

    public function render()
    {
        return view('lazy-pagination::lazy-load');
    }
} 