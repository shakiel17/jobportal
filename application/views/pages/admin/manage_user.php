 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?=$title;?></h1>
          </div><!-- /.col -->          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->   
    <!-- Main content -->
    <section class="content">    
      <div class="container-fluid">
        <?php
        if($this->session->success){
            ?>
            <div class="alert alert-success alert-dismissable"><?=$this->session->success;?></div>
            <?php
        }
        ?>
        <?php
        if($this->session->failed){
            ?>
            <div class="alert alert-danger alert-dismissable"><?=$this->session->failed;?></div>
            <?php
        }
        ?>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-12">
        <div class="card">
              <div class="card-header">
                <table border="0" width="100%">
                    <tr>
                        <td><h3 class="card-title">List of Registered Users</h3></td>
                        <td align="right">                            
                        </td>
                    </tr>
                </table>                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>UID</th>
                    <th>Full Name</th>
                    <th>Birth Date</th>
                    <th>Gender</th>
                    <th>Contact Info</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $x=1;
                    foreach($company as $item){
                        if($item['status']=='confirmed'){
                            $view="style='display:none;'";
                        }else{
                            $view="";
                        }
                        echo "<tr>";
                            echo "<td>$x.</td>";
                            echo "<td>$item[app_code]</td>";
                            echo "<td>$item[app_lastname], $item[app_firstname] $item[app_middlename]</td>";
                            echo "<td>".date('M-d-Y',strtotime($item['app_birthdate']))."</td>";
                            echo "<td>$item[app_gender]</td>";
                            echo "<td>$item[app_contactno]<br>$item[app_email]</td>";
                            echo "<td>$item[status]</td>";
                            echo "<td>";
                            ?>
                                <a href="<?=base_url();?>update_user_status/<?=$item['app_code'];?>/confirmed" <?=$view;?> class="btn btn-primary btn-sm" onclick="return confirm('Do  you wish to confirm user registration?');return false;">Confirm</a>
                                <?php
                            echo "</td>";
                        echo "</tr>";
                        $x++;
                    }
                    ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>No.</th>
                    <th>UID</th>
                    <th>Full Name</th>
                    <th>Birth Date</th>
                    <th>Gender</th>
                    <th>Contact Info</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
        </div>
        <!-- /.row -->        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>