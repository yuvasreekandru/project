<?php $__env->startSection('content'); ?>
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('')); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo e($getPage->title); ?></li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->
        <div class="container">
            <div class="page-header page-header-big text-center" style="background-image: url('<?php echo e($getPage->getImage()); ?>')">
                <h1 class="page-title text-white"><?php echo e($getPage->title); ?></h1>
            </div><!-- End .page-header -->
        </div><!-- End .container -->

        <div class="page-content pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-2 mb-lg-0">
                        <?php echo $getPage->description; ?>

                        <div class="row">
                            <div class="col-sm-7">
                                <div class="contact-info">
                                    <ul class="contact-list">
                                        <?php if(!empty($getSystemSetting->address)): ?>
                                            <li>
                                                <i class="icon-map-marker"></i>
                                                <?php echo e($getSystemSetting->address); ?>

                                            </li>
                                        <?php endif; ?>
                                        <?php if(!empty($getSystemSetting->phone)): ?>
                                        <li>
                                            <i class="icon-phone"></i>
                                            <a href="tel:<?php echo e($getSystemSetting->phone); ?>">+<?php echo e($getSystemSetting->phone); ?></a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if(!empty($getSystemSetting->phone_two)): ?>
                                        <li>
                                            <i class="icon-phone"></i>
                                            <a href="tel:<?php echo e($getSystemSetting->phone_two); ?>">+<?php echo e($getSystemSetting->phone_two); ?></a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if(!empty($getSystemSetting->email)): ?>
                                        <li>
                                            <i class="icon-phone"></i>
                                            <a href="mailto:<?php echo e($getSystemSetting->email); ?>"><?php echo e($getSystemSetting->email); ?></a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if(!empty($getSystemSetting->email_two)): ?>
                                        <li>
                                            <i class="icon-phone"></i>
                                            <a href="mailto:<?php echo e($getSystemSetting->email_two); ?>"><?php echo e($getSystemSetting->email_two); ?></a>
                                        </li>
                                        <?php endif; ?>
                                    </ul><!-- End .contact-list -->
                                </div><!-- End .contact-info -->
                            </div><!-- End .col-sm-7 -->

                            <div class="col-sm-5">
                                <div class="contact-info">

                                    <ul class="contact-list">
                                        <?php if(!empty($getSystemSetting->working_hour)): ?>
                                        <li>
                                            <i class="icon-clock-o"></i>
                                            <span class="text-dark"><?php echo e($getSystemSetting->working_hour); ?></span> <br>
                                        </li>
                                        <?php endif; ?>
                                    </ul><!-- End .contact-list -->
                                </div><!-- End .contact-info -->
                            </div><!-- End .col-sm-5 -->
                        </div><!-- End .row -->
                    </div><!-- End .col-lg-6 -->
                    <div class="col-lg-6">
                        <h2 class="title mb-1">Got Any Questions?</h2><!-- End .title mb-2 -->
                        <p class="mb-2">Use the form below to get in touch with the sales team</p>
                        <div style="padding-top: 10px;padding-bottom:10px;">
                            <?php echo $__env->make('layouts.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <form action="" class="contact-form mb-3" method="POST" autocomplete="off">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="cname" class="sr-only">Name</label>
                                    <input type="text" class="form-control" name="name" id="cname" placeholder="Name *" required>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label for="cemail" class="sr-only">Email</label>
                                    <input type="email" class="form-control" name="email" id="cemail" placeholder="Email *" required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="cphone" class="sr-only">Phone</label>
                                    <input type="tel" class="form-control" name="phone" id="cphone" placeholder="Phone">
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label for="csubject" class="sr-only">Subject</label>
                                    <input type="text" class="form-control" name="subject" id="csubject" placeholder="Subject" required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="verification"><?php echo e($first_number); ?> + <?php echo e($second_number); ?> = ?</label>
                                    <input type="text" class="form-control" name="verification" id="verification" placeholder="Verification Sum">
                                </div><!-- End .col-sm-6 -->
                            </div>

                            <label for="cmessage" class="sr-only">Message</label>
                            <textarea class="form-control"id="cmessage" name="message" required placeholder="Message *" required></textarea>

                            <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                                <span>SUBMIT</span>
                                <i class="icon-long-arrow-right"></i>
                            </button>
                        </form><!-- End .contact-form -->
                    </div><!-- End .col-lg-6 -->
                </div><!-- End .row -->

                <hr class="mt-4 mb-5">


            </div><!-- End .container -->

        </div><!-- End .page-content -->
    </main><!-- End .main -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\project\resources\views/pages/contact.blade.php ENDPATH**/ ?>