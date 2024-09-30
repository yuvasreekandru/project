<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stripe Checkout</title>
</head>
<body>
<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">

    var session_id = '<?php echo e($session_id); ?>';
    var stripe = Stripe('<?php echo e($setPublicKey); ?>');

    stripe.redirectToCheckout({
        sessionId: session_id
    }).then(function (result){

    });
</script>
</body>
</html>
<?php /**PATH C:\Users\HP\Desktop\project\resources\views/payment/stripe_charge.blade.php ENDPATH**/ ?>