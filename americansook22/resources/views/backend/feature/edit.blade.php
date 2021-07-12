@extends('backend.layouts.master')

@section('main-content')
    <div class="card">
        <h5 class="card-header">Add Features</h5>
        <div class="card-body">
            @if (Auth::user()->role == 'vendor')
                <form method="post" action="{{route('vendorfeature.update')}}" enctype="multipart/form-data">
                    @endif
                    @if(Auth::user()->role == 'admin')
                        <form method="post" action="{{route('feature.update')}}" enctype="multipart/form-data">
                            @endif
                            @csrf
                            <input type="hidden" name="feature_id" value="{{$features[0]['id']}}">
                            <input type="hidden" name="product_id" value="{{$features[0]['product_id']}}">

                            {{--                <div class="form-group">--}}
                            {{--                    <label class="control-label col-sm-4" for="email">Product Manufacturer/Brand</label>--}}
                            {{--                    <input type="hidden" class="form-control" value="{{ Auth::user()->id }}"  name="admin_vendor_id" >--}}

                            {{--                    <div class="col-sm-10">--}}
                            {{--                        <input type="text" class="form-control"  name="make" >--}}
                            {{--                    </div>--}}
                            {{--                </div>--}}

                        <!-- <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Category</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  name="category" >
                    </div>
                </div> -->

                            {{--                <div class="form-group">--}}
                            {{--                    <label class="control-label col-sm-2" for="email">Price</label>--}}
                            {{--                    <div class="col-sm-10">--}}
                            {{--                        <input type="number" class="form-control"  name="Price" >--}}
                            {{--                    </div>--}}
                            {{--                </div>--}}

                            {{--                <div class="form-group">--}}
                            {{--                    <label class="control-label col-sm-2" for="product year">Year</label>--}}
                            {{--                    <div class="col-sm-10">--}}
                            {{--                        <input type="text" class="form-control"  max="4" min="4" name="productYear" >--}}
                            {{--                    </div>--}}
                            {{--                </div>--}}
                            {{--                <div class="form-group">--}}
                            {{--                    <label class="control-label col-sm-2" for="model">Model</label>--}}
                            {{--                    <div class="col-sm-10">--}}
                            {{--                        <input type="text" class="form-control"  name="model" >--}}
                            {{--                    </div>--}}
                            {{--                </div>--}}
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="images">Images</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="images">
                                    <input type="hidden" class="form-control" name="old_file"
                                           value="{{$features[0]['images']}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="mileage">Mileage Per Kilometer</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="mileage"
                                           value="{{$features[0]['mileage']}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="transmission">Transmission</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="transmission"
                                           value="{{$features[0]['transmission']}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="exterior_color">Exterior Color</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="exterior_color"
                                           value="{{$features[0]['exterior_color']}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="interior_color">Interior color</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="interior_color"
                                           value="{{$features[0]['interior_color']}}">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-sm-2" for="product_engine">Engine Horse Power</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="product_engine"
                                           value="{{$features[0]['product_engine']}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="description">Fuel Economy</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="fuel_economy"
                                           value="{{$features[0]['fuel_economy']}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="Registered City">Registered City</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="registered_city"
                                           value="{{$features[0]['registered_city']}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="Drive Train">Drive Train</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="drive_train" required id="drive_train">
                                        <option class="form-control" value="option_select" disabled selected>Select
                                            Drive Train
                                        </option>
                                        {{$auto  = ($features[0]['drive_train']==1) ? 'selected':''}}
                                        <option class="form-control" value="1" {{$auto}} >Auto</option>
                                        {{$manual  = ($features[0]['drive_train']==2) ? 'selected':''}}
                                        <option class="form-control" value="2" {{$manual}} >Manual</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="Fuel Type">Fuel Type</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="fuel_type" required id="fuel_type">
                                        <option class="form-control" value="option_select" disabled selected>Select Fuel
                                            Type
                                        </option>
                                        {{$diesel  = ($features[0]['fuel_type']==1) ? 'selected':''}}
                                        <option class="form-control" value="1" {{$diesel}} >Diesel</option>
                                        {{$petrol  = ($features[0]['fuel_type']==2) ? 'selected':''}}
                                        <option class="form-control" value="2" {{$petrol}} >Petrol</option>
                                        {{$cng  = ($features[0]['fuel_type']==3) ? 'selected':''}}
                                        <option class="form-control" value="3" {{$cng}} >CNG</option>
                                    </select>
                                </div>
                            </div>

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
                                <label class="control-label col-sm-2" for="Steering">Steering</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="steering" required id="steering">
                                        <option class="form-control" value="option_select" disabled selected>Select
                                            Steering Type
                                        </option>
                                        {{$right  = ($features[0]['steering']==1) ? 'selected':''}}
                                        <option class="form-control" value="1" {{$right}} >Right</option>
                                        {{$left  = ($features[0]['steering']==1) ? 'selected':''}}
                                        <option class="form-control" value="2" {{$left}} >Left</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="No Of Seats">No Of Seats</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="no_of_seats" required id="no_of_seats">
                                        <option class="form-control" value="option_select" disabled selected>Select No
                                            Of Seats
                                        </option>
                                        {{$one  = ($features[0]['no_of_seats']==1) ? 'selected':''}}
                                        <option class="form-control" value="1" {{$one}} >1 Seat</option>
                                        {{$two  = ($features[0]['no_of_seats']==2) ? 'selected':''}}
                                        <option class="form-control" value="2" {{$two}} >2 Seats</option>
                                        {{$three  = ($features[0]['no_of_seats']==3) ? 'selected':''}}
                                        <option class="form-control" value="3" {{$three}} >3 Seats</option>
                                        {{$four  = ($features[0]['no_of_seats']==4) ? 'selected':''}}
                                        <option class="form-control" value="4" {{$four}} >4 Seats</option>
                                        {{$five  = ($features[0]['no_of_seats']==5) ? 'selected':''}}
                                        <option class="form-control" value="5" {{$five}} >5 Seats</option>
                                        {{$six  = ($features[0]['no_of_seats']==6) ? 'selected':''}}
                                        <option class="form-control" value="6" {{$six}} >6 Seats</option>

                                    </select>
                                </div>
                            </div>
                            <br>
                            <h4>Additional Features</h4>
                            <input type="checkbox" name="front_ac_status"
                                   style="margin-left:200px" {{($features[0]['front_ac_status']==1) ? 'checked':''}} >
                            <label>Front AC</label>

                            <input type="checkbox" name="power_steering_status"
                                   style="margin-left:20px" {{($features[0]['power_steering_status']==1) ? 'checked':''}} >
                            <label>Power Steering</label>

                            <input type="checkbox" name="air_bags_status"
                                   style="margin-left:20px" {{($features[0]['air_bags_status']==1) ? 'checked':''}} >
                            <label>Air Bags</label>

                            <input type="checkbox" name="abs_status"
                                   style="margin-left:20px" {{($features[0]['abs_status']==1) ? 'checked':''}} >
                            <label>ABS</label>

                            <input type="checkbox" name="air_conditioner_status"
                                   style="margin-left:20px" {{($features[0]['air_conditioner_status']==1) ? 'checked':''}} >
                            <label>AC</label>

                            <input type="checkbox" name="leather_seats_status"
                                   style="margin-left:20px" {{($features[0]['leather_seats_status']==1) ? 'checked':''}} >
                            <label>Leather Seats</label>

                            <input type="checkbox" name="fog_light_status"
                                   style="margin-left:20px" {{($features[0]['fog_light_status']==1) ? 'checked':''}} >
                            <label>Fog Lights</label>

                            <br><br>

                            <input type="checkbox" name="cd_dvd_player_status"
                                   style="margin-left:200px" {{($features[0]['cd_dvd_player_status']==1) ? 'checked':''}} >
                            <label>CD/DVD Players</label>

                            <input type="checkbox" name="sound_system_status"
                                   style="margin-left:20px" {{($features[0]['sound_system_status']==1) ? 'checked':''}} >
                            <label>Sound System</label>

                            <input type="checkbox" name="am_fm_status"
                                   style="margin-left:20px" {{($features[0]['am_fm_status']==1) ? 'checked':''}} >
                            <label>AM/FM</label>

                            <input type="checkbox" name="safety_belts_status"
                                   style="margin-left:20px" {{($features[0]['safety_belts_status']==1) ? 'checked':''}} >
                            <label>Safety Belts</label>

                            <br><br>

                            <div class="form-group mb-3">
                                <button class="btn btn-success" type="submit">Update Features</button>
                            </div>

                        </form></div>
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
