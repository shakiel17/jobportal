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
                        <td><h3 class="card-title">List of Job Offerings</h3></td>
                        <td align="right">
                            <a href="#" class="btn btn-primary btn-sm addJob" data-toggle="modal" data-target="#ManageJob" data-id="<?=$comp_id['id'];?>"><i class="fa fa-plus"></i> New Job Offering</a>
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
                    <th>Job Title</th>
                    <th width="45%">Job Description</th>
                    <th>Keywords</th>
                    <th>Status</th>
                    <th>Date/Time Posted</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $x=1;
                    foreach($jobs as $item){
                        if($item['job_status']=="Posted"){
                            $status="Unpost";
                            $stat="Unposted";
                        }else{
                            $status="Post";
                            $stat="Posted";
                        }
                        echo "<tr>";
                            echo "<td>$x.</td>";
                            echo "<td>$item[job_title]</td>";
                            echo "<td>$item[job_description]</td>";
                            echo "<td>$item[job_keyword]</td>";
                            echo "<td>$item[job_status]</td>";
                            echo "<td>".date('m/d/Y',strtotime($item['datearray']))." / ".date('h:i A',strtotime($item['timearray']))."</td>";
                            echo "<td>";
                            ?>
                                <a href='#' class='btn btn-warning btn-sm editJob' data-toggle='modal' data-target='#ManageJob' data-id='<?=$item['id'];?>_<?=$item['job_title'];?>_<?=$item['job_description'];?>_<?=$item['job_keyword'];?>_<?=$comp_id['id'];?>'>Edit</a>
                                <a href="<?=base_url();?>change_job_status/<?=$item['id'];?>/<?=$stat;?>" class="btn btn-info btn-sm" onclick="return confirm('Do you wish to change the status of this record?');return false;"><?=$status;?></a>
                                <a href="<?=base_url();?>delete_job/<?=$item['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Do you wish to delete this record?');return false;">Delete</a>
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
                    <th>Job Title</th>
                    <th>Job Description</th>
                    <th>Keywords</th>
                    <th>Status</th>
                    <th>Date/Time Posted</th>
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