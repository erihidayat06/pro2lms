<div
    <?php echo e($attributes
            ->merge([
                'id' => $getId(),
            ], escape: false)
            ->merge($getExtraAttributes(), escape: false)); ?>

>
    <?php echo e($getChildComponentContainer()); ?>

</div>
<?php /**PATH D:\MY PROJEK\HERD\CLIENT\pro2lms\vendor\filament\forms\src\/../resources/views/components/group.blade.php ENDPATH**/ ?>