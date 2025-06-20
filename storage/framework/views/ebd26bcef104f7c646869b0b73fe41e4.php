<nav x-cloak
    class="fixed left-0 z-30 flex h-svh w-60 shrink-0 flex-col border-r border-slate-300 bg-slate-100 p-4 transition-transform duration-300 md:w-64 md:translate-x-0 md:relative dark:border-slate-700 dark:bg-slate-800"
    x-bind:class="sidebarIsOpen ? 'translate-x-0' : '-translate-x-60'" aria-label="sidebar navigation">
    <!-- logo  -->
    <a href="<?php echo e(route('home')); ?>" class="ml-2 w-fit text-2xl font-bold text-black dark:text-white">
        <span class="text-xl">Pro2LMS</span>
    </a>
    <!-- sidebar links  -->
    <div class="flex flex-col gap-2 overflow-y-auto pb-6 my-6 sidebar-mahasiswa">

        <a href="<?php echo e(route('pembelajaran.dashboard', $pembelajaran->code)); ?>"
            class="flex items-center rounded-lg gap-2 px-2 py-1.5 text-sm font-medium text-slate-700 underline-offset-2 hover:bg-green-500/5 hover:text-black focus-visible:underline focus:outline-hidden dark:text-slate-300 dark:hover:bg-blue-600/5 dark:hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 shrink-0"
                aria-hidden="true">
                <path
                    d="M15.5 2A1.5 1.5 0 0 0 14 3.5v13a1.5 1.5 0 0 0 1.5 1.5h1a1.5 1.5 0 0 0 1.5-1.5v-13A1.5 1.5 0 0 0 16.5 2h-1ZM9.5 6A1.5 1.5 0 0 0 8 7.5v9A1.5 1.5 0 0 0 9.5 18h1a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 10.5 6h-1ZM3.5 10A1.5 1.5 0 0 0 2 11.5v5A1.5 1.5 0 0 0 3.5 18h1A1.5 1.5 0 0 0 6 16.5v-5A1.5 1.5 0 0 0 4.5 10h-1Z" />
            </svg>
            <span>Dashboard</span>
        </a>
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $pembelajaran->pertemuans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pertemuan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div x-data="{ isExpanded<?php echo e($pertemuan->id); ?>: false }" class="flex flex-col">
                <button type="button" x-on:click="isExpanded<?php echo e($pertemuan->id); ?> = ! isExpanded<?php echo e($pertemuan->id); ?>"
                    id="user-management-btn" aria-controls="user-management"
                    x-bind:aria-expanded="isExpanded<?php echo e($pertemuan->id); ?> ? 'true' : 'false'"
                    class="flex items-center justify-between rounded-lg gap-2 px-2 py-1.5 text-sm font-medium underline-offset-2 focus:outline-hidden focus-visible:underline"
                    x-bind:class="isExpanded<?php echo e($pertemuan->id); ?> ? 'text-black bg-green-500/10 dark:text-white dark:bg-blue-600/10' :
                        'text-slate-700 hover:bg-green-500/5 hover:text-black dark:text-slate-300 dark:hover:text-white dark:hover:bg-blue-600/5'">
                    <div>
                        <!--[if BLOCK]><![endif]--><?php if($pertemuan->icon): ?>
                            <?php if (isset($component)) { $__componentOriginal606b6d7eddc2e418f11096356be15e19 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal606b6d7eddc2e418f11096356be15e19 = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Icon::resolve(['name' => ''.e($pertemuan->icon).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'size-5 text-xs']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal606b6d7eddc2e418f11096356be15e19)): ?>
<?php $attributes = $__attributesOriginal606b6d7eddc2e418f11096356be15e19; ?>
<?php unset($__attributesOriginal606b6d7eddc2e418f11096356be15e19); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal606b6d7eddc2e418f11096356be15e19)): ?>
<?php $component = $__componentOriginal606b6d7eddc2e418f11096356be15e19; ?>
<?php unset($__componentOriginal606b6d7eddc2e418f11096356be15e19); ?>
<?php endif; ?>
                        <?php else: ?>
                            <?php if (isset($component)) { $__componentOriginal606b6d7eddc2e418f11096356be15e19 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal606b6d7eddc2e418f11096356be15e19 = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Icon::resolve(['name' => 'heroicon-c-arrow-path-rounded-square'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'size-5 text-xs']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal606b6d7eddc2e418f11096356be15e19)): ?>
<?php $attributes = $__attributesOriginal606b6d7eddc2e418f11096356be15e19; ?>
<?php unset($__attributesOriginal606b6d7eddc2e418f11096356be15e19); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal606b6d7eddc2e418f11096356be15e19)): ?>
<?php $component = $__componentOriginal606b6d7eddc2e418f11096356be15e19; ?>
<?php unset($__componentOriginal606b6d7eddc2e418f11096356be15e19); ?>
<?php endif; ?>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                    <span class="mr-auto text-left"><?php echo e($pertemuan->nama); ?></span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        class="size-5 transition-transform rotate-0 shrink-0"
                        x-bind:class="isExpanded ? 'rotate-180' : 'rotate-0'" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $pertemuan->menu_pertemuans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_pertemuan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!--[if BLOCK]><![endif]--><?php if($menu_pertemuan->parent_id == null): ?>
                        <ul class="ml-2" x-data="{ isExpanded1<?php echo e($menu_pertemuan->id); ?>: false }" x-cloak x-collapse
                            x-show="isExpanded<?php echo e($pertemuan->id); ?>" aria-labelledby="user-management-btn"
                            id="user-management">
                            <li x-on:click="isExpanded1<?php echo e($menu_pertemuan->id); ?> = ! isExpanded1<?php echo e($menu_pertemuan->id); ?>"
                                class="px-1 py-0.5 first:mt-2">
                                <a href="#"
                                    class="flex items-center rounded-lg gap-2 px-2 py-1.5 text-sm text-slate-700 underline-offset-2 hover:bg-green-500/5 hover:text-black focus:outline-hidden focus-visible:underline dark:text-slate-300 dark:hover:bg-blue-600/5 dark:hover:text-white"><?php echo e($menu_pertemuan->nama); ?></a>
                            </li>
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $menu_pertemuan->sub_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!--[if BLOCK]><![endif]--><?php if(!$submenu->master_soal == null): ?>
                                    <ul class="ml-2" x-cloak x-collapse x-show="isExpanded1<?php echo e($menu_pertemuan->id); ?>"
                                        aria-labelledby="user-management-btn" id="user-management">
                                        <li class="px-1 py-0.5 first:mt-2">
                                            <a href="<?php echo e(route('pembelajaran.master_soal', [$code_pembelajaran, $submenu->master_soal->id])); ?>"
                                                class="flex items-center rounded-lg gap-2 px-2 py-1.5 text-sm text-slate-700 underline-offset-2 hover:bg-green-500/5 hover:text-black focus:outline-hidden focus-visible:underline dark:text-slate-300 dark:hover:bg-blue-600/5 dark:hover:text-white"><?php echo e($submenu->nama); ?></a>
                                        </li>
                                    </ul>
                                <?php else: ?>
                                    <ul class="ml-2" x-cloak x-collapse x-show="isExpanded1<?php echo e($menu_pertemuan->id); ?>"
                                        aria-labelledby="user-management-btn" id="user-management">
                                        <li class="px-1 py-0.5 first:mt-2">
                                            <a
                                                class="flex items-center rounded-lg  gap-2 px-2 py-1.5 text-sm text-slate-700 underline-offset-2 hover:bg-green-500/5 hover:text-black focus:outline-hidden focus-visible:underline dark:text-slate-300 dark:hover:bg-blue-600/5 dark:hover:text-white"><?php echo e($submenu->nama); ?>

                                                ( Belum ada soal )</a>
                                        </li>
                                    </ul>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        </ul>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->


    </div>
</nav>
<?php /**PATH C:\website\pro2lms\resources\views/livewire/pages/mahasiswa/components/sidebar-pertemuan.blade.php ENDPATH**/ ?>