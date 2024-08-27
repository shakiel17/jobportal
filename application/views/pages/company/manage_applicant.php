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
                        <td><h3 class="card-title">List of Applicant</h3></td>
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
                    <th>Job Applied</th>
                    <th>Applicant Name</th>
                    <th>Cover Letter</th>
                    <th>Resume</th>
                    <th>Date/Time Applied</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $x=1;
                    foreach($applicants as $item){  
                        $profile=$this->Job_model->getProfile($item['app_code']);
                        echo "<tr>";
                            echo "<td>$x.</td>";
                            echo "<td>$item[job_title]</td>";
                            echo "<td>$profile[app_lastname], $profile[app_firstname] $profile[app_middlename]</td>";
                            echo "<td>".nl2br($item['coverletter'])."</td>";
                            echo "<td><a href='".base_url()."view_resume/$item[id]' class='btn btn-warning' target='_blank'>View Resume</a></td>";
                            echo "<td>".date('m/d/Y',strtotime($item['datearray']))." / ".date('h:i A',strtotime($item['timearray']))."</td>";
                            echo "<td>";
                            ?>
                                
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