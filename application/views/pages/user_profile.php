<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">    
      <div class="container-fluid">  
        <?php
        if($this->session->success){
            ?>
            <div class="alert alert-success"><?=$this->session->success;?></div>
            <?php
        }
        if($this->session->failed){
            ?>
            <div class="alert alert-danger"><?=$this->session->failed;?></div>
            <?php
        }
        ?>      
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?=base_url();?>design/dist/img/user3-128x128.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?=$profile['app_lastname'];?>, <?=$profile['app_firstname'];?> <?=$profile['app_middlename'];?></h3>

                <p class="text-muted text-center">Applicant</p>

                <ul class="list-group list-group-unbordered mb-3">
                    <?php
                        $jobs=$this->Job_model->getAllJobsByApplicant($profile['app_username']);
                    ?>
                  <li class="list-group-item">
                    <b>Applied Job</b> <a class="float-right"><?=count($jobs);?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Field of Interest</b> <a class="float-right" href="" data-toggle="modal" data-target="#EditInterest">
                        <?php
                        if($profile['app_interest']==""){
                            echo "Edit";
                        }else{
                            echo $profile['app_interest'];
                        }
                        ?>
                    </a>
                  </li>
                  <li class="list-group-item">
                    <b>Username</b> <a class="float-right" href="#" data-toggle="modal" data-target="#EditAccount">@<?=$profile['app_username'];?></a>
                  </li>                  
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>View All</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <table width="100%" border="0">
                    <tr>
                        <td><h3 class="card-title">About Me</h3></td>
                        <td align="right"><a href="#" data-toggle="modal" data-target="#EditProfile" title="Edit Profile"><i class="fas fa-edit"></i></a></td>
                    </tr>
                </table>                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-calendar mr-1"></i> Date of Birth</strong>

                <p class="text-muted">
                    <?php
                    if($profile['app_birthdate']==""){
                        echo "Update date of birth.";
                    }else{
                        echo date('m/d/Y',strtotime($profile['app_birthdate']));
                    }
                    ?>                  
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>

                <p class="text-muted">
                    <?php
                    if($profile['app_address']==""){
                        echo "Update address.";
                    }else{
                        echo $profile['app_address'];
                    }
                    ?>
                </p>

                <hr>

                <strong><i class="fas fa-user mr-1"></i> Gender</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">
                  <?php
                    if($profile['app_gender']==""){
                        echo "Update gender.";
                    }else{
                        echo $profile['app_gender'];
                    }
                    ?>
                </span>                  
                </p>

                <hr>

                <strong><i class="fas fa-phone mr-1"></i> Contact No.</strong>

                <p class="text-muted"><?=$profile['app_contactno'];?></p>
              </div>
              <!-- /.card-body -->
            </div>
           <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <table width="100%" border="0">
                    <tr>
                        <td><h3 class="card-title">Uploaded Documents</h3></td>
                        <td align="right"><a href="#" data-toggle="modal" data-target="#AddDocument" title="Upload Document"><i class="fas fa-plus"></i></a></td>
                    </tr>
                </table>                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
		<?php
		$query=$this->Job_model->db->query("SELECT * FROM user_documents WHERE username='$profile[app_username]'");
		if($query->num_rows() > 0){
		$items=$query->result_array();
		foreach($items as $item){
		?>
                <strong><i class="fas fa-file mr-1"></i> <?=$item['description'];?>
		<div style="float:right;"><a href="<?=base_url();?>view_document/<?=$item['id'];?>" target="_blank">View</a> | <a href="<?=base_url();?>delete_document/<?=$item['id'];?>" onclick="return confirm('Do you wisht to delete this docoument?');return false;">Delete</a></div>
		</strong>

                <p class="text-muted">
			<small><?=date('m/d/Y',strtotime($item['datearray']));?> <?=date('h:i A',strtotime($item['timearray']));?></small>
                </p>

                <hr>
		<?php
		  }
		}else{
			echo "No record found!";
		}
		?>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Applied Job Offering</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Pending Application</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Confirmed Application</a></li>
                  <li class="nav-item"><a class="nav-link" href="#declined" data-toggle="tab">Declined Application</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <?php
                    $jobs=$this->Job_model->getAllJobsByApplicant($profile['app_username']);
                    if(count($jobs)>0){
                        foreach($jobs as $item){
                          if($item['status']=="pending"){
                            $color="black";
                          }
                          if($item['status']=="accepted"){
                            $color="green";
                          }
                          if($item['status']=="declined"){
                            $color="red";
                          }
                        ?>
                        <!-- Post -->
                            <div class="post clearfix">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="<?=base_url();?>design/dist/img/user1-128x128.jpg" alt="user image">
                                    <span class="username">
                                    <a href="#"><?=$item['job_title'];?></a>
                                    <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                    </span>
                                    <span class="description"><?=$item['comp_name'];?><br><?=$item['comp_address'];?></span>
                                </div>  
                            <!-- /.user-block -->
                            <p>
                                <?=$item['job_description'];?>
                            </p>

                            <p>
                                <a href="" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Date/Time Applied: <?=date('m/d/Y',strtotime($item['datearray']));?> <?=date('h:i A',strtotime($item['timearray']));?></a>
                            </p>                            
                            <p>
                                <a href="#declined" class="link-black text-sm mr-2" data-toggle="tab"><i class="fas fa-info mr-1"></i> Status: <b style="font-size:20px;color:<?=$color;?>;"><?=$item['status'];?></b></a>
                            </p>
                        </div>
                        <!-- /.post -->
                        <?php
                        }
                    }else{
                        echo "No job applied.";
                    }
                    ?>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <?php
                    $jobs=$this->Job_model->getAllJobsByApplicant($profile['app_username']);
                    if(count($jobs)>0){
                        foreach($jobs as $item){
                            if($item['status']=='pending'){
                        ?>
                        <!-- Post -->
                        <div class="post clearfix">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="<?=base_url();?>design/dist/img/user1-128x128.jpg" alt="user image">
                                    <span class="username">
                                    <a href="#"><?=$item['job_title'];?></a>
                                    <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                    </span>
                                    <span class="description"><?=$item['comp_name'];?><br><?=$item['comp_address'];?></span>
                                </div>  
                            <!-- /.user-block -->
                            <p>
                                <?=$item['job_description'];?>
                            </p>

                            <p>
                                <a href="" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Date/Time Applied: <?=date('m/d/Y',strtotime($item['datearray']));?> <?=date('h:i A',strtotime($item['timearray']));?></a>
                            </p>                            
                        </div>
                        <!-- /.post -->
                        <?php
                            }
                        }
                    }else{
                        echo "No job applied.";
                    }
                    ?>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                  <?php
                    $jobs=$this->Job_model->getAllJobsByApplicant($profile['app_username']);
                    if(count($jobs)>0){
                        foreach($jobs as $item){
                            if($item['status']=='confirmed'){
                        ?>
                        <!-- Post -->
                        <div class="post clearfix">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="<?=base_url();?>design/dist/img/user1-128x128.jpg" alt="user image">
                                    <span class="username">
                                    <a href="#"><?=$item['job_title'];?></a>
                                    <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                    </span>
                                    <span class="description"><?=$item['comp_name'];?><br><?=$item['comp_address'];?></span>
                                </div>  
                            <!-- /.user-block -->
                            <p>
                                <?=$item['job_description'];?>
                            </p>

                            <p>
                                <a href="" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Date/Time Applied: <?=date('m/d/Y',strtotime($item['datearray']));?> <?=date('h:i A',strtotime($item['timearray']));?></a>
                            </p>                            
                        </div>
                        <!-- /.post -->
                        <?php
                            }
                        }
                    }else{
                        echo "No job applied.";
                    }
                    ?>
                  </div>

                  <div class="tab-pane" id="declined">
                  <?php
                    $jobs=$this->Job_model->getAllJobsByApplicant($profile['app_username']);
                    if(count($jobs)>0){
                        foreach($jobs as $item){
                            if($item['status']=='declined'){
                        ?>
                        <!-- Post -->
                        <div class="post clearfix">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="<?=base_url();?>design/dist/img/user1-128x128.jpg" alt="user image">
                                    <span class="username">
                                    <a href="#"><?=$item['job_title'];?></a>
                                    <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                    </span>
                                    <span class="description"><?=$item['comp_name'];?><br><?=$item['comp_address'];?></span>
                                </div>  
                            <!-- /.user-block -->
                            <p>
                                <?=$item['job_description'];?>
                            </p>

                            <p>
                                <a href="" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Date/Time Applied: <?=date('m/d/Y',strtotime($item['datearray']));?> <?=date('h:i A',strtotime($item['timearray']));?></a>
                            </p>                            
                        </div>
                        <!-- /.post -->
                        <?php
                            }
                        }
                    }else{
                        echo "No job applied.";
                    }
                    ?>
                  </div>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <div class="modal fade" id="EditProfile">
        <div class="modal-dialog modal-md">
            <?=form_open(base_url()."update_profile");?>
            <input type="hidden" name="id" value="<?=$profile['id'];?>">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Profile</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>            
            <div class="modal-body">
              <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" name="lastname" value="<?=$profile['app_lastname'];?>">
              </div>
              <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" name="firstname" value="<?=$profile['app_firstname'];?>">
              </div>
              <div class="form-group">
                <label>Middle Name</label>
                <input type="text" class="form-control" name="middlename" value="<?=$profile['app_middlename'];?>">
              </div>
              <div class="form-group">
                <label>Date of Birth</label>
                <input type="date" class="form-control" name="birthdate" value="<?=$profile['app_birthdate'];?>">
              </div>
              <?php
              if($profile['app_gender'] == 'Male'){
                $male="selected";
                $female="";
              }else if($profile['app_gender'] == 'Female'){
                $male="";
                $female="selected";
              }else{
                $male="";
                $female="";
              }
              ?>
              <div class="form-group">
                <label>Gender</label>
                <select name="gender" class="form-control">
                  <option value="Male" <?=$male;?>>Male</option>
                  <option value="Female" <?=$female;?>>Female</option>
                </select>
              </div>
              <div class="form-group">
                <label>Address</label>
                <textarea class="form-control" rows="3" name="address"><?=$profile['app_address'];?></textarea>
              </div>              
              <div class="form-group">
                <label>Contact No.</label>
                <input type="text" class="form-control" name="contactno" value="<?=$profile['app_contactno'];?>">
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

      <div class="modal fade" id="EditInterest">
        <div class="modal-dialog modal-md">
            <?=form_open(base_url()."update_interest");?>
            <input type="hidden" name="id" value="<?=$profile['id'];?>">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Field of Interest</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>            
            <div class="modal-body">              
              <div class="form-group">
                <label>Field of Interest</label>
                <textarea class="form-control" rows="3" name="interest" placeholder="e.g. Technology, Computer, Healthcare.."><?=$profile['app_interest'];?></textarea>
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

      <div class="modal fade" id="EditAccount">
        <div class="modal-dialog modal-md">
            <?=form_open(base_url()."update_user_account");?>
            <input type="hidden" name="id" value="<?=$profile['id'];?>">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit User Account</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>            
            <div class="modal-body">              
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" value="<?=$profile['app_username'];?>" required>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" value="<?=$profile['app_password'];?>" required>
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

<div class="modal fade" id="AddDocument">
        <div class="modal-dialog modal-md">
            <?=form_open(base_url()."upload_document");?>
            <input type="hidden" name="username" value="<?=$profile['app_username'];?>">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Upload Document</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>            
            <div class="modal-body">              
              <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" name="description" required>
              </div>
              <div class="form-group">
                <label>Document</label>
                <input type="file" class="form-control" name="file" accept="application/pdf" required>
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
