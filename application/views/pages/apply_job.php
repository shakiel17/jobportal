<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Job Application</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
              <li class="breadcrumb-item active">Application Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="col-sm-6">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><b>Application Form</b></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <?=form_open_multipart(base_url()."save_application");?>
        <input type="hidden" name="job_id" value="<?=$id;?>">        
        <div class="card-body">
        <?php
            $check=$this->Job_model->db->query("SELECT * FROM job_application WHERE job_id='$id' AND app_code='".$this->session->username."' AND `status`='pending'");
            if($check->num_rows() > 0){
                echo "<b>You already applied for this Job!</b>";
            }else{
        ?>
            <div class="form-group">
                <label>Subject</label>
                <input type="text" name="app_subject" class="form-control" placeholder="e.g. Application for IT Staff" required>
            </div>
            <div class="form-group">
                <label>Cover Letter</label>
                <textarea name="app_letter" class="form-control" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label>Resume</label>
                <input type="file" name="file" class="form-control" accept="application/pdf" required>
            </div>
            <div class="form-group">            
                <button type="submit" name="submit" class="btn btn-primary">Submit Application</button>
            </div>
            <?php
            }
            ?>
        </div>        
        <?=form_close();?>
      </div>      
      <!-- /.card -->     
      <!-- <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">                
              </div>
              <div class="card-body">
                <ul class="pagination pagination-month justify-content-center">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item">
                      <a class="page-link" href="#">
                          <p class="page-month">Jan</p>
                          <p class="page-year">2021</p>
                      </a>
                  </li>
                  <li class="page-item active">
                      <a class="page-link" href="#">
                          <p class="page-month">Feb</p>
                          <p class="page-year">2021</p>
                      </a>
                  </li>
                  <li class="page-item">
                      <a class="page-link" href="#">
                          <p class="page-month">Mar</p>
                          <p class="page-year">2021</p>
                      </a>
                  </li>
                  <li class="page-item">
                      <a class="page-link" href="#">
                          <p class="page-month">Apr</p>
                          <p class="page-year">2021</p>
                      </a>
                  </li>
                  <li class="page-item">
                      <a class="page-link" href="#">
                          <p class="page-month">May</p>
                          <p class="page-year">2021</p>
                      </a>
                  </li>
                  <li class="page-item">
                      <a class="page-link" href="#">
                          <p class="page-month">Jun</p>
                          <p class="page-year">2021</p>
                      </a>
                  </li>
                  <li class="page-item">
                      <a class="page-link" href="#">
                          <p class="page-month">Jul</p>
                          <p class="page-year">2021</p>
                      </a>
                  </li>
                  <li class="page-item">
                      <a class="page-link" href="#">
                          <p class="page-month">Aug</p>
                          <p class="page-year">2021</p>
                      </a>
                  </li>
                  <li class="page-item">
                      <a class="page-link" href="#">
                          <p class="page-month">Sep</p>
                          <p class="page-year">2021</p>
                      </a>
                  </li>
                  <li class="page-item">
                      <a class="page-link" href="#">
                          <p class="page-month">Oct</p>
                          <p class="page-year">2021</p>
                      </a>
                  </li>
                  <li class="page-item">
                      <a class="page-link" href="#">
                          <p class="page-month">Nov</p>
                          <p class="page-year">2021</p>
                      </a>
                  </li>
                  <li class="page-item">
                      <a class="page-link" href="#">
                          <p class="page-month">Dec</p>
                          <p class="page-year">2021</p>
                      </a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div> -->
</div>
    </section>
    <!-- /.content -->
    
  </div>