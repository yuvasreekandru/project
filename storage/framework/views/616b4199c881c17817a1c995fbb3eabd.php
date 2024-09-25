<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('molla/assets/css/plugins/nouislider/nouislider.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main class="main">
        <div class="page-header text-center" >
            <div class="container">
                <h1 class="page-title">Notifications</h1>
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

                                    <tbody>
                                        <?php $__currentLoopData = $getRecord; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td style="padding: 10px;">
                                                <a style="color:#000; <?php echo e(empty($value->is_read)? 'font-weight:bold' : ''); ?>" href="<?php echo e($value->url); ?>?noti_id=<?php echo e($value->id); ?>">
                                                    <?php echo e($value->message); ?>

                                                </a>
                                                <div>
                                                    <small><?php echo e(date('d-m-Y h:i A', strtotime($value->created_at))); ?></small>
                                                </div>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\project\resources\views/user/notifications.blade.php ENDPATH**/ ?>