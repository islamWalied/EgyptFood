<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="مطعم, وجبات سريعة, قائمة طعام" />
  <meta name="description" content="مطعم فيان – أفضل الأطباق والوجبات السريعة" />
  <meta name="author" content="Feane" />
  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="">
  <title>Feane | فيان</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" />
  <!-- font awesome style -->
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />

  <style>
    /* RTL عام */
    body { text-align: right; }
    .navbar .navbar-nav .nav-link { padding-left: .75rem; padding-right: .75rem; }

    /* ✅ الشبكة من اليمين للشمال */
    .grid { direction: rtl; position: relative; }

    /* لو بتستخدم .row مع Isotope, خلّيه display:block لتفادي تعارض الـflex */
    .row.grid { display: block; }

    /* أحجام الكروت (بديل الـcol- بدون تعارض) */
    .menu-item { width: 100%; }
    @media (min-width: 576px) { .menu-item { width: 50%; } }
    @media (min-width: 992px) { .menu-item { width: 33.333%; } }

    .menu-item .box { margin: 15px; }
    .menu-item .detail-box { direction: rtl; text-align: right; }
    .img-box img { width: 100%; height: 220px; object-fit: cover; display: block; }

    /* أزرار الفلاتر من اليمين لليسار */
    .filters_menu { direction: rtl; }
  </style>
</head>
<body>

  <div class="hero_area">
    <div class="bg-box">
      <img src="{{ asset('images/hero-bg.jpg') }}" alt="خلفية المطعم" data-fallback="1">
    </div>

    <!-- header section starts -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{ url('index.html') }}"><span>Feane | فيان</span></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class=""></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item active"><a class="nav-link" href="{{ url('index.html') }}">الرئيسية</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ url('menu.html') }}">القائمة</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ url('about.html') }}">عن المطعم</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ url('book.html') }}">احجز طاولة</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->

    <!-- slider section (كما هي) -->
    <section class="slider_section">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container"><div class="row"><div class="col-md-7 col-lg-6">
              <div class="detail-box">
                <h1>مطعم وجبات سريعة</h1>
                <p>نكهات لذيذة تُحضَّر بعناية وتُقدَّم بسرعة—جرّب أفضل البرجر والبيتزا والباستا الطازجة.</p>
              </div>
            </div></div></div></div>
          <div class="carousel-item">
            <div class="container"><div class="row"><div class="col-md-7 col-lg-6">
              <div class="detail-box"><h1>مكونات طازجة يوميًا</h1><p>نختار أجود المكونات لتحصل على تجربة لا تُنسى.</p></div>
            </div></div></div></div>
          <div class="carousel-item">
            <div class="container"><div class="row"><div class="col-md-7 col-lg-6">
              <div class="detail-box"><h1>توصيل سريع وحار</h1><p>وصّل أكلك المفضل لباب بيتك بسرعة مع الحفاظ على السخونة.</p></div>
            </div></div></div></div>
        </div>
        <div class="container">
          <ol class="carousel-indicators">
            <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
            <li data-target="#customCarousel1" data-slide-to="1"></li>
            <li data-target="#customCarousel1" data-slide-to="2"></li>
          </ol>
        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>

  <!-- food section -->
  <section class="food_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>الأقسام</h2>
        <h5 id="current-filter-title" class="mt-2">الكل</h5>
      </div>

      @php use Illuminate\Support\Str; @endphp

      <!-- FILTER BUTTONS: الآباء -->
      <ul class="filters_menu">
        <li class="active" data-filter="*">الكل</li>
        @foreach ($categories as $parent)
          <li data-filter=".parent-{{ Str::slug($parent->name) }}">{{ $parent->name }}</li>
        @endforeach
      </ul>

      <!-- GRID: الأبناء -->
      <div class="filters-content">
        <!-- ممكن تخليها <div class="grid"> من غير .row؛
             لو حابب تسيب .row، CSS فوق حلّ التعارض -->
        <div class="row grid">
          @forelse ($subcategories as $sub)
            @php
              $parentName  = optional($sub->parent)->name ?? 'بدون أب';
              $filterClass = 'parent-'.Str::slug($parentName);
            @endphp

            <div class="menu-item {{ $filterClass }}">
              <div class="box">
                <div class="img-box">
                  <img src="{{ $sub->image_url ?? asset('images/placeholder-cat.jpg') }}"
                       alt="{{ $sub->name }}" data-fallback="1">
                </div>
                <div class="detail-box">
                  <h5 style="text-align:center">{{ $sub->name }}</h5>
                  @if(!empty($sub->description))
                    <p style="text-align:center">{{ Str::limit($sub->description, 120) }}</p>
                  @endif

                  <div class="btn-box" style="text-align:center">
                    <!-- غيّر المسار حسب الراوت عندك -->
                    <a href="{{ route('categories.show', $sub->id) }}" class="btn1">المزيد</a>
                  </div>
                </div>
              </div>
            </div>
          @empty
            <div class="col-12"><p class="text-center">لا توجد أقسام فرعية حتى الآن.</p></div>
          @endforelse
        </div>
      </div>
    </div>
  </section>
  <!-- end food section -->

  <!-- footer section (مختصر) -->
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

  <!-- jQery -->
  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <!-- bootstrap js -->
  <script src="{{ asset('js/bootstrap.js') }}"></script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>

  <!-- Isotope init -->
  <script>
    $(function () {
      var $grid = $('.grid').isotope({
        itemSelector: '.menu-item',
        layoutMode: 'fitRows',
        originLeft: false,   // ✅ يبدأ الترتيب من اليمين
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
