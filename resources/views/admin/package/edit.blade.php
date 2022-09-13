       @extends('admin.layout')
       @section('content')

      <!-- Page Header -->
      <div class="page-content">
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Edit Package</div>
           
          </div>
      <!-- End Page Header -->

      <div class="row">
        <div class="col-lg-12 mb-3 mb-lg-0">
          <!-- Card -->
          <div class="card mb-3 mb-lg-5">
            <!-- Header -->
            <div class="card-header">
              <h4 class="card-header-title">Edit Package</h4>
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
          <form class="py-md-5" method="post" action="{{route('admin.package.editsave',$package->id)}}">
               @csrf
                  <div class="row mb-4">
                    <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">Title <i class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Displayed on public forums, such as Front."></i></label>

                    <div class="col-sm-9">
                      <div class="input-group input-group-sm-vertical">
                        <input type="text" class="form-control" value="{{$package->title}}" name="title" id="lastNameLabel" placeholder="Enter Package Name" aria-label="Boone">
                      </div>
                    </div>
                  </div>
                  <!-- End Form -->

                  <!-- Form -->
                  <div class="row mb-4">
                    <label for="emailLabel" class="col-sm-3 col-form-label form-label">Price</label>

                    <div class="col-sm-9">
                      <input type="number" class="form-control" value="{{$package->price}}" name="price" id="emailLabel" placeholder="Enter Package Price" aria-label="clarice@site.com">
                    </div>
                  </div>

                  <div class="row mb-4">
                    <label for="emailLabel" class="col-sm-3 col-form-label form-label">Time</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="time">
                        <option>Please Select Option</option>
                        <option value="Monthly" {{$package->time == 'Monthly'  ? 'selected' : ''}}>Monthly</option>
                        <option value="Yearly" {{$package->time == 'Yearly'  ? 'selected' : ''}}>Yearly</option>
                      </select>
                    </div>
                  </div>
                  <!-- End Form -->

                  <!-- Form -->
                  <div class="js-add-field row mb-4">
                    <label for="phoneLabel" class="col-sm-3 col-form-label form-label">Feature</label>

                    <div class="col-sm-9">
                      <div class="input-group input-group-sm-vertical">
                        <textarea  class="js-input-mask form-control"  name="feature" id="phoneLabel" placeholder="Enter Package Feature">{{$package->feature}}</textarea>
                          </div>
                          <p style="color:red">Use Multiple Seprate with Comma</p>
                    </div>

                  </div>
                  <div class="row mb-4">
                    <label for="emailLabel" class="col-sm-3 col-form-label form-label">No Of Employee</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" value="{{$package->no_employee}}" name="no_employee" id="address" placeholder="Enter No of Employee" aria-label="clarice@site.com">
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
