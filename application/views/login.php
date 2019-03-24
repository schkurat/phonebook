<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Phonebook - login</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/css/vendor.bundle.base.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/css/vendor.bundle.addons.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png'); ?>" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
                <?php echo $message; ?>
              <form action="#" id="signupForm" method="post">
                <div class="form-group">
                  <label class="label" for="user_email">Email</label>
                  <input type="text" class="form-control" id="user_email" placeholder="Email" name="user_email">
                </div>
                <div class="form-group">
                  <label class="label" for="user_pasw">Password</label>
                    <input type="password" class="form-control" id="user_pasw" placeholder="*********" name="user_pasw">
                </div>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block">Войти</button>
                </div>
                <div class="text-block text-center my-3">
                  <a href="<?php echo base_url('auth/register'); ?>" class="text-black text-small">Создать новый аккаунт</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script type="text/javascript">
$().ready(function(){

    $("#signupForm").validate({
      errorElement: "em",
      errorPlacement: function(error, element) {
        $(element.parent("div").addClass("form-animate-error"));
        error.appendTo(element.parent("div"));
      },
      success: function(label) {
        $(label.parent("div").removeClass("form-animate-error"));
      },
      rules: {
        user_pasw: {
          required: true,
          minlength: 6
        },
        user_email: {
          required: true,
          email: true
        }
      },
      messages: {
      user_pasw: {
          required: "Пожалуйста, введите пароль",
          minlength: "Ваш пароль должен быть минимум 6 символов"
        },
        user_email: "Пожалуйста, введите валидный email адрес"
      }
    });
    });
</script>
  <script src="<?php echo base_url('assets/vendors/js/vendor.bundle.base.js'); ?>"></script>
  <script src="<?php echo base_url('assets/vendors/js/vendor.bundle.addons.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/off-canvas.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/misc.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/jquery.validate.min.js');?>"></script>
</body>
</html>