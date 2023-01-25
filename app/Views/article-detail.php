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
                  <h1 class="title2">Artikel Detail</h1>
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
          <div class="col-md-12 col-sm-12 col-xs-12">
            <!-- single-blog start -->
            <article class="blog-post-wrapper">
              <div class="post-thumbnail">
                <img class="bar" src="<?= base_url(); ?>/img/<?= $article['thumbnail']; ?>" alt="" />
              </div>
              <div class="post-information">
                <h2><?= $article['title']; ?></h2>
                <div class="entry-meta">
                  <span class="author-meta"><i class="bi bi-person"></i>Created by <?= $article['created_by']; ?></span>
                  <span><i class="bi bi-clock"></i> <?= $article['date']; ?></span>
            
                  <span>
                    <i class="bi bi-tags"></i>
                    <a href=""><?= $article['name']; ?></a>
                  </span>
                </div>
                <div class="entry-content">
                <?= $article['description']; ?>
                  </div>
              </div>
            </article>
            <div class="clear"></div>
          
            <!-- single-blog end -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div><!-- End Blog Page -->

</main><!-- End #main -->
<?= $this->endSection(); ?>