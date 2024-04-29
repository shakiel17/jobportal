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
              <a href="<?=base_url();?>admin_logout" class="btn btn-danger">Yes, I will go</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="ManageCompany">
        <div class="modal-dialog modal-md">
            <?=form_open(base_url()."save_company");?>
            <input type="hidden" name="comp_id" id="comp_id">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Company Manager</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>            
            <div class="modal-body">
              <div class="form-group">
                <label>Company Name</label>
                <input type="text" class="form-control" name="comp_name" id="comp_name">
              </div>
              <div class="form-group">
                <label>Address</label>
                <textarea class="form-control" rows="3" name="comp_address" id="comp_address"></textarea>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="comp_email" id="comp_email">"
              </div>
              <div class="form-group">
                <label>Contact No.</label>
                <input type="text" class="form-control" name="comp_contactno" id="comp_contactno">"
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