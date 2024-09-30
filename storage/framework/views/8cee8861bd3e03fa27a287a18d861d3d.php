<?php $__env->startSection('content'); ?>
    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title"><?php echo e($getBlog->title); ?></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('')); ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(url('blog')); ?>">Blog</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo e($getBlog->title); ?></li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <?php echo $__env->make('admin.layouts.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="row">
                    <div class="col-lg-9">
                        <article class="entry single-entry">
                            <figure class="entry-media">
                                <img src="<?php echo e($getBlog->getImage()); ?>" alt="<?php echo e($getBlog->title); ?>">
                            </figure><!-- End .entry-media -->

                            <div class="entry-body">
                                <div class="entry-meta">

                                    <a href="#"><?php echo e(date('M d,Y', strtotime($getBlog->created_at))); ?></a>
                                    <span class="meta-separator">|</span>
                                    <a href="#"><?php echo e($getBlog->getCommentCount()); ?> Comments</a>
                                    <?php if(!empty($getBlog->getCategory)): ?>
                                        <span class="meta-separator">|</span>
                                        <a href="<?php echo e(url('blog/category/'.$getBlog->getCategory->slug)); ?>"><?php echo e($getBlog->getCategory->name); ?></a>
                                    <?php endif; ?>

                                    </div><!-- End .entry-meta -->

                                    <br><br>

                                    <div class="entry-content editor-content">

                                        <?php echo $getBlog->description; ?>

                                    </div><!-- End .entry-content -->

                                </div><!-- End .entry-body -->

                            </article><!-- End .entry -->

                            <nav class="pager-nav" aria-label="Page navigation">
                                <a class="pager-link pager-link-prev" href="#" aria-label="Previous" tabindex="-1">
                                    Previous Post
                                    <span class="pager-link-title">Cras iaculis ultricies nulla</span>
                                </a>

                                <a class="pager-link pager-link-next" href="#" aria-label="Next" tabindex="-1">
                                    Next Post
                                    <span class="pager-link-title">Praesent placerat risus</span>
                                </a>
                            </nav><!-- End .pager-nav -->
                            <?php if(!empty($getRelatedPost->count())): ?>
                                <div class="related-posts">
                                    <h3 class="title">Related Posts</h3><!-- End .title -->

                                    <div class="owl-carousel owl-simple" data-toggle="owl"
                                        data-owl-options='{
                                        "nav": false,
                                        "dots": true,
                                        "margin": 20,
                                        "loop": false,
                                        "responsive": {
                                            "0": {
                                                "items":1
                                            },
                                            "480": {
                                                "items":2
                                            },
                                            "768": {
                                                "items":3
                                            }
                                        }
                                    }'>
                                    <?php $__currentLoopData = $getRelatedPost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedPost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <article class="entry entry-grid">
                                            <figure class="entry-media">
                                                <a href="<?php echo e(url('blog/'.$relatedPost->slug)); ?>">
                                                    <img src="<?php echo e($relatedPost->getImage()); ?>" alt="image desc">
                                                </a>
                                            </figure><!-- End .entry-media -->

                                            <div class="entry-body">
                                                <div class="entry-meta">
                                                    <a href="#"><?php echo e(date('M d,Y', strtotime($relatedPost->created_at))); ?></a>
                                                    <span class="meta-separator">|</span>
                                                    <a href="#"><?php echo e($relatedPost->getCommentCount()); ?> Comments</a>
                                                </div><!-- End .entry-meta -->

                                                <h2 class="entry-title">
                                                    <a href="<?php echo e(url('blog/'.$relatedPost->slug)); ?>"><?php echo e($relatedPost->title); ?></a>
                                                </h2><!-- End .entry-title -->
                                                <div class="entry-content">
                                                    <?php echo $relatedPost->short_description; ?>

                                                    <a href="<?php echo e(url('blog/'.$relatedPost->slug)); ?>" class="read-more">Continue Reading</a>
                                                </div>
                                                <?php if(!empty($relatedPost->getCategory)): ?>
                                                    <div class="entry-cats">
                                                        <a href="<?php echo e(url('blog/category/'.$relatedPost->getCategory->slug)); ?>"><?php echo e($relatedPost->getCategory->name); ?></a>
                                                    </div><!-- End .entry-cats -->
                                                <?php endif; ?>

                                            </div><!-- End .entry-body -->
                                        </article><!-- End .entry -->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div><!-- End .owl-carousel -->
                                </div><!-- End .related-posts -->
                            <?php endif; ?>
                            <div class="comments">
                                <h3 class="title"><?php echo e($getBlog->getCommentCount()); ?> Comments</h3><!-- End .title -->

                                <ul>
                                    <?php $__currentLoopData = $getBlog->getComment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <li>
                                            <div class="comment">

                                                <div class="comment-body">
                                                    <div class="comment-user">
                                                        <h4><a href="#"><?php echo e($comment->getUser->name); ?></a></h4>
                                                        <span class="comment-date"><?php echo e(date('M d,Y', strtotime($comment->created_at))); ?> at <?php echo e(date('h:i A', strtotime($comment->created_at))); ?></span>
                                                    </div><!-- End .comment-user -->

                                                    <div class="comment-content">
                                                        <p><?php echo e($comment->comment); ?></p>
                                                    </div><!-- End .comment-content -->
                                                </div><!-- End .comment-body -->
                                            </div><!-- End .comment -->

                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <li>
                                        <div class="comment">

                                            <div class="comment-body">
                                                <div class="comment-user">
                                                    <h4><a href="#">Johnathan Castillo</a></h4>
                                                    <span class="comment-date">November 9, 2018 at 2:19 pm</span>
                                                </div><!-- End .comment-user -->

                                                <div class="comment-content">
                                                    <p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>
                                                </div><!-- End .comment-content -->
                                            </div><!-- End .comment-body -->
                                        </div><!-- End .comment -->
                                    </li>
                                </ul>
                            </div><!-- End .comments -->
                            <div class="reply">
                                <div class="heading">
                                    <h3 class="title">Leave A Comment</h3><!-- End .title -->
                                </div><!-- End .heading -->

                                <form action="<?php echo e(url('blog/submit_comment')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="blog_id" value="<?php echo e($getBlog->id); ?>">
                                    <label for="reply-message" class="sr-only">Comment</label>
                                    <textarea name="comment" id="reply-message" cols="30" rows="4" class="form-control" required
                                        placeholder="Comment *"></textarea>

                                    <?php if(!empty(Auth::check())): ?>
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>POST COMMENT</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>
                                    <?php else: ?>
                                        <a href="#signin-modal" data-toggle="modal" class="btn btn-outline-primary-2">
                                            <span>POST COMMENT</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </a>
                                    <?php endif; ?>

                                </form>
                            </div><!-- End .reply -->
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\project\resources\views/blog/detail.blade.php ENDPATH**/ ?>