<x-dashboard.front-layout>
    <x-slot:pageTitle>
        {{ __('categories.edit_title') }}
    </x-slot:pageTitle>

    <x-slot:breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">{{ __('categories.title') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ __('categories.edit_title') }}</li>
    </x-slot:breadcrumb>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-2xl font-bold mb-4">{{ __('categories.edit_title') }}</h1>

                <!-- Display Validation Errors -->
                @if ($errors->has('error'))
                    <div class="mb-4 p-4 rounded bg-danger text-white">
                        {{ $errors->first('error') }}
                    </div>
                @endif

                <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="max-w-md" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="name" class="form-label">{{ __('categories.name') }}</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" class="form-control" required>
                        @error('name')
                        <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="image" class="form-label">{{ __('categories.image') }}</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @if ($category->image)
                            <p class="small mt-2">{{ __('categories.current_image') }}: <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" style="max-width: 100px;"></p>
                        @endif
                        @error('image')
                        <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="category_id" class="form-label">{{ __('categories.parent') }}</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">{{ __('categories.no_parent') }}</option>
                            @foreach ($categories as $parent)
                                <option value="{{ $parent->id }}" {{ old('category_id', $category->category_id) == $parent->id ? 'selected' : '' }}>{{ $parent->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('categories.update') }}</button>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">{{ __('categories.cancel') }}</a>
                </form>
            </div>
        </div>
    </div>
</x-dashboard.front-layout>
