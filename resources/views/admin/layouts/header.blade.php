 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{ asset('AdminLTE/dist/img/user1-128x128.jpg') }}" alt="User Avatar"
                            class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{ asset('AdminLTE/dist/img/user8-128x128.jpg') }}" alt="User Avatar"
                            class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                John Pierce
                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">I got your message bro</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{ asset('AdminLTE/dist/img/user3-128x128.jpg') }}" alt="User Avatar"
                            class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Nora Silvester
                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">The subject goes here</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>

        @php
            $getUnreadNotification = App\Models\Notification::getUnreadNotification();
        @endphp
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">{{ $getUnreadNotification->count() }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">{{ $getUnreadNotification->count() }} Notifications</span>
                @foreach ($getUnreadNotification as $notification)
                    <div class="dropdown-divider"></div>
                    <a href="{{ $notification->url }}?noti_id={{ $notification->id }}" class="dropdown-item">
                        <div> {{ $notification->message }}</div>
                        <div class="float-right text-muted text-sm">{{ date('d-m-Y h:i A', strtotime($notification->created_at)) }}</div>
                    </a>
                @endforeach

                <div class="dropdown-divider"></div>
                <a href="{{ url('admin/notification') }}" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>

    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link" style="text-align: center;">
        <span class="brand-text"> Welcome {{ Auth::user()->name }} </span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link @if (Request::segment(2) == 'dashboard') active @endif">
                       <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                   <a href="{{ route('admin.list') }}" class="nav-link @if (Request::segment(2) == 'admin') active @endif">

                       <i class="nav-icon fas fa-user"></i>
                       <p>
                           Admin
                       </p>
                   </a>
               </li>
               <li class="nav-item">
                <a href="{{ route('customer.list') }}" class="nav-link @if (Request::segment(2) == 'customer') active @endif">

                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Customer
                    </p>
                </a>
            </li>
               <li class="nav-item">
                <a href="{{ route('orders.list') }}" class="nav-link @if (Request::segment(2) == 'orders') active @endif">

                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                        Orders
                    </p>
                </a>
               </li>
               <li class="nav-item">
                   <a href="{{ route('category.list') }}" class="nav-link @if (Request::segment(2) == 'category') active @endif">

                       <i class="nav-icon fas fa-list-alt"></i>
                       <p>
                           Category
                       </p>
                   </a>
               </li>
               <li class="nav-item">
                   <a href="{{ route('sub_category.list') }}" class="nav-link @if (Request::segment(2) == 'sub_category') active @endif">

                       <i class="nav-icon fas fa-list-alt"></i>
                       <p>
                           Sub Category
                       </p>
                   </a>
               </li>
               <li class="nav-item">
                   <a href="{{ route('brand.list') }}" class="nav-link @if (Request::segment(2) == 'brand') active @endif">

                       <i class="nav-icon fas fa-list-alt"></i>
                       <p>
                           Brand
                       </p>
                   </a>
               </li>
               <li class="nav-item">
                   <a href="{{ route('color.list') }}" class="nav-link @if (Request::segment(2) == 'color') active @endif">

                       <i class="nav-icon fas fa-list-alt"></i>
                       <p>
                           Color
                       </p>
                   </a>
               </li>
               <li class="nav-item">
                   <a href="{{ route('product.list') }}" class="nav-link @if (Request::segment(2) == 'product') active @endif">

                       <i class="nav-icon fas fa-list-alt"></i>
                       <p>
                           Product
                       </p>
                   </a>
               </li>
               <li class="nav-item">
                <a href="{{ route('discount_code.list') }}" class="nav-link @if (Request::segment(2) == 'discount_code') active @endif">

                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                        Discount Code
                    </p>
                </a>
               </li>
               <li class="nav-item">
                <a href="{{ route('shipping_charge.list') }}" class="nav-link @if (Request::segment(2) == 'shipping_charge') active @endif">

                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                        Shipping Charge
                    </p>
                </a>
               </li>
               <li class="nav-item">
                <a href="{{ route('pages.list') }}" class="nav-link @if (Request::segment(2) == 'pages') active @endif">

                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                        Pages
                    </p>
                </a>
               </li>
               <li class="nav-item">
                <a href="{{ route('blog-category.list') }}" class="nav-link @if (Request::segment(2) == 'blog-category') active @endif">

                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                        Blog Category
                    </p>
                </a>
               </li>
               <li class="nav-item">
                <a href="{{ route('blog.list') }}" class="nav-link @if (Request::segment(2) == 'blog') active @endif">

                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                        Blog
                    </p>
                </a>
               </li>
               <li class="nav-item">
                <a href="{{ route('setting.system-settings') }}" class="nav-link @if (Request::segment(2) == 'system-settings') active @endif">

                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                        System Settings
                    </p>
                </a>
               </li>
               <li class="nav-item">
                <a href="{{ route('setting.home-settings') }}" class="nav-link @if (Request::segment(2) == 'home-settings') active @endif">

                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                        Home Settings
                    </p>
                </a>
               </li>
               <li class="nav-item">
                <a href="{{ route('slider.list') }}" class="nav-link @if (Request::segment(2) == 'slider') active @endif">

                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                        Slider
                    </p>
                </a>
               </li>
               <li class="nav-item">
                <a href="{{ route('partner.list') }}" class="nav-link @if (Request::segment(2) == 'partner') active @endif">

                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                        Partner Logo
                    </p>
                </a>
               </li>
               <li class="nav-item">
                <a href="{{ route('contactUs.list') }}" class="nav-link @if (Request::segment(2) == 'contact-us') active @endif">

                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                        Contact Us
                    </p>
                </a>
               </li>
               <li class="nav-item">
                   <a href="{{ route('admin.logout') }}" class="nav-link ">

                       <i class="nav-icon fas fa-sign-out-alt"></i>
                       <p>
                           Logout
                       </p>
                   </a>
               </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
