<div>
    
        <div class="rounded-md p-4">
            <div class="grid grid-cols-1 gap-2 rounded-md bg-white p-2 md:grid-cols-4">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $pembelajaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a class="flex  cursor-pointer justify-center rounded-md bg-emerald-400 px-2 py-1 uppercase text-white shadow-md hover:bg-emerald-500"
                        href="<?php echo e(route('pembelajaran.dashboard', $p->code)); ?>"><?php echo e($p->nama); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

            </div>
        </div>
</div>
<?php /**PATH D:\MY PROJEK\HERD\CLIENT\pro2lms\resources\views/livewire/pages/mahasiswa/dashboard-mahasiswa.blade.php ENDPATH**/ ?>