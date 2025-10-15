<x-dashboard.front-layout>
    <x-slot:pageTitle>
        {{ __('people.title') }}
    </x-slot:pageTitle>

    <x-slot:breadcrumb>
        <li class="breadcrumb-item active" aria-current="page">{{ __('people.title') }}</li>
    </x-slot:breadcrumb>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-2xl font-bold mb-4">{{ __('people.title') }}</h1>

                <!-- Display Success/Error Messages -->
                @if (session('status') && session('message'))
                    <div class="mb-4 p-4 rounded {{ session('status') === 'success' ? 'bg-success text-white' : 'bg-danger text-white' }}">
                        {{ session('message') }} ({{ __('people.code') }}: {{ session('code') }})
                    </div>
                @endif

                <!-- Display Validation Errors -->
                @if ($errors->has('error'))
                    <div class="mb-4 p-4 rounded bg-danger text-white">
                        {{ $errors->first('error') }} ({{ __('people.code') }}: {{ session('code') }})
                    </div>
                @endif

                <!-- Search and Create -->
                <div class="mb-4 d-flex justify-content-between align-items-center">
                    <form action="{{ route('admin.people.index') }}" method="GET" class="d-flex gap-2">
                        <input type="text" name="query" value="{{ request('query') }}" placeholder="{{ __('people.search_placeholder') }}" class="form-control">
                        <button type="submit" class="btn btn-primary">{{ __('people.search') }}</button>
                    </form>
                    <a href="{{ route('admin.people.create') }}" class="btn btn-success">{{ __('people.add') }}</a>
                </div>

                <!-- People List -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                        <tr>
                            <th>{{ __('people.name') }}</th>
                            <th>{{ __('people.email') }}</th>
                            <th>{{ __('people.department') }}</th>
                            <th>{{ __('people.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $person)
                            <tr>
                                <td>{{ $person->name }}</td>
                                <td>{{ $person->email }}</td>
                                <td>{{ $person->department ? $person->department->name : __('people.no_department') }}</td>
                                <td class="gap-2">
                                    <a href="{{ route('admin.people.show', $person->id) }}" class="btn btn-sm btn-primary">{{ __('people.view') }}</a>
                                    <a href="{{ route('admin.people.edit', $person->id) }}" class="btn btn-sm btn-warning">{{ __('people.edit') }}</a>
                                    <form class="d-inline" action="{{ route('admin.people.destroy', $person->id) }}" method="POST" onsubmit="return confirm('{{ __('people.confirm_delete') }}')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">{{ __('people.delete') }}</button>
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
                                {{ __('people.total') }}: {{ $data->total() }} |
                                {{ __('people.per_page') }}: {{ $data->perPage() }} |
                                {{ __('people.current_page') }}: {{ $data->currentPage() }} /
                                {{ $data->lastPage() }}
                            </p>
                        </div>
                    </div>
                @else
                    <p class="mt-4 text-danger">{{ __('people.no_people_found') }}</p>
                @endif
            </div>
        </div>
    </div>
</x-dashboard.front-layout>
