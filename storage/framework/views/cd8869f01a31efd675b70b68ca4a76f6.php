<div class="sidebar">
    <div class="widget widget-search">
        <h3 class="widget-title">Search</h3><!-- End .widget-title -->

        <form action="<?php echo e(url('blog')); ?>">
            <label for="ws" class="sr-only">Search in blog</label>
            <input type="text" class="form-control" name="search" id="ws"
                placeholder="Search in blog" >
            <button type="submit" class="btn"><i class="icon-search"></i><span
                    class="sr-only">Search</span></button>
        </form>
    </div><!-- End .widget -->

    <div class="widget widget-cats">
        <h3 class="widget-title">Categories</h3><!-- End .widget-title -->

        <ul>
            <?php $__currentLoopData = $getBlogCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="<?php echo e(url('blog/category/'.$category->slug)); ?>"><?php echo e($category->name); ?>

                <span><?php echo e($category->getCountBlog()); ?></span></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div><!-- End .widget -->

    <div class="widget">
        <h3 class="widget-title">Popular Posts</h3><!-- End .widget-title -->

        <ul class="posts-list">
            <?php $__currentLoopData = $getPopularPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <figure>
                        <a href="#">
                            <img src="<?php echo e($value->getImage()); ?>" alt="<?php echo e($value->title); ?>">
                        </a>
                    </figure>

                    <div>
                        <span><?php echo e(date('M d,Y', strtotime($value->created_at))); ?></span>
                        <h4><a href="<?php echo e(url('blog/'.$value->slug)); ?>"><?php echo e($value->title); ?></a></h4>
                    </div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </ul><!-- End .posts-list -->
    </div><!-- End .widget -->

</div><!-- End .sidebar -->
<?php /**PATH C:\Users\HP\Desktop\project\resources\views/blog/_sidebar.blade.php ENDPATH**/ ?>