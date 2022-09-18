       @extends('admin.layout')
       @push('custom-scripts')

<script>
   $(function () {
   $('.my-colorpicker2').colorpicker();
    $('.my-colorpicker2').on('colorpickerChange', function (event) {
        $('.my-colorpicker2 .bx-checkbox-square').css('color', event.color.toString());
    });
$('.my-colorpicker2').popover({
    container: 'body'
  })

    });
</script>
       @endpush
       @section('content')

      <!-- Page Header -->
      <div class="page-content">
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">General Setting</div>
           
          </div>
      <!-- End Page Header -->
      <div class="row">
        <div class="col-lg-12 mb-3 mb-lg-0">
          <!-- Card -->
          <div class="card mb-3 mb-lg-5">
            <!-- Header -->
            <div class="card-header">
              <h4 class="card-header-title">General Setting</h4>
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
            <form class="form-horizontal" action="{{ route('admin.settingaddsubmit' ) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group row mb-4">
                                <label for="website_title" class="col-sm-2 control-label">{{ __('Site Title') }} <span
                                        class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$basicinfo->website_title}}" name="website_title" placeholder="{{ __('Site Title') }}">
                                    @if ($errors->has('website_title'))
                                    <p class="text-danger"> {{ $errors->first('website_title') }} </p>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group row mb-4">
                                <label for="base_color" class="col-sm-2 control-label">{{ __('Sidebar Color') }}</label>
                                <div class="col-sm-10">
                                    <div class="input-group my-colorpicker2">
                                        <input type="color" class="form-control" value="{{ $basicinfo->sidebar_color }}"   placeholder="#000000" name="sidebar_color" data-mdb-color-picker-disabled="true">
                                        <div class="input-group-append">
                                          <span class="input-group-text"><i class="fadeIn animated bx bx-checkbox-square" style="color: #{{ $basicinfo->sidebar_color }};font-size:30px"></i></span>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group row mb-4">
                                <label for="base_color" class="col-sm-2 control-label">{{ __('Navbar Background  Color') }}</label>
                                <div class="col-sm-10">
                                    <div class="input-group my-colorpicker2">
                                        <input type="color" class="form-control" value="{{ $basicinfo->navbar_color }}"   placeholder="#000000" name="navbar_color">
                                        <div class="input-group-append">
                                          <span class="input-group-text"><i class="fadeIn animated bx bx-checkbox-square" style="color: #{{ $basicinfo->navbar_color }};font-size:30px"></i></span>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group row mb-4">
                                <label for="base_color" class="col-sm-2 control-label">{{ __('Navbar Hover Background  Color') }}</label>
                                <div class="col-sm-10">
                                    <div class="input-group my-colorpicker2">
                                        <input type="color" class="form-control" value="{{ $basicinfo->navbar_hover_color }}"  placeholder="#000000" name="navbar_hover_color">
                                        <div class="input-group-append">
                                          <span class="input-group-text"><i class="fadeIn animated bx bx-checkbox-square" style="color: #{{ $basicinfo->navbar_hover_color }};font-size:30px"></i></span>
                                        </div>
                                      </div>
                                </div>
                            </div>
                                <div class="form-group row mb-4">
                                <label for="base_color" class="col-sm-2 control-label">{{ __('Navbar Link Color') }}</label>
                                <div class="col-sm-10">
                                    <div class="input-group my-colorpicker2">
                                        <input type="color" class="form-control" value="{{ $basicinfo->navbar_link_color }}"  placeholder="#000000" name="navbar_link_color">
                                        <div class="input-group-append">
                                          <span class="input-group-text"><i class="fadeIn animated bx bx-checkbox-square" style="color: #{{ $basicinfo->navbar_link_color }};font-size:30px"></i></span>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                            
                                
                            
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">{{ __('Favicon') }} <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                   <img class="mb-3 show-img img-demo" src="
                                    @if($basicinfo->fav_icon)
                                    {{ asset('assets/front/img/'.$basicinfo->fav_icon) }}
                                    @else
                                    {{ asset('assets/admin/img/img-demo.jpg') }}
                                    @endif"
                                    " alt="">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input up-img" name="fav_icon" id="fav_icon">
                                    </div>
                                    <p class="help-block text-info">{{ __('Upload 40X40 (Pixel) Size image or Squre size image for best quality. 
                                        Only jpg, jpeg, png image is allowed.') }}
                                    </p>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">{{ __('Site Header Logo') }} <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                   <img class="mb-3 show-img img-demo" src="
                                    @if($basicinfo->header_logo)
                                    {{ asset('assets/front/img/'.$basicinfo->header_logo) }}
                                    @else
                                    {{ asset('assets/admin/img/img-demo.jpg') }}
                                    @endif" alt="" width="100">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input up-img" name="header_logo" id="header_logo">
                                    </div>
                                    <p class="help-block text-info">{{ __('Upload 150X40 (Pixel) Size image for best quality.
                                        Only jpg, jpeg, png image is allowed.') }}
                                    </p>
                                </div>

                            </div>

                            
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                </div>
                            </div>

                        </form>
                </div>
              </div>
            </div>
          </div>
        </div>
            @endsection
