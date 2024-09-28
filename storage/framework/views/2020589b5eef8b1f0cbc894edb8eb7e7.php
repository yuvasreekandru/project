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
                        <img src="<?php echo e(asset('AdminLTE/dist/img/user1-128x128.jpg')); ?>" alt="User Avatar"
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
                        <img src="<?php echo e(asset('AdminLTE/dist/img/user8-128x128.jpg')); ?>" alt="User Avatar"
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
                        <img src="<?php echo e(asset('AdminLTE/dist/img/user3-128x128.jpg')); ?>" alt="User Avatar"
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

        <?php
            $getUnreadNotification = App\Models\Notification::getUnreadNotification();
        ?>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge"><?php echo e($getUnreadNotification->count()); ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header"><?php echo e($getUnreadNotification->count()); ?> Notifications</span>
                <?php $__currentLoopData = $getUnreadNotification; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="dropdown-divider"></div>
                    <a href="<?php echo e($notification->url); ?>?noti_id=<?php echo e($notification->id); ?>" class="dropdown-item">
                        <div> <?php echo e($notification->message); ?></div>
                        <div class="float-right text-muted text-sm"><?php echo e(date('d-m-Y h:i A', strtotime($notification->created_at))); ?></div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div class="dropdown-divider"></div>
                <a href="<?php echo e(url('admin/notification')); ?>" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>

    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link" style="text-align: center;">
        <span class="brand-text"> Welcome <?php echo e(Auth::user()->name); ?> </span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link <?php if(Request::segment(2) == 'dashboard'): ?> active <?php endif; ?>">
                       <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                   <a href="<?php echo e(route('admin.list')); ?>" class="nav-link <?php if(Request::segment(2) == 'admin'): ?> active <?php endif; ?>">

                       <i class="nav-icon fas fa-user"></i>
                       <p>
                           Admin
                       </p>
                   </a>
               </li>
               <li class="nav-item">
                <a href="<?php echo e(route('customer.list')); ?>" class="nav-link <?php if(Request::segment(2) == 'customer'): ?> active <?php endif; ?>">

                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Customer
                    </p>
                </a>
            </li>
               <li class="nav-item">
                <a href="<?php echo e(route('orders.list')); ?>" class="nav-link <?php if(Request::segment(2) == 'orders'): ?> active <?php endif; ?>">

                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                        Orders
                    </p>
                </a>
               </li>
               <li class="nav-item">
                   <a href="<?php echo e(route('category.list')); ?>" class="nav-link <?php if(Request::segment(2) == 'category'): ?> active <?php endif; ?>">

                       <i class="nav-icon fas fa-list-alt"></i>
                       <p>
                           Category
                       </p>
                   </a>
               </li>
               <li class="nav-item">
                   <a href="<?php echo e(route('sub_category.list')); ?>" class="nav-link <?php if(Request::segment(2) == 'sub_category'): ?> active <?php endif; ?>">

                       <i class="nav-icon fas fa-list-alt"></i>
                       <p>
                           Sub Category
                       </p>
                   </a>
               </li>
               <li class="nav-item">
                   <a href="<?php echo e(route('brand.list')); ?>" class="nav-link <?php if(Request::segment(2) == 'brand'): ?> active <?php endif; ?>">

                       <i class="nav-icon fas fa-list-alt"></i>
                       <p>
                           Brand
                       </p>
                   </a>
               </li>
               <li class="nav-item">
                   <a href="<?php echo e(route('color.list')); ?>" class="nav-link <?php if(Request::segment(2) == 'color'): ?> active <?php endif; ?>">

                       <i class="nav-icon fas fa-list-alt"></i>
                       <p>
                           Color
                       </p>
                   </a>
               </li>
               <li class="nav-item">
                   <a href="<?php echo e(route('product.list')); ?>" class="nav-link <?php if(Request::segment(2) == 'product'): ?> active <?php endif; ?>">

                       <i class="nav-icon fas fa-list-alt"></i>
                       <p>
                           Product
                       </p>
                   </a>
               </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('product_type.list')); ?>" class="nav-link <?php if(Request::segment(2) == 'product_type'): ?> active <?php endif; ?>">

                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Product Type
                        </p>
                    </a>
                </li>
               <li class="nav-item">
                <a href="<?php echo e(route('discount_code.list')); ?>" class="nav-link <?php if(Request::segment(2) == 'discount_code'): ?> active <?php endif; ?>">

                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                        Discount Code
                    </p>
                </a>
               </li>
               <li class="nav-item">
                <a href="<?php echo e(route('shipping_charge.list')); ?>" class="nav-link <?php if(Request::segment(2) == 'shipping_charge'): ?> active <?php endif; ?>">

                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                        Shipping Charge
                    </p>
                </a>
               </li>
               <li class="nav-item">
                <a href="<?php echo e(route('pages.list')); ?>" class="nav-link <?php if(Request::segment(2) == 'pages'): ?> active <?php endif; ?>">

                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                        Pages
                    </p>
                </a>
               </li>
               <li class="nav-item">
                <a href="<?php echo e(route('blog-category.list')); ?>" class="nav-link <?php if(Request::segment(2) == 'blog-category'): ?> active <?php endif; ?>">

                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                        Blog Category
                    </p>
                </a>
               </li>
               <li class="nav-item">
                <a href="<?php echo e(route('blog.list')); ?>" class="nav-link <?php if(Request::segment(2) == 'blog'): ?> active <?php endif; ?>">

                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                        Blog
                    </p>
                </a>
               </li>
               <li class="nav-item">
                <a href="<?php echo e(route('slider.list')); ?>" class="nav-link <?php if(Request::segment(2) == 'slider'): ?> active <?php endif; ?>">

                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                        Slider
                    </p>
                </a>
               </li>
               <li class="nav-item">
                <a href="<?php echo e(route('partner.list')); ?>" class="nav-link <?php if(Request::segment(2) == 'partner'): ?> active <?php endif; ?>">

                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                        Partner Logo
                    </p>
                </a>
               </li>
               <li class="nav-item">
                <a href="<?php echo e(route('contactUs.list')); ?>" class="nav-link <?php if(Request::segment(2) == 'contact-us'): ?> active <?php endif; ?>">

                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                        Contact Us
                    </p>
                </a>
               </li>
               <li class="nav-item">
                <a href="<?php echo e(url('admin/system-settings')); ?>" class="nav-link <?php if(Request::segment(2) == 'system-settings'): ?> active <?php endif; ?>">

                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                        System Settings
                    </p>
                </a>
               </li>
               <li class="nav-item">
                <a href="<?php echo e(url('admin/home-settings')); ?>" class="nav-link <?php if(Request::segment(2) == 'home-settings'): ?> active <?php endif; ?>">

                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                        Home Settings
                    </p>
                </a>
               </li>
               <li class="nav-item">
                <a href="<?php echo e(url('admin/smtp-settings')); ?>" class="nav-link <?php if(Request::segment(2) == 'smtp-settings'): ?> active <?php endif; ?>">

                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                        SMTP Settings
                    </p>
                </a>
               </li>
               <li class="nav-item">
                <a href="<?php echo e(url('admin/payment-settings')); ?>" class="nav-link <?php if(Request::segment(2) == 'payment-settings'): ?> active <?php endif; ?>">

                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                        Payment Settings
                    </p>
                </a>
               </li>
               <li class="nav-item">
                   <a href="<?php echo e(route('admin.logout')); ?>" class="nav-link ">

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
<?php /**PATH C:\Users\HP\Desktop\project\resources\views/admin/layouts/header.blade.php ENDPATH**/ ?>