<?php $__env->startSection('content'); ?>
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div>
            <h1>
                <a href="/posts/<?php echo e($post->slug); ?>">
                    <?php echo e($post->title); ?> <!-- blade-->
                </a>
            </h1>
        </div>
        <div><?php echo e($post->excerpt); ?></div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/sites/lfts.isw811.xyz/resources/views/posts.blade.php ENDPATH**/ ?>