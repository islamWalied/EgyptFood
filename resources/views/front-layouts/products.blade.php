<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="keywords" content="مطعم, وجبات سريعة, قائمة طعام" />
  <meta name="description" content="مطعم فيان – أفضل الأطباق والوجبات السريعة" />
  <meta name="author" content="Feane" />
  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="">
  <title>Feane | فيان — {{ $category->name }}</title>

  <!-- CSS -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" />

  <style>
    body { text-align: right; }
    .navbar .navbar-nav .nav-link { padding-left:.75rem; padding-right:.75rem; }

    /* هيدر السكشن */
    .section-header { display:flex; align-items:center; justify-content:space-between; gap:12px; }
    .section-header h2 { margin:0; font-size:28px; }

    /* زر الرجوع */
    .back-home.btn1 {
      display:inline-block; padding:10px 18px; border-radius:8px;
      text-decoration:none; font-weight:600;
    }

    /* شبكة المنتجات بالـBootstrap عادي (من غير Isotope) */
    .product-card { margin-bottom:24px; }
    .product-card .box { height:100%; }
    .img-box img { width:100%; height:220px; object-fit:cover; display:block; }
    .detail-box { direction:rtl; text-align:center; padding:12px; }
  </style>
</head>
<body>

  <!-- الهيدر (انسخه من لياوتك لو عندك) -->
  <header class="header_section">
    <div class="container">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="{{ route('front.home') }}"><span>Feane | فيان</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
          <span class=""></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item"><a class="nav-link" href="{{ route('front.home') }}">الرئيسية</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('menu.html') }}">القائمة</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('about.html') }}">عن المطعم</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('book.html') }}">احجز طاولة</a></li>
          </ul>
        </div>
      </nav>
    </div>
  </header>

  <!-- سكشن المنتجات -->
  <section class="food_section layout_padding-bottom">
    <div class="container">
      <div class="section-header mb-4">
        <h2>{{ $category->name }}</h2>
        <a href="{{ route('front.home') }}" class="btn1 back-home" aria-label="الرجوع للرئيسية">الرجوع للرئيسية</a>
      </div>

      <div class="row">
        @forelse ($products as $product)
          @php
            $imgSrc = $product->image_url
              ?? (isset($product->image) ? asset('storage/'.$product->image) : asset('images/placeholder.jpg'));
          @endphp
          <div class="col-12 col-sm-6 col-lg-4 product-card">
            <div class="box">
              <div class="img-box">
                <img src="{{ $imgSrc }}" alt="{{ $product->name }}">
              </div>
              <div class="detail-box">
                <h5>{{ $product->name }}</h5>
                @if(!empty($product->description))
                  <p>{{ \Illuminate\Support\Str::limit($product->description, 120) }}</p>
                @endif

                    <div class="btn-box"><a href="#" class="btn1">المزيد</a></div>


                {{-- (اختياري) السعر وزر إضافة للسلة --}}
                {{-- @isset($product->price)
                  <div class="mt-2"><strong>{{ number_format($product->price,2) }}</strong> <small>ج.م</small></div>
                @endisset --}}
              </div>
            </div>
          </div>
        @empty
          <div class="col-12"><p class="text-center">لا توجد منتجات في هذا القسم حتى الآن.</p></div>
        @endforelse
      </div>
    </div>
  </section>

  <!-- الفوتر المختصر -->
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
</body>
</html>
