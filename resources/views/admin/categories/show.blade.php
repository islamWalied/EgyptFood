<x-dashboard.front-layout>
    <x-slot:pageTitle>
        {{ __('categories.details_title') }}
    </x-slot:pageTitle>

    <x-slot:breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">{{ __('categories.title') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ __('categories.details_title') }}</li>
    </x-slot:breadcrumb>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-2xl font-bold mb-4">{{ __('categories.details_title') }}</h1>

                <!-- Display Success/Error Messages -->
                @if (isset($status) && isset($message))
                    <div class="mb-4 p-4 rounded {{ $status === 'success' ? 'bg-success text-white' : 'bg-danger text-white' }}">
                        {{ $message }}
                    </div>
                @endif

                <div class="max-w-md">
                    <p><strong>{{ __('categories.name') }}:</strong> {{ $item->name }}</p>
                    <p><strong>{{ __('categories.image') }}:</strong>
                        @if ($item->image)
                            <img src="{{ Storage::url($item->image) }}" alt="{{ $item->name }}" style="max-width: 200px;">
                        @else
                            {{ __('categories.no_image') }}
                        @endif
                    </p>
                    <p><strong>{{ __('categories.parent') }}:</strong> {{ $item->parent ? $item->parent->name : __('categories.no_parent') }}</p>
                    <div class="mt-4">
                        <a href="{{ route('admin.categories.edit', $item->id) }}" class="btn btn-warning">{{ __('categories.edit') }}</a>
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">{{ __('categories.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard.front-layout>
