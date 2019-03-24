<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Phonebook</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/css/vendor.bundle.base.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/css/vendor.bundle.addons.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png'); ?>" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
                <p class="text-success">Пользователь успешно создан! Логин и пароль были высланы Вам на почтовый ящик 
                    <?php echo $message; ?> <a href="<?php echo base_url('auth/login'); ?>"> Перейти на форму входа.</a>
                </p>
                <p class="text-danger">P.S. Если письмо долго не приходит, проверте папку спам! 
                </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo base_url('assets/vendors/js/vendor.bundle.base.js'); ?>"></script>
  <script src="<?php echo base_url('assets/vendors/js/vendor.bundle.addons.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/off-canvas.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/misc.js'); ?>"></script>
</body>
</html>