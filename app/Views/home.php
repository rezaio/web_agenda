<?= $this->extend('layouts/home'); ?>

<?= $this->section('content'); ?>

<!-- ======= hero Section ======= -->
<section id="hero">
  <div class="hero-container">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

      <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <div class="carousel-item active" style="background-image: url('assets/img/header/k1.jpg')">
          <div class="carousel-container">
            <div class="container">
              <h2 class="">Selamat Datang Di Website</h2>
              <p class="">Agenda Ormawa Dan UKM Politeknik Negeri Lampung</p>

            </div>
          </div>
        </div>
        <div class="carousel-item active" style="background-image: url('assets/img/header/k2.jpg')">
          <div class="carousel-container">
            <div class="container">
              <h2 class="">Selamat Datang Di Website</h2>
              <p class="">Agenda Ormawa Dan UKM Politeknik Negeri Lampung</p>

            </div>
          </div>
        </div>
        <div class="carousel-item active" style="background-image: url('assets/img/header/k4.jpeg')">
          <div class="carousel-container">
            <div class="container">
              <h2 class="">Selamat Datang Di Website</h2>
              <p class="">Agenda Ormawa Dan UKM Politeknik Negeri Lampung</p>

            </div>
          </div>
        </div>



      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </div>
</section><!-- End Hero Section -->

<main id="main">
  <!-- ======= Blog Section ======= -->
  <div id="blog" class="blog-area">
    <div class="blog-inner area-padding">
      <div class="blog-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Artikel Terbaru</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Start Left Blog -->
          <?php

          use function App\Controllers\truncateString;

          foreach ($articles as $article) :
          ?>

            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="single-blog">
                <div class="single-blog-img">
                  <a href="">
                    <img class="imc" src="<?= base_url(); ?>/img/<?= $article['thumbnail']; ?>" alt="">
                  </a>
                </div>
                <div class="blog-meta">
                  <span class="date-type">
                    <i class="fa fa-calendar"></i><?= $article['date']; ?>
                  </span>
                </div>
                <div class="blog-text">
                  <h4>
                    <a href="<?= base_url(); ?>/article/<?= $article['slug']; ?>"><?= $article['title']; ?></a>
                  </h4>
                  <p>
                    <?php
                    print(truncateString($article['description'], 100, true) . "\n");
                    ?>
                  </p>
                </div>
                <span>
                  <a href="<?= base_url(); ?>/article/<?= $article['slug']; ?>" class="ready-btn">Baca Selengkapnya</a>
                </span>
              </div>

              <!-- Start single blog -->
            </div>

          <?php endforeach; ?>
          <!-- End Left Blog-->

        </div>
      </div>
    </div>
  </div><!-- End Blog Section -->



  <!-- ======= organisasi Section ======= -->
  <div class="container">
    <div class="section-headline text-center">
      <h2>Organisasi</h2>
    </div>
    <a href="<?= base_url(); ?>/community">

      <div class="owl-carousel owl-theme">
        <div class="item">
          <img src="assets/img/organisasi/bs.png" alt="">
        </div>
        <div class="item">
          <img src="assets/img/organisasi/ukmo.jpeg" alt="">
        </div>
        <div class="item">
          <img src="assets/img/organisasi/poltapala.png" alt="">
        </div>
        <div class="item">
          <img src="assets/img/organisasi/albanna.png" alt="">
        </div>
        <div class="item">
          <img src="assets/img/organisasi/sukma.png" alt="">
        </div>
        <div class="item">
          <img src="assets/img/organisasi/kopma.jpg" alt="">
        </div>
        <div class="item">
          <img src="assets/img/organisasi/garda.jpg" alt="">
        </div>
        <div class="item">
          <img src="assets/img/organisasi/bem.jpg" alt="">
        </div>
        <div class="item">
          <img src="assets/img/organisasi/ekbis.png" alt="">
        </div>
        <div class="item">
          <img src="assets/img/organisasi/himabu.png" alt="">
        </div>
        <div class="item">
          <img src="assets/img/organisasi/pertanian.jpg" alt="">
        </div>
        <div class="item">
          <img src="assets/img/organisasi/pangan.jpg" alt="">
        </div>
        <div class="item">
          <img src="assets/img/organisasi/peternakan.jpg" alt="">
        </div>
      </div>
  </div>
  </a>
  </div>

  <!-- End organisasi Section -->
  <!-- ======= Suscribe Section ======= -->
  <div class="suscribe-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">

        </div>
      </div>
    </div>
  </div><!-- End Suscribe Section -->


</main><!-- End #main -->


<?= $this->endSection(); ?>