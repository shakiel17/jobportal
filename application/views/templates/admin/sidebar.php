<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url();?>admin_main" class="brand-link">
      <img src="<?=base_url();?>design/dist/img/jobportallogo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Online Job Portal</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url();?>design/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$this->session->fullname;?></a> <a href="#" data-toggle="modal" data-target="#logout">Logout
        </a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->          
          <li class="nav-item">
            <a href="<?=base_url();?>admin_main" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
               Home                
              </p>
            </a>
          </li>                    
          <li class="nav-item">
            <a href="<?=base_url();?>manage_company" class="nav-link">
              <i class="nav-icon far fa-building"></i>
              <p>
                Company                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url();?>manage_users" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Registered User                
              </p>
            </a>
          </li>
	<li class="nav-item">
            <a href="<?=base_url();?>manage_user_application" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
		Application
              </p>
            </a>
          </li>         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
