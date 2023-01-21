<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Agenda</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/feather.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url(); ?>/assets/img/icon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-center py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="<?= base_url(); ?>/assets/img/icon.png" alt="logo">
              </div>
              <h3>Hello! Selamat datang </h3>
              <h6 class="font-weight-light">silahkan masuk dengan akun anda</h6>

              <?php if (session()->getFlashdata('msg')) : ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                    <?php endif; ?>
                
                    <form action="<?= route_to('auth'); ?>" method="POST">
              <form class="pt-3">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password" placeholder="Password">
                </div>
                <div class="mt-3">
                <button type="submit" name="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                </div>

          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
