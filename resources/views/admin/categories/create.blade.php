<x-dashboard.front-layout>
    <x-slot:pageTitle>
        {{ __('categories.create_title') }}
    </x-slot:pageTitle>

    <x-slot:breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">{{ __('categories.title') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ __('categories.create_title') }}</li>
    </x-slot:breadcrumb>

    <div class="container" >
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-2xl font-bold mb-4">{{ __('categories.create_title') }}</h1>

                <!-- Display Validation Errors -->
                @if ($errors->has('error'))
                    <div class="mb-4 p-4 rounded bg-danger text-white">
                        {{ $errors->first('error') }}
                    </div>
                @endif

                <form action="{{ route('admin.categories.store') }}" method="POST" class="max-w-md"
                    enctype="multipart/form-data">
                    @csrf

                    @include('admin.categories._form')

                    <a href="{{ route('admin.categories.index') }}"
                        class="btn btn-secondary">{{ __('categories.cancel') }}</a>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function previewImage(event) {
                const input = event.target;
                const preview = document.getElementById('preview');

                if (input.files && input.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    @endpush
</x-dashboard.front-layout>
