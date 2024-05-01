<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Search Job Result (<?=count($jobs);?>)</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
              <li class="breadcrumb-item active">Search Result</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <?php
      if(count($jobs)>0){
        foreach($jobs as $item){
      ?>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><b><?=$item['job_title'];?></b></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
        <p style="font-size:20px;">
          <b>Company Details</b><br><br>
          <?=$item['comp_name'];?><br>
          <?=$item['comp_address'];?><br>
          <?=$item['comp_email'];?><br>
          <?=$item['comp_contactno'];?><br>
        </p>
          <br>
          <b>Description:</b><br>
          <p style="font-size:20px;"><pre><?=$item['job_description'];?></pre></p>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Date/Time Posted: <b><?=date('M d, Y',strtotime($item['datearray']));?> | <?=date('h:i A',strtotime($item['timearray']));?></b>
        </div>
        <!-- /.card-footer-->
      </div>      
      <!-- /.card -->
      <?php
        }
      }else{
        echo "<center>No Job found!</center>";
        ?>
        <center>
            <a href="<?=base_url();?>" style="color:black;text-decoration:underline;">Go Back</a>
        </center>
        <?php
      }
      ?>
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
    </section>
    <!-- /.content -->
    
  </div>