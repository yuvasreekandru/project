<div class="products mb-3">
    <div class="row justify-content-center">
        <?php $__currentLoopData = $getProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $getProductImage = $value->getImageSingle($value->id);
            ?>
            <?php
                $totalQty = App\Models\ProductSize::where('product_id', '=', $value->id)->sum('stock_qty');

            ?>
            <div class="col-12 <?php if(!empty($is_home)): ?> col-md-3 col-lg-3 <?php else: ?> col-md-4 col-lg-4 <?php endif; ?> ">
                <div class="product product-7 text-center">
                    <figure class="product-media">
                        <?php if($value->product_type && $value->sale_type): ?>
                            <span style="color:#fff;background-color:rgba(255, 0, 0, 0.877);"
                                class="product-label"><?php echo e($value->sale_type); ?> </span>
                        <?php elseif($value->product_type): ?>
                            <span class="product-label label-new"><?php echo e($value->product_type); ?> </span>
                        <?php elseif($value->sale_type): ?>
                            <span style="color:#fff;background-color:rgba(255, 0, 0, 0.877);"
                                class="product-label "><?php echo e($value->sale_type); ?> </span>
                        <?php endif; ?>
                        <a href="<?php echo e(url($value->slug)); ?>">
                            <?php if(!empty($getProductImage) && !empty($getProductImage->getLogo())): ?>
                                <img style="height:280px; width:100%;" src="<?php echo e($getProductImage->getLogo()); ?>"
                                    alt="<?php echo e($value->title); ?>" class="product-image">
                            <?php endif; ?>
                        </a>

                        <div class="product-action-vertical">
                            <?php if(!empty(Auth::check())): ?>
                                <a href="javascript:;"
                                    class="btn-product-icon btn-wishlist btn-expandable
                                        add_to_wishlist add-to-wishlist<?php echo e($value->id); ?>

                                        <?php echo e(!empty($value->checkWishlist($value->id)) ? 'btn-wishlist-add' : ''); ?>"
                                    title="Wishlist" id=<?php echo e($value->id); ?>><span>add to wishlist
                                    </span></a>
                            <?php else: ?>
                                <a href="#signin-modal" data-toggle="modal"
                                    class="btn-product-icon btn-wishlist btn-expandable" title="Wishlist"><span>add to
                                        wishlist </span>
                                </a>
                            <?php endif; ?>

                        </div><!-- End .product-action-vertical -->

                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <div class="product-cat">
                            <a
                                href="<?php echo e(url($value->category_slug . '/' . $value->sub_category_slug)); ?>"><?php echo e($value->sub_category_name); ?></a>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="<?php echo e(url($value->slug)); ?>"><?php echo e($value->title); ?></a></h3>
                        <!-- End .product-title -->
                        <div class="product-price">
                            <?php if($value->old_price > $value->price): ?>
                                <div style="text-decoration: line-through;" class="mr-2">
                                    $<?php echo e(number_format($value->old_price, 2)); ?>

                                </div><!-- End .product-price -->
                            <?php endif; ?>
                            <div>
                                $<?php echo e(number_format($value->price, 2)); ?>

                            </div><!-- End .product-price -->
                        </div>
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: <?php echo e($value->getReviewRating($value->id)); ?>%;">
                                </div>
                                <!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <span class="ratings-text">( <?php echo e($value->getTotalReview()); ?> Reviews )</span>
                        </div><!-- End .rating-container -->

                    </div><!-- End .product-body -->
                </div><!-- End .product -->
            </div><!-- End .col-sm-6 col-lg-4 -->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div><!-- End .row -->
</div><!-- End .products -->
<?php /**PATH C:\Users\HP\Desktop\project\resources\views/product/_list.blade.php ENDPATH**/ ?>