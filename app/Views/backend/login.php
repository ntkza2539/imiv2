<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
 
    <link rel="stylesheet" href="<?= base_url('public/asset/backend/login/fonts/icomoon/style.css') ?>">

    <link rel="stylesheet" href="<?= base_url('public/asset/backend/login/css/owl.carousel.min.css') ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('public/asset/backend/login/css/bootstrap.min.css') ?>">
    
    <!-- Style -->
    <link rel="stylesheet" href="<?= base_url('public/asset/backend/login/css/style.css') ?>">

    <title>Lotto </title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </head>
  <body style="background-color:#dfe1e2;">
  <div class="content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5 contents">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="form-block">
                  <div class="mb-4">
                  <h3><strong>Lotto</strong></h3>
                </div>
			        	<form role="form" method="POST" action="<?php echo base_url('backend/Auth/checklogin'); ?>">
                        <div class="form-group first">
                          <label for="username">Username</label>
                          <input  type="text" id="username" name="username"   class="form-control"  required >

                        </div>
                        <div class="form-group last mb-4">
                          <label for="password">Password</label>
                          <input type="password" id="password" name="password"   id="password" class="form-control" required>
                        </div>
                        <div class="row">
                          <div class="form-group col-6">
                              <label>Enter Captcha</label>
                              <input type="text" class="form-control" name="captcha" id="captcha" required>
                          </div>
                          <div class="form-group col-6">
                            <div>
                                <p class="mt-2 bg-success text-white text-center"style="border-radius: 30px;"> <?= $c ?></p>
                                <input type="hidden" id ="confm_captcha" name="confm_captcha" value="<?= $c?>">
                            </div>
                          </div>
                          </div>
                  <input type="submit" value="Log In" class="btn btn-pill text-white btn-block btn-primary">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</script>
    <script src="<?= base_url('public/asset/backend/login/js/jquery-3.3.1.min.js') ?>"></script>
    <script src="<?= base_url('public/asset/backend/login/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('public/asset/backend/login/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('public/asset/backend/login/js/main.js') ?>"></script>

  </body>
</html>