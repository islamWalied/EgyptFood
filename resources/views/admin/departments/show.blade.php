<x-dashboard.front-layout>
    <x-slot:pageTitle>
        {{ __('departments.details_title') }}
    </x-slot:pageTitle>

    <x-slot:breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('admin.departments.index') }}">{{ __('departments.title') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ __('departments.details_title') }}</li>
    </x-slot:breadcrumb>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-2xl font-bold mb-4">{{ __('departments.details_title') }}</h1>

                <!-- Display Success/Error Messages -->
                @if (isset($status) && isset($message))
                    <div class="mb-4 p-4 rounded {{ $status === 'success' ? 'bg-success text-white' : 'bg-danger text-white' }}">
                        {{ $message }}
                    </div>
                @endif

                <div class="max-w-md">
                    <p><strong>{{ __('departments.name') }}:</strong> {{ $item->name }}</p>
                    <p><strong>{{ __('departments.people') }}:</strong>
                        @if ($item->people && $item->people->count() > 0)
                            <ul>
                                @foreach ($item->people as $person)
                                    <li>{{ $person->name }} ({{ $person->email }})</li>
                                @endforeach
                            </ul>
                        @else
                            {{ __('departments.no_people') }}
                        @endif
                    </p>
                    <div class="mt-4">
                        <a href="{{ route('admin.departments.edit', $item->id) }}" class="btn btn-warning">{{ __('departments.edit') }}</a>
                        <a href="{{ route('admin.departments.index') }}" class="btn btn-secondary">{{ __('departments.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard.front-layout>
