<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administrator | Online Job Portal</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url();?>design/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url();?>design/dist/css/adminlte.min.css">

  <link rel="icon" type="image/jpg" href="<?=base_url();?>design/dist/img/jobportallogo.jpg">
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="<?=base_url();?>design/index2.html"><b>Admin Login Portal</b></a>
  </div>
  <?php
  if($this->session->error){
  ?>
  <div class="alert alert-danger"><?=$this->session->error;?></div>
  <?php
  }
  ?>
  <!-- User name -->
  <div class="lockscreen-name">Administrator</div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="<?=base_url();?>design/dist/img/user1-128x128.jpg" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <?=form_open(base_url()."admin_authentication",array("class" => "lockscreen-credentials"));?>
      <div class="input-group">
        <input type="password" name="password" class="form-control" placeholder="password">

        <div class="input-group-append">
          <button type="submit" class="btn">
            <i class="fas fa-arrow-right text-muted"></i>
          </button>
        </div>
      </div>
    <?=form_close();?>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Enter your password to start your session
  </div>  
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2024 <b>Online Job Portal</b><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->

<!-- jQuery -->
<script src="<?=base_url();?>design/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url();?>design/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
