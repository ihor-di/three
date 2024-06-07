<div @child-update="$refresh">
    <div class="flex flex-row gap-x-2">
        <!--[if BLOCK]><![endif]--><?php if($hasChildren): ?>
            <svg wire:click="open" class="dark:fill-gray-200" xmlns="http://www.w3.org/2000/svg"
                 style="margin-top: 5px; <?php if($opened): ?> transform: rotate(0deg); <?php else: ?> transform: rotate(-30deg); <?php endif; ?>"
                 fill="black" width="12" height="12" viewBox="0 0 12 12">
                <path d="M12 11h-12l6-10z"/>
            </svg>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <span class="dark:text-gray-200"><?php echo e($node->name); ?></span>
        <span wire:click.prevent="plus">+</span>
        <span wire:click.prevent="minus">-</span>
    </div>


    <!--[if BLOCK]><![endif]--><?php if($hasChildren && $opened): ?>
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childNode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div :key="<?php echo e($childNode->id); ?>">
                <p>|</p>
                <div class="flex gap-x-2">
                    
                    <span>——————</span>
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('three', ['node' => $childNode]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3666332625-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div><?php /**PATH /var/www/html/resources/views/livewire/three.blade.php ENDPATH**/ ?>