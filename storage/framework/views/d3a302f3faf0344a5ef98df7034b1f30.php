<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $__env->yieldContent('title'); ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  
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

      <a href="/home" class="logo d-flex align-items-center scrollto me-auto me-lg-0" style="margin-left: 1rem">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="/assets/img/icon1.jpeg" alt="" style="height: 85px;">
        <h1 style="margin-left: 0.5rem; padding-top: 0.5rem">TMT<span>.</span></h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>

          

          <li><a class="nav-link scrollto" href="/#hero-fullscreen"><?php echo e(__('Accueil')); ?></a></li>
          <li><a class="nav-link scrollto" href="/#about"><?php echo e(__('A propos')); ?></a></li>
          <li><a class="nav-link scrollto" href="/#services"><?php echo e(__('Services')); ?></a></li>
          
          <li><a class="nav-link scrollto" href="/#team"><?php echo e(__('Equipe')); ?></a></li>
          <li><a href="/blog"><?php echo e(__('Blog')); ?></a></li>
          <li><a class="nav-link scrollto" href="/#contact"><?php echo e(__('Contact')); ?></a></li>

          <?php if(!Auth::user()): ?>
        <li>
            <a class="nav-link scrollto" href="<?php echo e(route('setlang', ['lang' => 'fr'])); ?>">
                <img src="/assets/img/fr.jpg" alt="" width="30">
                
            </a>
        </li>
        <li>
            <a class="nav-link scrollto" href="<?php echo e(route('setlang', ['lang' => 'en'])); ?>">
                <img src="/assets/img/en.webp" alt="" width="30" height="20">
                
            </a>
        </li>
        <?php else: ?>
          <li class="dropdown"><a href="#"><span><?php echo e(Auth::user()->first_name); ?></span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
                <?php if(Auth::user()->is_admin): ?>
                    <li><a href="home"><?php echo e(__('Tableau de bord')); ?></a></li>
                <?php endif; ?>
              <li><a href="#"><?php echo e(Auth::user()->email); ?></a></li>
              <li>
                  <a class="nav-link scrollto" href="<?php echo e(route('setlang', ['lang' => 'fr'])); ?>">
                      <img src="/assets/img/fr.jpg" alt="" width="30" style="margin-left: 0">
                      <?php echo e(__('Français')); ?>

                  </a>
              </li>
              <li>
                  <a class="nav-link scrollto" href="<?php echo e(route('setlang', ['lang' => 'en'])); ?>">
                      <img src="/assets/img/en.webp" alt="" width="30" height="20">
                      <?php echo e(__('Anglais')); ?>

                  </a>
              </li>
            </ul>
          </li>
          <?php endif; ?>
          
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle d-none"></i>
      </nav><!-- .navbar -->


      <?php if(Auth::user()): ?>
      <form method="POST" action="<?php echo e(route('logout')); ?>">
        <?php echo csrf_field(); ?>
        <button class="my-btn scrollto"><?php echo e(__('Se déconnecter')); ?></button>
      </form>
      <?php else: ?>
        <a class="my-btn scrollto" href="/login"><?php echo e(__('Se connecter')); ?></a>
      <?php endif; ?>

    </div>
  </header>
  <!-- End Header -->


  <?php echo $__env->yieldContent('content'); ?>


  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>HeroBiz</h3>
              <p>
                A108 Adam Street <br>
                NY 535022, USA<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
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
            <form action="<?php echo e(route('newsletters')); ?>" method="POST">
            <?php echo csrf_field(); ?>
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
            &copy; Copyright <strong><span>HeroBiz</span></strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
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
  

  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>

</body>

</html>
<?php /**PATH C:\Users\Manick\OneDrive\Bureau\tmt\tmt\resources\views/layout.blade.php ENDPATH**/ ?>