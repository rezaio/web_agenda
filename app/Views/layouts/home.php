<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Agenda Kegiatan</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url(); ?>/assets/img/icon.png" rel="icon">
  <link href="<?= base_url(); ?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url(); ?>/assets/css/owl.carousel.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url(); ?>/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: eBusiness - v4.9.1
  * Template URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between">

      <div class="logo">
        <h1><a href="index.php"><span>Agenda</span> Kegiatan</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="<?= base_url(); ?>/assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="<?= base_url(); ?>/index.php">Beranda</a></li>
          <!-- <li><a class="nav-link scrollto" href="/calendar">Kalender</a></li> -->
          <li><a class="nav-link scrollto" href="<?= base_url(); ?>/community">Organisasi</a></li>
          <li><a href="<?= base_url(); ?>/article">Artikel</a></li>
          <li><a class="nav-link scrollto" href="<?= base_url(); ?>/login">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
    
    <?= $this->renderSection('content'); ?>

    <footer>
    <div class="footer-area">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="footer-content">
              <div class="footer-head">
                <div class="footer-logo">
                  <h2><span>Agenda</span> Kegiatan</h2>
                </div>

                <p>Website ini, Merupakan website untuk mempublikasi kegiatan yang akan dilaksanakan dan sebagai rekam jejak kegiatan UKM dan Ormawa agar kegiatan tersimpan ke dalam database kegiatan sehingga memudahkan dalam mencari histori kegiatan organisasi yang sudah dilakukan sebelumnya <div class="footer-icons">
             
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          
          <!-- end single footer -->
          <div class="col-md-4">
            <div class="footer-content">
              <div class="footer-head">
                <h4>Informasi website</h4>
                <p>
                  Jika terdapat kesulitan pada web atau kurang paham mengenai penggunaan web ini,Untuk informasi lebih lanjut dapat menghubungi BEM divisi KOMINFO Politeknik Negeri Lampung
                </p>
                <div class="footer-contacts">
                  <p><span>Tel:</span> 085379916605</p>
                  <p><span>Email:</span> bem@polinela.ac.id</p>
                  <p><span>Website:</span> bem.kemahasiswaan.polinela.ac.id </p>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>
    <div class="footer-area-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="copyright text-center">
              <p>
                &copy; Copyright <strong>eja</strong>. All Rights Reserved
              </p>
            </div>
            <div class="credits">
              <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eBusiness
            -->
              Designed by kelompok 4</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url(); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url(); ?>/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url(); ?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url(); ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= base_url(); ?>/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url(); ?>/assets/js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script src="<?= base_url(); ?>/assets/js/owl.carousel.min.js"></script>

  <script>
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
  </script>

</body>

</html>