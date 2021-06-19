<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #303641;  min-height: 600px!important;">
    <!-- Brand Logo -->
{{--<a href="#" class="brand-link">
    <img src="{{asset('backend/images/logo.png')}}" width="150" height="100" alt="Aamar Bazar" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    --}}{{--<span class="brand-text font-weight-light">Farazi Home Care</span>--}}{{--
</a>--}}
<!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-2 pl-2 mb-2 d-flex">
            <div class="">
                <img src="{{asset('frontend/logo_sazidmart.png')}}" class="" alt="User Image" width="100%">
            </div>
        </div>

    @if (Auth::check()  && (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'staff')  )
        <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{route('admin.dashboard')}}"
                           class="nav-link {{Request::is('admin/dashboard') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview {{(Request::is('admin/brands*')
                        || Request::is('admin/categories*')
                        || Request::is('admin/subcategories*')
                        || Request::is('admin/sub-subcategories*')
                        || Request::is('admin/products*')
                        || Request::is('admin/flash_deals*')
                        || Request::is('admin/coupon*')
                        || Request::is('admin/offers*')
                        || Request::is('admin/request/products*')
                        || Request::is('admin/attributes*'))
                    ? 'menu-open' : ''}}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>
                                Product Management
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.attributes.index')}}"
                                   class="nav-link {{Request::is('admin/attributes*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/attributes*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Attributes</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.brands.index')}}"
                                   class="nav-link {{Request::is('admin/brands*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/brands*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Brands</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.categories.index')}}"
                                   class="nav-link {{Request::is('admin/categories*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/categories*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Categories</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.subcategories.index')}}"
                                   class="nav-link {{Request::is('admin/subcategories*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/subcategories*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Subcategories</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.sub-subcategories.index')}}"
                                   class="nav-link {{Request::is('admin/sub-subcategories*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/sub-subcategories*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Sub Subcategories</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.products.index')}}"
                                   class="nav-link {{Request::is('admin/products*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/products*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Products</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.flash_deals.index')}}"
                                   class="nav-link {{Request::is('admin/flash_deals*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/flash_deals*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Flash Deal</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.coupon.index')}}"
                                   class="nav-link {{Request::is('admin/coupon*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/coupon*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Coupon</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.offers.index')}}"
                                   class="nav-link {{Request::is('admin/offers*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/offers*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Offer</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview {{(Request::is('admin/order*')) ? 'menu-open' : ''}}">
                        <a href="{{route('admin.order.list')}}" class="nav-link {{Request::is('admin/order') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-shopping-basket"></i>
                            <p>
                               Inhouse Orders
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview {{(Request::is('admin/roles*') || Request::is('admin/staffs*')) ? 'menu-open' : ''}}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Role & permission
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.staffs.index')}}"
                                   class="nav-link {{Request::is('admin/staffs*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/staffs*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Staff Manage</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.roles.index')}}"
                                   class="nav-link {{Request::is('admin/role*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/roles*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Role Manage</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{(Request::is('admin/profile*') ) ? 'menu-open' : '' || (Request::is('admin/payment*') ) ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-circle"></i>
                            <p>
                                Admin
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.profile.index')}}"
                                   class="nav-link {{Request::is('admin/profile') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/profile') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Profile</p>
                                </a>
                            </li>
{{--                            <li class="nav-item">--}}
{{--                                <a href=""--}}
{{--                                   class="nav-link {{Request::is('admin/payment/history*') ? 'active' :''}}">--}}
{{--                                    <i class="fa fa-{{Request::is('admin/payment/history*') ? 'folder-open':'folder'}} nav-icon"></i>--}}
{{--                                    <p>Admin Payments History</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{(Request::is('admin/customers*') ) ? 'menu-open' : ''}}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Customers
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.customers.index')}}"
                                   class="nav-link {{Request::is('admin/customers') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/customers') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Customer List</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview {{(Request::is('admin/frontend_settings*') ) || (Request::is('admin/logo*') ) ? 'menu-open' : ''}}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-desktop"></i>
                            <p>
                                Frontend Settings
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.home_settings.index')}}"
                                   class="nav-link {{Request::is('admin/frontend_settings*') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/frontend_settings*') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Home</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.generalsettings.logo')}}"
                                   class="nav-link {{Request::is('admin/logo') ? 'active' :''}}">
                                    <i class="fa fa-{{Request::is('admin/logo') ? 'folder-open':'folder'}} nav-icon"></i>
                                    <p>Logo Settings</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('admin.reviews.index')}}" class="nav-link {{Request::is('admin/reviews*')  ? 'active' : ''}} ">

                            <i class="nav-icon fas fa-star"></i>
                            <p>
                                Review
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('admin.sliders.index')}}" class="nav-link {{Request::is('admin/sliders*')  ? 'active' : ''}} ">

                            <i class="nav-icon fas fa-sliders"></i>
                            <p>
                                Sliders
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('admin.blogs.index')}}" class="nav-link {{Request::is('admin/blogs*')  ? 'active' : ''}} ">

                            <i class="nav-icon fas fa-newspaper-o"></i>
                            <p>
                                Blogs
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.advertisement.index')}}" class="nav-link {{Request::is('admin/advertisement*')  ? 'active' : ''}}">

                            <i class="nav-icon fa fa-ad"></i>
                            <p>
                                Advertisement
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">

                        <a href="{{route('admin.site.optimize')}}" class="nav-link {{Request::is('admin/site-optimize*') ? 'active' : ''}}">
                            <i class="nav-icon fa fa-cog"></i>
                            <p>
                                Site Optimize
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        @endif
    </div>
    <!-- /.sidebar -->
</aside>


