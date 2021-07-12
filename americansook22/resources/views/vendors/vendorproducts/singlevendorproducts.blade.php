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
            <h6 class="m-0 font-weight-bold text-primary float-left">Vendors Products</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="user-dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Summary</th>
                        <th>Add Date</th>
                        <th>Photo</th>
                        <th>Price</th>
                        <th>Old/New</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Title </th>
                        <th>Summary</th>
                        <th>Add Date</th>
                        <th>Photo</th>
                        <th>Price</th>
                        <th>Old/New</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->title}}</td>
                            <td>{{$product->summary}}</td>

                            {{--                            <td>{{(($product->created_at)? $product->created_at->diffForHumans() : '')}}</td>--}}
                            <td>{{\Carbon\Carbon::parse($product->created_at)->diffForHumans()}}</td>
                            <td>
                                <img src="{{url('/Carjeep/public/../storage/app/'.$product->photo)}}" class="img-fluid"  style="max-width:80px" alt="User Avatar">
                            </td>
                            <td>${{$product->price}}</td>
                            <td>
                                @if($product->old_new==1)
                                    <span >Old</span>
                                @elseif($product->old_new==2)
                                <span >New</span>
                                @endif
                            </td>
                            <td>
                                @if($product->id)
                                <a href="{{route('single.products.details',$product->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="View Featuress" data-placement="bottom"><i class="fas fa-eye"></i></a>
                                @else
                                {{$product->id}}
                                No features
                                @endif
                                {{-- @if($product->is_approved == 0)
                                    <a href="{{route('approve_product',$product->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="Approve" data-placement="bottom"><i class="fas fa-check"></i></a>
                                @elseif($product->is_approved==1)
                                    <a href="{{route('reject_product',$product->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="Reject" data-placement="bottom"><i class="fas fa-times"></i></a>
                                @endif --}}

                            </td>
                            {{-- Delete Modal --}}
                            {{-- <div class="modal fade" id="delModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="#delModal{{$product->id}}Label" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="#delModal{{$user->id}}Label">Delete user</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form method="post" action="{{ route('users.destroy',$user->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger" style="margin:auto; text-align:center">Parmanent delete user</button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                            </div> --}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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

        $('#user-dataTable').DataTable( {
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[6,7]
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
