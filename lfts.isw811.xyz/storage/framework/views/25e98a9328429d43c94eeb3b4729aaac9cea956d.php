<?php $__env->startSection('content'); ?>

<div>
  <h1><?php echo e($post ->title); ?></h1>
  <p>
    By <a href="#"><?php echo e($post->user->name); ?></a> in <a href="/categories/<?php echo e($post->category->slug); ?>"><?php echo e($post->category->name); ?></a>
  </p>

</div>
<div>
  <?php echo $post-> body; ?>

</div>
<a href="/">Volver</a>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/sites/lfts.isw811.xyz/resources/views/post.blade.php ENDPATH**/ ?>