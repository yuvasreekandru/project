<!DOCTYPE html>
<html lang="en">


<!-- molla/index-2.html  22 Nov 2019 09:55:32 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo e(!empty($meta_title) ? $meta_title : ''); ?></title>
    <?php if(!empty($meta_keywords)): ?>
        <meta name="keywords" content="<?php echo e($meta_keywords); ?>">
    <?php endif; ?>
    <?php if(!empty($meta_description)): ?>
        <meta name="description" content="<?php echo e($meta_description); ?>">
    <?php endif; ?>
    <?php
        $getSystemSettingApp = App\Models\SystemSetting::getSingle();
    ?>
    <!-- Favicon -->
    
    <link rel="shortcut icon" href="<?php echo e($getSystemSettingApp->getFavicon()); ?>">

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="<?php echo e(asset('molla/assets/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('molla/assets/css/plugins/owl-carousel/owl.carousel.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('molla/assets/css/plugins/magnific-popup/magnific-popup.css')); ?>">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="<?php echo e(asset('molla/assets/css/style.css')); ?>">

    <?php echo $__env->yieldContent('style'); ?>

    <style type="text/css">
        .btn-wishlist-add::before {
            content: '\f233' !important;
        }
    </style>
</head>

<body>
    <div class="page-wrapper">


        <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->yieldContent('content'); ?>

        <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <?php echo $__env->make('layouts.mobile_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <!-- Sign in / Register Modal -->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin"
                                        role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register"
                                        role="tab" aria-controls="register" aria-selected="false">Register</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="signin" role="tabpanel"
                                    aria-labelledby="signin-tab">

                                    <form action="" id="submitFormLogin" method="POST">
                                        <?php echo csrf_field(); ?>

                                        <div class="form-group">
                                            <label for="singin-email">Email Address *</label>
                                            <input type="text" class="form-control" id="singin-email" name="email"
                                                required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="singin-password">Password *</label>
                                            <input type="password" class="form-control" id="singin-password"
                                                name="password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>LOG IN</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="is_remember" class="custom-control-input"
                                                    id="signin-remember">
                                                <label class="custom-control-label" for="signin-remember">Remember
                                                    Me</label>
                                            </div><!-- End .custom-checkbox -->

                                            <a href="<?php echo e(url('forgot_password')); ?>" class="forgot-link">Forgot Your
                                                Password?</a>
                                        </div><!-- End .form-footer -->
                                    </form>

                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="register" role="tabpanel"
                                    aria-labelledby="register-tab">
                                    <form action="" id="submitFormRegister" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <label for="register-name">Name <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="register-name"
                                                name="name" required>
                                        </div><!-- End .form-group -->
                                        <div class="form-group">
                                            <label for="register-email">Email address <span
                                                    style="color:red;">*</span></label>
                                            <input type="email" class="form-control" id="register-email"
                                                name="email" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="register-password">Password <span
                                                    style="color:red;">*</span></label>
                                            <input type="password" class="form-control" id="register-password"
                                                name="password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>SIGN UP</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="register-policy" required>
                                                <label class="custom-control-label" for="register-policy">I agree to
                                                    the <a href="#">privacy policy</a> *</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .form-footer -->
                                    </form>

                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->

    <!-- Plugins JS File -->
    <script src="<?php echo e(asset('molla/assets/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('molla/assets/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('molla/assets/js/jquery.hoverIntent.min.js')); ?>"></script>
    <script src="<?php echo e(asset('molla/assets/js/jquery.waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('molla/assets/js/superfish.min.js')); ?>"></script>
    <script src="<?php echo e(asset('molla/assets/js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('molla/assets/js/jquery.magnific-popup.min.js')); ?>"></script>
    <!-- Main JS File -->
    <script src="<?php echo e(asset('molla/assets/js/main.js')); ?>"></script>

    <?php echo $__env->yieldContent('script'); ?>

    <script type="text/javascript">
        // *************** Register **************** //
        $('body').delegate('#submitFormRegister', 'submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?php echo e(url('auth_register')); ?>",
                data: $(this).serialize(),
                dataType: "json",
                success: function(data) {
                    alert(data.message);
                    if (data.status == true) {
                        location.reload();
                    }
                },
                error: function(data) {

                }
            });
        });

        // ***************** Login **************** //
        $('body').delegate('#submitFormLogin', 'submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?php echo e(url('auth_login')); ?>",
                data: $(this).serialize(),
                dataType: "json",
                success: function(data) {

                    if (data.status == true) {
                        location.reload();
                    } else {
                        alert(data.message);
                    }
                },
                error: function(data) {

                }
            });
        });
        // **************** Add to Wishlist ********* //

        $('body').delegate('.add_to_wishlist', 'click', function(e) {

            var product_id = $(this).attr('id');
            $.ajax({
                type: "POST",
                url: "<?php echo e(url('add_to_wishlist')); ?>",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    product_id: product_id,
                },
                dataType: "json",
                success: function(data) {
                    if(data.is_wishlist == 0)
                    {
                        $('.add-to-wishlist'+product_id).removeClass('btn-wishlist-add');
                    }
                    else
                    {
                        $('.add-to-wishlist'+product_id).addClass('btn-wishlist-add');

                    }
                },
                error: function(data) {

                }
            });
        });
    </script>
</body>

</html>
<?php /**PATH C:\Users\HP\Desktop\project\resources\views/layouts/app.blade.php ENDPATH**/ ?>