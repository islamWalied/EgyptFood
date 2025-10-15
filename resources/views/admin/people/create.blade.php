<x-dashboard.front-layout>
    <x-slot:pageTitle>
        {{ __('people.create_title') }}
    </x-slot:pageTitle>

    <x-slot:breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('admin.people.index') }}">{{ __('people.title') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ __('people.create_title') }}</li>
    </x-slot:breadcrumb>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-2xl font-bold mb-4">{{ __('people.create_title') }}</h1>

                <!-- Display Validation Errors -->
                @if ($errors->has('error'))
                    <div class="mb-4 p-4 rounded bg-danger text-white">
                        {{ $errors->first('error') }}
                    </div>
                @endif

                <form action="{{ route('admin.people.store') }}" method="POST" class="max-w-md">
                    @csrf

                    @include('admin.people._form')

                    <a href="{{ route('admin.people.index') }}"
                       class="btn btn-secondary">{{ __('people.cancel') }}</a>
                </form>
            </div>
        </div>
    </div>
</x-dashboard.front-layout>
