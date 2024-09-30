<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left">

                <div class="header-dropdown">
                    <a href="#">Eng</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="#">English</a></li>
                        </ul>
                    </div><!-- End .header-menu -->
                </div><!-- End .header-dropdown -->
            </div><!-- End .header-left -->

            <div class="header-right">
                <ul class="top-menu">
                    <li>
                        <a href="#">Links</a>
                        <ul>
                            <li><a href="tel:<?php echo e($getSystemSettingApp->phone); ?>"><i class="icon-phone"></i>Call:
                                    +<?php echo e($getSystemSettingApp->phone); ?></a></li>
                            <?php if(!empty(Auth::check())): ?>
                                <?php
                                    $wishlist = App\Models\Product::getMyWishlist(Auth::user()->id);
                                ?>

                                <li><a href="<?php echo e(url('my-wishlist')); ?>"><i class="icon-heart-o"></i>My Wishlist <span
                                            style="    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 2rem;
    height: 2rem;
    border-radius: 50%;
    font-weight: 400;
    font-size: 1rem;
    line-height: 1;
    margin-left: .2rem;
    margin-top: .1rem;
    color: #fff;
    background-color: #c96;
"><?php echo e($wishlist->count()); ?></span>
                                    </a></li>
                            <?php else: ?>
                                <li><a href="#signin-modal" data-toggle="modal"><i class="icon-heart-o"></i>My Wishlist
                                    </a></li>
                            <?php endif; ?>
                            <li><a href="<?php echo e(url('about')); ?>">About Us</a></li>
                            <li><a href="<?php echo e(url('contact')); ?>">Contact Us</a></li>
                            <?php if(!empty(Auth::check())): ?>
                                <li><a href="<?php echo e(url('user/dashboard')); ?>"><i
                                            class="icon-user"></i><?php echo e(Auth::user()->name); ?></a></li>
                            <?php else: ?>
                                <li><a href="#signin-modal" data-toggle="modal"><i class="icon-user"></i>Login</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                </ul><!-- End .top-menu -->
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-top -->

    <div class="header-middle sticky-header">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="<?php echo e(url('/')); ?>" class="logo">
                    <img src="<?php echo e($getSystemSettingApp->getLogo()); ?>" alt="Molla Logo" width="105" height="25">
                </a>

                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="<?php echo e(Request::segment(1) == '' ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('/')); ?>" class="">Home</a>

                        </li>
                        <li>
                            <a href="javascript:;" class="sf-with-ul">Shop</a>

                            <div class="megamenu megamenu-md">
                                <div class="row no-gutters">
                                    <div class="col-md-12">
                                        <div class="menu-col">
                                            <div class="row">
                                                <?php
                                                    $getCategoryHeader = App\Models\Category::getRecordMenu();
                                                ?>
                                                <?php $__currentLoopData = $getCategoryHeader; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value_category_header): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(!empty($value_category_header->getSubCategory->count())): ?>
                                                        <div class="col-md-4">
                                                            <a href="<?php echo e(url($value_category_header->slug)); ?>"
                                                                class="menu-title"><?php echo e($value_category_header->name); ?></a><!-- End .menu-title -->
                                                            <ul>
                                                                <?php $__currentLoopData = $value_category_header->getSubCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value_h_sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <li><a
                                                                            href="<?php echo e(url($value_category_header->slug . '/' . $value_h_sub->slug)); ?>"><?php echo e($value_h_sub->name); ?></a>
                                                                    </li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                            </ul>

                                                        </div><!-- End .col-md-4 -->
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div><!-- End .row -->
                                        </div><!-- End .menu-col -->
                                    </div><!-- End .col-md-12 -->


                                </div><!-- End .row -->
                            </div><!-- End .megamenu megamenu-md -->
                        </li>
                        <li>
                            <a href="javascript:;" class="sf-with-ul">Pages</a>

                            <div class="megamenu megamenu-md">
                                <div class="row no-gutters">
                                    <div class="col-md-12">
                                        <div class="menu-col">
                                            <div class="row">
                                                <?php
                                                    $getPagesHeader = App\Models\Page::getRecord();
                                                ?>
                                                <div class="col-md-4">
                                                    <ul>
                                                        <?php $__currentLoopData = $getPagesHeader; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li><a
                                                                    href="<?php echo e(url($value->slug)); ?>"><?php echo e($value->title); ?></a>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                    </ul>

                                                </div><!-- End .col-md-4 -->
                                            </div><!-- End .row -->
                                        </div><!-- End .menu-col -->
                                    </div><!-- End .col-md-12 -->


                                </div><!-- End .row -->
                            </div><!-- End .megamenu megamenu-md -->
                        </li>
                        <li class="">
                            <a href="<?php echo e(url('blog')); ?>" class="">Blog</a>

                        </li>

                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->
            </div><!-- End .header-left -->

            <div class="header-right">
                <div class="header-search">
                    <a href="#" class="search-toggle" role="button" title="Search"><i
                            class="icon-search"></i></a>
                    <form action="<?php echo e(url('search')); ?>" method="get">
                        <div class="header-search-wrapper">
                            <label for="q" class="sr-only">Search</label>
                            <input type="search" class="form-control" name="q" id="q"
                                placeholder="Search in..."
                                value="<?php echo e(!empty(Request::get('q')) ? Request::get('q') : ''); ?>" required>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->

                <div class="dropdown cart-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" data-display="static">
                        <i class="icon-shopping-cart"></i>
                        <?php if(!empty(Auth::check())): ?>
                        <span class="cart-count"><?php echo e(Cart::content()->count()); ?></span>
                        <?php endif; ?>
                    </a>
                    <?php if(!empty(Auth::check())): ?>

                    <?php if(!empty(Cart::content()->count())): ?>

                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-cart-products">
                                <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $header_cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $getCartProduct = App\Models\Product::getSingle($header_cart->id);
                                    ?>
                                    <?php if(!empty($getCartProduct)): ?>
                                        <?php
                                            $getProductImage = $getCartProduct->getImageSingle($getCartProduct->id);
                                        ?>

                                        <div class="product">
                                            <div class="product-cart-details">
                                                <h4 class="product-title">
                                                    <a
                                                        href="<?php echo e(url($getCartProduct->slug)); ?>"><?php echo e($getCartProduct->title); ?></a>
                                                </h4>

                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty"><?php echo e($header_cart->qty); ?></span>
                                                    x $<?php echo e(number_format($header_cart->price, 2)); ?>

                                                </span>
                                            </div><!-- End .product-cart-details -->

                                            <figure class="product-image-container">
                                                <a href="product.html" class="product-image">
                                                    <img src="<?php echo e($getProductImage->getLogo()); ?>" alt="product">
                                                </a>
                                            </figure>
                                            <a href="<?php echo e(url('cart/delete/' . $header_cart->rowId)); ?>"
                                                class="btn-remove" title="Remove Product"><i
                                                    class="icon-close"></i></a>
                                        </div><!-- End .product -->
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div><!-- End .cart-product -->

                            <div class="dropdown-cart-total">
                                <span>Total</span>

                                <span class="cart-total-price">$<?php echo e(Cart::subtotal()); ?></span>
                            </div><!-- End .dropdown-cart-total -->

                            <div class="dropdown-cart-action">
                                <a href="<?php echo e(url('cart')); ?>" class="btn btn-primary">View Cart</a>
                                <a href="<?php echo e(url('checkout')); ?>"
                                    class="btn btn-outline-primary-2"><span>Checkout</span><i
                                        class="icon-long-arrow-right"></i></a>
                            </div><!-- End .dropdown-cart-total -->
                        </div><!-- End .dropdown-menu -->
                    <?php endif; ?>
                    <?php endif; ?>

                </div><!-- End .cart-dropdown -->
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->
</header><!-- End .header -->
<?php /**PATH C:\Users\HP\Desktop\project\resources\views/layouts/header.blade.php ENDPATH**/ ?>