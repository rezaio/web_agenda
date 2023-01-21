<?= $this->extend('layouts/admin'); ?>

<?= $this->section('content'); ?>
<div class="page-heading">
    <h3>Dashboard</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">

            <?php if ($_SESSION['roles'] == 'admin') : ?>
                <div class="col-sm-12 col-md-6 col-lg-3 col-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Pengunjung web</h6>
                                    <h6 class="font-extrabold mb-0"><?= $visitor_web; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <?php if ($_SESSION['roles'] == 'admin') : ?>
                <div class="col-sm-12 col-md-6 col-lg-3 col-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Jumlah Artikel</h6>
                                    <h6 class="font-extrabold mb-0"><?= $article; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <div class="col-sm-12 col-md-6 col-lg-3 col-6">
                    <div class="card">
                        <div class="card-body py-4 px-5">
                            <div class="d-flex align-items-center">
                                <div class="ms-0 name">
                                    <h5 class="font-bold"><?= $user['name']; ?></h5>
                                    <h6 class="text-muted mb-0">@<?= $user['username']; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Grafik Pengunjung Web</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-profile-visit"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
<?= $this->endSection(); ?>