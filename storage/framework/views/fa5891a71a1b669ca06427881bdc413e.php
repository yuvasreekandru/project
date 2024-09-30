<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Category List</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">
                        <a href="<?php echo e(route('category.add')); ?>" class="btn btn-primary">Add New Category</a>
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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Category List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Meta Title</th>
                                            <th>Meta Description</th>
                                            <th>Meta Keywords</th>
                                            <th>Created By</th>
                                            <th>Home</th>
                                            <th>Menu</th>
                                            <th>Status</th>
                                            <th>Created Date</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $getRecord; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($value->id); ?></td>
                                                <td>
                                                    <?php if(!empty($value->getImage())): ?>
                                                        <img src="<?php echo e($value->getImage()); ?>" height="100px" alt="">
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e($value->name); ?></td>
                                                <td><?php echo e($value->slug); ?></td>
                                                <td><?php echo e($value->meta_title); ?></td>
                                                <td><?php echo e($value->meta_description); ?></td>
                                                <td><?php echo e($value->meta_keywords); ?></td>
                                                <td><?php echo e($value->created_by_name); ?></td>
                                                <td><?php echo e(($value->is_home == 1) ? 'Yes' : 'No'); ?></td>
                                                <td><?php echo e(($value->is_menu == 1) ? 'Yes' : 'No'); ?></td>
                                                <td><?php echo e(($value->status == 0) ? 'Active' : 'InActive'); ?></td>
                                                <td><?php echo e(date('d-m-Y', strtotime($value->created_at))); ?></td>
                                                <td>
                                                    <a href="<?php echo e(url('admin/category/edit/'.$value->id)); ?>" class="btn btn-primary">Edit</a>
                                                    <a href="<?php echo e(url('admin/category/delete/'.$value->id)); ?>" class="btn btn-danger">Delete</a>

                                                </td>

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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\project\resources\views/admin/category/list.blade.php ENDPATH**/ ?>