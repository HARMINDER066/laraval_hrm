<div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Employee Password Change</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
          
             <div class="modal-dialog">
    <div class="modal-content">
        
        <form action="{{route('admin.users.changepasswordstore',$user->id)}}"  id="customeradd" method="POST">
            @csrf   
            <div class="modal-body ">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label>New Password<span class="text-danger"> *</span></label>
                            <input type="password" value="" class="form-control required new_password" placeholder="Enter New Password" name="new_password" autocomplete="new-password">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Confirm New Password<span class="text-danger"> *</span></label>
                            <input placeholder="Confirm New Password" value="" class="form-control required repeat_password" type="password" name="repeat_password" >
                            <small for="repeat_passwords" class="error m-error repeat_password_error" style="display: none">Check your confirm password.</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update Password</button>
            </div>
        </form>
                          
                        </div>
                          
                        </div>
                      </div>