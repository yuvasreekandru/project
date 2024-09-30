<?php $__env->startSection('style'); ?>
    <style type="text/css">
        .form-group {
            margin-bottom: 5px;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main class="main">
        <div class="page-header text-center">
            <div class="container">
                <h1 class="page-title">Order Details</h1>
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
                                <div class="">
                                    <div class="form-group">
                                        <label>Order Number : <span
                                                style="font-weight: normal;"><?php echo e($getRecord->order_number); ?></span></label>
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
                                        <label>City : <span
                                                style="font-weight: normal;"><?php echo e($getRecord->city); ?></span></label>
                                    </div>
                                    <div class="form-group">
                                        <label>State : <span
                                                style="font-weight: normal;"><?php echo e($getRecord->state); ?></span></label>
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
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label>Note : <span
                                                style="font-weight: normal;"><?php echo e($getRecord->note); ?></span></label>
                                    </div>
                                    <div class="form-group">
                                        <label>Created Date : <span
                                                style="font-weight: normal;"><?php echo e(date('d-m-Y', strtotime($getRecord->created_at))); ?></span></label>
                                    </div>


                                </div>

                                <div class="card">
                                    <div class="card-header" style="margin-top: 20px">
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
                                                        <td style="max-width: 250px;">
                                                            <a target="_blank"
                                                                href="<?php echo e(url($item->getProduct->slug)); ?>"><?php echo e($item->getProduct->title); ?></a>
                                                            <br>
                                                            <?php if(!empty($item->color_name )): ?>
                                                                <b> Color Name:</b> <?php echo e($item->color_name); ?>

                                                                <br>
                                                            <?php endif; ?>
                                                            <?php if(!empty($item->size_name )): ?>

                                                                <b>Size Name:</b> <?php echo e($item->size_name); ?>

                                                                <br>
                                                            <?php endif; ?>
                                                            <?php if($getRecord->status == 3): ?>
                                                                <?php
                                                                    $getReview = $item->getReview(
                                                                        $item->getProduct->id,
                                                                        $getRecord->id,
                                                                    );
                                                                ?>
                                                                <?php if(!empty($getReview)): ?>
                                                                    <b> Rating : </b> <?php echo e($getReview->rating); ?> <br>
                                                                    <b> Review : </b> <?php echo e($getReview->review); ?> <br>
                                                                <?php else: ?>
                                                                    <button class="btn btn-primary makeReview"
                                                                        id="<?php echo e($item->getProduct->id); ?>"
                                                                        data-order="<?php echo e($getRecord->id); ?>">Make Review

                                                                    </button>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?php echo e($item->quantity); ?></td>
                                                        <td><?php echo e($item->price); ?></td>

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
                        </div><!-- End .col-lg-9 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .dashboard -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->


    <!-- Modal -->
    <div class="modal fade" id="makeReviewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Make Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo e(url('user/make-review')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="product_id" id="getProductId" required>
                    <input type="hidden" name="order_id" id="getOrderId" required>

                    <div class="modal-body" style="padding: 20px;">
                        <div class="form-group" style="margin-bottom: 15px;">
                            <label for="">How many rating? *</label>
                            <select class="form-control" name="rating" id="" required>
                                <option value="">Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Review *</label>
                            <textarea class="form-control" name="review" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        $('body').delegate('.makeReview', 'click', function() {
            var product_id = $(this).attr('id');
            var order_id = $(this).attr('data-order');

            $('#getProductId').val(product_id);
            $('#getOrderId').val(order_id);

            $('#makeReviewModal').modal('show');
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\project\resources\views/user/order-details.blade.php ENDPATH**/ ?>