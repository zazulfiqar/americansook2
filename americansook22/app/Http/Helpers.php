<?php
use App\Models\Message;
use App\Models\Category;
use App\Models\PostTag;
use App\Models\PostCategory;
use App\Models\Order;
use App\Models\Wishlist;
use App\Models\Shipping;
use App\Models\Cart;
// use Auth;
class Helper{
    public static function messageList()
    {
        return Message::whereNull('read_at')->orderBy('created_at', 'desc')->get();
    }
    public static function getAllCategory(){
        $category=new Category();
        $menu=$category->getAllParentWithChild();
        return $menu;
    }

    public static function getHeaderCategory(){
        $category = new Category();
        // dd($category);
        $menu=$category->getAllParentWithChild();

        if($menu){
            ?>

            <li>

                <a href="javascript:void(0);">Category<i class="ti-angle-down"></i></a>
                <ul class="dropdown border-0 shadow">
                    <?php
                    foreach($menu as $cat_info){
                        if($cat_info->child_cat->count()>0){
                            ?>
                            <li><a href="<?php echo route('product-cat',$cat_info->slug); ?>"><?php echo $cat_info->title; ?></a>
                                <ul class="dropdown sub-dropdown border-0 shadow">
                                    <?php
                                    foreach($cat_info->child_cat as $sub_menu){
                                        ?>
                                        <li><a href="<?php echo route('product-sub-cat',[$cat_info->slug,$sub_menu->slug]); ?>"><?php echo $sub_menu->title; ?></a></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </li>
                            <?php
                        }
                        else{
                            ?>
                            <li><a href="<?php echo route('product-cat',$cat_info->slug);?>"><?php echo $cat_info->title; ?></a></li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </li>
            <?php
        }
    }

    public static function productCategoryList($option='all'){

        if($option='all'){
            return Category::orderBy('id','DESC')->get();
        }
        return Category::has('products')->orderBy('id','DESC')->get();
    }

    public static function postTagList($option='all'){
        if($option='all'){
            return PostTag::orderBy('id','desc')->get();
        }
        return PostTag::has('posts')->orderBy('id','desc')->get();
    }

    public static function postCategoryList($option="all"){
        if($option='all'){
            return PostCategory::orderBy('id','DESC')->get();
        }
        return PostCategory::has('posts')->orderBy('id','DESC')->get();
    }
    // Cart Count
    public static function cartCount($user_id=''){
        if(!empty(auth()->user()->id)){
            $sessionID=auth()->user()->id;
          }
          else{
             $sessionID = session()->get('sessionId');
          }
        if($sessionID){
            if($user_id=="") $user_id=$sessionID;
            return Cart::where('user_id',$user_id)->where('order_id',null)->count('quantity');
        }
        else{
            return 0;
        }
    }
    // relationship cart with product
    public function product(){
        return $this->hasOne('App\Models\Product','id','product_id');
    }

    public static function getAllProductFromCart($user_id=''){
        if(!empty(auth()->user()->id)){
            $sessionID=auth()->user()->id;
          }
          else{
             $sessionID = session()->get('sessionId');
          }
        if($sessionID){
            if($user_id=="") $user_id=$sessionID;
            return Cart::with('product')->where('user_id',$user_id)->where('order_id',null)->get();
        }
        else{
            return 0;
        }
    }
    // Total amount cart
    public static function totalCartPrice($user_id=''){
        if(!empty(auth()->user()->id)){
            $sessionID=auth()->user()->id;
          }
          else{
             $sessionID = session()->get('sessionId');
          }
        if($sessionID){
            if($user_id=="") $user_id=$sessionID;
            return Cart::where('user_id',$user_id)->where('order_id',null)->sum('amount');
        }
        else{
            return 0;
        }
    }
    // Wishlist Count
    public static function wishlistCount($user_id=''){

        if(Auth::check()){
            if($user_id=="") $user_id=auth()->user()->id;
            return Wishlist::where('user_id',$user_id)->where('cart_id',null)->sum('quantity');
        }
        else{
            return 0;
        }
    }
    public static function getAllProductFromWishlist($user_id=''){
        if(!empty(auth()->user()->id)){
            $sessionID=auth()->user()->id;
          }
          else{
             $sessionID = session()->get('sessionId');
          }
        if($sessionID){
            if($user_id=="") $user_id=$sessionID;
            return Wishlist::with('product')->where('user_id',$user_id)->where('cart_id',null)->get();
        }
        else{
            return 0;
        }
    }
    public static function totalWishlistPrice($user_id=''){
        if(!empty(auth()->user()->id)){
            $sessionID=auth()->user()->id;
          }
          else{
             $sessionID = session()->get('sessionId');
          }
        if($sessionID){
            if($user_id=="") $user_id=$sessionID;
            return Wishlist::where('user_id',$user_id)->where('cart_id',null)->sum('amount');
        }
        else{
            return 0;
        }
    }

    // Total price with shipping and coupon
    public static function grandPrice($id,$user_id){
        $order=Order::find($id);
        dd($id);
        if($order){
            $shipping_price=(float)$order->shipping->price;
            $order_price=self::orderPrice($id,$user_id);
            return number_format((float)($order_price+$shipping_price),2,'.','');
        }else{
            return 0;
        }
    }


    // Admin home
    public static function earningPerMonth(){
        $month_data=Order::where('status','delivered')->get();
        // return $month_data;
        $price=0;
        foreach($month_data as $data){
            $price = $data->cart_info->sum('price');
        }
        return number_format((float)($price),2,'.','');
    }

    public static function shipping(){
        return Shipping::orderBy('id','DESC')->get();
    }
}

?>



<?php

// use Auth;
class Helperclass{

//    public static function messageList()
//    {
//        return Message::whereNull('read_at')->orderBy('created_at', 'desc')->get();
//    }
//    public static function getAllCategory(){
//        $category=new Category();
//        $menu=$category->getAllParentWithChild();
//        return $menu;
//    }

    public static function getHeaderCategory(){
        $category = new Category();
        // dd($category);
        $menu=$category->getAllParentWithChild();?>

        </li>

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <title>American Sooq</title>
        </head>
        <body>

        <div class="wrapper">


            <!--HEADER-SECTION-START-->
            <div class="main-bg">
                <div class="container">
                    <div class="main-bg-main">

                        <div class="row">
                            <?php
                            if($menu){
                            foreach($menu as $cat_info){?>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="img-link">
                                    <a href="<?php echo route('product-cat',$cat_info->slug);?>">


                                        <img src="https://mock105.designnortex.store/gpv_net_new_world/storage/app/<?php echo $cat_info->photo; ?>" >
                                        <div class="heading-bottom">
                                            <h4><?php echo $cat_info->title; ?></h4></a>
                                </div>
                            </div>
                        </div>
                        <?php } }?>

                    </div>


                </div>
            </div>
        </div>

        <!--HEADER-SECTION-END-->

        </div>
        </body>
        </html>




        <?php

    }  }?>
