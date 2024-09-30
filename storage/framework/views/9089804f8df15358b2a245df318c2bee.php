<div class="products">
    <?php
        $is_home = 1;
    ?>
    <?php echo $__env->make('product._list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div><!-- End .products -->
<div class="more-container text-center">
    <a href="<?php echo e(url($getCategory->slug)); ?>" class="btn btn-outline-darker btn-more"><span>Load more
            products</span><i class="icon-long-arrow-down"></i></a>
</div><!-- End .more-container -->
<?php /**PATH C:\Users\HP\Desktop\project\resources\views/product/_list_recent_arrival.blade.php ENDPATH**/ ?>