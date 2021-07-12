<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\User;
use App\Vendor;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public  function dashboard()
    {
//        $data = User::select(\DB::raw("COUNT(*) as count"),
//            \DB::raw("DAYNAME(created_at) as day_name"),
//            \DB::raw("DAY(created_at) as day"))
//        ->where('created_at', '>', Carbon::today()->subDay(6))
//        ->groupBy('day_name','day')
//        ->orderBy('day')
//        ->get();
//        dd($data);
//     $array[] = ['Name', 'Number'];
//     foreach($data as $key => $value)
//     {
//       $array[++$key] = [$value->day_name, $value->count];
//     }
//      return $data;
             $array[] = ['Name', 'Number'];

             $data = "dashboard";

        return view('backend.index')->with('users', json_encode($data));
    }


    public function profile(){
        $profile=Auth()->user();
//         return $profile;
        return view('vendors.vendor.profile')->with('profile',$profile);
    }

    public function profileUpdate(Request $request,$id){
//         return $request->all();
        $user=User::findOrFail($id);
        $data=$request->all();
        if ($request->hasFile('file')) {
            $uploadedFile = $request->file('file')->store('profile');
            $data['photo'] =  $uploadedFile;
        }
        if ($request->hasFile('file')) {
            $uploadedFile = $request->file('file')->store('backend/product');
            $data['photo'] =  $uploadedFile;
        }

        $status=$user->fill($data)->save();
        if($status){
            request()->session()->flash('success','Successfully updated your profile');
        }
        else{
            request()->session()->flash('error','Please try again!');
        }
        return redirect()->back();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $delete = User::findorFail($id);
        $status = $delete->delete();
        if ($status) {
            request()->session()->flash('success', 'Vendor Successfully deleted');
        } else {
            request()->session()->flash('error', 'There is an error while deleting users');
        }
        return redirect()->route('all-vendors');
    }

    public  function  vendorRequest()
    {
        $getUpdatedUserRequest = user::where('id',Auth::user()->id)->update([
            'is_vendor' => 1
        ]);
        return response()->json(['success'=>'Request is successfully sent']);
    }
    public  function  vendorCancelRequest()
    {
        $getUpdatedUserRequest = user::where('id',Auth::user()->id)->update([
            'is_vendor' => 0
        ]);
        return response()->json(['success'=>'Request is Cancelled']);
//        $result = Auth::User()->is_vendor;
//        return response()->json(['success'=> $result]);
    }
    public  function  vendorRequestApprove($id)
    {
        $getUpdatedUserRequest = user::where('id', $id)->update([
            'is_vendor' => 2,
            'role' => 'vendor'
        ]);
        //        response()->json(['success'=>'Request Accepted'])
        return redirect()->back();
    }

//    default is_vendor status is 0
//    request is_vendor status is 1
//    approve is_vendor status is 2
//    approve is_vendor status is 3

    public function vendorPendingRequests()
    {
        //    request is_vendor status is 1
        $users=User::
        where('is_vendor', 1)
//            ->where('is_vendor','!',2)
            ->orderBy('id','ASC')
            ->paginate(10);
        return view('vendors.pendingrequests')->with('users',$users);
    }

    public  function  activeVendors()
    {
        //    approve is_vendor status is 2
        $users=User::where('is_vendor',2)
            ->orderBy('id','ASC')->paginate(10);
        return view('vendors.activevendors')->with('users',$users);
    }


    public  function  deactiveVendors($id)
    {
        //    approve is_vendor status is 3
        $getUpdatedUserRequest = user::where('id', $id)->update([
            'is_vendor' => 3
        ]);
        return redirect()->back();
    }
    public  function  allVendors()
    {

        //    approve is_vendor status is 2
        $users=User::where('is_vendor',2)
            ->orWhere('is_vendor',3)
            ->orderBy('id','ASC')->paginate(10);
        return view('vendors.allvendors')->with('users',$users);
    }

}
