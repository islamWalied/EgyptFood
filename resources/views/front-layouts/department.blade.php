<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="مطعم, وجبات سريعة, أقسام, أشخاص" />
    <meta name="description" content="مطعم فيان – تعرف على أقسامنا وفريق العمل" />
    <meta name="author" content="Feane" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="">
    <title>Feane | فيان — الأقسام</title>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" />
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" />

    <style>
        body { text-align: right; }
        .navbar .navbar-nav .nav-link { padding-left: .75rem; padding-right: .75rem; }

        /* شبكة الأقسام من اليمين للشمال */
        .grid { direction: rtl; position: relative; }
        .row.grid { display: block; }

        /* أحجام الكروت */
        .department-item { width: 100%; }
        @media (min-width: 576px) { .department-item { width: 50%; } }
        @media (min-width: 992px) { .department-item { width: 33.333%; } }

        .department-item .box { margin: 15px; }
        .department-item .detail-box { direction: rtl; text-align: center; padding: 12px; }
        .img-box img { width: 100%; height: 220px; object-fit: cover; display: block; }

        /* أزرار الفلاتر */
        .filters_menu { direction: rtl; }
        .filters_menu li { cursor: pointer; padding: 8px 15px; display: inline-block; }
        .filters_menu li.active { color: #fff; background: #ffbe33; border-radius: 5px; }

        /* قائمة الأشخاص */
        .people-list { margin-top: 15px; }
        .people-item { padding: 10px; border-top: 1px solid #eee; }
        .people-item:last-child { border-bottom: 1px solid #eee; }
        .people-item p { margin: 0; font-size: 14px; }
    </style>
</head>
<body>

<!-- الهيدر -->
<header class="header_section bg-dark mb-5">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="{{ route('front.home') }}"><span>Feane | فيان</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class=""></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('front.home') }}">الرئيسية</a></li>
{{--                    <li class="nav-item"><a class="nav-link" href="{{ url('menu.html') }}">القائمة</a></li>--}}
{{--                    <li class="nav-item"><a class="nav-link" href="{{ url('about.html') }}">عن المطعم</a></li>--}}
{{--                    <li class="nav-item"><a class="nav-link" href="{{ url('book.html') }}">احجز طاولة</a></li>--}}
                    <li class="nav-item"><a class="nav-link" href="{{ route('department.contact') }}">تواصل معنا</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<!-- سكشن الأقسام -->
<section class="department_section layout_padding-bottom">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>الأقسام وأشخاصها</h2>
            <h5 id="current-filter-title" class="mt-2">الكل</h5>
        </div>

        <!-- أزرار الفلاتر -->
        <ul class="filters_menu">
            <li class="active" data-filter="*">الكل</li>
            @foreach ($departments as $department)
                <li data-filter=".department-{{ \Illuminate\Support\Str::slug($department->name) }}">{{ $department->name }}</li>
            @endforeach
        </ul>

        <!-- شبكة الأقسام -->
        <div class="filters-content">
            <div class="row grid">
                @forelse ($departments as $department)
                    @php
                        $filterClass = 'department-'.\Illuminate\Support\Str::slug($department->name);
                    @endphp
                    <div class="department-item {{ $filterClass }}">
                        <div class="box">
                            <div class="detail-box">
                                <h5>{{ $department->name }}</h5>
                                <div class="people-list">
                                    @forelse ($department->people as $person)
                                        <div class="people-item">
                                            <p><strong>{{ $person->name }}</strong> - {{ $person->email }}</p>
                                        </div>
                                    @empty
                                        <p>لا يوجد أشخاص في هذا القسم.</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12"><p class="text-center">لا توجد أقسام حتى الآن.</p></div>
                @endforelse
            </div>
        </div>
    </div>
</section>

<!-- الفوتر -->
<footer class="footer_section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 footer-col">
                <div class="footer_contact">
                    <h4>Contact Us</h4>
                    <div class="contact_link_box">
                        <a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i><span>Location</span></a>
                        <a href="#"><i class="fa fa-phone" aria-hidden="true"></i><span>Call +01 1234567890</span></a>
                        <a href="#"><i class="fa fa-envelope" aria-hidden="true"></i><span>demo@gmail.com</span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 footer-col">
                <div class="footer_detail">
                    <a href="#" class="footer-logo">Feane</a>
                    <p>Necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words.</p>
                    <div class="footer_social">
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 footer-col">
                <h4>Opening Hours</h4>
                <p>Everyday</p>
                <p>10.00 Am -10.00 Pm</p>
            </div>
        </div>
        <div class="footer-info">
            <p>
                &copy; <span id="displayYear"></span> All Rights Reserved By
                <a href="https://html.design/">Free Html Templates</a><br><br>
                &copy; <span id="displayYear"></span> Distributed By
                <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
            </p>
        </div>
    </div>
</footer>

<!-- JS -->
<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>

<!-- Isotope init -->
<script>
    $(function () {
        var $grid = $('.grid').isotope({
            itemSelector: '.department-item',
            layoutMode: 'fitRows',
            originLeft: false,   // يبدأ الترتيب من اليمين
            percentPosition: true
        });

        $('.filters_menu').on('click', 'li', function () {
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({ filter: filterValue });
            $('.filters_menu li').removeClass('active');
            $(this).addClass('active');
            $('#current-filter-title').text($(this).text().trim());
        });

        // صور بديلة لو حصل خطأ تحميل
        var fallbacks = [
            'https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?q=80&w=900&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1606756790138-261a1e3a3a2e?q=80&w=900&auto=format&fit=crop'
        ];
        $('img[data-fallback]').on('error', function(){
            if (!this.dataset._replaced) {
                this.src = fallbacks[Math.floor(Math.random()*fallbacks.length)];
                this.dataset._replaced = 1;
            }
        });
    });
</script>
</body>
</html>
