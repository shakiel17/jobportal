<div class="modal fade" id="logout">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Leaving so soon?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h4>Do you wish to logout?</h4>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-success" data-dismiss="modal">No, I will stay</button>
              <a href="<?=base_url();?>user_logout" class="btn btn-danger">Yes, I will go</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
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