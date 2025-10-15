<x-dashboard.front-layout>
    <x-slot:pageTitle>
        {{ __('departments.title') }}
    </x-slot:pageTitle>

    <x-slot:breadcrumb>
        <li class="breadcrumb-item active" aria-current="page">{{ __('departments.title') }}</li>
    </x-slot:breadcrumb>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-2xl font-bold mb-4">{{ __('departments.title') }}</h1>

                <!-- Display Success/Error Messages -->
                @if (session('status') && session('message'))
                    <div
                        class="mb-4 p-4 rounded {{ session('status') === 'success' ? 'bg-success text-white' : 'bg-danger text-white' }}">
                        {{ session('message') }} ({{ __('departments.code') }}: {{ session('code') }})
                    </div>
                @endif

                <!-- Display Validation Errors -->
                @if ($errors->has('error'))
                    <div class="mb-4 p-4 rounded bg-danger text-white">
                        {{ $errors->first('error') }} ({{ __('departments.code') }}: {{ session('code') }})
                    </div>
                @endif

                <!-- Search and Create -->
                <div class="mb-4 d-flex justify-content-between align-items-center">
                    <form action="{{ route('admin.departments.index') }}" method="GET" class="d-flex gap-2">
                        <input type="text" name="query" value="{{ request('query') }}"
                               placeholder="{{ __('departments.search_placeholder') }}" class="form-control">
                        <button type="submit" class="btn btn-primary">{{ __('departments.search') }}</button>
                    </form>
                    <a href="{{ route('admin.departments.create') }}"
                       class="btn btn-success">{{ __('departments.add') }}</a>
                </div>

                <!-- Departments List -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                        <tr>
                            <th>{{ __('departments.name') }}</th>
                            <th>{{ __('departments.people_count') }}</th>
                            <th>{{ __('departments.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $department)
                            <tr>
                                <td>{{ $department->name }}</td>
                                <td>{{ $department->people ? $department->people->count() : 0 }}</td>
                                <td class="gap-2">
                                    <a href="{{ route('admin.departments.show', $department->id) }}"
                                       class="btn btn-sm btn-primary">{{ __('departments.view') }}</a>
                                    <a href="{{ route('admin.departments.edit', $department->id) }}"
                                       class="btn btn-sm btn-warning">{{ __('departments.edit') }}</a>
                                    <form class="d-inline"
                                          action="{{ route('admin.departments.destroy', $department->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('{{ __('departments.confirm_delete') }}')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-sm btn-danger">{{ __('departments.delete') }}</button>
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
                                {{ __('departments.total') }}: {{ $data->total() }} |
                                {{ __('departments.per_page') }}: {{ $data->perPage() }} |
                                {{ __('departments.current_page') }}: {{ $data->currentPage() }} /
                                {{ $data->lastPage() }}
                            </p>
                        </div>
                    </div>
                @else
                    <p class="mt-4 text-danger">{{ __('departments.no_departments_found') }}</p>
                @endif
            </div>
        </div>
    </div>
</x-dashboard.front-layout>
