<x-dashboard.front-layout>
    <x-slot:pageTitle>
        {{ __('products.details_title') }}
    </x-slot:pageTitle>

    <x-slot:breadcrumb>
        <li class="breadcrumb-product"><a href="{{ route('admin.products.index') }}">{{ __('products.title') }}</a></li>
        <li class="breadcrumb-product active" aria-current="page">{{ __('products.details_title') }}</li>
    </x-slot:breadcrumb>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-2xl font-bold mb-4">{{ __('products.details_title') }}</h1>

                <!-- Display Success/Error Messages -->
                @if (isset($status) && isset($message))
                    <div class="mb-4 p-4 rounded {{ $status === 'success' ? 'bg-success text-white' : 'bg-danger text-white' }}">
                        {{ $message }}
                    </div>
                @endif

                <div class="max-w-md">
                    <p><strong>{{ __('products.name') }}:</strong> {{ $product->name }}</p>
                    <p><strong>{{ __('products.image') }}:</strong>
                        @if ($product->image)
                            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" style="max-width: 200px;">
                        @else
                            {{ __('products.no_image') }}
                        @endif
                    </p>
                    <p><strong>{{ __('products.parent') }}:</strong> {{ $product->category ? $product->category?->name : __('products.no_parent') }}</p>
                    <div class="mt-4">
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning">{{ __('products.edit') }}</a>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">{{ __('products.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard.front-layout>
