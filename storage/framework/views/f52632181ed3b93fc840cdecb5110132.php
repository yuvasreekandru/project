<?php $__env->startSection('style'); ?>
    <style type="text/css">
        .box-btn {
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 1px 3px rgba(0, 0, 0, .2);
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main class="main">
        <div class="page-header text-center">
            <div class="container">
                <h1 class="page-title">Dashboard</h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->

        <div class="page-content">
            <div class="dashboard">
                <div class="container">
                    <br>

                    <div class="row">

                        <?php echo $__env->make('user._sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <div class="col-md-8 col-lg-9">
                            <div class="tab-content">
                                <div class="row">
                                    <div class="col-md-3" style="margin-bottom: 20px;">
                                        <div class="box-btn">
                                            <div style="font-size: 20px;font-weight:bold;"><?php echo e($TotalOrder); ?></div>
                                            <div style="font-size: 16px;">Total Order</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="margin-bottom: 20px;">
                                        <div class="box-btn">
                                            <div style="font-size: 20px;font-weight:bold;"><?php echo e($TotalTodayOrder); ?></div>
                                            <div style="font-size: 16px;">Today Order</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="margin-bottom: 20px;">
                                        <div class="box-btn">
                                            <div style="font-size: 20px;font-weight:bold;">$<?php echo e(number_format($TotalAmount, 2)); ?></div>
                                            <div style="font-size: 16px;">Total Amount</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3"style="margin-bottom: 20px;">
                                        <div class="box-btn">
                                            <div style="font-size: 20px;font-weight:bold;">$<?php echo e(number_format($TotalTodayAmount, 2)); ?></div>
                                            <div style="font-size: 16px;">Today Amount</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3"style="margin-bottom: 20px;">
                                        <div class="box-btn">
                                            <div style="font-size: 20px;font-weight:bold;"><?php echo e($TotalPending); ?></div>
                                            <div style="font-size: 16px;">Pending Orders</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3"style="margin-bottom: 20px;">
                                        <div class="box-btn">
                                            <div style="font-size: 20px;font-weight:bold;"><?php echo e($TotalInProgress); ?></div>
                                            <div style="font-size: 16px;">In Progress Orders</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3"style="margin-bottom: 20px;">
                                        <div class="box-btn">
                                            <div style="font-size: 20px;font-weight:bold;"><?php echo e($TotalCompleted); ?></div>
                                            <div style="font-size: 16px;">Completed Orders</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3"style="margin-bottom: 20px;">
                                        <div class="box-btn">
                                            <div style="font-size: 20px;font-weight:bold;"><?php echo e($TotalCancelled); ?></div>
                                            <div style="font-size: 16px;">Cancelled Orders</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End .col-lg-9 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .dashboard -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\project\resources\views/user/dashboard.blade.php ENDPATH**/ ?>