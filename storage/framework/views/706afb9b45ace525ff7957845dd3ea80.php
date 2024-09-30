<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>System Setting</h1>
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
                                        <label>Website <span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="website_name"
                                            value="<?php echo e($getRecord->website_name); ?>">

                                    </div>
                                    <div class="form-group">
                                        <label>Logo <span style="color: red"></span></label>
                                        <input type="file" class="form-control" name="logo">
                                        <?php if(!empty($getRecord->getLogo())): ?>
                                            <img src="<?php echo e($getRecord->getLogo()); ?>" style="width:50px;" alt="">
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label>favicon <span style="color: red"></span></label>
                                        <input type="file" class="form-control" name="favicon">
                                        <?php if(!empty($getRecord->getfavicon())): ?>
                                            <img src="<?php echo e($getRecord->getfavicon()); ?>" style="width:50px;" alt="">
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Footer Description <span style="color: red"></span></label>
                                        <textarea class="form-control" name="footer_description"><?php echo e($getRecord->footer_description); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Footer Payment Icon <span style="color: red"></span></label>
                                        <input type="file" class="form-control" name="footer_payment_icon">
                                        <?php if(!empty($getRecord->getFooterPayment())): ?>
                                            <img src="<?php echo e($getRecord->getFooterPayment()); ?>" style="width:50px;" alt="">
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Address <span style="color: red"></span></label>
                                        <textarea class="form-control" name="address"><?php echo e($getRecord->address); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone<span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="phone"
                                            value="<?php echo e($getRecord->phone); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone 2<span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="phone_two"
                                            value="<?php echo e($getRecord->phone_two); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Submit Contact Email <span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="submit_email"
                                            value="<?php echo e($getRecord->submit_email); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Email <span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="email"
                                            value="<?php echo e($getRecord->email); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Email 2<span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="email_two"
                                            value="<?php echo e($getRecord->email_two); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Working Hour <span style="color: red"></span></label>
                                        <textarea class="form-control" name="working_hour"><?php echo e($getRecord->working_hour); ?></textarea>
                                    </div>

                                    <hr>

                                    <div class="form-group">
                                        <label>Facebook Link<span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="facebook_link"
                                            value="<?php echo e($getRecord->facebook_link); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Twitter Link<span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="twitter_link"
                                            value="<?php echo e($getRecord->twitter_link); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Instagram Link<span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="instagram_link"
                                            value="<?php echo e($getRecord->instagram_link); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Youtube Link<span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="youtube_link"
                                            value="<?php echo e($getRecord->youtube_link); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Pinterest Link<span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="pinterest_link"
                                            value="<?php echo e($getRecord->pinterest_link); ?>">
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\project\resources\views/admin/setting/system-settings.blade.php ENDPATH**/ ?>