<?= $this->extend('layouts/home'); ?>

<?= $this->section('content'); ?>

<main id="main">

<!-- ======= Blog Header ======= -->
<div class="header-bg page-area">
  <div class="container position-relative">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="slider-content text-center">
          <div class="header-bottom">
          <div class="layer2">
                  <h1 class="title2">Artikel</h1>
                </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div><!-- End Blog Header -->

<!-- ======= Blog Page ======= -->
<div class="blog-page area-padding">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-4">
        <div class="page-head-blog">
          <div class="single-blog-page">
            <!-- search option start -->

            <!-- search option end -->
          </div>
          <div class="single-blog-page">
            <!-- recent start -->
            <div class="left-blog">
              <h4>Artikel Terbaru</h4>
              <div class="recent-post">
                <!-- start single post -->
                <?php
                foreach($articles as $articlex):
            ?>
                <div class="recent-single-post">
                  <div class="post-img">
                    <a href="<?= base_url(); ?>/article/<?= $articlex['slug']; ?>">
                      <img class="amc" src="<?= base_url(); ?>/img/<?= $articlex['thumbnail']; ?>" alt="">
                    </a>
                  </div>
                  <div class="pst-content">
                    <p><?= $articlex['title']; ?></p>
                  </div>
                </div>
                <?php endforeach; ?>
                <!-- End single post -->

                <!-- End single post -->
              </div>
            </div>
            <!-- recent end -->
          </div>
          <div class="single-blog-page">
            <div class="left-blog">
              <h4>Kategori</h4>
              <ul>
              <?php
                foreach($categories as $categori):
                ?>
                <li>
                  <a href="#"><?= $categori["name"]; ?></a>
                </li>
                    <?php endforeach; ?>
              </ul>
            </div>
          </div>

        </div>
      </div>
      <!-- End left sidebar -->
      <!-- Start single blog -->
      <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="row">
            <?php
            use function App\Controllers\truncateString;
                foreach($articles as $article):
            ?>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="single-blog">
              <div class="single-blog-img">
                  
                  <img class="gam" src="<?= base_url(); ?>/img/<?= $article['thumbnail']; ?>" alt="">
                </a>
              </div>
              <div class="blog-meta">
                <span class="date-type">
                  <i class="bi bi-calendar"></i><?= $article['date']; ?></span>
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
          </div>
            <?php
                endforeach;
            ?>
      
          <div class="blog-pagination">
            <ul class="pagination">
            <?= $pager->links('articles', 'event_pagination'); ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div><!-- End Blog Page -->

</main><!-- End #main -->
<?= $this->endSection(); ?>