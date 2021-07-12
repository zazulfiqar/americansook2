@extends('backend.layouts.master')

@section('main-content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">
                @include('backend.layouts.notification')
            </div>
        </div>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">Features</h6>

            @if(Auth::user()->role=='admin')
            @if(count($features)>0)
            <a href="{{route('feature.edit',$id)}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add Fatures"><i class="fas fa-plus"></i> Edit Features</a>
            @else
            <a href="{{route('feature.create',$id)}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Edit Features"><i class="fas fa-pencil"></i> Add Features</a>
            @endif
            @endif
                @if(Auth::user()->role=='vendor')
                    @if(count($features)>0)
                        <a href="{{route('vendorfeature.edit',$id)}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add Fatures"><i class="fas fa-plus"></i> Edit Features</a>
                    @else
                        <a href="{{route('vendorfeature.create',$id)}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Edit Features"><i class="fas fa-pencil"></i> Add Features</a>
                    @endif
                @endif
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if(count($features)>0)
                    <table class="table table-bordered table-striped" id="product-dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Mileage</th>
                            <th>Fuel Type</th>
                            <th>Horse Power</th>
                            <th>Exterior <br> Color</th>
                            <th>Interior <br> Color</th>
                            <th>Registered <br> City</th>
                            <th>Condition</th>
                            <th>Images</th>
{{--                            <th>Action</th>--}}
                        </tr>
                        </thead>
                        <tfoot>

                        </tfoot>
                        <tbody>

                        @foreach($features as $feature)
                            <tr>
                                <td>{{$feature->id}}</td>
                                <td>{{$feature->mileage}}</td>
                                @if($feature->fuel_type == 1)
                                <td>Diesel</td>
                                @elseif($feature->fuel_type == 2)
                                <td>Petrol</td>
                                @elseif($feature->fuel_type == 3)
                                <td>CNG</td>
                                @endif

                                <td>{{$feature->product_engine}}</td>
                                <td>{{$feature->exterior_color}}</td>
                                <td>{{$feature->interior_color}}</td>
                                <td>{{$feature->registered_city}}</td>

                                @if($feature->condition == 1)
                                <td>Excellent</td>
                                @elseif($feature->condition == 2)
                                <td>Good</td>
                                @elseif($feature->condition == 3)
                                <td>Fair</td>
                                @endif
                                <td>
                                    @if($feature->images)
                                        <img src="{{url('gpv_net_new_world/storage/app/'.$feature->images)}}" class="img-fluid"  style="max-width:80px" alt="User Avatar">
                                    @else
                                        <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid" style="max-width:80px" alt="avatar.png">
                                    @endif
                                </td>
{{--                                <td> <center>--}}
{{--                                    <form method="POST" action="{{route('product.destroy',[$feature->id])}}">--}}
{{--                                        @csrf--}}
{{--                                        @method('delete')--}}
{{--                                        <button class="btn btn-danger btn-sm dltBtn" data-id={{$feature->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>--}}
{{--                                    </form>--}}
{{--                                    </center>--}}
{{--                                </td>--}}
{{--                                 Delete Modal--}}
{{--                                 <div class="modal fade" id="delModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="#delModal{{$user->id}}Label" aria-hidden="true">--}}
{{--                                    <div class="modal-dialog" role="document">--}}
{{--                                      <div class="modal-content">--}}
{{--                                        <div class="modal-header">--}}
{{--                                          <h5 class="modal-title" id="#delModal{{$user->id}}Label">Delete user</h5>--}}
{{--                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                            <span aria-hidden="true">&times;</span>--}}
{{--                                          </button>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-body">--}}
{{--                                          <form method="post" action="{{ route('categorys.destroy',$user->id) }}">--}}
{{--                                            @csrf--}}
{{--                                            @method('delete')--}}
{{--                                            <button type="submit" class="btn btn-danger" style="margin:auto; text-align:center">Parmanent delete user</button>--}}
{{--                                          </form>--}}
{{--                                        </div>--}}
{{--                                      </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h6 class="text-center">No Feature found!!! Please Add Features First</h6>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <style>
        div.dataTables_wrapper div.dataTables_paginate{
            display: none;
        }
        .zoom {
            transition: transform .2s; /* Animation */
        }

        .zoom:hover {
            transform: scale(5);
        }
    </style>
@endpush

@push('scripts')

    <!-- Page level plugins -->
    <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
    <script>

        $('#product-dataTable').DataTable( {
            "scrollX": false,
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[10,11,12]
                }
            ]
        } );

        // Sweet alert

        function deleteData(id){

        }
    </script>
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.dltBtn').click(function(e){
                var form=$(this).closest('form');
                var dataID=$(this).data('id');
                // alert(dataID);
                e.preventDefault();
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            form.submit();
                        } else {
                            swal("Your data is safe!");
                        }
                    });
            })
        })
    </script>
@endpush
