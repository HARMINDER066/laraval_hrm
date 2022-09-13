       @extends('vendor.layout')
       @section('content')

      <!-- Page Header -->
      <div class="page-content">
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Add Employee</div>
           
          </div>
      <!-- End Page Header -->

      <div class="row">
        <div class="col-lg-12 mb-3 mb-lg-0">
          <!-- Card -->
          <div class="card mb-3 mb-lg-5">
            <!-- Header -->
            <div class="card-header">
              <h4 class="card-header-title">Add Employee</h4>
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
          <form class="py-md-5" method="post" action="{{route('vendor.useraddsubmit')}}" enctype="multipart/form-data">
               @csrf
                  <div class="row mb-4">
                    <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">Full name <i class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Displayed on public forums, such as Front."></i></label>

                    <div class="col-sm-9">
                      <div class="input-group input-group-sm-vertical">
                        <input type="text" class="form-control" name="first_name" id="firstNameLabel" placeholder="Enter First Name" aria-label="Clarice">
                        <input type="text" class="form-control" name="last_name" id="lastNameLabel" placeholder="Enter Last Name" aria-label="Boone">
                      </div>
                    </div>
                  </div>
                  <!-- End Form -->

                  <!-- Form -->
                  <div class="row mb-4">
                    <label for="emailLabel" class="col-sm-3 col-form-label form-label">Email</label>

                    <div class="col-sm-9">
                      <input type="email" class="form-control" name="email" id="emailLabel" placeholder="Enter Email Address" aria-label="clarice@site.com">
                    </div>
                  </div>

                  <div class="row mb-4">
                    <label for="emailLabel" class="col-sm-3 col-form-label form-label">Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" name="password" id="emailLabel" placeholder="Enter Password" aria-label="clarice@site.com">
                    </div>
                  </div>
                  <!-- End Form -->

                  <!-- Form -->
                  <div class="js-add-field row mb-4">
                    <label for="phoneLabel" class="col-sm-3 col-form-label form-label">Phone</label>

                    <div class="col-sm-9">
                      <div class="input-group input-group-sm-vertical">
                        <input type="text" class="js-input-mask form-control" name="phone" id="phoneLabel" placeholder="Enter Phone Number">
                          </div>


                    </div>
                  </div>
                  <div class="row mb-4">
                    <label for="emailLabel" class="col-sm-3 col-form-label form-label">Address</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address" aria-label="clarice@site.com">
                    </div>
                  </div>
                      <div class="row mb-4">
                    <label for="organizationLabel" class="col-sm-3 col-form-label form-label">Organization</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="organization" id="organizationLabel" placeholder="Enter Organization" aria-label="Htmlstream">
                    </div>
                  </div>
                  <!-- End Form -->

                  <!-- Form -->
                  <div class="row mb-4">
                    <label for="departmentLabel" class="col-sm-3 col-form-label form-label">Department</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="department" id="departmentLabel" placeholder="Enter Department" aria-label="Human resources">
                    </div>
                  </div>
                  <!-- End Form -->

                  <!-- Form -->
                  <div class="row mb-4">
                    <label class="col-sm-3 col-form-label form-label">Account type</label>

                    <div class="col-sm-9">
                      <div class="input-group input-group-sm-vertical">
                        <!-- Radio Check -->
                        <label class="form-control" for="userAccountTypeRadio1">
                          <span class="form-check">
                            <input type="radio" class="form-check-input" name="account_type" id="userAccountTypeRadio1" value="Individual">
                            <span class="form-check-label">Individual</span>
                          </span>
                        </label>
                        <!-- End Radio Check -->

                        <!-- Radio Check -->
                        <label class="form-control" for="userAccountTypeRadio2">
                          <span class="form-check">
                            <input type="radio" class="form-check-input" name="account_type" id="userAccountTypeRadio2" value="Company">
                            <span class="form-check-label">Company</span>
                          </span>
                        </label>
                        <!-- End Radio Check -->
                      </div>
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
