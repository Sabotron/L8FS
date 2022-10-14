<?php $__env->startSection('content'); ?>

  <div>
    <h1><?php echo e($post ->title); ?></h1>
  </div>
  <div>
  <?php echo $post-> body; ?>

  </div>
  <a href="/">Volver</a>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/sites/lfts.isw811.xyz/resources/views/post.blade.php ENDPATH**/ ?>