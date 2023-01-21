<?= $this->extend('layouts/admin'); ?>

<?= $this->section('content'); ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Organisasi</h3>
                <p class="text-subtitle text-muted">Menampilkan Organisasi Terkait</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>/admin">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Organisasi</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <a href="<?= route_to('community-add'); ?>" class="btn btn-primary rounded-pill mb-2">+ Organisasi</a>

        <?php foreach ($community as $communitys) : ?>
            <div class="card mb-2">
                <div class="card-body py-4 px-4">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-xl rounded-0">
                                    <img src="<?= base_url() . '/img/' . $communitys['thumbnail']; ?>" style="object-fit: cover" class="rounded-0" alt="Face 1">
                                </div>
                                <div class="ms-3 name">
                                    <h5 class="font-bold"><?= $communitys['name']; ?></h5>
                                    <?php if (empty($communitys['name']) == 1) { ?>
                                        <span class="badge bg-light-danger mx-2">Kategori tidak ditemukan</span>
                                    <?php } else { ?>
                                        <span class="badge bg-light-primary mx-2"><?= $communitys['name']; ?></span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="d-flex align-items-center justify-content-end">

                                <ul class="list-inline m-0 d-flex">
                                    <li class="list-inline-item mail-delete">
                                        <a href="<?= base_url(); ?>/admin/community/edit/<?= $communitys['id_community']; ?>" type="button" class="btn btn-light-primary btn-icon action-icon" data-toggle="tooltip">
                                            <span class="fonticon-wrap">
                                                <i class="bi bi-pencil-fill"></i>
                                            </span> Edit
                                        </a>
                                    </li>
                                    <li class="list-inline-item mail-unread">
                                        <button type="button" class="btn btn-light-danger btn-icon action-icon" data-bs-toggle="modal" data-bs-target="#border-less<?= $communitys['id_community']; ?>">
                                            <span class="fonticon-wrap d-inline">
                                                <i class="bi bi-trash-fill"></i>
                                            </span> Hapus
                                        </button>
                                    </li>
                                </ul>

                                <!--BorderLess Modal Content -->
                                <div class="modal fade text-left modal-borderless" id="border-less<?= $communitys['id_community']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Peringatan</h5>
                                                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <form action="<?= route_to('community-delete'); ?>" method="POST">
                                                <div class="modal-body">
                                                    <p>
                                                        Apakah anda yakin ingin menghapus organisasi ini?
                                                    </p>
                                                </div>
                                                
                                                <input type="number" hidden value="<?= $communitys['id_community']; ?>" name="id_community">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                                                        <span class="d-sm-block">Tidak</span>
                                                    </button>

                                                    <button name="submit" type="submit" class="btn btn-primary" data-bs-dismiss="modal">
                                                        <span class="d-sm-block">Ya</span>
                                                    </button>

                                                </div>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                                        
                            </div>
                        </div>
                                        
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </section>
    <?= $pager->links('community', 'event_pagination'); ?>
</div>
<?= $this->endSection(); ?>