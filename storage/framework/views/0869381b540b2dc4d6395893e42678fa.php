<?php $__env->startSection('content'); ?>
    <main class="main">
        <div class="page-header text-center" style="background-image: url('<?php echo e($getPage->getImage()); ?>')">
            <div class="container">
                <h1 class="page-title"><?php echo e($getPage->title); ?> </h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('')); ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(url('blog')); ?>">Blog</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Grid With Sidebar</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="entry-container max-col-2" data-layout="fitRows">
                            <?php $__currentLoopData = $getBlog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="entry-item col-sm-6">
                                    <article class="entry entry-grid">
                                        <figure class="entry-media">
                                            <a href="<?php echo e(url('blog/'.$value->slug)); ?>">
                                                <img src="<?php echo e($value->getImage()); ?>" alt="<?php echo e($value->title); ?>" style="height: 300px; width: 100%; object-fit: cover;" >
                                            </a>
                                        </figure><!-- End .entry-media -->

                                        <div class="entry-body">
                                            <div class="entry-meta">

                                                <span class="meta-separator">|</span>
                                                <a href="#"><?php echo e(date('M d,Y',strtotime($value->created_at))); ?></a>
                                                <span class="meta-separator">|</span>
                                                <a href="#"><?php echo e($value->getCommentCount()); ?> Comments</a>
                                            </div><!-- End .entry-meta -->

                                            <h2 class="entry-title">
                                                <a href="<?php echo e(url('blog/'.$value->slug)); ?>"><?php echo e($value->title); ?></a>
                                            </h2><!-- End .entry-title -->
                                            <?php if(!empty($value->getCategory)): ?>
                                                <div class="entry-cats">
                                                    <a href="<?php echo e(url('blog/category/'.$value->getCategory->slug)); ?>"><?php echo e($value->getCategory->name); ?></a>
                                                </div><!-- End .entry-cats -->
                                            <?php endif; ?>
                                            <div class="entry-content">
                                                <?php echo $value->short_description; ?>

                                                <a href="<?php echo e(url('blog/'.$value->slug)); ?>" class="read-more">Continue Reading</a>
                                            </div>
                                        </div><!-- End .entry-body -->
                                    </article><!-- End .entry -->
                                </div><!-- End .entry-item -->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div><!-- End .entry-container -->

                        <?php echo e($getBlog->appends(Illuminate\Support\Facades\Request::except('page'))->links()); ?>


                    </div><!-- End .col-lg-9 -->

                    <aside class="col-lg-3">
                        <?php echo $__env->make('blog._sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\project\resources\views/blog/list.blade.php ENDPATH**/ ?>