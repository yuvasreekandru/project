<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Orders List (Total : <?php echo e($getRecord->total()); ?>)</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo $__env->make('admin.layouts.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <form action="" method="GET">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Order Search</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label>Id</label>
                                                <input type="text" name="id" class="form-control" placeholder="Id"
                                                    value="<?php echo e(Request::get('id')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Company Name</label>
                                                <input type="text" name="company_name" class="form-control"
                                                    placeholder="Company Name" value="<?php echo e(Request::get('company_name')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" name="first_name" class="form-control"
                                                    placeholder="First Name" value="<?php echo e(Request::get('first_name')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" name="last_name" class="form-control"
                                                    placeholder="Last Name" value="<?php echo e(Request::get('last_name')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="email" class="form-control"
                                                    placeholder="Email" value="<?php echo e(Request::get('email')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" name="country"
                                                    class="form-control"placeholder="Country"
                                                    value="<?php echo e(Request::get('country')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>State</label>
                                                <input type="text" name="state" class="form-control"placeholder="State"
                                                    value="<?php echo e(Request::get('state')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" name="city" class="form-control"placeholder="City"
                                                    value="<?php echo e(Request::get('city')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" name="phone" class="form-control"placeholder="Phone"
                                                    value="<?php echo e(Request::get('phone')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Postcode</label>
                                                <input type="text" name="postcode"
                                                    class="form-control"placeholder="Postcode"
                                                    value="<?php echo e(Request::get('postcode')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>From Date</label>
                                                <input type="date" style="padding: 6px;" name="from_date"
                                                    class="form-control" value="<?php echo e(Request::get('from_date')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>To Date</label>
                                                <input type="date" style="padding: 6px;" name="to_date"
                                                    class="form-control" value="<?php echo e(Request::get('to_date')); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-primary">Search</button>
                                            <a href="<?php echo e(url('admin/orders/list')); ?>" class="btn btn-primary">Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Orders List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0" style="overflow: auto;">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Order Number</th>
                                            <th>Name</th>
                                            <th>Company</th>
                                            <th>Country</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>State</th>
                                            <th>Post Code</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Discount Code</th>
                                            <th>Discount Amount ($)</th>
                                            <th>Shipping Amount ($)</th>
                                            <th>Total Amount ($)</th>
                                            <th>Payment Method</th>
                                            <th>Status</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $getRecord; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($value->id); ?></td>
                                                <td><?php echo e($value->order_number); ?></td>
                                                <td><?php echo e($value->first_name); ?> <?php echo e($value->last_name); ?></td>
                                                <td><?php echo e($value->company_name); ?></td>
                                                <td><?php echo e($value->country); ?></td>
                                                <td><?php echo e($value->address_one); ?><br /><?php echo e($value->address_two); ?></td>
                                                <td><?php echo e($value->city); ?></td>
                                                <td><?php echo e($value->state); ?></td>
                                                <td><?php echo e($value->postcode); ?></td>
                                                <td><?php echo e($value->phone); ?></td>
                                                <td><?php echo e($value->email); ?></td>
                                                <td><?php echo e($value->discount_code); ?></td>
                                                <td><?php echo e(number_format($value->discount_amount, 2)); ?></td>
                                                <td><?php echo e(number_format($value->shipping_amount, 2)); ?></td>
                                                <td><?php echo e(number_format($value->total_amount, 2)); ?></td>
                                                <td style="text-transform: capitalize;"><?php echo e($value->payment_method); ?></td>
                                                <td>
                                                    <select class="form-control changeStatus" id="<?php echo e($value->id); ?>"
                                                        style="width:150px;" name="" id="">
                                                        <option <?php echo e($value->status == 0 ? 'selected' : ''); ?>

                                                            value="0">Pending</option>
                                                        <option <?php echo e($value->status == 1 ? 'selected' : ''); ?>

                                                            value="1">InProgress</option>
                                                        <option <?php echo e($value->status == 2 ? 'selected' : ''); ?>

                                                            value="2">Delivered</option>
                                                        <option <?php echo e($value->status == 3 ? 'selected' : ''); ?>

                                                            value="3">Completed</option>
                                                        <option <?php echo e($value->status == 4 ? 'selected' : ''); ?>

                                                            value="4">Cancelled</option>
                                                    </select>
                                                </td>
                                                <td><?php echo e(date('m-d-Y', strtotime($value->created_at))); ?></td>
                                                <td>
                                                    <a href="<?php echo e(url('admin/orders/details/' . $value->id)); ?>"
                                                        class="btn btn-primary">Details</a>


                                                </td>

                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>
                                <div style="padding: 10px; float:right;">
                                    <?php echo e($getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links()); ?>

                                </div>
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
    <script type="text/javascript">
        $('body').delegate('.changeStatus', 'change', function() {
            var status = $(this).val();
            var order_id = $(this).attr('id');
            $.ajax({
                type: "GET",
                url: "<?php echo e(url('admin/order_status')); ?>",
                data: {
                    status: status,
                    order_id: order_id
                },
                dataType: "json",
                success: function(data) {
                    alert(data.message);
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\project\resources\views/admin/orders/list.blade.php ENDPATH**/ ?>