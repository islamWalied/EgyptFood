<x-dashboard.front-layout>
    <x-slot:pageTitle>
        {{ __('products.details_title') }}
    </x-slot:pageTitle>

    <x-slot:breadcrumb>
        {{-- <li class="breadcrumb-product">
            <a href="{{ route('admin.products.index') }}">{{ __('products.title') }}</a>
        </li> --}}
        <li class="breadcrumb-product active" aria-current="page">
            {{ $product->name ?? '' }}
        </li>
    </x-slot:breadcrumb>

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                {{-- عنوان الصفحة --}}
                <h1 class="text-2xl font-bold mb-4">
                    {{ __('products.gallery_title') ?? __('products.details_title') }}
                </h1>

                {{-- رسائل نجاح/خطأ (لو عايز تسيبها) --}}
                @if (isset($status) && isset($message))
                    <div class="mb-4 p-4 rounded {{ $status === 'success' ? 'bg-success text-white' : 'bg-danger text-white' }}">
                        {{ $message }}
                    </div>
                @endif

                {{-- ====== قسم الجاليري فقط ====== --}}
                @php
                    $images = $product->images ?? collect(); // علاقة الصور: images()
                @endphp

                @if($images->count())
                    <ul class="row list-unstyled">
                        @foreach($images as $img)
                            @php
                                // جرّب أقصر طريق للـ URL، ولو مش موجودة استخدم Storage::url
                                $fullUrl  = $img->url ?? (\Illuminate\Support\Facades\Storage::url($img->path ?? ''));
                                $thumbUrl = $img->thumb_url ?? $fullUrl;
                            @endphp
                            <li class="col-lg-4 col-md-6 col-sm-12 mb-4">
                                <div class="card shadow-sm h-100">
                                    <a href="{{ $fullUrl }}"
                                       data-fancybox="product-{{ $product->id }}"
                                       data-caption="{{ $product->name }}">
                                        <img class="card-img-top"
                                             src="{{ $thumbUrl }}"
                                             alt="{{ $product->name }}"
                                             style="object-fit:cover;max-height:260px;">
                                    </a>
                                    <div class="card-body py-2 px-3 d-flex justify-content-between align-items-center">
                                        <small class="text-muted">
                                            {{ $img->created_at?->format('Y-m-d') }}
                                        </small>
                                        @if(($img->is_primary ?? false) === true)
                                            <span class="badge bg-primary">
                                                {{ __('products.primary_image') ?? 'Primary' }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="alert alert-info">
                        {{ __('products.no_images_in_gallery') ?? 'No images in gallery.' }}
                    </div>
                @endif
                {{-- ====== نهاية قسم الجاليري ====== --}}

                <div class="mt-3">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                        {{ __('products.back') }}
                    </a>
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning">
                        {{ __('products.edit') }}
                    </a>
                </div>

            </div>
        </div>
    </div>

    {{-- لو الـ layout بيدعم @stack --}}
    @push('styles')
        <link rel="stylesheet" href="{{ asset('src/plugins/fancybox/dist/jquery.fancybox.css') }}">
    @endpush

    @push('scripts')
        <script src="{{ asset('src/plugins/fancybox/dist/jquery.fancybox.js') }}"></script>
    @endpush
</x-dashboard.front-layout>
