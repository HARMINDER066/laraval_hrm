       @extends('admin.layout')
       @section('content')

      <!-- Page Header -->
      <div class="page-content">
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Edit Vendor</div>
           
          </div>
      <!-- End Page Header -->

      <div class="row">
        <div class="col-lg-12 mb-3 mb-lg-0">
          <!-- Card -->
          <div class="card mb-3 mb-lg-5">
            <!-- Header -->
            <div class="card-header">
              <h4 class="card-header-title">Edit Vendor</h4>
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
          <form class="py-md-5" action="{{route('admin.vendor.editsave',$user->id)}}"  method="POST" enctype="multipart/form-data">
               @csrf
                  <div class="row mb-4">
                    <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">Full name <i class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Displayed on public forums, such as Front."></i></label>

                    <div class="col-sm-9">
                      <div class="input-group input-group-sm-vertical">
                        <input type="text" class="form-control" name="name" value="{{$user->name}}" id="firstNameLabel" placeholder="Enter  Name" aria-label="Clarice">
                      </div>
                    </div>
                  </div>
                  <!-- End Form -->

                  <!-- Form -->
                  <div class="row mb-4">
                    <label for="emailLabel" class="col-sm-3 col-form-label form-label">Email</label>

                    <div class="col-sm-9">
                      <input type="email" class="form-control" name="email" value="{{$user->email}}" id="emailLabel" placeholder="Enter Email Address" aria-label="clarice@site.com">
                    </div>
                  </div>
                  <!-- Form -->
                  <div class="js-add-field row mb-4">
                    <label for="phoneLabel" class="col-sm-3 col-form-label form-label">Phone</label>

                    <div class="col-sm-9">
                      <div class="input-group input-group-sm-vertical">
                        <input type="text" class="js-input-mask form-control" name="phone" value="{{$user->phone}}" id="phoneLabel" placeholder="Enter Phone Number">
                          </div>


                    </div>
                  </div>
                  <div class="row mb-4">
                    <label for="emailLabel" class="col-sm-3 col-form-label form-label">Address</label>

                    <div class="col-sm-9">
                      <textarea type="text" class="form-control" name="address" value="{{$user->address}}" id="address" placeholder="Enter Address" aria-label="clarice@site.com"> Enter Address</textarea>
                    </div>
                  </div>
                      <div class="row mb-4">
                    <label for="organizationLabel" class="col-sm-3 col-form-label form-label">Date Of Birth</label>

                    <div class="col-sm-9">
                      <input type="date" class="form-control" name="date_of_birth" value="{{$user->date_of_birth}}" id="organizationLabel" placeholder="Enter DOB" aria-label="Htmlstream">
                    </div>
                  </div>
                  <!-- End Form -->

                  <!-- Form -->
                  <div class="row mb-4">
                    <label for="departmentLabel" class="col-sm-3 col-form-label form-label">Company Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="company_name" value="{{$user->company_name}}" id="departmentLabel" placeholder="Enter Company Name" aria-label="Human resources">
                    </div>
                  </div>
                  <div class="row mb-4">
                    <label for="departmentLabel" class="col-sm-3 col-form-label form-label">Image</label>

                    <div class="col-sm-9">
                      <input type="file" class="form-control" name="image">
                    </div>
                  </div>
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
