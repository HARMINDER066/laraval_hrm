 @extends('admin.layout')
  @section('content')

<div class="page-content">

          <!--start breadcrumb-->
          <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Profile Update</div>
            
          </div>
          <!--end breadcrumb-->
                <hr>
              <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs nav-primary" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="tab" data-value="admin" href="#primaryhome" role="tab" aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"><ion-icon name="home-sharp" class="me-1"></ion-icon>
                                                </div>
                                                <div class="tab-title">Admin Profile</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" data-value="customers" href="#primaryprofile" role="tab" aria-selected="false">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"><ion-icon name="person-sharp" class="me-1"></ion-icon>
                                                </div>
                                                <div class="tab-title">Password Change</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content py-3">
                                    <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                                  <form class="py-md-5" method="post" action="{{route('admin.profile.save',$user->id)}}" enctype="multipart/form-data">
               @csrf
                  <div class="row mb-4">
                    <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">Full name <i class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Displayed on public forums, such as Front."></i></label>

                    <div class="col-sm-9">
                      <div class="input-group input-group-sm-vertical">
                        <input type="text" class="form-control" name="name"  value="{{$user->name}}" id="firstNameLabel" placeholder="Enter First Name" aria-label="Clarice">
                      </div>
                    </div>
                  </div>
                  <!-- End Form -->

                  <!-- Form -->
                  <div class="row mb-4">
                    <label for="emailLabel" class="col-sm-3 col-form-label form-label">Email</label>

                    <div class="col-sm-9">
                      <input type="email" class="form-control" name="email"  value="{{$user->email}}" id="emailLabel" placeholder="Enter Email Address" aria-label="clarice@site.com">
                    </div>
                  </div>

                 
                  <!-- End Form -->

                  <!-- Form -->
                  <div class="js-add-field row mb-4">
                    <label for="phoneLabel" class="col-sm-3 col-form-label form-label">Phone</label>

                    <div class="col-sm-9">
                      <div class="input-group input-group-sm-vertical">
                        <input type="text" class="js-input-mask form-control" name="phone"  value="{{$user->phone}}" id="phoneLabel" placeholder="Enter Phone Number">
                          </div>


                    </div>
                  </div>
                  <div class="row mb-4">
                    <label for="emailLabel" class="col-sm-3 col-form-label form-label">Address</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="address"  value="{{$user->address}}" id="address" placeholder="Enter Address" aria-label="clarice@site.com">
                    </div>
                  </div>
                      <div class="row mb-4">
                    <label for="organizationLabel" class="col-sm-3 col-form-label form-label">Comapny Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="company_name"  value="{{$user->company_name}}" id="organizationLabel" placeholder="Enter Organization" aria-label="Htmlstream">
                    </div>
                  </div>
                  <!-- End Form -->

                  <!-- Form -->
                  
                  <!-- End Form -->

                  <!-- Form -->
                  
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
                                    <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
                              <form class="py-md-5" method="post" action="{{route('admin.profile.passwordsave',$user->id)}}" enctype="multipart/form-data">
               @csrf
                  <div class="row mb-4">
                    <label for="emailLabel" class="col-sm-3 col-form-label form-label">New Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" name="password" id="emailLabel" placeholder="Enter new Password" aria-label="clarice@site.com">
                    </div>
                  </div>
                  <div class="row mb-4">
                    <label for="emailLabel" class="col-sm-3 col-form-label form-label">Repeat Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" name="repeat_password" id="emailLabel" placeholder="Enter Repeat Password" aria-label="clarice@site.com">
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