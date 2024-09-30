<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('molla/assets/css/plugins/nouislider/nouislider.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main class="main">
        <div class="page-header text-center" >
            <div class="container">
                <h1 class="page-title">Edit Profile</h1>
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

                                <?php echo $__env->make('layouts.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <form action="" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>First Name *</label>
                                            <input type="text" name="name" value="<?php echo e($getRecord->name); ?>" class="form-control" required>
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>Last Name *</label>
                                            <input type="text" name="last_name" value="<?php echo e($getRecord->last_name); ?>" class="form-control" required>
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->

                                    <label>Email address *</label>
                                    <input type="email" name="email" value="<?php echo e($getRecord->email); ?>" class="form-control" required>

                                    <label>Company Name (Optional)</label>
                                    <input type="text" name="company_name" value="<?php echo e($getRecord->company_name); ?>" class="form-control">

                                    <label>Country *</label>
                                    <input type="text" name="country" value="<?php echo e($getRecord->country); ?>" class="form-control" required>

                                    <label>Street address *</label>
                                    <input type="text" name="address_one" value="<?php echo e($getRecord->address_one); ?>" class="form-control"
                                        placeholder="House number and Street name" required>
                                    <input type="text" name="address_two" value="<?php echo e($getRecord->address_two); ?>" class="form-control"
                                        placeholder="Appartments, suite, unit etc ..." required>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Town / City *</label>
                                            <input type="text" name="city" value="<?php echo e($getRecord->city); ?>" class="form-control" required>
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>State *</label>
                                            <input type="text" name="state" value="<?php echo e($getRecord->state); ?>" class="form-control" required>
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Postcode / ZIP *</label>
                                            <input type="text" name="postcode" value="<?php echo e($getRecord->postcode); ?>" class="form-control" required>
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>Phone *</label>
                                            <input type="tel" name="phone" value="<?php echo e($getRecord->phone); ?>" class="form-control" required>
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->

                                    <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block" style="width: 100px;">
                                        Submit
                                    </button>
                                </form>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\project\resources\views/user/edit-profile.blade.php ENDPATH**/ ?>