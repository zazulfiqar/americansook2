<?php

namespace App\Http\Controllers;

use App\Http\Middleware\User;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $products=Product::with(['cat_info','sub_cat_info'])
            ->orderBy('id','desc')
            ->where('is_approved',0)
            ->orwhere('is_approved',1)
            ->paginate(10);
            return view('backend.product.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand=Brand::get();
        $category=SubCategory::where('status','active')->get();
        // return $category;
        return view('backend.product.create')->with('categories',$category)->with('brands',$brand);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        $data=$request->all();

        $slug=Str::slug($request->title);
        $count=Product::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $data['slug']=$slug;
        $data['is_featured']=$request->input('is_featured',0);

        if ($request->hasFile('file')) {
            $uploadedFile = $request->file('file')->store('backend/product');
            $data['photo'] =  $uploadedFile;
        }
        $data['admin_vendor_id']=Auth::user()->id;
        $data['old_new'] = 1;
        $data['type'] = 2;
        $status=Product::create($data);
        if($status){
            request()->session()->flash('success','Product Successfully added');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('product.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand=Brand::get();
        $product=Product::findOrFail($id);
        $category=SubCategory::where('status','active')->get();
        $items=Product::where('id',$id)->get();
        // return $items;
        return view('backend.product.edit')->with('product',$product)
                    ->with('brands',$brand)
                    ->with('categories',$category)->with('items',$items);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $id)
    {

        $product=Product::findOrFail($id);

        $data=$request->all();
        $data['admin_vendor_id']=Auth::user()->id;
        $data['is_featured']=$request->input('is_featured',0);
        $size=$request->input('size');

        if ($request->hasFile('file')) {
            $uploadedFile = $request->file('file')->store('backend/product');
            $data['photo'] = $uploadedFile;
        }

        $status=$product->fill($data)->save();
        if($status){
            request()->session()->flash('success','Product Successfully updated');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::findOrFail($id);
        $status=$product->delete();

        if($status){
            request()->session()->flash('success','Product successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting product');
        }
        return redirect()->route('product.index');
    }
    public function showVendorApprovedProducts()
    {
        $products=Product::with(['cat_info','sub_cat_info'])
            ->orderBy('id','desc')
            ->where('is_approved',1)
            ->paginate(10);
        return view('backend.product.approvedproducts')->with('products',$products);

    }
    public function showRejectedProducts()
    {
        $products=Product::with(['cat_info','sub_cat_info'])
            ->orderBy('id','desc')
            ->where('is_approved',2)
            ->paginate(10);
        return view('backend.product.rejectedproducts')->with('products',$products);
    }
    public function adminProducts()
    {

        $products=Product::with(['cat_info','sub_cat_info'])
            ->orderBy('id','desc')
            ->where('admin_vendor_id',1)
            ->paginate(10);
        return view('backend.product.adminproducts')->with('products',$products);
    }


}
