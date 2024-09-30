<?php $__env->startComponent('mail::message'); ?>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }

        .header img {
            max-width: 150px;
        }

        .details {
            margin: 20px 0;
        }

        .details h2 {
            margin-top: 0;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #f4f4f4;
        }

        .total {
            text-align: right;
            font-weight: bold;
            margin-top: 20px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9em;
            color: #777;
        }
    </style>
    Hi <b><?php echo e($order->first_name); ?></b>,

    <div class="container">
        <div class="header">
            <img src="https://example.com/logo.png" alt="Company Logo">
            <h1>Invoice</h1>
        </div>

        <div class="details">
            <h2>Order Details</h2>
            <p><strong>Order Number:</strong> <?php echo e($order->order_number); ?></p>
            <p><strong>Order Date:</strong> <?php echo e($order->created_at); ?></p>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $order->getItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <?php echo e($item->getProduct->title); ?>

                            <br>
                            Color : <?php echo e($item->color_name); ?>

                            <?php if(!empty($item->size_name)): ?>
                            <br>

                            Size : <?php echo e($item->size_name); ?>

                            <br>
                            Size Amount : $<?php echo e(number_format($item->size_amount, 2)); ?>

                            <?php endif; ?>



                        </td>
                        <td><?php echo e($item->quantity); ?></td>
                        <td>$<?php echo e(number_format($item->price, 2)); ?></td>
                        <td>$<?php echo e(number_format($item->total_price, 2)); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>

        <div class="total">
            <?php if(!empty($order->discount_code)): ?>

            <p><strong>Discount:</strong> $<?php echo e(number_format($order->discount_amount, 2)); ?></p>
            <?php endif; ?>
            <p><strong>Shipping:</strong> $<?php echo e(number_format($order->shipping_amount, 2)); ?></p>
            <p><strong>Total:</strong> $<?php echo e(number_format($order->total_amount, 2)); ?></p>
        </div>

        <div class="footer">
            <p>Thank you for your order!</p>
            <p>If you have any questions, please contact us at support@example.com.</p>
        </div>
    </div>

    Thanks,<br>
    <?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\Users\HP\Desktop\project\resources\views/emails/order_invoice.blade.php ENDPATH**/ ?>