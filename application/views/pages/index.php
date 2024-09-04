<div class="content-wrapper" style="background: url(<?=base_url();?>design/dist/img/kidapawan.jpg) no-repeat; background-size: cover;">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h2 class="text-center display-4"><b>Find REAL, ONLINE Job.</b></h2>            
            <?=form_open(base_url()."search_jobs");?>                
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <!-- <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Result Type:</label>
                                    <select class="select2" multiple="multiple" data-placeholder="Any" style="width: 100%;">
                                        <option>Text only</option>
                                        <option>Images</option>
                                        <option>Video</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Sort Order:</label>
                                    <select class="select2" style="width: 100%;">
                                        <option selected>ASC</option>
                                        <option>DESC</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Order By:</label>
                                    <select class="select2" style="width: 100%;">
                                        <option selected>Title</option>
                                        <option>Date</option>
                                    </select>
                                </div>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <input type="search" class="form-control form-control-lg" placeholder="Type your keywords here" name="description">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>                                
                            </div>
                            <br>
                            <center>
                                <a href="<?=base_url();?>view_all_jobs" style="color:white;text-decoration:underline;" class="btn btn-primary btn-sm">Browse all Jobs</a>
                            </center>
                            
                        </div>
                    </div>
                </div>
            <?=form_close();?>
        </div>
    </section>
  </div>