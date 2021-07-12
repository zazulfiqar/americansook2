@extends('backend.layouts.master')

@section('main-content')
    <div class="card">
        <h5 class="card-header">Add Features</h5>
        <div class="card-body">
            @if (Auth::user()->role == 'vendor')
                <form method="post" action="{{route('vendorfeature.update')}}" enctype="multipart/form-data">
                    @endif
                    @if(Auth::user()->role == 'admin')
                        <form method="post" action="{{route('partsfeature.update')}}" enctype="multipart/form-data">
                            @endif
                            @csrf
                            <input type="hidden" name="feature_id" value="{{$features[0]['id']}}">
                            <input type="hidden" name="product_id" value="{{$features[0]['product_id']}}">

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="condition">Condition</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="condition" required id="condition">
                                        <option class="form-control" value="option_select" disabled selected>Select
                                            Condition
                                        </option>
                                        {{$excellent  = ($features[0]['condition']==1) ? 'selected':''}}
                                        <option class="form-control" value="1" {{$excellent}} >Excellent</option>
                                        {{$good  = ($features[0]['condition']==2) ? 'selected':''}}
                                        <option class="form-control" value="2" {{$good}} >Good</option>
                                        {{$fair  = ($features[0]['condition']==3) ? 'selected':''}}
                                        <option class="form-control" value="3" {{$fair}} >Fair</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="Description">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="description">{{$features[0]['description']}}</textarea>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <button class="btn btn-success" type="submit">Update Features</button>
                            </div>

                        </form>
        </div>
    </div>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css"/>
@endpush
@push('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <script>
        $('#lfm').filemanager('image');

        $(document).ready(function () {
            $('#summary').summernote({
                placeholder: "Write short description.....",
                tabsize: 2,
                height: 100
            });
        });

        $(document).ready(function () {
            $('#description').summernote({
                placeholder: "Write detail description.....",
                tabsize: 2,
                height: 150
            });
        });
        // $('select').selectpicker();

    </script>

    <script>
        $('#cat_id').change(function () {
            var cat_id = $(this).val();
            // alert(cat_id);
            if (cat_id != null) {
                // Ajax call
                $.ajax({
                    url: "/admin/category/" + cat_id + "/child",
                    data: {
                        _token: "{{csrf_token()}}",
                        id: cat_id
                    },
                    type: "POST",
                    success: function (response) {
                        if (typeof (response) != 'object') {
                            response = $.parseJSON(response)
                        }
                        // console.log(response);
                        var html_option = "<option value=''>----Select sub category----</option>"
                        if (response.status) {
                            var data = response.data;
                            // alert(data);
                            if (response.data) {
                                $('#child_cat_div').removeClass('d-none');
                                $.each(data, function (id, title) {
                                    html_option += "<option value='" + id + "'>" + title + "</option>"
                                });
                            } else {
                            }
                        } else {
                            $('#child_cat_div').addClass('d-none');
                        }
                        $('#child_cat_id').html(html_option);
                    }
                });
            } else {
            }
        })
    </script>
@endpush
