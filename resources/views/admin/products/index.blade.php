<x-dashboard.front-layout>
    <x-slot:pageTitle>
        {{ __('products.title') }}
    </x-slot:pageTitle>

    <x-slot:breadcrumb>
        <li class="breadcrumb-item active" aria-current="page">{{ __('products.title') }}</li>
    </x-slot:breadcrumb>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-2xl font-bold mb-4">{{ __('products.title') }}</h1>

                <!-- Display Success/Error Messages -->
                @if (session('status') && session('message'))
                    <div class="mb-4 p-4 rounded {{ session('status') === 'success' ? 'bg-success text-white' : 'bg-danger text-white' }}">
                        {{ session('message') }} ({{ __('products.code') }}: {{ session('code') }})
                    </div>
                @endif

                <!-- Display Validation Errors -->
                @if ($errors->has('error'))
                    <div class="mb-4 p-4 rounded bg-danger text-white">
                        {{ $errors->first('error') }} ({{ __('products.code') }}: {{ session('code') }})
                    </div>
                @endif

                <!-- Search and Create -->
                <div class="mb-4 d-flex justify-content-between align-items-center">
                    <form action="{{ route('admin.products.index') }}" method="GET" class="d-flex gap-2">
                        <input type="text" name="query" value="{{ request('query') }}" placeholder="{{ __('products.search_placeholder') }}" class="form-control">
                        <button type="submit" class="btn btn-primary">{{ __('products.search') }}</button>
                    </form>
                    <a href="{{ route('admin.products.create') }}" class="btn btn-success">{{ __('products.add') }}</a>
                </div>

                <!-- products List -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                        <tr>
                            <th>{{ __('products.name') }}</th>
                            <th>{{ __('products.image') }}</th>
                            <th>{{ __('products.parent') }}</th>
                            <th>{{ __('products.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>
                                    @if ($product->image)
                                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" style="max-width: 100px;">
                                    @else
                                        {{ __('products.no_image') }}
                                    @endif
                                </td>
                                <td>{{ $product->category ? $product->category?->name : __('products.no_parent') }}</td>
                                <td class="gap-2">
                                    <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-sm btn-primary">View</a>
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form class="d-inline" action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('{{ __('products.confirm_delete') }}')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if (isset($products) && $products instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    <div class="mt-4">
                        <div class="d-flex justify-content-between align-items-center">
                            {{ $products->withQueryString()->links() }}
                            <p class="mb-0">
                                {{ __('products.total') }}: {{ $products->total() }} |
                                {{ __('products.per_page') }}: {{ $products->perPage() }} |
                                {{ __('products.current_page') }}: {{ $products->currentPage() }} /
                                {{ $products->lastPage() }}
                            </p>
                        </div>
                    </div>
                @else
                    <p class="mt-4 text-danger">No products found or pagination products is invalid.</p>
                @endif
            </div>
        </div>
    </div>
</x-dashboard.front-layout>
