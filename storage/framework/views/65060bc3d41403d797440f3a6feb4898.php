<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="url('/')">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="cart">
                <div class="container">

                    <?php echo $__env->make('layouts.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php if(!empty(Cart::content()->count())): ?>
                        <div class="row">
                            <div class="col-lg-9">
                                <form action="<?php echo e(url('update_cart')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <table class="table table-cart table-mobile">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $getCartProduct = App\Models\Product::getSingle($cart->id);
                                                ?>
                                                <?php if(!empty($getCartProduct)): ?>
                                                    <?php
                                                        $getProductImage = $getCartProduct->getImageSingle(
                                                            $getCartProduct->id,
                                                        );
                                                    ?>
                                                    <tr>
                                                        <td class="product-col">
                                                            <div class="product">
                                                                <figure class="product-media">
                                                                    <a href="#">
                                                                        <img src="<?php echo e($getProductImage->getLogo()); ?>"
                                                                            alt="Product image">
                                                                    </a>
                                                                </figure>

                                                                <h3 class="product-title">
                                                                    <a style="margin-bottom:10px;display:block;" href="<?php echo e(url($getCartProduct->slug)); ?>"><?php echo e($getCartProduct->title); ?>

                                                                    </a>
                                                                <?php
                                                                    $color_id= $cart->options->color_id;
                                                                ?>
                                                                <?php if(!empty($color_id)): ?>
                                                                    <?php
                                                                        $getColor = App\Models\Color::getSingle(
                                                                            $color_id,
                                                                        );

                                                                    ?>
                                                                    <div><b>Color:</b> <?php echo e($getColor->name); ?></div>

                                                                <?php endif; ?>
                                                                    <?php
                                                                        $size_id = $cart->options->size_id;
                                                                    ?>
                                                                    <?php if(!empty($size_id)): ?>
                                                                        <?php
                                                                            $getSize = App\Models\ProductSize::getSingle(
                                                                                $size_id,
                                                                            );

                                                                        ?>
                                                                        <div><b>Size:</b> <?php echo e($getSize->name); ?>

                                                                            ($<?php echo e(number_format($getSize->price, 2)); ?>)</div>
                                                                    <?php endif; ?>

                                                                </h3><!-- End .product-title -->
                                                            </div><!-- End .product -->
                                                        </td>
                                                        <td class="price-col">$<?php echo e(number_format($cart->price, 2)); ?></td>
                                                        <td class="quantity-col">
                                                            <div class="cart-product-quantity">

                                                                <input type="number" name="cart[<?php echo e($key); ?>][qty]"
                                                                    class="form-control" value="<?php echo e($cart->qty); ?>"
                                                                    min="1" max="10" step="1"
                                                                    data-decimals="0" required>

                                                                <input type="hidden" class="form-control"
                                                                    name="cart[<?php echo e($key); ?>][id]"
                                                                    value="<?php echo e($cart->id); ?>">
                                                                <input type="hidden" class="form-control"
                                                                    name="cart[<?php echo e($key); ?>][rowId]"
                                                                    value="<?php echo e($cart->rowId); ?>">

                                                            </div><!-- End .cart-product-quantity -->
                                                        </td>
                                                        <td class="total-col">
                                                            $<?php echo e(number_format($cart->price * $cart->qty, 2)); ?>

                                                        </td>
                                                        <td class="remove-col">
                                                            <a href="<?php echo e(url('cart/delete/' . $cart->rowId)); ?>"
                                                                class="btn-remove"><i class="icon-close"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </tbody>
                                    </table><!-- End .table table-wishlist -->

                                    <div class="cart-bottom">

                                        <button type="submit" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i
                                                class="icon-refresh"></i></button>
                                    </div><!-- End .cart-bottom -->
                                </form>
                            </div><!-- End .col-lg-9 -->
                            <aside class="col-lg-3">
                                <div class="summary summary-cart">
                                    <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                                    <table class="table table-summary">
                                        <tbody>
                                            <tr class="summary-subtotal">
                                                <td>Subtotal:</td>
                                                <td>$<?php echo e(number_format(Cart::subtotal(), 2)); ?></td>
                                            </tr><!-- End .summary-subtotal -->


                                            <tr class="summary-total">
                                                <td>Total:</td>
                                                <td>$<?php echo e(number_format(Cart::subtotal(), 2)); ?></td>
                                            </tr><!-- End .summary-total -->
                                        </tbody>
                                    </table><!-- End .table table-summary -->

                                    <a href="<?php echo e(url('checkout')); ?>"
                                        class="btn btn-outline-primary-2 btn-order btn-block">PROCEED
                                        TO
                                        CHECKOUT</a>
                                </div><!-- End .summary -->

                                <a href="<?php echo e(url('/')); ?>" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE
                                        SHOPPING</span><i class="icon-refresh"></i></a>
                            </aside><!-- End .col-lg-3 -->
                        </div><!-- End .row -->
                    <?php else: ?>
                        <p>Cart is empty</p>
                    <?php endif; ?>
                </div><!-- End .container -->
            </div><!-- End .cart -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\project\resources\views/payment/cart.blade.php ENDPATH**/ ?>