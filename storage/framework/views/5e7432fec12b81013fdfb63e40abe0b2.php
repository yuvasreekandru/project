<?php $__env->startComponent('mail::message'); ?>

    Hi <b><?php echo e($user->name); ?></b>,
    <?php
        $getSetting = App\Models\SystemSetting::getSingle();
    ?>
    <p>You're almost ready to start enjoying the benfits of <?php echo e($getSetting->website_name); ?>.</p>

    <p>Simply click the button below to verify email address.</p>

    <p>
        <?php $__env->startComponent('mail::button', ['url' => url('activate/' . base64_encode($user->id))]); ?>
            Verify
        <?php echo $__env->renderComponent(); ?>
    </p>

    <p>This will verify your email address, and then you'll officially be a part of the <?php echo e($getSetting->website_name); ?></p>
Thanks,<br>
<?php echo e($getSetting->website_name); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\Users\HP\Desktop\project\resources\views/emails/register.blade.php ENDPATH**/ ?>