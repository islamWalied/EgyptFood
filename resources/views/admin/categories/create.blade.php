<x-dashboard.front-layout>
    <x-slot:pageTitle>
        {{ __('categories.create_title') }}
    </x-slot:pageTitle>

    <x-slot:breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">{{ __('categories.title') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ __('categories.create_title') }}</li>
    </x-slot:breadcrumb>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-2xl font-bold mb-4">{{ __('categories.create_title') }}</h1>

                <!-- Display Validation Errors -->
                @if ($errors->has('error'))
                    <div class="mb-4 p-4 rounded bg-danger text-white">
                        {{ $errors->first('error') }}
                    </div>
                @endif

                <form action="{{ route('admin.categories.store') }}" method="POST" class="max-w-md" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="form-label">{{ __('categories.name') }}</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                        @error('name')
                        <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="image" class="form-label">{{ __('categories.image') }}</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @error('image')
                        <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="category_id" class="form-label">{{ __('categories.parent') }}</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">{{ __('categories.no_parent') }}</option>
                            @foreach ($categories as $parent)
                                <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('categories.create') }}</button>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">{{ __('categories.cancel') }}</a>
                </form>
            </div>
        </div>
    </div>
</x-dashboard.front-layout>
