<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('molla/assets/css/plugins/nouislider/nouislider.css')); ?>">
    <style>
        .active-color {
            border: 3px solid #000 !important;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <main class="main">
        <div class="page-header text-center"
            style="background-image: url('<?php echo e(asset('molla/assets/images/page-header-bg.jpg')); ?> ')">
            <div class="container">

                    <h1 class="page-title">My Wishlist</h1>

            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:;">My Wishlist</a></li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                            <?php echo $__env->make('product._list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-lg-12">
                        <?php echo e($getProduct->appends(Illuminate\Support\Facades\Request::except('page'))->links()); ?>

                    </div>

                </div>
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\project\resources\views/product/my-wishlist.blade.php ENDPATH**/ ?>