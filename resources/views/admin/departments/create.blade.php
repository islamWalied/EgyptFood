<x-dashboard.front-layout>
    <x-slot:pageTitle>
        {{ __('departments.create_title') }}
    </x-slot:pageTitle>

    <x-slot:breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('admin.departments.index') }}">{{ __('departments.title') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ __('departments.create_title') }}</li>
    </x-slot:breadcrumb>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-2xl font-bold mb-4">{{ __('departments.create_title') }}</h1>

                <!-- Display Validation Errors -->
                @if ($errors->has('error'))
                    <div class="mb-4 p-4 rounded bg-danger text-white">
                        {{ $errors->first('error') }}
                    </div>
                @endif

                <form action="{{ route('admin.departments.store') }}" method="POST" class="max-w-md">
                    @csrf

                    @include('admin.departments._form')

                    <a href="{{ route('admin.departments.index') }}"
                        class="btn btn-secondary">{{ __('departments.cancel') }}</a>
                </form>
            </div>
        </div>
    </div>
</x-dashboard.front-layout>
