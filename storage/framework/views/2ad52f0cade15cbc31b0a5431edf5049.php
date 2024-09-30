<?php $__env->startComponent('mail::message'); ?>

    Hello <b><?php echo e($user->name); ?></b>,

    <p>We understand it happen.</p>
    <?php $__env->startComponent('mail::button', ['url' => url('reset/' . $user->remember_token)]); ?>
        Reset Your Password
    <?php echo $__env->renderComponent(); ?>

    <p>In case you have any issue recovering your password,please contact us.</p>
    <?php
        $getSetting = App\Models\SystemSetting::getSingle();
    ?>
    Thanks,<br>
    <?php echo e($getSetting->website_name); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\Users\HP\Desktop\project\resources\views/emails/forgot_password.blade.php ENDPATH**/ ?>