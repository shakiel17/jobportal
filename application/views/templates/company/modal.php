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
              <a href="<?=base_url();?>company_logout" class="btn btn-danger">Yes, I will go</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="ManageJob">
        <div class="modal-dialog modal-md">
            <?=form_open(base_url()."save_job");?>
            <input type="hidden" name="job_id" id="job_id">
            <input type="hidden" name="comp_id" id="job_comp_id">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Job Offering Manager</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>            
            <div class="modal-body">
              <div class="form-group">
                <label>Job Title</label>
                <input type="text" class="form-control" name="job_title" id="job_title">
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" rows="3" name="job_description" id="job_description"></textarea>
              </div>
              <div class="form-group">
                <label>Keywords</label>
                <textarea class="form-control" rows="3" name="job_keyword" id="job_keyword"></textarea>
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

      <div class="modal fade" id="ConfirmApplicant">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Confirm Applicant</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?=form_open(base_url()."send_email");?>
            <input type="hidden" name="job_id" id="jobid">
            <input type="hidden" name="email" id="job_email">            
            <div class="modal-body">
              <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control" required>
                  <option value="">Select Status</option>
                  <option value="accepted">Accept</option>
                  <option value="declined">Decline</option>
                </select>
              </div>
              <div class="form-group">
                <label>Remarks</label>
                <textarea name="remarks" class="form-control" rows="5"></textarea>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
            <?=form_close();?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div> 