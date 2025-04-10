# Laravel Lazy Pagination

A simple and efficient lazy loading pagination component for Laravel applications.

## Features

- Infinite scrolling with Intersection Observer
- Customizable loading indicators
- Easy to integrate with existing Laravel applications
- Lightweight and performant

## Installation

```bash
composer require your-vendor/lazy-pagination
```

## Usage

1. Publish the views:
```bash
php artisan vendor:publish --tag=lazy-pagination-views
```

2. Include the component in your blade view:
```php
@livewire('lazy-pagination', [
    'items' => $yourPaginatedItems,
    'itemView' => 'path.to.your.item.view',
    'containerClass' => 'your-container-class',
    'loadingText' => 'Loading more items...',
    'noMoreItemsText' => 'No more items to load'
])
```

## Configuration

You can customize the following parameters:

- `items`: The paginated items collection
- `itemView`: Path to the blade view for individual items
- `containerClass`: CSS class for the items container
- `loadingText`: Text to show while loading more items
- `noMoreItemsText`: Text to show when all items are loaded

## License

MIT 