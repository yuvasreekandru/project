<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Payment Setting</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo $__env->make('layouts.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <!-- form start -->
                            <form action="" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label style="display: block;">Cash On Delivery (On / Off)<span style="color: red"></span></label>
                                        <input type="checkbox" <?php echo e(!empty($getRecord->is_cash_delivery) ? 'checked' : ''); ?> name="is_cash_delivery">
                                    </div>
                                    <div class="form-group">
                                        <label style="display: block;">Paypal (On / Off)<span style="color: red"></span></label>
                                        <input type="checkbox" <?php echo e(!empty($getRecord->is_paypal) ? 'checked' : ''); ?> name="is_paypal">
                                    </div>

                                    <div class="form-group">
                                        <label>Paypal Email Id <span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="paypal_id"
                                            value="<?php echo e($getRecord->paypal_id); ?>" >
                                    </div>
                                    <div class="form-group">
                                        <label>Paypal Status<span style="color: red"></span></label>
                                        <select class="form-control" name="paypal_status" id="">
                                            <option <?php echo e(($getRecord->paypal_status == 'sandbox') ? 'selected' : ''); ?> value="sandbox">Sandbox</option>
                                            <option <?php echo e(($getRecord->paypal_status == 'live') ? 'selected' : ''); ?> value="live">Live</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label style="display: block;">Stripe (On / Off)<span style="color: red"></span></label>
                                        <input type="checkbox" <?php echo e(!empty($getRecord->is_stripe) ? 'checked' : ''); ?> name="is_stripe">
                                    </div>
                                    <div class="form-group">
                                        <label>Stripe Public key <span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="stripe_public_key"
                                            value="<?php echo e($getRecord->stripe_public_key); ?>" >
                                    </div>
                                    <div class="form-group">
                                        <label>Stripe Secret Key <span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="stripe_secret_key"
                                            value="<?php echo e($getRecord->stripe_secret_key); ?>" >
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->

                    </div>
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo e(asset('AdminLTE/dist/js/pages/dashboard3.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\project\resources\views/admin/setting/payment-settings.blade.php ENDPATH**/ ?>