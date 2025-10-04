<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">

                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                {{ $breadcrumb }}
                            </ol>
                        </nav>
                    </div>

                    {{--             call build by          --}}
                    @include('dashboard.__partial.body.extra')

                </div>
            </div>
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                {{ $slot }}
            </div>
        </div>
        {{--             call build by          --}}
        @include('dashboard.__partial.build_by')
    </div>
</div>
