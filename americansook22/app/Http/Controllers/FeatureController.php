<?php

namespace App\Http\Controllers;

use App\Feature;
use App\Http\Requests\FeatureStoreRequest;
use App\Http\Requests\FeatureUpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Auth;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $featureId = Feature::where('product_id',$id)->pluck('id');
        $product = Product::find($id);
        $featureDetails = Feature::find($featureId);
//        if($product->type == 0 || $product->type == null ||  $product->type == '')
//        {
//            return  redirect()->back();
//        }
        if($product->type == 1)
        {
            return  view('backend.feature.create',compact('id'),["features" => $featureDetails , "product" => $product]) ;
        }
        elseif ($product->type == 2 || $product->type == 3 || $product->type == 4)
        {
            return  view('backend.feature.createpartfeature',compact('id'),["features" => $featureDetails , "product" => $product]) ;
        }
    }

    public function storeparts(FeatureStoreRequest  $request)
    {
        $product_id = $request->product_id;
        $getInsertedProduct_Features = Feature::create([
            'product_id' => $request->product_id,
            'admin_vendor_id' => Auth::User()->id,
            'condition' => $request->condition,
            'description' => $request->description
        ]);
        return redirect()->route('partsfeature.show',$product_id);
    }

    public function store(FeatureStoreRequest  $request)
    {

        if ($request->has('front_ac_status')) {
            $front_ac_status = 1;
        }
        else
        {
            $front_ac_status = 0;
        }
        if ($request->has('power_steering_status')) {
            $power_steering_status = 1;
        }
        else
        {
            $power_steering_status = 0;
        }
        if ($request->has('air_bags_status')) {
            $air_bags_status = 1;
        }
        else
        {
            $air_bags_status = 0;
        }
        if ($request->has('abs_status')) {
            $abs_status = 1;
        }
        else
        {
            $abs_status = 0;
        }
        if ($request->has('air_conditioner_status')) {
            $air_conditioner_status = 1;
        }
        else
        {
            $air_conditioner_status = 0;
        }

        if ($request->has('leather_seats_status')) {
            $leather_seats_status = 1;
        }
        else
        {
            $leather_seats_status = 0;
        }
        if ($request->has('fog_light_status')) {
            $fog_light_status = 1;
        }
        else
        {
            $fog_light_status = 0;
        }
        if ($request->has('cd_dvd_player_status')) {
            $cd_dvd_player_status = 1;
        }
        else
        {
            $cd_dvd_player_status = 0;
        }
        if ($request->has('sound_system_status')) {
            $sound_system_status = 1;
        }
        else
        {
            $sound_system_status = 0;
        }
        if ($request->has('am_fm_status')) {
            $am_fm_status = 1;
        }
        else
        {
            $am_fm_status = 0;
        }
        if ($request->has('safety_belts_status')) {
            $safety_belts_status = 1;
        }
        else
        {
            $safety_belts_status = 0;
        }
        $product_id = $request->product_id;
        $uploadedFile = "";
        if ($request->hasFile('images')) {
            $uploadedFile = $request->file('images')->store('backend/product');
        }

            $getInsertedProduct_Features = Feature::create([
            'product_id' => $request->product_id,
            'admin_vendor_id' => Auth::User()->id,
//            'make' => $request->make,
//            'product_year' => $request->productYear,
//            'model' => $request->model,
            'images' => $uploadedFile,
            'mileage' => $request->mileage,
            'transmission' => $request->transmission,
            'exterior_color' => $request->exterior_color,
            'interior_color' => $request->interior_color,
            'product_engine' => $request->product_engine,
            'fuel_type' => $request->fuel_type,
            'fuel_economy' => $request->fuel_economy,
            'registered_city' => $request->registered_city,
            'condition' => $request->condition,
            'steering' => $request->steering,
            'no_of_seats' => $request->no_of_seats,
            'drive_train' => $request->drive_train,
            'front_ac_status' => $front_ac_status,
            'power_steering_status' => $power_steering_status,
            'air_bags_status' => $air_bags_status,
            'abs_status' => $abs_status,
            'air_conditioner_status' => $air_conditioner_status,
            'leather_seats_status'=> $leather_seats_status,
            'fog_light_status' => $fog_light_status,
            'cd_dvd_player_status' => $cd_dvd_player_status,
            'sound_system_status' => $sound_system_status,
            'am_fm_status' => $am_fm_status,
            'safety_belts_status' => $safety_belts_status,
            ]);
        return redirect()->route('feature.show',$product_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function show(Feature $feature ,$id)
    {
        $features = Feature::where('product_id',$id)->get();
        return view('backend.feature.index',compact('id'),["features" => $features]);
    }
    public function showPartsFeatures(Feature $feature ,$id)
    {
        $features = Feature::where('product_id',$id)->get();
        return view('backend.feature.indexpartfeature',compact('id'),["features" => $features]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Feature  $feature
     * @return \Illuminate\Http\Response
     */

    public function edit(Feature $feature,$id)
    {
        $featureId = Feature::where('product_id',$id)->pluck('id');
        $featureDetails = Feature::find($featureId);

        return  view('backend.feature.edit',compact('id'),["features" => $featureDetails]) ;
    }

    public function editparts(Feature $feature,$id)
    {
        $featureId = Feature::where('product_id',$id)->pluck('id');
        $featureDetails = Feature::find($featureId);

        return  view('backend.feature.editparts',compact('id'),["features" => $featureDetails]) ;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function update(FeatureUpdateRequest $request, Feature $feature)
    {
        if ($request->has('front_ac_status')) {
            $front_ac_status = 1;
        }
        else
        {
            $front_ac_status = 0;
        }
        if ($request->has('power_steering_status')) {
            $power_steering_status = 1;
        }
        else
        {
            $power_steering_status = 0;
        }
        if ($request->has('air_bags_status')) {
            $air_bags_status = 1;
        }
        else
        {
            $air_bags_status = 0;
        }
        if ($request->has('abs_status')) {
            $abs_status = 1;
        }
        else
        {
            $abs_status = 0;
        }
        if ($request->has('air_conditioner_status')) {
            $air_conditioner_status = 1;
        }
        else
        {
            $air_conditioner_status = 0;
        }

        if ($request->has('leather_seats_status')) {
            $leather_seats_status = 1;
        }
        else
        {
            $leather_seats_status = 0;
        }
        if ($request->has('fog_light_status')) {
            $fog_light_status = 1;
        }
        else
        {
            $fog_light_status = 0;
        }
        if ($request->has('cd_dvd_player_status')) {
            $cd_dvd_player_status = 1;
        }
        else
        {
            $cd_dvd_player_status = 0;
        }
        if ($request->has('sound_system_status')) {
            $sound_system_status = 1;
        }
        else
        {
            $sound_system_status = 0;
        }
        if ($request->has('am_fm_status')) {
            $am_fm_status = 1;
        }
        else
        {
            $am_fm_status = 0;
        }
        if ($request->has('safety_belts_status')) {
            $safety_belts_status = 1;
        }
        else
        {
            $safety_belts_status = 0;
        }
        $product_id = $request->product_id;
        $uploadedFile = "";

        if ($request->hasFile('images')) {
            $uploadedFile = $request->file('images')->store('backend/product');
        }
        elseif (!$request->hasFile('images') && $request->old_file)
        {
            $uploadedFile = $request->old_file;
        }
        $getInsertedProduct_Features = Feature::where('id',$request->feature_id)->update([
            'product_id' => $request->product_id,
            'admin_vendor_id' => Auth::User()->id,
            'images' => $uploadedFile,
            'mileage' => $request->mileage,
            'transmission' => $request->transmission,
            'exterior_color' => $request->exterior_color,
            'interior_color' => $request->interior_color,
            'product_engine' => $request->product_engine,
            'fuel_type' => $request->fuel_type,
            'fuel_economy' => $request->fuel_economy,
            'registered_city' => $request->registered_city,
            'condition' => $request->condition,
            'steering' => $request->steering,
            'no_of_seats' => $request->no_of_seats,
            'drive_train' => $request->drive_train,
            'front_ac_status' => $front_ac_status,
            'power_steering_status' => $power_steering_status,
            'air_bags_status' => $air_bags_status,
            'abs_status' => $abs_status,
            'air_conditioner_status' => $air_conditioner_status,
            'leather_seats_status'=> $leather_seats_status,
            'fog_light_status' => $fog_light_status,
            'cd_dvd_player_status' => $cd_dvd_player_status,
            'sound_system_status' => $sound_system_status,
            'am_fm_status' => $am_fm_status,
            'safety_belts_status' => $safety_belts_status,
        ]);
        return redirect()->route('feature.show',$product_id);
    }
    public function partsupdate(FeatureUpdateRequest $request, Feature $feature)
    {
        $product_id = $request->product_id;
        $getInsertedProduct_Features = Feature::where('id',$request->feature_id)->update([
            'product_id' => $request->product_id,
            'admin_vendor_id' => Auth::User()->id,
            'condition' => $request->condition,
            'description' => $request->description
        ]);

        return redirect()->route('partsfeature.show',$product_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feature $feature)
    {
        //
    }


}
