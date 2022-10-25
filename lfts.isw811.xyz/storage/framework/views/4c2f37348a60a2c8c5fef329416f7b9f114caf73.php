<?php if(auth()->guard()->check()): ?>
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.panel','data' => []]); ?>
<?php $component->withName('panel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <form method="POST" action="/posts/<?php echo e($post->slug); ?>/comments">
        <?php echo csrf_field(); ?>

        <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?u=<?php echo e(auth()->id()); ?>" alt="" width="40" height="40" class="rounded-full">

            <h2 class="ml-4">
                Leave your comments below:
            </h2>

        </header>
        <div class="mt-6">
            <textarea class="w-full text-sm focus:outline-none focus:ring" name="body" id="" cols="30" rows="5" require="true" placeholder="Think twice before you type!"></textarea>

            <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="text-xs text-red-500"><?php echo e($message); ?></span>

            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        </div>
        <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.form.button','data' => []]); ?>
<?php $component->withName('form.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>Submit <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    </div>
    </form>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php else: ?>
<p class="font-semibold"> 
    <a href="/register" class="hover:underline">Register</a> or 
    <a href="/login" class="hover:underline">Log in</a> to post a comment!</p>
<?php endif; ?><?php /**PATH /home/vagrant/sites/lfts.isw811.xyz/resources/views/posts/_add-comment-form.blade.php ENDPATH**/ ?>