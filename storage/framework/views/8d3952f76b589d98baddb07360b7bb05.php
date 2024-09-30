<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>SMTP Setting</h1>
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
                                        <label>Website Name <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="name"
                                            value="<?php echo e($getRecord->name); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Mail Mailer <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="mail_mailer"
                                            value="<?php echo e($getRecord->mail_mailer); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Mail Host <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="mail_host"
                                            value="<?php echo e($getRecord->mail_host); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Mail Port <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="mail_port"
                                            value="<?php echo e($getRecord->mail_port); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Mail Username <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="mail_username"
                                            value="<?php echo e($getRecord->mail_username); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Mail Password <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="mail_password"
                                            value="<?php echo e($getRecord->mail_password); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Mail Encryption <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="mail_encryption"
                                            value="<?php echo e($getRecord->mail_encryption); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Mail From Address <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="mail_from_address"
                                            value="<?php echo e($getRecord->mail_from_address); ?>" required>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\project\resources\views/admin/setting/smtp-settings.blade.php ENDPATH**/ ?>