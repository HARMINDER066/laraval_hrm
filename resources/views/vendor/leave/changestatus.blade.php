<div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Employee Leave Status Change</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
          
             <div class="modal-dialog">
    <div class="modal-content">
        
        <form class="mt-4" action="{{route('vendor.leave.leave_status_change',$data->id)}}"  id="customeradd" method="POST">
            @csrf   
           <div class="row mb-4">
                    <label for="emailLabel" class="col-sm-3 col-form-label form-label">Status</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="status">
                        <option>Please Select Option</option>
                        <option value="0" {{$data->status == 0  ? 'selected' : ''}}>Pending</option>
                        <option value="1" {{$data->status == 1  ? 'selected' : ''}}>Approved</option>
                        <option value="2" {{$data->status == 2  ? 'selected' : ''}}>Rejected</option>

                      </select>
                    </div>
                  </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update Status</button>
            </div>
        </form>
                          
                        </div>
                          
                        </div>
                      </div>