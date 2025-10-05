<x-dashboard.front-layout>
    <x-slot:pageTitle>
        {{ __('categories.title') }}
    </x-slot:pageTitle>

    <x-slot:breadcrumb>
        <li class="breadcrumb-item active" aria-current="page">{{ __('categories.title') }}</li>
    </x-slot:breadcrumb>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-2xl font-bold mb-4">{{ __('categories.title') }}</h1>

                <!-- Display Success/Error Messages -->
                @if (session('status') && session('message'))
                    <div class="mb-4 p-4 rounded {{ session('status') === 'success' ? 'bg-success text-white' : 'bg-danger text-white' }}">
                        {{ session('message') }} ({{ __('categories.code') }}: {{ session('code') }})
                    </div>
                @endif

                <!-- Display Validation Errors -->
                @if ($errors->has('error'))
                    <div class="mb-4 p-4 rounded bg-danger text-white">
                        {{ $errors->first('error') }} ({{ __('categories.code') }}: {{ session('code') }})
                    </div>
                @endif

                <!-- Search and Create -->
                <div class="mb-4 d-flex justify-content-between align-items-center">
                    <form action="{{ route('admin.categories.index') }}" method="GET" class="d-flex gap-2">
                        <input type="text" name="query" value="{{ request('query') }}" placeholder="{{ __('categories.search_placeholder') }}" class="form-control">
                        <button type="submit" class="btn btn-primary">{{ __('categories.search') }}</button>
                    </form>
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-success">{{ __('categories.add') }}</a>
                </div>

                <!-- Categories List -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                        <tr>
                            <th>{{ __('categories.name') }}</th>
                            <th>{{ __('categories.image') }}</th>
                            <th>{{ __('categories.parent') }}</th>
                            <th>{{ __('categories.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>
                                    @if ($category->image)
                                        <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" style="max-width: 100px;">
                                    @else
                                        {{ __('categories.no_image') }}
                                    @endif
                                </td>
                                <td>{{ $category->parent ? $category->parent->name : __('categories.no_parent') }}</td>
                                <td class="gap-2">
                                    <a href="{{ route('admin.categories.show', $category->id) }}" class="btn btn-sm btn-primary">View</a>
                                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form class="d-inline" action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('{{ __('categories.confirm_delete') }}')">
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
                @if (isset($data) && $data instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    <div class="mt-4">
                        <div class="d-flex justify-content-between align-items-center">
                            {{ $data->withQueryString()->links() }}
                            <p class="mb-0">
                                {{ __('categories.total') }}: {{ $data->total() }} |
                                {{ __('categories.per_page') }}: {{ $data->perPage() }} |
                                {{ __('categories.current_page') }}: {{ $data->currentPage() }} /
                                {{ $data->lastPage() }}
                            </p>
                        </div>
                    </div>
                @else
                    <p class="mt-4 text-danger">No categories found or pagination data is invalid.</p>
                @endif
            </div>
        </div>
    </div>
</x-dashboard.front-layout>
