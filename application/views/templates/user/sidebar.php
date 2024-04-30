<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url();?>design/index3.html" class="brand-link">
      <img src="<?=base_url();?>design/dist/img/jobportallogo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Online Job Portal</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <?php
        if($this->session->user_login){
        ?>
        <div class="image">
          <img src="<?=base_url();?>design/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$this->session->fullname;?></a><a href="#" data-toggle="modal" data-target="#logout">Logout</a>
        </div>
        <?php
        }else{
          ?>
          
        <div class="info">
          <a href="<?=base_url();?>user_signin" class="d-block">Click here to signin/signup</a>
        </div>
          <?php
        }
        ?>
      </div>

      <!-- SidebarSearch Form -->      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->          
          <li class="nav-header">ACCOUNT DETAILS</li>
          <li class="nav-item">
            <a href="<?=base_url();?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url();?>user_profile" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url();?>user_application" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Job Application
              </p>
            </a>
          </li>          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>