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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />

  <style>
    /* لمسات بسيطة لـ RTL */
    body { text-align: right; }
    .navbar .navbar-nav .nav-link { padding-left: .75rem; padding-right: .75rem; }
    .footer_section .footer-info p { direction: rtl; }

    /* ✅ المطلوب: اتجاه شبكة المنتجات من اليمين للشمال */
    .grid { direction: rtl; } /* تمشية العناصر من اليمين لليسار */

    /* نصوص العربي داخل الكارت تظل RTL */
    .menu-item .detail-box {
      direction: rtl;
      text-align: right;
    }
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
          <a class="navbar-brand" href="{{ url('index.html') }}">
            <span>Feane | فيان</span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="تبديل القائمة">
            <span class=""></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item active">
                <a class="nav-link" href="{{ url('index.html') }}">الرئيسية <span class="sr-only">(الحالي)</span></a>
              </li>
              <li class="nav-item"><a class="nav-link" href="{{ url('menu.html') }}">القائمة</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ url('about.html') }}">عن المطعم</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ url('book.html') }}">احجز طاولة</a></li>
            </ul>
            {{-- الخيارات (مخفية كما هي) --}}
            {{-- <div class="user_option">
              <a href="#" class="user_link"><i class="fa fa-user" aria-hidden="true"></i></a>
              <a class="cart_link" href="#"> ... </a>
              <form class="form-inline">
                <button class="btn my-2 my-sm-0 nav_search-btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </form>
              <a href="#" class="order_online">اطلب أونلاين</a>
            </div> --}}
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->

    <!-- slider section -->
    <section class="slider_section">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

          <div class="carousel-item active">
            <div class="container">
              <div class="row">
                <div class="col-md-7 col-lg-6">
                  <div class="detail-box">
                    <h1>مطعم وجبات سريعة</h1>
                    <p>نكهات لذيذة تُحضَّر بعناية وتُقدَّم بسرعة—جرّب أفضل البرجر والبيتزا والباستا الطازجة.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="container">
              <div class="row">
                <div class="col-md-7 col-lg-6">
                  <div class="detail-box">
                    <h1>مكونات طازجة يوميًا</h1>
                    <p>نختار أجود المكونات لتحصل على تجربة طعام لا تُنسى في كل مرة.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="container">
              <div class="row">
                <div class="col-md-7 col-lg-6">
                  <div class="detail-box">
                    <h1>توصيل سريع وحار</h1>
                    <p>وصّل أكلك المفضل لباب بيتك بسرعة مع الحفاظ على السخونة والطعم.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

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
        {{-- <h2>قائمتنا</h2> --}}
        {{-- <h5 id="current-   filter-title" class="mt-2">الكل</h5> --}}
      </div>

      @php use Illuminate\Support\Str; @endphp

      <!-- FILTER BUTTONS -->
      <ul class="filters_menu">
        <li class="active" data-filter="*">الكل</li>
        @foreach ($categories as $category)
          @php $catClass = 'cat-'.Str::slug($category->name); @endphp
          <li data-filter=".{{ $catClass }}">{{ $category->name }}</li>
        @endforeach
      </ul>

      <!-- PRODUCTS GRID -->
      <div class="filters-content">
        <div class="row grid">
          @foreach ($products as $product)
            @php
              $catName  = optional($product->category)->name ?? 'غير مصنّف';
              $catClass = 'cat-'.Str::slug($catName);
            @endphp

            <div class="col-sm-6 col-lg-4 menu-item {{ $catClass }}">
              <div class="box">
                <div>
                  <div class="img-box">
                    <img src="{{ $product->image_url }}"
                         alt="{{ $product->name }}"
                         data-fallback="1">
                  </div>
                  <div class="detail-box">
                    <h5 style="text-align: center">{{ $product->name }}</h5>
                    <p style="text-align: center">{{ Str::limit($product->description, 120) }}</p>
                  <div class="btn-box"><a href="#" class="btn1">المزيد</a></div>


                    {{-- <div class="options">
                      <h6>{{ number_format($product->price, 2) }} <small>ج.م</small></h6>
                      <a href="#" aria-label="أضِف إلى السلة">
                        <svg viewBox="0 0 456.029 456.029" aria-hidden="true">
                          <g><g><path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                           c29.184,0,53.248-23.552،53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z"/></g></g>
                          <g><g><path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                           C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048،5.12،4.608l31.744,216.064
                           c4.096,27.136،27.648،47.616،55.296،47.616h212.992c26.624،0،49.664-18.944،55.296-45.056l33.28-166.4
                           C457.728,97.71,450.56,86.958،439.296,84.91z"/></g></g>
                          <g><g><path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                           c1.024,28.16،24.064،50.688،52.224،50.688h1.024C193.536,443.31،216.576،418.734،215.04،389.55z"/></g></g>
                        </svg>
                      </a>
                    </div> --}}
                  </div>
                </div>
              </div>
            </div>

          @endforeach
        </div>
      </div>

      {{-- <div class="btn-box"><a href="#">المزيد</a></div> --}}
    </div>
  </section>
  <!-- end food section -->

  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <div class="row">
        <div class="col-md-4 footer-col">
          <div class="footer_contact">
            <h4>تواصل معنا</h4>
            <div class="contact_link_box">
              <a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i><span>الموقع</span></a>
              <a href="#"><i class="fa fa-phone" aria-hidden="true"></i><span>اتصل: +01 1234567890</span></a>
              <a href="#"><i class="fa fa-envelope" aria-hidden="true"></i><span>demo@gmail.com</span></a>
            </div>
          </div>
        </div>

        <div class="col-md-4 footer-col">
          <div class="footer_detail">
            <a href="#" class="footer-logo">Feane | فيان</a>
            <p>نقدّم لك تجربة طعام مميزة مع تشكيلة واسعة من الأطباق الشهية والمكونات الطازجة.</p>
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
          <h4>ساعات العمل</h4>
          <p>طوال أيام الأسبوع</p>
          <p>10:00 صباحًا — 10:00 مساءً</p>
        </div>
      </div>

      <div class="footer-info">
        <p>
          &copy; <span id="displayYear"></span> جميع الحقوق محفوظة
          <a href="https://html.design/">Free Html Templates</a><br><br>
          &copy; <span id="displayYear"></span> التوزيع بواسطة
          <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
        </p>
      </div>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
          integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksدQRVvoxMfooAo" crossorigin="anonymous"></script>
  <!-- bootstrap js -->
  <script src="{{ asset('js/bootstrap.js') }}"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>

  <!-- custom js -->
  <script src="{{ asset('js/custom.js') }}"></script>

  <!-- Isotope init -->
  <script>
    $(function () {
      var $grid = $('.grid').isotope({
        itemSelector: '.menu-item',
        layoutMode: 'fitRows',
        originLeft: false // ✅ الآن الترتيب يبدأ من اليمين للشمال
      });

      $('.filters_menu').on('click', 'li', function () {
        var filterValue = $(this).attr('data-filter'); // "*" أو ".cat-..."
        $grid.isotope({ filter: filterValue });
        $('.filters_menu li').removeClass('active');
        $(this).addClass('active');
        $('#current-filter-title').text($(this).text().trim());
      });

      /* صور أكل احتياطية في حال فشل تحميل الأصلية (اختياري) */
      var fallbacks = [
        'https://images.unsplash.com/photo-1604908177079-4f7219481e6b?q=80&w=1200&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?q=80&w=1200&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1606756790138-261a1e3a3a2e?q=80&w=1200&auto=format&fit=crop'
      ];
      function pickFallback() { return fallbacks[Math.floor(Math.random() * fallbacks.length)]; }
      $('img[data-fallback]').on('error', function(){
        if (!this.dataset._replaced) {
          this.src = pickFallback();
          this.dataset._replaced = 1;
        }
      });
    });
  </script>

  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
  <!-- End Google Map -->
</body>
</html>
