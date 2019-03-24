<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Phonebook - register</title>
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
            <h2 class="text-center mb-4">Регистрация нового пользователя</h2>
            <div class="auto-form-wrapper">
                <form action="" id="signupForm" method="post">
                <div class="form-group">
                    <label for="first_name">Имя</label>
                    <input type="text" class="form-control" id="first_name" placeholder="Имя" name="first_name">
                </div>
                <div class="form-group">
                    <label for="last_name">Фамилия</label>
                    <input type="text" class="form-control" id="last_name" placeholder="Фамилия" name="last_name">
                </div>
                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="text" class="form-control" id="Email" placeholder="Email" name="Email">
                </div>
                <div class="form-group">
                    <label for="Password">Пароль</label>
                    <input type="password" class="form-control" id="Password" placeholder="Пароль" name="Password">
                </div>
                <div class="form-group">
                    <label for="ConfirmPassword">Подтвердите пароль</label>
                    <input type="password" class="form-control" id="ConfirmPassword" placeholder="Подтвердите пароль" name="ConfirmPassword">
                </div>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block">Зарегистрировать</button>
                </div>
                <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">Уже есть аккаунт?</span>
                  <a href="<?php echo base_url('auth/login'); ?>" class="text-black text-small">Войти</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
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
        first_name: "required",
        last_name: "required",
        Password: {
          required: true,
          minlength: 6
        },
        ConfirmPassword: {
          required: true,
          minlength: 6,
          equalTo: "#Password"
        },
        Email: {
          required: true,
          email: true
        }
      },
      messages: {
        first_name: "Пожалуйста, введите Ваше имя",
        last_name: "Пожалуйста, введите Вашу фалимию",
      Password: {
          required: "Пожалуйста, введите пароль",
          minlength: "Ваш пароль должен быть минимум 6 символов"
        },
      ConfirmPassword: {
          required: "Пожалуйста, введите пароль",
          minlength: "Ваш пароль должен быть минимум 6 символов",
          equalTo: "Пожалуйста, введите тот же пароль, что и выше"
        },
        Email: "Пожалуйста, введите валидный email адрес"
      }
    });
    
    $('#Email').blur(function(){
        var val_email = $('#Email').val();
        $.ajax({
          url: "http://alen.pp.ua/phonebook/ajax_search_email",
          type: "POST", data: {email : val_email},
          success: function(html){ 
            if(html == 'Yes'){
                alert('Внесенный email '+ val_email +' уже зарегистрирован!');
                $('#Email').val('');
            }
          }
        })
    });
    });
</script>
  <script src="<?php echo base_url('assets/vendors/js/vendor.bundle.base.js'); ?>"></script>
  <script src="<?php echo base_url('assets/vendors/js/vendor.bundle.addons.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/off-canvas.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/misc.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/jquery.mask.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/jquery.validate.min.js');?>"></script>
</body>
</html>