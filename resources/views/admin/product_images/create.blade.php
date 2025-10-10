<x-dashboard.front-layout>
    <x-slot:pageTitle>
        {{ __('product_images.create_title') }}
    </x-slot:pageTitle>

    <x-slot:breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('admin.product-images.index') }}">{{ __('product_images.title') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ __('product_images.create_title') }}</li>
    </x-slot:breadcrumb>

    <div class="container" >
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-2xl font-bold mb-4">{{ __('product_images.create_title') }}</h1>

                <!-- Display Validation Errors -->
                @if ($errors->has('error'))
                    <div class="mb-4 p-4 rounded bg-danger text-white">
                        {{ $errors->first('error') }}
                    </div>
                @endif

                <form action="{{ route('admin.product-images.store') }}" method="POST" class="max-w-md"
                    enctype="multipart/form-data">
                    @csrf
                    {{-- <div class="mb-4">
    <x-form.select name="product_id" :label="__('products.parent')" :options="$products" :selected="$product_image->product_id"
        first_option="-- Choose product --" />
</div> --}}

                    @include('admin.product_images._form')


                    <a href="{{ route('admin.product-images.index') }}"
                        class="btn btn-secondary">{{ __('product_images.cancel') }}</a>
                </form>
            </div>
        </div>
    </div>



</x-dashboard.front-layout>
