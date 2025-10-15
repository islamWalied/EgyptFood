<x-dashboard.front-layout>
    <x-slot:pageTitle>
        {{ __('people.details_title') }}
    </x-slot:pageTitle>

    <x-slot:breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('admin.people.index') }}">{{ __('people.title') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ __('people.details_title') }}</li>
    </x-slot:breadcrumb>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-2xl font-bold mb-4">{{ __('people.details_title') }}</h1>

                @if (isset($status) && isset($message))
                    <div class="mb-4 p-4 rounded {{ $status === 'success' ? 'bg-success text-white' : 'bg-danger text-white' }}">
                        {{ $message }}
                    </div>
                @endif

                <div class="max-w-md">
                    <p><strong>{{ __('people.name') }}:</strong> {{ $person->name }}</p>
                    <p><strong>{{ __('people.email') }}:</strong> {{ $person->email }}</p>
                    <p><strong>{{ __('people.department') }}:</strong> {{ $person->department ? $person->department->name : __('people.no_department') }}</p>
                    <div class="mt-4">
                        <a href="{{ route('admin.people.edit', $person->id) }}" class="btn btn-warning">{{ __('people.edit') }}</a>
                        <a href="{{ route('admin.people.index') }}" class="btn btn-secondary">{{ __('people.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard.front-layout>
