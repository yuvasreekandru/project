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
                        <h1>Edit Product</h1>
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

                        <!-- general form elements -->
                        <div class="card card-primary">
                            <!-- form start -->
                            <form action="" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Title <span style="color: red">*</span></label>
                                                <input type="text" class="form-control"
                                                    value="<?php echo e(old('title', $product->title)); ?>" name="title" required
                                                    placeholder="Title">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>SKU <span style="color: red">*</span></label>
                                                <input type="text" class="form-control"
                                                    value="<?php echo e(old('sku', $product->sku)); ?>" name="sku" required
                                                    placeholder="SKU">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Category Name <span style="color: red">*</span></label>
                                                <select class="form-control" value="" name="category_id"
                                                    id="changeCategory" required placeholder="Category Name">
                                                    <option value="">Select</option>
                                                    <?php $__currentLoopData = $getCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option
                                                            <?php echo e($product->category_id == $category->id ? 'selected' : ''); ?>

                                                            value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Sub Category Name <span style="color: red">*</span></label>
                                                <select class="form-control" value="" name="sub_category_id"
                                                    id="getSubCategory" required placeholder="Sub Category Name">
                                                    <option value="">Select</option>
                                                    <?php $__currentLoopData = $getSubCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option
                                                            <?php echo e($product->sub_category_id == $subcategory->id ? 'selected' : ''); ?>

                                                            value="<?php echo e($subcategory->id); ?>"><?php echo e($subcategory->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Brand <span style="color: red">*</span></label>
                                                <select class="form-control" value="" name="brand_id" required
                                                    placeholder="Brand Name">
                                                    <option value="">Select</option>
                                                    <?php $__currentLoopData = $getBrand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php echo e($product->brand_id == $brand->id ? 'selected' : ''); ?>

                                                            value="<?php echo e($brand->id); ?>"><?php echo e($brand->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Product Type<span style="color: red"></span></label>
                                                <select class="form-control" value="" name="product_type_id"
                                                 placeholder="Product Type">
                                                    <option value="">Select</option>
                                                    <?php $__currentLoopData = $getProductType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(!empty($p_type->product_type)): ?>
                                                            <option
                                                            <?php echo e($product->product_type_id == $p_type->id ? 'selected' : ''); ?>

                                                            value="<?php echo e($p_type->id); ?>"><?php echo e($p_type->product_type); ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Trendy Product <span style="color: red">*</span></label>
                                                <div>
                                                    <label><input type="checkbox" <?php echo e(!empty($product->is_trendy) ? 'checked': ''); ?> name="is_trendy"
                                                        ></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Color <span style="color: red">*</span></label>
                                                <?php $__currentLoopData = $getColor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $checked = '';
                                                    ?>
                                                    <?php $__currentLoopData = $product->getColor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pcolor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($pcolor->color_id == $color->id): ?>
                                                            <?php
                                                                $checked = 'checked';
                                                            ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <div>
                                                        <label><input <?php echo e($checked); ?> type="checkbox" name="color_id[]"
                                                                value="<?php echo e($color->id); ?>"><?php echo e($color->name); ?></label>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Price ($)<span style="color: red">*</span></label>
                                                <input type="text" class="form-control"
                                                    value="<?php echo e(!empty($product->price) ? $product->price : ''); ?>"
                                                    name="price" required placeholder="Price">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Old Price ($)<span style="color: red">*</span></label>
                                                <input type="text" class="form-control"
                                                    value="<?php echo e(!empty($product->old_price) ? $product->old_price : ''); ?>"
                                                    name="old_price" required placeholder="Old Price">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Size <span style="color: red">*</span></label>
                                                <div>
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Price ($)</th>
                                                                <th>Stock Qty</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="appendSize">
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control"
                                                                        name="size[100][name]" id=""
                                                                        placeholder="Name">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control"
                                                                        name="size[100][price]" id=""
                                                                        placeholder="Price">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control"
                                                                        name="size[100][stock_qty]" id=""
                                                                        placeholder="Qty">
                                                                </td>
                                                                <td>
                                                                    <button type="button"
                                                                        class="btn btn-primary addSize">Add</button>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                                $i_s = 1;
                                                            ?>
                                                            <?php $__currentLoopData = $product->getSize; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr id="deleteSize<?php echo e($i_s); ?>">
                                                                    <td>
                                                                        <input type="text" class="form-control"
                                                                            value="<?php echo e($size->name); ?>"
                                                                            name="size[<?php echo e($i_s); ?>][name]"
                                                                            id="" placeholder="Name">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control"
                                                                            value="<?php echo e($size->price); ?>"
                                                                            name="size[<?php echo e($i_s); ?>][price]"
                                                                            id="" placeholder="Price">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control"
                                                                        value="<?php echo e($size->stock_qty); ?>"
                                                                        name="size[<?php echo e($i_s); ?>][stock_qty]"
                                                                        id="" placeholder="Qty">
                                                                    </td>
                                                                    <td>
                                                                        <button type="button" id="<?php echo e($i_s); ?>"
                                                                            class="btn btn-danger deleteSize">Delete</button>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                    $i_s++;
                                                                ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Image<span style="color: red">*</span></label>
                                                <input type="file" name="image[]" class="form-control" multiple
                                                    style="padding:5px;" accept="image/*" id="">
                                            </div>
                                        </div>
                                    </div>
                                    <?php if(!empty($product->getImage->count())): ?>
                                        <div class="row" id="sortable">
                                            <?php $__currentLoopData = $product->getImage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(!empty($image->getLogo())): ?>
                                                    <div class="col-md-1 sortable_image" id="<?php echo e($image->id); ?>"
                                                        style="text-align: center">
                                                        <img src=" <?php echo e($image->getLogo()); ?>"
                                                            style="width: 100%;height:100px;" alt="">
                                                        <a onclick="return confirm('Are you sure wnant to delete ?');"
                                                            href="<?php echo e(url('admin/product/image_delete/' . $image->id)); ?>"
                                                            style="margin-top: 10px;"
                                                            class="btn btn-danger btn-sm">Delete</a>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php endif; ?>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Short Description</label>
                                                <textarea class="form-control" name="short_description" placeholder="Short Description"><?php echo e($product->short_description); ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control editor" name="description" placeholder="Description"><?php echo e($product->description); ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Additional Information</label>
                                                <textarea class="form-control editor" name="additional_information" placeholder="Additional Information"><?php echo e($product->additional_information); ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Shipping & Returns</label>
                                                <textarea class="form-control editor" name="shipping_returns" placeholder="Shipping & Returns"><?php echo e($product->shipping_returns); ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Status<span style="color: red">*</span></label>
                                                <select class="form-control" name="status" required>
                                                    <option <?php echo e($product->status == 0 ? 'selected' : ''); ?> value="0">
                                                        Active</option>
                                                    <option <?php echo e($product->status == 1 ? 'selected' : ''); ?> value="1">
                                                        InActive</option>
                                                </select>
                                            </div>
                                        </div>
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
    <!-- summernote -->
    <script src="<?php echo e(asset('AdminLTE/plugins/summernote/summernote-bs4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('AdminLTE/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>


    
    
    <script type="text/javascript">
        $(document).ready(function() {
            $("#sortable").sortable({
                update: function(event, ui) {
                    var photo_id = new Array();
                    $('.sortable_image').each(function() {
                        var id = $(this).attr('id');
                        photo_id.push(id);
                    });
                    $.ajax({

                        type: "POST",
                        url: "<?php echo e(url('admin/product_image_sortable')); ?>",
                        data: {
                            "photo_id": photo_id,
                            "_token": "<?php echo e(csrf_token()); ?>"
                        },
                        dataType: "json",
                        success: function(data) {
                        },
                        error: function(data) {

                        }
                    });
                }
            });
        });
        // Summernote
        $('.editor').summernote({
            height: 200
        });
        //   $('.editor').tinymce({
        //         height: 500,
        //         menubar: false,
        //         plugins: [
        //            'a11ychecker','advlist','advcode','advtable','autolink','checklist','markdown',
        //            'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
        //            'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
        //         ],
        //         toolbar: 'undo redo | a11ycheck casechange blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist checklist outdent indent | removeformat | code table help'
        //       });
        var i = 101;
        $('body').delegate('.addSize', 'click', function() {
            var html = '<tr id="deleteSize' + i + '">\n\
                                                    <td>\n\
                                                        <input type="text" class="form-control" name="size[' + i + '][name]" placeholder="Name" id="">\n\
                                                    </td>\n\
                                                    <td>\n\
                                                        <input type="text" class="form-control" name="size[' + i + '][price]" placeholder="Price" id="">\n\
                                                    </td>\n\
                                                    <td>\n\
                                                        <input type="text" class="form-control" name="size[' + i + '][stock_qty]" placeholder="Qty" id="">\n\
                                                    </td>\n\
                                                    <td>\n\
                                                        <button type="button" id="' + i + '" class="btn btn-danger deleteSize">Delete</button>\n\
                                                    </td>\n\
                                                </tr>';
            i++;

            $('#appendSize').append(html);
        });
        $('body').delegate('.deleteSize', 'click', function() {
            var id = $(this).attr('id');
            $('#deleteSize' + id).remove();
        });

        $('body').delegate('#changeCategory', 'change', function(e) {
            var id = $(this).val();
            $.ajax({

                type: "POST",
                url: "<?php echo e(url('admin/get_sub_category')); ?>",
                data: {
                    "id": id,
                    "_token": "<?php echo e(csrf_token()); ?>"
                },
                dataType: "json",
                success: function(data) {
                    $('#getSubCategory').html(data.html);
                },
                error: function(data) {

                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\project\resources\views/admin/product/edit.blade.php ENDPATH**/ ?>