<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <h4>User Portal</h4>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <?php
                if($this->session->error){
                ?>
                <div class="alert alert-danger"><?=$this->session->error;?></div>
                <?php
                }
                ?>
                <div class="card">
                    <div class="card card-header">
                        Sign In
                    </div>
                    <?=form_open(base_url()."user_authentication");?>
                    <div class="card card-body login-card-body">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="form-group">                            
                            <input type="submit" class="btn btn-primary" value="Login">
                        </div>
                    </div>
                    <?=form_close();?>                   
                </div>                
            </div>
            <div class="col-lg-6">
            <?php
                if($this->session->error_save){
                ?>
                <div class="alert alert-danger"><?=$this->session->error_save;?></div>
                <?php
                }
                ?>
                <div class="card">
                    <div class="card card-header">
                        Sign Up
                    </div>
                    <?=form_open(base_url()."user_registration");?>
                    <div class="card card-body login-card-body">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="lastname" required>
                        </div>
                        <div class="form-group"> 
                            <label>First Name</label>
                            <input type="text" class="form-control" name="firstname" required>
                        </div>
                        <div class="form-group">
                            <label>Middle Name</label>
                            <input type="text" class="form-control" name="middlename">
                        </div>                        
                        <div class="form-group">
                            <label>Contact No.</label>
                            <input type="text" class="form-control" name="contactno">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="form-group">                            
                            <input type="submit" class="btn btn-primary" value="Register">
                        </div>
                    </div>
                    <?=form_close();?>                   
                </div>                
            </div>        
        </div>       
    </div> 
      <!-- /.error-page -->
    </section>
    <!-- /.content -->
  </div>