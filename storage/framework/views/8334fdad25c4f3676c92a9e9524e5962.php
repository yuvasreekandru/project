<?php $__env->startComponent('mail::message'); ?>

    Hello <b>Admin</b>,
    <p><b>Name: </b><?php echo e($user->name); ?></p>
    <p><b>Email: </b><?php echo e($user->email); ?></p>
    <p><b>Phone: </b><?php echo e($user->phone); ?></p>
    <p><b>Subject: </b><?php echo e($user->subject); ?></p>
    <p><b>Message: </b><?php echo e($user->message); ?></p>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\Users\HP\Desktop\project\resources\views/emails/contact_us.blade.php ENDPATH**/ ?>