<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Employer Portal | Online Job Portal</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url();?>design/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url();?>design/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url();?>design/dist/css/adminlte.min.css">

  <link rel="icon" type="image/jpg" href="<?=base_url();?>design/dist/img/jobportallogo.jpg">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?=base_url();?>company" class="h1"><b>Employer Portal</b></a>
    </div>
    <?php
  if($this->session->error){
  ?>
  <div class="alert alert-danger"><?=$this->session->error;?></div>
  <?php
  }
  ?>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <?=form_open(base_url()."company_authentication");?>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">              
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      <?=form_close();?>
      
      <!-- /.social-auth-links -->      
      <p class="mb-0">
        <a href="#" class="text-center" data-toggle="modal" data-target="#RegisterNew">Register a new membership</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
    <div class="modal fade" id="RegisterNew">
        <div class="modal-dialog modal-md">
            <?=form_open(base_url()."save_company_account");?>
            <input type="hidden" name="comp_id" id="comp_id">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">New Employer Account</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>            
            <div class="modal-body">
              <div class="form-group">
                <label>Company Name</label>
                <select name="company" class="form-control" required>
                    <option value="">Select Company</option>
                    <?php
                    $company=$this->Job_model->getAllCompany();
                    foreach($company as $item){
                      if($item['username']==""){
                        echo "<option value='$item[id]'>$item[comp_name]</option>";
                      }
                    }
                    ?>
                </select>
              </div>              
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email">
              </div>
              <div class="form-group">
                <label>Contact No.</label>
                <input type="text" class="form-control" name="contactno">
              </div>
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password">
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>
          <?=form_close();?>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
<!-- jQuery -->
<script src="<?=base_url();?>design/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url();?>design/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url();?>design/dist/js/adminlte.min.js"></script>
</body>
</html>
