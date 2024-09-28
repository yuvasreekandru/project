<?php $__env->startSection('style'); ?>
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo e(asset('AdminLTE/plugins/summernote/summernote-bs4.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Edit Page</h1>
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
                            <!-- form start -->
                            <form action="" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Name <span style="color: red"></span></label>
                                        <input type="text" class="form-control" value="<?php echo e($getRecord->name); ?>"
                                            name="name">
                                    </div>
                                    <div class="form-group">
                                        <label>Title <span style="color: red"></span></label>
                                        <input type="text" class="form-control" value="<?php echo e($getRecord->title); ?>"
                                            name="title">
                                    </div>
                                    <div class="form-group">
                                        <label>Image <span style="color: red"></span></label>
                                        <input type="file" class="form-control" name="image">
                                        <?php if(!empty($getRecord->getImage())): ?>
                                            <img src="<?php echo e($getRecord->getImage()); ?>" width="200px" alt="">
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Description <span style="color: red"></span></label>
                                        <textarea class="form-control editor" name="description"><?php echo e($getRecord->description); ?></textarea>
                                    </div>

                                    <hr>
                                    <div class="form-group">
                                        <label>Meta Title<span style="color: red"></span></label>
                                        <input class="form-control" value="<?php echo e($getRecord->meta_title); ?>" name="meta_title">
                                    </div>
                                    <div class="form-group">
                                        <label>Meta Description</label>
                                        <textarea class="form-control" name="meta_description" placeholder="Meta Description"><?php echo e($getRecord->meta_description); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Meta Keywords</label>
                                        <input type="text" class="form-control" value="<?php echo e($getRecord->meta_keywords); ?>"
                                            name="meta_keywords">
                                    </div>


                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->

                    </div>
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <!-- Summernote -->
    <script src="<?php echo e(asset('AdminLTE/plugins/summernote/summernote-bs4.min.js')); ?>"></script>
    <script>

        $(function () {
            // Summernote
            $('.editor').summernote({
                height:300
            });

          });
        </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\project\resources\views/admin/pages/edit.blade.php ENDPATH**/ ?>