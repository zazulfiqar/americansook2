<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use App\Models\PostTag;
use App\Models\PostCategory;
use App\Models\Post;
use App\Models\Cart;
use App\Models\Brand;
use App\Models\SubCategory;
use App\ProductType;
use App\User;
use Auth;
use Session;
use Newsletter;
use DB;
use Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
class FrontendController extends Controller
{

    public function index(Request $request){
        return redirect()->route($request->user()->role);
    }
    public function header(Request $request){

        return view('frontend.layouts.headerNew');

    }

    public function search(Request $request){
        $categories = Category::limit(5)->get();

//        dd($categories);
        $lang = $request->lang;
        if($lang == '' || $lang == null)
        {
//            dd("asdfasd");
            $lang = 'en';
        }
        else {
//            dd($lang);
            $lang = $lang ;
        }        // 1 aftermake   2 oem  3 salvage

        $product_aftermake = Product::where('product_type',1)->limit(5)->get();
        $product_oem = Product::where('product_type',2)->limit(5)->get();
        $product_salvage = Product::where('product_type',3)->limit(5)->get();

        return view('frontend.pages.search',
            compact('categories','product_aftermake','product_oem','product_salvage','lang'));
    }

    public function home(){
        $featured=Product::where('status','active')->where('is_featured',1)->orderBy('price','DESC')->limit(2)->get();
        $posts=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        $banners=Banner::where('status','active')->limit(3)->orderBy('id','DESC')->get();
        // return $banner;
        $products=Product::where('status','active')->orderBy('id','DESC')->limit(8)->get();
        $category=Category::where('status','active')->where('is_parent',1)->orderBy('title','ASC')->get();
        // return $category;
        return view('frontend.index')
                ->with('featured',$featured)
                ->with('posts',$posts)
                ->with('banners',$banners)
                ->with('product_lists',$products)
                ->with('category_lists',$category);
    }

    public function testIndex(Request $request){
        $category =Category::where('status','active')->get();
        $brands=Brand::where('status','active')->get();
        $allproducts=Product::where('status','active')->Where('is_approved', 1)->orderBy('id','DESC')->limit(20)->get();
        $lang = $request->lang;
        if($lang == '' || $lang == null)
        {
        //            dd("asdfasd");
            $lang = 'en';
            Session::put('lang','en' );
            // Session::put('lang','nooo' );
            
        }
        else {
        //            dd($lang);
        Session::put('lang',$lang );
            $lang = $lang ;
            
        }


        return view('frontend.pages.testIndex')
        ->with('brands',$brands)
        ->with('allproducts',$allproducts)
        ->with('category',$category );
    }


    public function indexHome(Request $request){
        //        dd($categories);
       

        $category =Category::where('status','active')->get();
        $brands=Brand::where('status','active')->get();
        $allproducts=Product::where('status','active')->Where('is_approved', 1)->orderBy('id','DESC')->limit(20)->get();
        

        return view('frontend.pages.testIndex')
        ->with('brands',$brands)
        ->with('allproducts',$allproducts)
        ->with('category',$category );

            }







    public function aboutUs(){
        return view('frontend.pages.about-us');
    }


    public function faq(){

        return view('frontend.pages.faq');
    }

    public function allProducts(){

        $allproducts=Product::where('status','active')->Where('is_approved', 1)->orderBy('id','DESC')->get();
        return view('frontend.pages.allProducts')
        ->with('allproducts',$allproducts);
    }

    public function category($id){
        $catname=Category::findOrFail($id);
        $categoryname=SubCategory::where('cat_id',$id)->get();


        return view('frontend.pages.category')
        ->with('catname',$catname)
        ->with('categoryname',$categoryname);

    }

    public function brands($id){
        $brandname=Brand::findOrFail($id);
        $allproducts=Product::where('status','active')->Where('is_approved', 1)->Where('brand_id', $id)->orderBy('id','DESC')->get();
        return view('frontend.pages.brands')
        ->with('allproducts',$allproducts)->with('brandname',$brandname);
    }



    public function subCategory($id){
        $allproducts=Product::where('status','active')->Where('is_approved', 1)->Where('cat_id', $id)->orderBy('id','DESC')->get();
        return view('frontend.pages.subCatProducts')
        ->with('allproducts',$allproducts);
    }

    public function contact(){

        return view('frontend.pages.contact');
    }

    public function productDetail($id){
        $categories = Category::limit(5)->get();
        $products=Product::where('status','active')->orderBy('id','DESC')->limit(8)->get();
        $brands=Brand::where('status','active')->get();
//        return $id ;
        $lang ='en';
        $categories2  = Category::all();
        $product_details= Product::getProductById($id);
        // dd( $product_details);

//         dd($product_detail);
        return view('frontend.pages.product_detail',compact('categories2','id','categories','products','brands','product_details'));

    }

    public function productDetaillang($id,Request $request)
    {
//dd($id);
//dd($request->lang);
        $lang=$request->lang;
        $categories  = Category::all();
        $product_detail= Product::getProductBySlug($id);
//         dd($product_detail);
        return view('frontend.pages.product_detail',compact('categories','product_detail','id','lang'));

    }

    public function productGrids(){
        $products=Product::query();

        if(!empty($_GET['category'])){
            $slug=explode(',',$_GET['category']);
            // dd($slug);
            $cat_ids=Category::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            // dd($cat_ids);
            $products->whereIn('cat_id',$cat_ids);
            // return $products;
        }
        if(!empty($_GET['brand'])){
            $slugs=explode(',',$_GET['brand']);
            $brand_ids=Brand::select('id')->whereIn('slug',$slugs)->pluck('id')->toArray();
            return $brand_ids;
            $products->whereIn('brand_id',$brand_ids);
        }
        if(!empty($_GET['sortBy'])){
            if($_GET['sortBy']=='title'){
                $products=$products->where('status','active')->orderBy('title','ASC');
            }
            if($_GET['sortBy']=='price'){
                $products=$products->orderBy('price','ASC');
            }
        }

        if(!empty($_GET['price'])){
            $price=explode('-',$_GET['price']);
            // return $price;
            // if(isset($price[0]) && is_numeric($price[0])) $price[0]=floor(Helper::base_amount($price[0]));
            // if(isset($price[1]) && is_numeric($price[1])) $price[1]=ceil(Helper::base_amount($price[1]));

            $products->whereBetween('price',$price);
        }

        $recent_products=Product::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        // Sort by number
        if(!empty($_GET['show'])){
            $products=$products->where('status','active')->paginate($_GET['show']);
        }
        else{
            $products=$products->where('status','active')->paginate(9);
        }
        // Sort by name , price, category


        return view('frontend.pages.product-grids')->with('products',$products)->with('recent_products',$recent_products);
    }
    public function productLists(){
        $products=Product::query();

        if(!empty($_GET['category'])){
            $slug=explode(',',$_GET['category']);
            // dd($slug);
            $cat_ids=Category::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            // dd($cat_ids);
            $products->whereIn('cat_id',$cat_ids)->paginate;
            // return $products;
        }
        if(!empty($_GET['brand'])){
            $slugs=explode(',',$_GET['brand']);
            $brand_ids=Brand::select('id')->whereIn('slug',$slugs)->pluck('id')->toArray();
            return $brand_ids;
            $products->whereIn('brand_id',$brand_ids);
        }
        if(!empty($_GET['sortBy'])){
            if($_GET['sortBy']=='title'){
                $products=$products->where('status','active')->orderBy('title','ASC');
            }
            if($_GET['sortBy']=='price'){
                $products=$products->orderBy('price','ASC');
            }
        }

        if(!empty($_GET['price'])){
            $price=explode('-',$_GET['price']);
            // return $price;
            // if(isset($price[0]) && is_numeric($price[0])) $price[0]=floor(Helper::base_amount($price[0]));
            // if(isset($price[1]) && is_numeric($price[1])) $price[1]=ceil(Helper::base_amount($price[1]));

            $products->whereBetween('price',$price);
        }

        $recent_products=Product::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        // Sort by number
        if(!empty($_GET['show'])){
            $products=$products->where('status','active')->paginate($_GET['show']);
        }
        else{
            $products=$products->where('status','active')->paginate(6);
        }
        // Sort by name , price, category


        return view('frontend.pages.product-lists')->with('products',$products)->with('recent_products',$recent_products);
    }
    public function productFilter(Request $request){
            $data= $request->all();
            // return $data;
            $showURL="";
            if(!empty($data['show'])){
                $showURL .='&show='.$data['show'];
            }

            $sortByURL='';
            if(!empty($data['sortBy'])){
                $sortByURL .='&sortBy='.$data['sortBy'];
            }

            $catURL="";
            if(!empty($data['category'])){
                foreach($data['category'] as $category){
                    if(empty($catURL)){
                        $catURL .='&category='.$category;
                    }
                    else{
                        $catURL .=','.$category;
                    }
                }
            }

            $brandURL="";
            if(!empty($data['brand'])){
                foreach($data['brand'] as $brand){
                    if(empty($brandURL)){
                        $brandURL .='&brand='.$brand;
                    }
                    else{
                        $brandURL .=','.$brand;
                    }
                }
            }
            // return $brandURL;

            $priceRangeURL="";
            if(!empty($data['price_range'])){
                $priceRangeURL .='&price='.$data['price_range'];
            }
            if(request()->is('e-shop.loc/product-grids')){
                return redirect()->route('product-grids',$catURL.$brandURL.$priceRangeURL.$showURL.$sortByURL);
            }
            else{
                return redirect()->route('product-lists',$catURL.$brandURL.$priceRangeURL.$showURL.$sortByURL);
            }
    }
    public function productSearch(Request $request){
        $recent_products=Product::where('status','active')->orderBy('id','DESC')
        ->get();

        $categories = Category::all();
        $product_types = ProductType::all();
//        dd($product_types);

        $products=Product::orwhere('title','like','%'.$request->title.'%')
                    ->orwhere('slug','like','%'.$request->search.'%')
                    ->orwhere('description','like','%'.$request->search.'%')
                    ->orwhere('summary','like','%'.$request->search.'%')
                    ->orwhere('price','like','%'.$request->search.'%')
                    ->orderBy('id','DESC')
                    ->paginate('9');
//dd($products);
        return view('frontend.pages.product-grids',compact('products','recent_products','categories','product_types'));
//        return view('frontend.pages.demo')->with('products',$products)->with('recent_products',$recent_products);


    }

    public function productBrand(Request $request){
//        dd($request);
        $products=Brand::getProductByBrand($request->title);
        // dd($products);
        $recent_products=Product::where('status','active')->orderBy('id','DESC')->limit(3)->get();

        if(request()->is('e-shop.loc/product-grids')){
            return view('frontend.pages.product-grids')->with('products',$products->products)->with('recent_products',$recent_products);
        }
        else{
            return view('frontend.pages.product-lists')->with('products',$products->products)->with('recent_products',$recent_products);
        }

    }

    public function productCat(Request $request, $id)
    {
//        dd($slug);
//        $id=$slug;
//        dd($id);
//        $products=Category::getProductByCat($id);
            $products = DB::table('categories')
                ->join('products','categories.id','=','products.cat_id')
                ->where('products.cat_id',$id)
                ->where('products.is_approved',1)
                ->where('is_approved',1)
                ->get();

        // return $request->slug;
        $recent_products=Product::
        where('status','active')
        ->where('cat_id',$id)
        ->where('is_approved',1)
        ->orderBy('id','DESC')->limit(3)->get();

        if(request()->is('e-shop.loc/product-grids')){
            return view('frontend.pages.product-grids')->with('products',$products)->with('recent_products',$recent_products);

        }
        else{

//            dd("else");
            return view('frontend.pages.product-lists')->with('products',$products)->with('recent_products',$recent_products);
        }

    }

    public function productCatold(Request $request,$slug){
//        dd($slug);
       $p_id =   $slug;
        $products=Category::getProductByCat($p_id);
//dd($products);
        // return $request->slug;
        $recent_products=Product::where('status','active')->orderBy('id','DESC')->limit(3)->get();
//dd($recent_products);
        if(request()->is('e-shop.loc/product-grids')){
            dd("if");
            return view('frontend.pages.product-grids')->with('products',$products->products)->with('recent_products',$recent_products);
        }
        else{
            return view('frontend.pages.product-lists')->with('products',$products->products)->with('recent_products',$recent_products);
        }
    }

    public function productSubCat(Request $request){
        $products=Category::getProductBySubCat($request->sub_slug);
        // return $products;
        $recent_products=Product::where('status','active')->orderBy('id','DESC')->limit(3)->get();

        if(request()->is('e-shop.loc/product-grids')){
            return view('frontend.pages.product-grids')->with('products',$products->sub_products)->with('recent_products',$recent_products);
        }
        else{
            return view('frontend.pages.product-lists')->with('products',$products->sub_products)->with('recent_products',$recent_products);
        }

    }

    public function blog(){
        $post=Post::query();

        if(!empty($_GET['category'])){
            $slug=explode(',',$_GET['category']);
            // dd($slug);
            $cat_ids=PostCategory::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            return $cat_ids;
            $post->whereIn('post_cat_id',$cat_ids);
            // return $post;
        }
        if(!empty($_GET['tag'])){
            $slug=explode(',',$_GET['tag']);
            // dd($slug);
            $tag_ids=PostTag::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            // return $tag_ids;
            $post->where('post_tag_id',$tag_ids);
            // return $post;
        }

        if(!empty($_GET['show'])){
            $post=$post->where('status','active')->orderBy('id','DESC')->paginate($_GET['show']);
        }
        else{
            $post=$post->where('status','active')->orderBy('id','DESC')->paginate(9);
        }
        // $post=Post::where('status','active')->paginate(8);
        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        return view('frontend.pages.blog')->with('posts',$post)->with('recent_posts',$rcnt_post);
    }

    public function blogDetail($slug){
        $post=Post::getPostBySlug($slug);
        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        // return $post;
        return view('frontend.pages.blog-detail')->with('post',$post)->with('recent_posts',$rcnt_post);
    }

    public function blogSearch(Request $request){
        // return $request->all();
        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        $posts=Post::orwhere('title','like','%'.$request->search.'%')
            ->orwhere('quote','like','%'.$request->search.'%')
            ->orwhere('summary','like','%'.$request->search.'%')
            ->orwhere('description','like','%'.$request->search.'%')
            ->orwhere('slug','like','%'.$request->search.'%')
            ->orderBy('id','DESC')
            ->paginate(8);
        return view('frontend.pages.blog')->with('posts',$posts)->with('recent_posts',$rcnt_post);
    }

    public function blogFilter(Request $request){
        $data=$request->all();
        // return $data;
        $catURL="";
        if(!empty($data['category'])){
            foreach($data['category'] as $category){
                if(empty($catURL)){
                    $catURL .='&category='.$category;
                }
                else{
                    $catURL .=','.$category;
                }
            }
        }

        $tagURL="";
        if(!empty($data['tag'])){
            foreach($data['tag'] as $tag){
                if(empty($tagURL)){
                    $tagURL .='&tag='.$tag;
                }
                else{
                    $tagURL .=','.$tag;
                }
            }
        }
        // return $tagURL;
            // return $catURL;
        return redirect()->route('blog',$catURL.$tagURL);
    }

    public function blogByCategory(Request $request){
        $post=PostCategory::getBlogByCategory($request->slug);
        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        return view('frontend.pages.blog')->with('posts',$post->post)->with('recent_posts',$rcnt_post);
    }

    public function blogByTag(Request $request){
        // dd($request->slug);
        $post=Post::getBlogByTag($request->slug);
        // return $post;
        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        return view('frontend.pages.blog')->with('posts',$post)->with('recent_posts',$rcnt_post);
    }

    // Login
    public function login(){
        return view('frontend.pages.login');
    }
    public function loginSubmit(Request $request){
        $data= $request->all();
        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password'],'status'=>'active'])){
            Session::put('user',$data['email']);
            request()->session()->flash('success','Successfully login');
            return redirect()->route('indexHome');
        }
        else{
            request()->session()->flash('error','Invalid email and password pleas try again!');
            return redirect()->back();
        }
    }

    public function logout(){
        Session::forget('user');
        Auth::logout();
        request()->session()->flash('success','Logout successfully');
        return back();
    }

    public function register()
    {
        return view('frontend.pages.register');
    }
    public function registerSubmit(Request $request){
        // return $request->all();
        $this->validate($request,[
            'name'=>'string|required|min:2',
            'email'=>'string|required|unique:users,email',
            'password'=>'required|min:6|confirmed',
        ]);
        $data=$request->all();
        // if($data['is_vendor'] == 0)
        // {
        //     $isVendor = null;
        //     $role = 'user';
        // }
        // elseif ($data['is_vendor'] == 1)
        // {
        //     $isVendor = 1;
        //     $role = 'user';
        // }
        $role = 'user';
        $check=User::create([

            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'password_confirmation' => $data['password_confirmation'],
            'role' => $role
            // 'is_vendor' => $isVendor
        ]);        Session::put('user',$data['email']);
        if($check){
            request()->session()->flash('success','Successfully registered');
            return redirect()->route('home');
        }
        else{
            request()->session()->flash('error','Please try again!');
            return back();
        }
    }
    public function create(array $data){
        return User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
            'status'=>'active'
            ]);
    }
    // Reset password
    public function showResetForm(){
        return view('auth.passwords.old-reset');
    }

    public function subscribe(Request $request){
        if(! Newsletter::isSubscribed($request->email)){
                Newsletter::subscribePending($request->email);
                if(Newsletter::lastActionSucceeded()){
                    request()->session()->flash('success','Subscribed! Please check your email');
                    return redirect()->route('home');
                }
                else{
                    Newsletter::getLastError();
                    return back()->with('error','Something went wrong! please try again');
                }
            }
            else{
                request()->session()->flash('error','Already Subscribed');
                return back();
            }
    }

}
