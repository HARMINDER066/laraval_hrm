 @extends('vendor.layout')
  @push('custom-css')
       <link href="{{asset('backend/assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="{{asset('backend/assets/plugins/switch/switchery.min.css')}}">


@endpush
 @push('custom-scripts')
   <script src="{{ asset('backend/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{ asset('backend/assets/js/table-datatable.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/assets/plugins/switch/switchery.min.js')}}"></script>

    <script type="text/javascript">
      
  $(function () {
    
      $.extend($.fn.dataTable.defaults, {
        autoWidth: false,
        
        
        drawCallback: function () {
          //  load_active_inactive();
            delete_recodes();
        },
        preDrawCallback: function () {

        }
    });

     

    var admintable = $('#example_datatables_new').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('vendor.attendence.index') }}",
        columns: [
                    {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'first_name', name: 'first_name'},
              {data: 'last_name', name: 'last_name'},
               {data: 'admin', name: 'admin'},
               {data: 'time_in', name: 'last_name'},
               {data: 'time_out', name: 'admin'},
                {data: 'date', name: 'address'},
                {data: 'address', name: 'address'},


        ]
    });

     
function delete_recodes() {
        $('.delete_customer').on('click', function () {
            var url = $(this).attr("data-value");


        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
               $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                        }
                    }).done(function (data) {
                        if (data == 1)
                        {

                            $('#example_datatables_new').DataTable().row($(this).parents('tr')).remove().draw();
                             Swal.fire({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    type: 'success',
                    timer: 3000,
                    title: "Attendence Succesfully Deleted"
                })

                        } else {
                                 Swal.fire({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    type: 'error',
                    timer: 3000,
                    title: "Error Ocuured"
                })
                        }
                    });
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                    'Cancelled',
                    'Your file is safe :)',
                    'error'
                )
            }
        });


            
        });

    }

 

 });
</script>
@endpush

       @section('content')

<div class="page-content">

          <!--start breadcrumb-->
          <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Employee List</div>
            
          </div>
          <!--end breadcrumb-->
                <hr>
              <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                            <table id="example_datatables_new" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                         <th>Action</th>
                                        <th>First Name</th>
                                        <th>Lastname</th>
                                         <th>Admin</th>
                                         <th>Time In</th>
                                        <th>Time Out</th>
                                         <th>Date</th>
                                        <th>Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Action</th>
                                        <th>First Name</th>
                                        <th>Lastname</th>
                                        <th>Admin</th>
                                         <th>Time In</th>
                                        <th>Time Out</th>
                                         <th>Date</th>
                                        <th>Address</th>
                                    </tr>
                                </tfoot>
                            </table>
                            </div>            
                        </div>
  </div>
</div>
       @endsection