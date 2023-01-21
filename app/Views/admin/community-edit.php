<?= $this->extend('layouts/admin'); ?>

<?= $this->section('content'); ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Organisasi Editor </h3>
                <p class="text-subtitle text-muted">Edit Organisasi Pada Website
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Summernote</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form form-vertical" enctype="multipart/form-data" action="<?= route_to('community-update'); ?>" method="POST">
                        <input type="number" name="id_community" value="<?= $community['id_community']; ?>" hidden>
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Judul</label>
                                            <input name="name" type="text" id="first-name-vertical" class="form-control {{$errors->first('name') ? "is-invalid" : ""}}" name="name" placeholder="Masukkan judul artikel" value="<?= $community['name']; ?>">
                                            <div class="invalid-feedback">
                                                {{$errors->first('name')}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="formFile" class="form-label">Sampul Artikel</label>
                                            <input name="thumbnail" class="form-control {{$errors->first('cover') ? "is-invalid" : ""}}" type="file" accept="image/*" id="formFile">
                                            <div class="invalid-feedback">
                                                {{$errors->first('cover')}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group ">
                                            <textarea class="{{$errors->first('content') ? "is-invalid" : ""}}" name="description" id="summernote"><?= $community['description']; ?></textarea>
                                            <div class="invalid-feedback">
                                                {{$errors->first('content')}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <a href="<?= route_to('community'); ?>" class="btn btn-light text-danger me-3 mb-1">Batal</a>
                                        <button name="submit" type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>