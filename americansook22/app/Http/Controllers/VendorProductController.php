<?php

namespace App\Http\Controllers;

use App\Http\Requests\VendorProductStoreRequest;
use App\Http\Requests\VendorProductUpdateRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VendorProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $ven_id = Auth::user()->id;
        $products = Product::with(['cat_info', 'sub_cat_info'])
            ->orderBy('id', 'desc')
            ->where('admin_vendor_id', $ven_id)
            ->paginate(10);

        return view('backend.product.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = Brand::get();
        $category = Category::where('is_parent', 1)->get();
        return view('backend.product.create')->with('categories', $category)->with('brands', $brand);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(VendorProductStoreRequest $request)
    {

        $data = $request->all();
//        dd($data);
        $slug = Str::slug($request->title);
        $count = Product::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
        }
        $data['slug'] = $slug;
        $data['is_featured'] = $request->input('is_featured', 0);

        if ($request->hasFile('file')) {
            $uploadedFile = $request->file('file')->store('backend/product');
            $data['photo'] = $uploadedFile;
        }
        $data['admin_vendor_id'] = Auth::user()->id;
        $status = Product::create($data);

        if ($status) {
            request()->session()->flash('success', 'Product Successfully added');
            return redirect()->route('vendor_product.index');

        } else {

            request()->session()->flash('error', 'Please try again!!');
            return redirect()->route('vendor_product.index');

        }

//        $products=Product::getAllProduct();
//        return view('backend.product.index')->with('products',$products);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "asdfasdasdf";

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        dd($id);
        $brand = Brand::get();
        $product = Product::findOrFail($id);
        $category = Category::where('is_parent', 1)->get();
        $items = Product::where('id', $id)->get();
//         return $items;
        return view('backend.product.edit')->with('product', $product)
            ->with('brands', $brand)
            ->with('categories', $category)->with('items', $items);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(VendorProductUpdateRequest $request, $id)
    {
//        dd($request);
//
        $product = Product::findOrFail($id);


        $data = $request->all();
        $data['admin_vendor_id'] = Auth::user()->id;
        $data['is_featured'] = $request->input('is_featured', 0);
        $size = $request->input('size');
//        if($size){
//            $data['size']=implode(',',$size);
//        }
//        else{
//            $data['size']='';
//        }
        // return $data;
        if ($request->hasFile('file')) {
            $uploadedFile = $request->file('file')->store('backend/product');
            $data['photo'] = $uploadedFile;
        }
//        dd($data['photo']);
        $status = $product->fill($data)->save();
        if ($status) {
            request()->session()->flash('success', 'Product Successfully updated');
            return redirect()->route('vendor_product.index');

        } else {
            request()->session()->flash('error', 'Please try again!!');
        }
        return redirect()->route('vendor_product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $status = $product->delete();

        if ($status) {
            request()->session()->flash('success', 'Product successfully deleted');
        } else {
            request()->session()->flash('error', 'Error while deleting product');
        }
        return redirect()->route('vendor_product.index');
    }

    public function vendorProducts()
    {
        DB::connection()->enableQueryLog();
        $users = DB::table('users')
            ->select('users.name', 'users.email', 'products.photo', 'products.created_at', 'products.title', DB::raw('count(products.id) as total_products'), 'products.status', 'products.admin_vendor_id')
            ->join('products', 'users.id', '=', 'products.admin_vendor_id')
            ->where('users.is_vendor', 2)
            ->groupBy('users.email')
            ->get();
        $queries = DB::getQueryLog();
        return view('vendors.vendorproducts.allvendorproducts')->with('users', $users);
    }

    public function singleVendorAllProducts($admin_vendor_id)
    {
        $products = Product::
        where('admin_vendor_id', $admin_vendor_id)
            ->orderBy('id', 'ASC')
            ->paginate(10);
        return view('vendors.vendorproducts.singlevendorproducts')->with('products', $products);
    }

    public function singleProductDetails($product_id)
    {
        $productDetails = DB::table('products')
            ->join('features', 'products.id', '=', 'features.product_id')
            ->where('features.product_id', $product_id)
            ->get();
        return view('vendors.vendorproducts.singleproductdetails', compact('productDetails'));
    }



    // Status 0 is for Pending products
    public function approveVendorProduct($id)
    {
        // Status 1 is to Approve products
        $getUpdatedUserProduct = Product::where('id', $id)->update([
            'is_approved' => 1
        ]);
        return redirect()->back();
    }

    public function rejectVendorProduct($id)
    {
        // Status 2 is to Reject products
        $getUpdatedUserProduct = Product::where('id', $id)->update([
            'is_approved' => 2
        ]);
        return redirect()->back();
    }

    public function banVendorProduct($id)
    {
        // Status 3 is to Ban products
        $getUpdatedUserProduct = Product::where('id', $id)->update([
            'is_approved' => 3
        ]);
        return redirect()->back();
    }

    public function unBanVendorProduct($id)
    {
        // Status 1 is to Un-Ban products
        $getUpdatedUserProduct = Product::where('id', $id)->update([
            'is_approved' => 1
        ]);
        return redirect()->back();
    }


    public function showVendorApprovedProducts()
    {
        $ven_id = Auth::user()->id;
        $products = Product::with(['cat_info', 'sub_cat_info'])
            ->orderBy('id', 'desc')
            ->where('admin_vendor_id', $ven_id)
            ->where('is_approved', 1)
            ->paginate(10);
        return view('vendors.vendorproducts.approvedvendorproducts')->with('products', $products);
    }


}
