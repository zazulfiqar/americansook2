@extends('backend.layouts.master')

@section('title','Order Detail')

@section('main-content')

    @if($productDetails->count() > 0)
    <div class="card">
        {{--        <h5 class="card-header">Order       <a href="{{route('order.pdf',$productDetails[0]->]product_id)}}" class=" btn btn-sm btn-primary shadow-sm float-right"><i class="fas fa-download fa-sm text-white-50"></i> Generate PDF</a>--}}
{{--        </h5>--}}
        <div class="card-body">
            @if($productDetails)
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Summary</th>
                        <th>Photo</th>
                        <th>Condition</th>
                        <th>Price</th>
                        <th>Old/New</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>

                        {{--                        @php--}}
{{--                            $shipping_charge=DB::table('shiptpings')[0]->]where('id',$producDetails->shipping_id)->pluck('price');--}}
{{--                        @endphp--}}
{{--                        <td>{{$producDetails->id}}</td>--}}
                        <td>{{$productDetails[0]->title}}</td>
                        <td>{{$productDetails[0]->summary}}</td>
                        <td>{{$productDetails[0]->photo}}</td>
{{--                        <td>@foreach($shipping_charge as $data) $ {{number_format($data,2)}} @endforeach</td>--}}
                        <td>
                            @if($productDetails[0]->condition==1)
                                <span>Excellent</span>
                            @elseif($productDetails[0]->condition==2)
                                <span>Good</span>
                            @elseif($productDetails[0]->condition==2)
                                <span>Fair</span>
                            @endif
                        </td>
                        <td>{{$productDetails[0]->price}}</td>
                        <td>
                            @if($productDetails[0]->old_new==1)
                                <span>Old</span>
                            @elseif($productDetails[0]->old_new==2)
                                <span>New</span>
                            @endif
                        </td>
                        <td>
                            <form method="POST" action="{{route('order.destroy',[$productDetails[0]->id])}}">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm dltBtn" data-id={{$productDetails[0]->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>

                    </tr>
                    </tbody>
                </table>

                <section class="confirmation_part section_padding">
                    <div class="order_boxes">
                        <div class="row">
                            <div class="col-lg-6 col-lx-4">
                                <div class="order-info">
                                    <h4 class="text-center pb-4">Product Features</h4>
                                    <table class="table">
                                        <tr class="">
                                            <td>Mileage:</td>
                                            <td>{{$productDetails[0]->mileage}}</td>
                                        </tr>
{{--                                        <tr>--}}
{{--                                            <td>Added Date</td>--}}
{{--                                            <td> : {{$productDetails[0]->created_at[0]->format('D d M, Y')}} at {{$productDetails[0]->created_at[0]->format('g : i a')}} </td>--}}
{{--                                        </tr>--}}
                                        <tr>
                                            <td>Transmission:</td>
                                            <td>{{$productDetails[0]->transmission}}</td>
                                        </tr>
                                        <tr>
                                            <td>Fuel Type:</td>
                                            <td>
                                                @if($productDetails[0]->fuel_type == 1)
                                                Diesal
                                                @elseif($productDetails[0]->fuel_type == 2)
                                                Petrol
                                                @else
                                                CNG
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Fuel Economy:</td>
                                            <td>{{$productDetails[0]->fuel_economy}}</td>
                                        </tr>
                                        <tr>
                                            <td>Registered City:</td>
                                            <td>{{$productDetails[0]->registered_city}}</td>
                                        </tr>
                                       <tr>
                                            <td>Steering:</td>
                                           <td>
                                           @if($productDetails[0]->steering == 1)
                                               Right
                                           @elseif($productDetails[0]->steering == 2)
                                                Left
                                           @endif
                                           </td>
                                        </tr>
                                        <tr>
                                            <td>No of seats:</td>
                                            <td>{{$productDetails[0]->no_of_seats}}</td>
                                        </tr>
                                        <tr>
                                            <td>Fuel Type:</td>
                                            <td>
                                                @if($productDetails[0]->drive_train == 1)
                                                    Auto
                                                @elseif($productDetails[0]->drive_train == 2)
                                                    Manual
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Engine Horse Power:</td>
                                            <td>{{$productDetails[0]->product_engine}}</td>
                                        </tr>
                                        <tr>
                                            <td>Exterior color:</td>
                                            <td>{{$productDetails[0]->exterior_color}}</td>
                                        </tr>
                                        <tr>
                                            <td>Interior color:</td>
                                            <td>{{$productDetails[0]->interior_color}}</td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-6 col-lx-4">
                                <div class="order-info">
                                    <h4 class="text-center pb-4">Additional Features</h4>
                                    <table class="table">
                                        <tr>
                                            <td>Front AC AVailabale:</td>
                                            <td>
                                                @if($productDetails[0]->front_ac_status == 0)
                                                    No
                                                @elseif($productDetails[0]->front_ac_status == 1)
                                                    Yes
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Power Steering AVailabale:</td>
                                            <td>
                                                @if($productDetails[0]->power_steering_status == 0)
                                                    No
                                                @elseif($productDetails[0]->power_steering_status == 1)
                                                    Yes
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Air Bags Available:</td>
                                            <td>
                                                @if($productDetails[0]->air_bags_status == 0)
                                                    No
                                                @elseif($productDetails[0]->air_bags_status == 1)
                                                    Yes
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>ABS Breaks Available:</td>
                                            <td>
                                                @if($productDetails[0]->abs_status == 0)
                                                    No
                                                @elseif($productDetails[0]->abs_status == 1)
                                                    Yes
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Air Condition Available:</td>
                                            <td>
                                                @if($productDetails[0]->air_conditioner_status == 0)
                                                    No
                                                @elseif($productDetails[0]->air_conditioner_status == 1)
                                                    Yes
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Leather Seats Available:</td>
                                            <td>
                                                @if($productDetails[0]->leather_seats_status == 0)
                                                    No
                                                @elseif($productDetails[0]->leather_seats_status == 1)
                                                    Yes
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Fog Light Available:</td>
                                            <td>
                                                @if($productDetails[0]->fog_light_status == 0)
                                                    No
                                                @elseif($productDetails[0]->fog_light_status == 1)
                                                    Yes
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>CD/DVD Player Available:</td>
                                            <td>
                                                @if($productDetails[0]->cd_dvd_player_status == 0)
                                                    No
                                                @elseif($productDetails[0]->cd_dvd_player_status == 1)
                                                    Yes
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Sound System Available:</td>
                                            <td>
                                                @if($productDetails[0]->sound_system_status == 0)
                                                    No
                                                @elseif($productDetails[0]->sound_system_status == 1)
                                                    Yes
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>AM/FM Available:</td>
                                            <td>
                                                @if($productDetails[0]->am_fm_status == 0)
                                                    No
                                                @elseif($productDetails[0]->am_fm_status == 1)
                                                    Yes
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Safety Belts Available:</td>
                                            <td>
                                                @if($productDetails[0]->safety_belts_status == 0)
                                                    No
                                                @elseif($productDetails[0]->safety_belts_status == 1)
                                                    Yes
                                                @endif
                                            </td>
                                        </tr>

                                    </table>
                                </div>
                            </div>



                                        {{--                                        <tr>--}}
{{--                                            @php--}}
{{--                                                $shipping_charge=DB::table('shiptpings')[0]-where('id',$productDetails[0]-shippting_id)[0]-pluck('price');--}}
{{--                                            @endphp--}}
{{--                                            <td>Shipping Charge</td>--}}
{{--                                            <td> : $ {{number_format($shipping_charge[0],2)}}</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Total Amount</td>--}}
{{--                                            <td> : $ {{number_format($productDetails[0]-total_amount,2)}}</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Payment Method</td>--}}
{{--                                            <td> : @if($productDetails[0]-payment_method=='cod') Cash on Delivery @else Paypal @endif</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Payment Status</td>--}}
{{--                                            <td> : {{$productDetails[0]-payment_status}}</td>--}}
{{--                                        </tr>--}}
{{--                                    </table>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="col-lg-6 col-lx-4">--}}
{{--                                <div class="shipping-info">--}}
{{--                                    <h4 class="text-center pb-4">SHIPPING INFORMATION</h4>--}}
{{--                                    <table class="table">--}}
{{--                                        <tr class="">--}}
{{--                                            <td>Full Name</td>--}}
{{--                                            <td> : {{$productDetails[0]-first_name}} {{$productDetails[0]-last_name}}</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Email</td>--}}
{{--                                            <td> : {{$productDetails[0]-email}}</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Phone No.</td>--}}
{{--                                            <td> : {{$productDetails[0]-phone}}</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Address</td>--}}
{{--                                            <td> : {{$productDetails[0]-address1}}, {{$productDetails[0]-address2}}</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Country</td>--}}
{{--                                            <td> : {{$productDetails[0]-country}}</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Post Code</td>--}}
{{--                                            <td> : {{$productDetails[0]-post_code}}</td>--}}
{{--                                        </tr>--}}
{{--                                    </table>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </section>--}}
            @endif
@else

    No Features

@endif
{{--        </div>--}}
{{--    </div>--}}
@endsection

@push('styles')
    <style>
        .order-info,.shipping-info{
            background:#ECECEC;
            padding:20px;
        }
        .order-info h4,.shipping-info h4{
            text-decoration: underline;
        }

    </style>
@endpush
