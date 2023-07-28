<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  {{-- <link href="/assets/img/icon.png" rel="icon"> --}}
  <link href="/assets/img/icon1.jpeg" rel="icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Variables CSS Files. Uncomment your preferred color scheme -->
  <link href="/assets/css/variables.css" rel="stylesheet">
  <!-- <link href="/assets/css/variables-blue.css" rel="stylesheet"> -->
  <!-- <link href="/assets/css/variables-green.css" rel="stylesheet"> -->
  <!-- <link href="/assets/css/variables-orange.css" rel="stylesheet"> -->
  <!-- <link href="/assets/css/variables-purple.css" rel="stylesheet"> -->
  <!-- <link href="/assets/css/variables-red.css" rel="stylesheet"> -->
  <!-- <link href="/assets/css/variables-pink.css" rel="stylesheet"> -->

  <!-- Template Main CSS File -->
  <link href="/assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: HeroBiz
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/herobiz-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<style>
    .header .my-btn{
        border: none;
        font-size: 0.85rem;
        color: var(--color-primary);
        background: var(--color-white);
        padding: 8px 23px;
        border-radius: 4px;
        border: 2px solid var(--color-primary);
        transition: 0.3s;
        font-family: var(--font-secondary);
    }
    .header .my-btn,
    .header .my-btn:focus{
        color: var(--color-primary);
        background: var(--color-white);
        padding: 8px 23px;
        border-radius: 4px;
        transition: 0.3s;
        font-family: var(--font-secondary);
    }
    .header .my-btn,
    .header .my-btn:hover{
        color: rgba(var(--color-primary-rgb), 0.85);
        background: var(--color-white);
    }
    @media (max-width: 1279px) {
        .header .my-btn,
        .header .my-btn:focus {
        margin-right: 50px;
    }
    @media (max-width: 1279px) {
        .header .my-btn,
        .header .my-btn:focus {
        margin-right: 50px;
        }
    }
}
</style>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center scrollto me-auto me-lg-0" style="margin-left: 1rem">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="/assets/img/icon1.jpeg" alt="" style="height: 85px;">
        <h1 style="margin-left: 0.5rem; padding-top: 0.5rem">TMT<span>.</span></h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>

          {{-- <li class="dropdown"><a href="#"><span>Home</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="/home">Home 1 - /home</a></li>
              <li><a href="index-2.html">Home 2 - index-2.html</a></li>
              <li><a href="index-3.html" class="active">Home 3 - index-3.html</a></li>
              <li><a href="index-4.html">Home 4 - index-4.html</a></li>
            </ul>
          </li> --}}

          <li><a class="nav-link scrollto" href="/#hero-fullscreen">{{ __('Accueil') }}</a></li>
          <li><a class="nav-link scrollto" href="/#about">{{ __('A propos') }}</a></li>
          <li><a class="nav-link scrollto" href="/#services">{{ __('Services') }}</a></li>
          {{-- <li><a class="nav-link scrollto" href="/#portfolio">{{ __('Portefeuille') }}</a></li> --}}
          <li><a class="nav-link scrollto" href="/#team">{{ __('Equipe') }}</a></li>
          @if ($services->count())
          <li class="dropdown"><a href="/#recent-blog-posts"><span>Blog</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
                @foreach ($services as $service)
                <li><a href="/blogs/service/{{ $service->id }}">{{ $service->title }}</a></li>
                @endforeach
            </ul>
          </li>
          @endif
          <li><a class="nav-link scrollto" href="/#contact">{{ __('Contact') }}</a></li>

        <li>
            <a class="nav-link scrollto" href="{{ route('setlang', ['lang' => 'fr']) }}">
                <img src="/assets/img/fr.jpg" alt="" width="30">
            </a>
        </li>
        <li>
            <a class="nav-link scrollto" href="{{ route('setlang', ['lang' => 'en']) }}">
                <img src="/assets/img/en.webp" alt="" width="30" height="20">
            </a>
        </li>
          @if (Auth::user())
          <li class="dropdown"><a href="#"><span>{{ Auth::user()->email }}</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
                @if (Auth::user()->is_admin)
                    <li><a href="home">{{ __('Tableau de bord') }}</a></li>
                @endif
            </ul>
          </li>
          @endif
          {{-- <li class="dropdown megamenu"><a href="#"><span>Mega Menu</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li>
                <a href="#">Column 1 link 1</a>
                <a href="#">Column 1 link 2</a>
                <a href="#">Column 1 link 3</a>
              </li>
              <li>
                <a href="#">Column 2 link 1</a>
                <a href="#">Column 2 link 2</a>
                <a href="#">Column 3 link 3</a>
              </li>
              <li>
                <a href="#">Column 3 link 1</a>
                <a href="#">Column 3 link 2</a>
                <a href="#">Column 3 link 3</a>
              </li>
              <li>
                <a href="#">Column 4 link 1</a>
                <a href="#">Column 4 link 2</a>
                <a href="#">Column 4 link 3</a>
              </li>
            </ul>
          </li> --}}
          {{-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> --}}
        </ul>
        <i class="bi bi-list mobile-nav-toggle d-none"></i>
      </nav><!-- .navbar -->


      @if (Auth::user())
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="my-btn scrollto">{{ __('Se déconnecter') }}</button>
      </form>
      @else
        <a class="my-btn scrollto" href="/login">{{ __('Se connecter') }}</a>
      @endif

    </div>
  </header>
  <!-- End Header -->


  @yield('content')


  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>TMT Sarl</h3>
              <p>
            Carrefour AGIP<br>
            Douala, Cameroun<br><br>
                <strong>Phone:</strong> +237 654 177 996<br>
                <strong>Email:</strong> contact@tmt.com<br>
              </p>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="{{ route('newsletters') }}" method="POST">
            @csrf
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="footer-legal text-center">
      <div class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

        <div class="d-flex flex-column align-items-center align-items-lg-start">
          <div class="copyright">
            &copy; Copyright <strong><span>TMT</span></strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
            Designed by <a href="#">TMT</a>
          </div>
        </div>

        <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
          <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>

      </div>
    </div>

  </footer><!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/aos/aos.js"></script>
  <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
  {{-- <script src="/assets/vendor/php-email-form/validate.js"></script> --}}

  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>

</body>

</html>
