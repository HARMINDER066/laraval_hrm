<div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Employee Update Attendence</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
          
             <div class="modal-dialog">
    <div class="modal-content">
        
        <form action="{{route('admin.users.edit_attendence_store',$user->id)}}"  id="customeradd" method="POST">
            @csrf   
            <div class="modal-body ">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Time In<span class="text-danger"> *</span></label>
                            <input type="time" value="{{$user->time_in}}" class="form-control required new_password"  name="time_in" autocomplete="new-password">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Time Out<span class="text-danger"> *</span></label>
                            <input type="time" value="{{$user->time_out}}" class="form-control required new_password"  name="time_out" autocomplete="new-password">
                        </div>
                    </div>
                </div>
                 <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Date<span class="text-danger"> *</span></label>
                            <input type="date" value="{{$user->date}}" class="form-control required new_password" name="date" autocomplete="new-password">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Address<span class="text-danger"> *</span></label>
                            <input type="text" value="{{$user->address}}" class="form-control required new_password" name="address" autocomplete="new-password">
                        </div>
                    </div>
                </div>
            
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update Attendence</button>
            </div>
        </form>
                          
                        </div>
                          
                        </div>
                      </div>