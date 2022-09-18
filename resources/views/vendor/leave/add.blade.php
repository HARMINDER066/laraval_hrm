       @extends('vendor.layout')
       @section('content')

      <!-- Page Header -->
      <div class="page-content">
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Add Leave</div>
           
          </div>
      <!-- End Page Header -->

      <div class="row">
        <div class="col-lg-12 mb-3 mb-lg-0">
          <!-- Card -->
          <div class="card mb-3 mb-lg-5">
            <!-- Header -->
            <div class="card-header">
              <h4 class="card-header-title">Add Leave</h4>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
              @if($errors->any())
    <div class="alert alert-danger">
        <p><strong>Opps Something went wrong</strong></p>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
          <form class="py-md-5" method="post" action="{{route('vendor.leaveaddsubmit')}}">
               @csrf
               <div class="row mb-4">
                    <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">User <i class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Displayed on public forums, such as Front."></i></label>

                    <div class="col-sm-9">
                      <div class="input-group input-group-sm-vertical">
                          <select class="form-control" name="employee_id">
                            <option>please Select User</option>
                            @foreach($user as $data)
                            <option value="{{$data->id}}">{{$data->first_name}} {{$data->last_name}}</option>
                            @endforeach
                          </select>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">Leave Reason <i class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Displayed on public forums, such as Front."></i></label>

                    <div class="col-sm-9">
                      <div class="input-group input-group-sm-vertical">
                        <input type="text" class="form-control" name="leave_reason" id="lastNameLabel" placeholder="Enter Leave Reason" aria-label="Boone">
                      </div>
                    </div>
                  </div>
                  <!-- End Form -->

                  <!-- Form -->
                  <div class="row mb-4">
                    <label for="emailLabel" class="col-sm-3 col-form-label form-label">Date From</label>

                    <div class="col-sm-9">
                      <input type="date" class="form-control" name="datefrom" id="emailLabel"  aria-label="clarice@site.com">
                    </div>
                  </div>

                  <div class="row mb-4">
                    <label for="emailLabel" class="col-sm-3 col-form-label form-label">Date To</label>

                    <div class="col-sm-9">
                      <input type="date" class="form-control" name="dateto" id="emailLabel"  aria-label="clarice@site.com">
                    </div>
                  </div>

                   <!-- Form -->
                  <div class="js-add-field row mb-4">
                    <label for="phoneLabel" class="col-sm-3 col-form-label form-label">Description</label>

                    <div class="col-sm-9">
                      <div class="input-group input-group-sm-vertical">
                        <textarea  class="js-input-mask form-control" name="description" id="phoneLabel" placeholder="Enter Package Feature"></textarea>
                          </div>
                    </div>

                  </div>

                  <div class="row mb-4">
                    <label for="emailLabel" class="col-sm-3 col-form-label form-label">Status</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="status">
                        <option>Please Select Option</option>
                        <option value="0" >Pending</option>
                        <option value="1">Approved</option>
                        <option value="2">Rejected</option>

                      </select>
                    </div>
                  </div>
                  <!-- End Form -->

                     
                      <div class="row mt-4">
                    <div class="col-sm-4">
                      <button class="btn btn-primary" type="submit">submit</button>
                    </div>
                  </div>
                  <!-- End Form -->
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
            @endsection
