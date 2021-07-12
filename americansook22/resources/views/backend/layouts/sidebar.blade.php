{{--<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">--}}
<ul style="background: black" class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar"
    xmlns="http://www.w3.org/1999/html">

    <!-- Sidebar - Brand -->

    @if(Auth::user()->role == 'admin')
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin')}}">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
        <div class="sidebar-brand-text mx-3">{{Auth::user()->name}}
            <br>
            <sub>{{Auth::user()->role}}</sub></div>
    </a>
    @endif
    @if(Auth::user()->role == 'vendor')
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('vendor-dashboard')}}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">{{Auth::user()->name}}<span><br>
            <sub>{{Auth::user()->role}}</sub></div>        </a>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

@if(Auth::user()->role == 'admin')

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="{{route('admin')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
@endif

@if(Auth::user()->role == 'vendor')

    <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{route('vendor-profile')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Profile</span></a>
        </li>
@endif
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
{{--    <div class="sidebar-heading">--}}
{{--        Banner--}}
{{--    </div>--}}

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- Nav Item - Charts -->
{{--    <li class="nav-item">--}}
{{--        <a class="nav-link" href="{{route('file-manager')}}">--}}
{{--            <i class="fas fa-fw fa-chart-area"></i>--}}
{{--            <span>Media Manager</span></a>--}}
{{--    </li>--}}

{{--    <li class="nav-item">--}}
{{--      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">--}}
{{--        <i class="fas fa-image"></i>--}}
{{--        <span>Banners</span>--}}
{{--      </a>--}}
{{--      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">--}}
{{--        <div class="bg-white py-2 collapse-inner rounded">--}}
{{--          <h6 class="collapse-header">Banner Options:</h6>--}}
{{--          <a class="collapse-item" href="{{route('banner.index')}}">Banners</a>--}}
{{--          <a class="collapse-item" href="{{route('banner.create')}}">Add Banners</a>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </li>--}}
    <!-- Divider -->
{{--    <hr class="sidebar-divider">--}}
        <!-- Heading -->
{{--        <div class="sidebar-heading">--}}
{{--            Shop--}}
{{--        </div>--}}

    <!-- Categories -->
    @if(Auth::user()->role == 'admin')
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#categoryCollapse" aria-expanded="true" aria-controls="categoryCollapse">
          <i class="fas fa-sitemap"></i>
          <span>Category</span>
        </a>
        <div id="categoryCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Category Options:</h6>
            <a class="collapse-item" href="{{route('category.index')}}">Category</a>
            <a class="collapse-item" href="{{route('category.create')}}">Add Category</a>
          </div>
        </div>
    </li>
    @endif


    @if(Auth::user()->role == 'admin')
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#categoryCollapse2" aria-expanded="true" aria-controls="categoryCollapse">
          <i class="fas fa-sitemap"></i>
          <span>SubCategory</span>
        </a>
        <div id="categoryCollapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Category Options:</h6>
            <a class="collapse-item" href="{{route('subcategory.index')}}">SubCategory</a>
            <a class="collapse-item" href="{{route('subcategory.create')}}">Add Category</a>
          </div>
        </div>
    </li>
    @endif

    {{-- Products --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#productCollapse" aria-expanded="true" aria-controls="productCollapse">
          <i class="fas fa-cubes"></i>
          <span>Products</span>
        </a>
        <div id="productCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Product Options:</h6>
              @if(Auth::user()->role == 'admin')
                  <a class="collapse-item" href="{{route('product.index')}}">All Products</a>
                  {{-- <a class="collapse-item" href="{{route('product.adminproducts')}}">Admin Products</a> --}}
                  {{-- <a class="collapse-item" href="{{route('admin_vendor_products.approved_products')}}">Approved Products</a>--}}
                  <a class="collapse-item" href="{{route('admin_vendor_products.rejected_products')}}">Rejected Products</a>
                  <a class="collapse-item" href="{{route('product.create')}}">Add Product</a>
               @endif

            {{--  @if(Auth::user()->role == 'vendor') --}}
                  {{-- <a class="collapse-item" href="{{route('vendor_product.index')}}">Products</a>
                  <a class="collapse-item" href="{{route('Vendor_products.approved_products')}}">Approved Products</a>
                  <a class="collapse-item" href="{{route('vendor_product.create')}}">Add Product</a> --}}
              {{-- @endif --}}

          {{-- </div>
        </div>
    </li>

    {{-- Brands --}}
    @if(Auth::user()->role == 'admin')

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#brandCollapse" aria-expanded="true" aria-controls="brandCollapse">
          <i class="fas fa-table"></i>
          <span>Brands</span>
        </a>
        <div id="brandCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Brand Options:</h6>
            <a class="collapse-item" href="{{route('brand.index')}}">Brands</a>
            <a class="collapse-item" href="{{route('brand.create')}}">Add Brand</a>
          </div>
        </div>
    </li>
    @endif

    @if(Auth::user()->role == 'admin')


   <li class="nav-item">
       <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#shippingCollapse" aria-expanded="true" aria-controls="shippingCollapse">
         <i class="fas fa-truck"></i>
         <span>Shipping</span>
       </a>
       <div id="shippingCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
         <div class="bg-white py-2 collapse-inner rounded">
           <h6 class="collapse-header">Shipping Options:</h6>
           <a class="collapse-item" href="{{route('shipping.index')}}">Shipping</a>
           <a class="collapse-item" href="{{route('shipping.create')}}">Add Shipping</a>
         </div>
       </div>
   </li>
@endif
{{--
 @if(Auth::user()->role == 'vendor')
    <!--Orders -->

    <li class="nav-item">
        <a class="nav-link" href="{{route('vendor_order.index')}}">
            <i class="fas fa-hammer fa-chart-area"></i>
            <span>Orders</span>
        </a>
    </li>
    @endif --}}


    @if(Auth::user()->role == 'admin')

     <!--Orders -->
 <li class="nav-item">
    <a class="nav-link" href="{{route('admin_order')}}">
        <i class="fas fa-hammer fa-chart-area"></i>
        <span>Orders</span>
    </a>
</li>

@endif











    <!-- Reviews -->
{{--    <li class="nav-item">--}}
{{--        <a class="nav-link" href="{{route('review.index')}}">--}}
{{--            <i class="fas fa-comments"></i>--}}
{{--            <span>Reviews</span></a>--}}
{{--    </li>--}}


    <!-- Divider -->
{{--    <hr class="sidebar-divider">--}}

    <!-- Heading -->
{{--    <div class="sidebar-heading">--}}
{{--      Posts--}}
{{--    </div>--}}

    <!-- Posts -->
{{--    <li class="nav-item">--}}
{{--      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#postCollapse" aria-expanded="true" aria-controls="postCollapse">--}}
{{--        <i class="fas fa-fw fa-folder"></i>--}}
{{--        <span>Posts</span>--}}
{{--      </a>--}}
{{--      <div id="postCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">--}}
{{--        <div class="bg-white py-2 collapse-inner rounded">--}}
{{--          <h6 class="collapse-header">Post Options:</h6>--}}
{{--          <a class="collapse-item" href="{{route('post.index')}}">Posts</a>--}}
{{--          <a class="collapse-item" href="{{route('post.create')}}">Add Post</a>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </li>--}}

     <!-- Category -->
{{--     <li class="nav-item">--}}
{{--        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#postCategoryCollapse" aria-expanded="true" aria-controls="postCategoryCollapse">--}}
{{--          <i class="fas fa-sitemap fa-folder"></i>--}}
{{--          <span>Category</span>--}}
{{--        </a>--}}
{{--        <div id="postCategoryCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">--}}
{{--          <div class="bg-white py-2 collapse-inner rounded">--}}
{{--            <h6 class="collapse-header">Category Options:</h6>--}}
{{--            <a class="collapse-item" href="{{route('post-category.index')}}">Category</a>--}}
{{--            <a class="collapse-item" href="{{route('post-category.create')}}">Add Category</a>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </li>--}}

      <!-- Tags -->
{{--    <li class="nav-item">--}}
{{--        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tagCollapse" aria-expanded="true" aria-controls="tagCollapse">--}}
{{--            <i class="fas fa-tags fa-folder"></i>--}}
{{--            <span>Tags</span>--}}
{{--        </a>--}}
{{--        <div id="tagCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">--}}
{{--            <div class="bg-white py-2 collapse-inner rounded">--}}
{{--            <h6 class="collapse-header">Tag Options:</h6>--}}
{{--            <a class="collapse-item" href="{{route('post-tag.index')}}">Tag</a>--}}
{{--            <a class="collapse-item" href="{{route('post-tag.create')}}">Add Tag</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </li>--}}

      <!-- Comments -->
{{--      <li class="nav-item">--}}
{{--        <a class="nav-link" href="{{route('comment.index')}}">--}}
{{--            <i class="fas fa-comments fa-chart-area"></i>--}}
{{--            <span>Comments</span>--}}
{{--        </a>--}}
{{--      </li>--}}

@if(Auth::user()->role == 'admin')
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
     <!-- Heading -->


{{--    <li class="nav-item">--}}
{{--      <a class="nav-link" href="{{route('coupon.index')}}">--}}
{{--          <i class="fas fa-table"></i>--}}
{{--          <span>Coupon</span></a>--}}
{{--    </li>--}}
     <!-- Users -->


    {{-- <li class="nav-item">
        <a class="nav-link" href="{{route('users.index')}}">
            <i class="fas fa-users"></i>
            <span>Users</span></a>
    </li> --}}

        {{-- <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#vendorCollapse" aria-expanded="true" aria-controls="vendorCollapse">
                <i class="fas fa-cubes"></i>
                <span>Vendors</span>
            </a>
            <div id="vendorCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Product Options:</h6>
                    @if(Auth::user()->role == 'admin')

                        <a class="collapse-item" href="{{route('all-vendors')}}">All Vendors</a>
                        <a class="collapse-item" href="{{route('user-pending-request')}}">Vendor Requests</a>
                        <a class="collapse-item" href="{{route('active-vendors')}}">Active Vendors</a>
                       @endif

                </div>
            </div>
        </li> --}}
        {{-- <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#vendorPrductsCollapse" aria-expanded="true" aria-controls="vendorCollapse">
                <i class="fas fa-cubes"></i>
                <span>Vendors' Products</span>
            </a>
            <div id="vendorPrductsCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Product Options:</h6>
                    @if(Auth::user()->role == 'admin')
                        <a class="collapse-item" href="{{route('vendor.products')}}">Products and Vendors</a>
                    @endif

                </div>
            </div>
        </li> --}}
@endif
     <!-- General settings -->
{{--     <li class="nav-item">--}}
{{--        <a class="nav-link" href="{{route('settings')}}">--}}
{{--            <i class="fas fa-cog"></i>--}}
{{--            <span>Settings</span></a>--}}
{{--    </li>--}}

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
