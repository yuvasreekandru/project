<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('molla/assets/css/plugins/nouislider/nouislider.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main class="main">
        <div class="page-header text-center" >
            <div class="container">
                <h1 class="page-title">Orders</h1>
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
                                <table class="table table-striped">
                                    <thead>
                                        <tr>

                                            <th>Order Number</th>
                                            <th>Total Amount ($)</th>
                                            <th>Payment Method</th>
                                            <th>Status</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $getRecord; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                
                                                <td><?php echo e($value->order_number); ?></td>

                                                <td><?php echo e(number_format($value->total_amount, 2)); ?></td>
                                                <td style="text-transform: capitalize;"><?php echo e($value->payment_method); ?></td>
                                                <td>

                                                    <?php if($value->status == 0): ?>
                                                    Pending
                                                    <?php elseif($value->status == 1): ?>
                                                    In Progress
                                                    <?php elseif($value->status == 2): ?>
                                                    Delivered
                                                    <?php elseif($value->status == 3): ?>
                                                    Completed
                                                    <?php elseif($value->status == 4): ?>
                                                    Cancelled
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e(date('m-d-Y', strtotime($value->created_at))); ?></td>
                                                <td>
                                                    <a href="<?php echo e(url('user/orders/details/' . $value->id)); ?>"
                                                        class="btn btn-primary">Details</a>


                                                </td>

                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>
                                <div style="padding: 10px; float:right;">
                                    <?php echo e($getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links()); ?>

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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\project\resources\views/user/orders.blade.php ENDPATH**/ ?>