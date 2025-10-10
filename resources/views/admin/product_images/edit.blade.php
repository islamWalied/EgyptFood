<x-dashboard.front-layout>
    <x-slot:pageTitle>
        {{ __('products.images.title') }}
    </x-slot:pageTitle>

    <x-slot:breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('admin.product-images.index') }}">{{ __('products.images.title') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ __('products.images.edit_title') }}</li>
    </x-slot:breadcrumb>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-2xl font-bold mb-4">{{ __('products.images.edit_title') }}</h1>

                <!-- Display Validation Errors -->
                @if ($errors->has('error'))
                    <div class="mb-4 p-4 rounded bg-danger text-white">
                        {{ $errors->first('error') }}
                    </div>
                @endif

                <form action="{{ route('admin.product-images.update', $product->id) }}" method="POST" class="max-w-md"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @include('admin.product_images._form', ['button_label' => __('products.images.update')])

                    <a href="{{ route('admin.product-images.index') }}"
                        class="btn btn-secondary">{{ __('products.images.cancel') }}</a>
                </form>
            </div>
        </div>
    </div>




</x-dashboard.front-layout>
