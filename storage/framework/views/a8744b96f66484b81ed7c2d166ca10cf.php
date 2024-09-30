<?php $__env->startSection('style'); ?>
<style type="text/css">
 .form-group {
    margin-bottom: 5px;
    }
</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Order Details</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Id : <span style="font-weight: normal;"><?php echo e($getRecord->id); ?></span></label>
                                </div>
                                <div class="form-group">
                                    <label>Order Number : <span style="font-weight: normal;"><?php echo e($getRecord->order_number); ?></span></label>
                                </div>
                                <div class="form-group">
                                    <label>Transaction Id : <span
                                            style="font-weight: normal;"><?php echo e($getRecord->transaction_id); ?></span></label>
                                </div>
                                <div class="form-group">
                                    <label>Name : <span style="font-weight: normal;"><?php echo e($getRecord->first_name); ?>

                                            <?php echo e($getRecord->last_name); ?></span></label>
                                </div>
                                <div class="form-group">
                                    <label>Company : <span style="font-weight: normal;"><?php echo e($getRecord->company); ?>

                                        </span></label>
                                </div>
                                <div class="form-group">
                                    <label>Country : <span
                                            style="font-weight: normal;"><?php echo e($getRecord->country); ?></span></label>
                                </div>
                                <div class="form-group">
                                    <label>Address : <span
                                            style="font-weight: normal;"><?php echo e($getRecord->address_one); ?><br /><?php echo e($getRecord->address_two); ?>

                                        </span></label>
                                </div>
                                <div class="form-group">
                                    <label>City : <span style="font-weight: normal;"><?php echo e($getRecord->city); ?></span></label>
                                </div>
                                <div class="form-group">
                                    <label>State : <span style="font-weight: normal;"><?php echo e($getRecord->state); ?></span></label>
                                </div>
                                <div class="form-group">
                                    <label>Post Code : <span style="font-weight: normal;">
                                            <?php echo e($getRecord->postcode); ?></span></label>
                                </div>
                                <div class="form-group">
                                    <label>Phone : <span
                                            style="font-weight: normal;"><?php echo e($getRecord->phone); ?></span></label>
                                </div>
                                <div class="form-group">
                                    <label>Email : <span
                                            style="font-weight: normal;"><?php echo e($getRecord->email); ?></span></label>
                                </div>
                                <div class="form-group">
                                    <label>Discount Code : <span
                                            style="font-weight: normal;"><?php echo e($getRecord->discount_code); ?></span></label>
                                </div>
                                <div class="form-group">
                                    <label>Discount Amount : <span
                                            style="font-weight: normal;"><?php echo e(number_format($getRecord->discount_amount, 2)); ?></span></label>
                                </div>
                                <div class="form-group">
                                    <label>Shipping Name : <span
                                            style="font-weight: normal;"><?php echo e($getRecord->getShipping->name); ?></span></label>
                                </div>
                                <div class="form-group">
                                    <label>Shipping Amount : <span
                                            style="font-weight: normal;"><?php echo e(number_format($getRecord->shipping_amount, 2)); ?></span></label>
                                </div>
                                <div class="form-group">
                                    <label>Total Amount : <span style="font-weight: normal;">
                                            <?php echo e(number_format($getRecord->total_amount, 2)); ?></span></label>
                                </div>

                                <div class="form-group">
                                    <label>Payment Method : <span
                                            style="font-weight: normal; text-transform:capitalize;"><?php echo e($getRecord->payment_method); ?></span></label>
                                </div>
                                <div class="form-group">
                                    <label>Status :
                                        <span style="font-weight: normal;">
                                        <?php if($getRecord->status == 0): ?>
                                        Pending
                                        <?php elseif($getRecord->status == 1): ?>
                                        In Progress
                                        <?php elseif($getRecord->status == 2): ?>
                                        Delivered
                                        <?php elseif($getRecord->status == 3): ?>
                                        Completed
                                        <?php elseif($getRecord->status == 4): ?>
                                        Cancelled
                                        <?php endif; ?>
                                    </span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Note : <span style="font-weight: normal;"><?php echo e($getRecord->note); ?></span></label>
                                </div>
                                <div class="form-group">
                                    <label>Created Date : <span
                                            style="font-weight: normal;"><?php echo e(date('d-m-Y', strtotime($getRecord->created_at))); ?></span></label>
                                </div>


                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Product Details</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0" style="overflow: auto;">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Size Name</th>
                                            <th>Color Name</th>
                                            <th>Size Amount</th>
                                            <th>Total Amount</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $getRecord->getItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $getProductImage = $item->getProduct->getImageSingle(
                                                    $item->getProduct->id,
                                                );
                                            ?>
                                            <tr>
                                                <td>
                                                    <img src="<?php echo e($getProductImage->getLogo()); ?>" alt="Img"
                                                        width="100px;" height="100px;">
                                                </td>
                                                <td>
                                                    <a target="_blank" href="<?php echo e(url($item->getProduct->slug)); ?>"><?php echo e($item->getProduct->title); ?></a>
                                                </td>
                                                <td><?php echo e($item->quantity); ?></td>
                                                <td><?php echo e($item->price); ?></td>
                                                <td><?php echo e($item->color_name); ?></td>
                                                <td><?php echo e($item->size_name); ?></td>
                                                <td><?php echo e(number_format($item->size_amount, 2)); ?></td>
                                                <td><?php echo e(number_format($item->total_price, 2)); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\project\resources\views/admin/orders/details.blade.php ENDPATH**/ ?>