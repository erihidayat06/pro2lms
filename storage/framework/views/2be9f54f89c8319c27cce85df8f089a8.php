<nav class="sticky top-0 z-10 flex items-center justify-between border-b border-slate-300 bg-slate-100 px-6 py-2 dark:border-slate-700 dark:bg-slate-800" aria-label="top navibation bar">

    <!-- sidebar toggle button for small screens  -->
    <button type="button" class="md:hidden inline-block text-slate-700 dark:text-slate-300" x-on:click="sidebarIsOpen = true">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-5" aria-hidden="true">
            <path d="M0 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5-1v12h9a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1zM4 2H2a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h2z"/>
        </svg>
        <span class="sr-only">sidebar toggle</span>
    </button>
    <!-- Navbars Materi on Desktop  -->
    <div class="justify-end hidden md:flex  flex-row gap-2 w-full">
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $navbars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $navbar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!--[if BLOCK]><![endif]--><?php if($navbar->master_materi): ?>
                <a href="<?php echo e(route('pembelajaran.master_materi', [$code_pembelajaran, $navbar->master_materi->id])); ?>" type="button" class="flex items-center rounded-lg gap-2 p-2 text-left text-slate-700 hover:bg-green-500/5 hover:text-black focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-500 dark:text-slate-300 dark:hover:bg-blue-600/5 dark:hover:text-white dark:focus-visible:outline-blue-600" x-bind:class="menuDropdownIsOpen<?php echo e($navbar->id); ?> ? 'bg-green-500/10 dark:bg-blue-600/10' : ''" aria-haspopup="true" x-on:click="menuDropdownIsOpen<?php echo e($navbar->id); ?> = ! menuDropdownIsOpen<?php echo e($navbar->id); ?>" x-bind:aria-expanded="menuDropdownIsOpen<?php echo e($navbar->id); ?>">
                    <div class="flex flex-row gap-2 items-center">
                        <!--[if BLOCK]><![endif]--><?php if($navbar->icon): ?>
                        <?php if (isset($component)) { $__componentOriginal606b6d7eddc2e418f11096356be15e19 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal606b6d7eddc2e418f11096356be15e19 = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Icon::resolve(['name' => ''.e($navbar->icon).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                        <span class="text-sm font-bold text-black dark:text-white"><?php echo e($navbar->nama); ?></span>
                    </div>
                </a>  
            <?php else: ?>
             <div x-data="{ menuDropdownIsOpen<?php echo e($navbar->id); ?>: false }" class="relative " x-on:keydown.esc.window="menuDropdownIsOpen = false">
                <button type="button" class="text-sm font-bold text-black dark:text-white flex items-center rounded-lg gap-2 p-2 text-left  hover:bg-green-500/5 hover:text-black focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-500  dark:hover:bg-blue-600/5 dark:hover:text-white dark:focus-visible:outline-blue-600" x-bind:class="menuDropdownIsOpen<?php echo e($navbar->id); ?> ? 'bg-green-500/10 dark:bg-blue-600/10' : ''" aria-haspopup="true" x-on:click="menuDropdownIsOpen<?php echo e($navbar->id); ?> = ! menuDropdownIsOpen<?php echo e($navbar->id); ?>" x-bind:aria-expanded="menuDropdownIsOpen<?php echo e($navbar->id); ?>">
                    <div class="flex flex-row gap-2 items-center">
                        <!--[if BLOCK]><![endif]--><?php if($navbar->icon): ?>
                        <?php if (isset($component)) { $__componentOriginal606b6d7eddc2e418f11096356be15e19 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal606b6d7eddc2e418f11096356be15e19 = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Icon::resolve(['name' => ''.e($navbar->icon).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                        <span><?php echo e($navbar->nama); ?></span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 transition-transform rotate-0 shrink-0" x-bind:class="isExpanded<?php echo e($navbar->id); ?> ? 'rotate-180' : 'rotate-0'" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
                    </svg>
                </button>  
            <!-- menu -->
                <div x-cloak x-show="menuDropdownIsOpen<?php echo e($navbar->id); ?>" class="absolute top-14 right-0 z-20 h-fit w-48 border divide-y divide-slate-300 border-slate-300 bg-white dark:divide-slate-700 dark:border-slate-700 dark:bg-slate-900 rounded-lg" role="menu" x-on:click.outside="menuDropdownIsOpen<?php echo e($navbar->id); ?> = false" x-on:keydown.down.prevent="$focus.wrap().next()" x-on:keydown.up.prevent="$focus.wrap().previous()" x-transition="" x-trap="menuDropdownIsOpen<?php echo e($navbar->id); ?>">
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $navbar->menu_navbars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_navbar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!--[if BLOCK]><![endif]--><?php if($menu_navbar->master_materi): ?>
                        <div class="flex flex-col py-1.5">
                            <a href="<?php echo e(route('pembelajaran.master_materi', [$code_pembelajaran, $menu_navbar->master_materi->id])); ?>" class="flex items-center gap-2 px-2 py-1.5 text-sm font-medium text-slate-700 underline-offset-2 hover:bg-green-500/5 hover:text-black focus-visible:underline focus:outline-hidden dark:text-slate-300 dark:hover:bg-blue-600/5 dark:hover:text-white" role="menuitem">
                                <!--[if BLOCK]><![endif]--><?php if($menu_navbar->icon): ?>
                                <?php if (isset($component)) { $__componentOriginal606b6d7eddc2e418f11096356be15e19 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal606b6d7eddc2e418f11096356be15e19 = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Icon::resolve(['name' => ''.e($menu_navbar->icon).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                                <span><?php echo e($menu_navbar->nama); ?></span>
                            </a>
                        </div>
                        <?php else: ?>   
                            <div  x-data="{ menuDropdownIsOpen1<?php echo e($menu_navbar->id); ?>: false }" class="relative " x-on:keydown.esc.window="menuDropdownIsOpen1<?php echo e($menu_navbar->id); ?> = false" class="flex flex-col py-1.5">
                                <a x-bind:class="menuDropdownIsOpen1<?php echo e($menu_navbar->id); ?> ? 'bg-green-500/10 dark:bg-blue-600/10' : ''" aria-haspopup="true" x-on:click="menuDropdownIsOpen1<?php echo e($menu_navbar->id); ?> = ! menuDropdownIsOpen1<?php echo e($menu_navbar->id); ?>" x-bind:aria-expanded="menuDropdownIsOpen1<?php echo e($menu_navbar->id); ?>" class="flex w-full items-center justify-between gap-2 px-2 py-1.5 text-sm font-medium text-slate-700 underline-offset-2 hover:bg-green-500/5 hover:text-black focus-visible:underline focus:outline-hidden dark:text-slate-300 dark:hover:bg-blue-600/5 dark:hover:text-white" role="menuitem">
                                    <div class="flex flex-row gap-2 items-center">
                                        <!--[if BLOCK]><![endif]--><?php if($menu_navbar->icon): ?>
                                        <?php if (isset($component)) { $__componentOriginal606b6d7eddc2e418f11096356be15e19 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal606b6d7eddc2e418f11096356be15e19 = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Icon::resolve(['name' => ''.e($menu_navbar->icon).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                                        <span><?php echo e($menu_navbar->nama); ?></span>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 transition-transform rotate-0 shrink-0" x-bind:class="isExpanded<?php echo e($navbar->id); ?> ? 'rotate-180' : 'rotate-0'" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
                                    </svg>
                                </a>
                                <div x-cloak x-show="menuDropdownIsOpen1<?php echo e($menu_navbar->id); ?>" x-on:click.outside="menuDropdownIsOpen1<?php echo e($menu_navbar->id); ?> = false" x-on:keydown.down.prevent="$focus.wrap().next()" x-on:keydown.up.prevent="$focus.wrap().previous()" x-transition="" x-trap="menuDropdownIsOpen1<?php echo e($menu_navbar->id); ?>">
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $menu_navbar->sub_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <!--[if BLOCK]><![endif]--><?php if($submenu->master_materi): ?>
                                            <div class="flex flex-col py-1.5">
                                                <a href="<?php echo e(route('pembelajaran.master_materi', [$code_pembelajaran, $submenu->master_materi->id])); ?>" class="flex items-center gap-2 px-2 py-1.5 text-sm font-medium text-slate-700 underline-offset-2 hover:bg-green-500/5 hover:text-black focus-visible:underline focus:outline-hidden dark:text-slate-300 dark:hover:bg-blue-600/5 dark:hover:text-white" role="menuitem">
                                                    <!--[if BLOCK]><![endif]--><?php if($submenu->icon): ?>
                                                    <?php if (isset($component)) { $__componentOriginal606b6d7eddc2e418f11096356be15e19 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal606b6d7eddc2e418f11096356be15e19 = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Icon::resolve(['name' => ''.e($submenu->icon).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                                                    <span><?php echo e($submenu->nama); ?></span>
                                                </a>
                                            </div> 
                                        <?php else: ?>
                                        <div class="flex flex-col py-1.5">
                                            <a  class="flex items-center gap-2 px-2 py-1.5 text-sm font-medium text-slate-700 underline-offset-2 hover:bg-green-500/5 hover:text-black focus-visible:underline focus:outline-hidden dark:text-slate-300 dark:hover:bg-blue-600/5 dark:hover:text-white" role="menuitem">
                                                <!--[if BLOCK]><![endif]--><?php if($submenu->icon): ?>
                                                <?php if (isset($component)) { $__componentOriginal606b6d7eddc2e418f11096356be15e19 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal606b6d7eddc2e418f11096356be15e19 = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Icon::resolve(['name' => ''.e($submenu->icon).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                                                <span><?php echo e($submenu->nama); ?> ( Belum ada materi )</span>
                                            </a>
                                        </div>    
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                      
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                   
                                </div>
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                   
                </div>
            </div>   
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
      
    </div>
     <!-- Navbars Materi on Mobile  -->
    <div class="justify-end md:hidden flex-row gap-2 w-full flex ">
        <button type="button" class="md:hidden inline-block text-slate-700 dark:text-slate-300" x-on:click="sidebarMateri = true">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <span class="sr-only">navbar toggle</span>
        </button>
        <div x-cloak class="fixed top-0 right-0 z-50 flex h-svh w-60 shrink-0 gap-2 flex-col border-l border-slate-300 bg-slate-100 p-4 transition-transform duration-300  translate-x-0 md:relative dark:border-slate-700 dark:bg-slate-800" x-bind:class="sidebarMateri ? 'translate-x-0' : 'translate-x-60'" >
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $navbars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $navbar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!--[if BLOCK]><![endif]--><?php if($navbar->master_materi): ?>
                    <div class="flex flex-col">
                        <a href="<?php echo e(route('pembelajaran.master_materi', [$code_pembelajaran, $navbar->master_materi->id])); ?>" type="button"id="user-management-btn" aria-controls="<?php echo e($navbar->id); ?>" x-bind:aria-expanded="isExpanded ? 'true' : 'false'" class="flex items-center justify-between rounded-lg gap-2 px-2 py-1.5 text-sm font-medium underline-offset-2 focus:outline-hidden focus-visible:underline" x-bind:class="isExpanded ? 'text-black bg-blue-700/10 dark:text-white dark:bg-blue-600/10' :  'text-slate-700 hover:bg-blue-700/5 hover:text-black dark:text-slate-300 dark:hover:text-white dark:hover:bg-blue-600/5'">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 shrink-0" aria-hidden="true">
                                <path d="M7 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM14.5 9a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5ZM1.615 16.428a1.224 1.224 0 0 1-.569-1.175 6.002 6.002 0 0 1 11.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 0 1 7 18a9.953 9.953 0 0 1-5.385-1.572ZM14.5 16h-.106c.07-.297.088-.611.048-.933a7.47 7.47 0 0 0-1.588-3.755 4.502 4.502 0 0 1 5.874 2.636.818.818 0 0 1-.36.98A7.465 7.465 0 0 1 14.5 16Z"/>
                            </svg>
                            <span class="mr-auto text-left"><?php echo e($navbar->nama); ?></span>
                        </a>
                    </div>
                <?php else: ?>
                <div x-data="{ isExpanded<?php echo e($navbar->id); ?>: false }" class="flex flex-col gap-2">
                    <button type="button" x-on:click="isExpanded<?php echo e($navbar->id); ?> = ! isExpanded<?php echo e($navbar->id); ?>" id="user-management-btn" aria-controls="user-management" x-bind:aria-expanded="isExpanded<?php echo e($navbar->id); ?> ? 'true' : 'false'" class="flex items-center justify-between rounded-lg gap-2 px-2 py-1.5 text-sm font-medium underline-offset-2 focus:outline-hidden focus-visible:underline" x-bind:class="isExpanded<?php echo e($navbar->id); ?> ? 'text-black bg-blue-700/10 dark:text-white dark:bg-blue-600/10' :  'text-slate-700 hover:bg-blue-700/5 hover:text-black dark:text-slate-300 dark:hover:text-white dark:hover:bg-blue-600/5'">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 shrink-0" aria-hidden="true">
                            <path d="M7 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM14.5 9a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5ZM1.615 16.428a1.224 1.224 0 0 1-.569-1.175 6.002 6.002 0 0 1 11.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 0 1 7 18a9.953 9.953 0 0 1-5.385-1.572ZM14.5 16h-.106c.07-.297.088-.611.048-.933a7.47 7.47 0 0 0-1.588-3.755 4.502 4.502 0 0 1 5.874 2.636.818.818 0 0 1-.36.98A7.465 7.465 0 0 1 14.5 16Z"/>
                        </svg>
                        <span class="mr-auto text-left"><?php echo e($navbar->nama); ?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 transition-transform rotate-0 shrink-0" x-bind:class="isExpanded<?php echo e($navbar->id); ?> ? 'rotate-180' : 'rotate-0'" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                    <ul class="ml-2" x-cloak x-collapse x-show="isExpanded<?php echo e($navbar->id); ?>" aria-labelledby="<?php echo e($navbar->id); ?>" id="<?php echo e($navbar->id); ?>">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $navbar->menu_navbars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_navbar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <!--[if BLOCK]><![endif]--><?php if($menu_navbar->master_materi ): ?>
                                <li class="px-1 py-0.5 first:mt-2">
                                    <a href="<?php echo e(route('pembelajaran.master_materi', [$code_pembelajaran, $menu_navbar->master_materi->id])); ?>" class="flex items-center rounded-lg gap-2 px-2 py-1.5 text-sm text-slate-700 underline-offset-2 hover:bg-blue-700/5 hover:text-black focus:outline-hidden focus-visible:underline dark:text-slate-300 dark:hover:bg-blue-600/5 dark:hover:text-white"><?php echo e($menu_navbar->nama); ?></a>
                                </li>
                            <?php else: ?>
                            <div x-data="{ isExpanded1<?php echo e($menu_navbar->id); ?>: false }" class="flex flex-col">
                                <button type="button" x-on:click="isExpanded1<?php echo e($menu_navbar->id); ?> = ! isExpanded1<?php echo e($menu_navbar->id); ?>" id="<?php echo e($menu_navbar->id); ?>" aria-controls="<?php echo e($menu_navbar->id); ?>" x-bind:aria-expanded="isExpanded1<?php echo e($menu_navbar->id); ?> ? 'true' : 'false'" class="flex items-center justify-between rounded-lg gap-2 px-2 py-1.5 text-sm font-medium underline-offset-2 focus:outline-hidden focus-visible:underline" x-bind:class="isExpanded1<?php echo e($menu_navbar->id); ?> ? 'text-black bg-blue-700/10 dark:text-white dark:bg-blue-600/10' :  'text-slate-700 hover:bg-blue-700/5 hover:text-black dark:text-slate-300 dark:hover:text-white dark:hover:bg-blue-600/5'">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 shrink-0" aria-hidden="true">
                                        <path d="M7 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM14.5 9a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5ZM1.615 16.428a1.224 1.224 0 0 1-.569-1.175 6.002 6.002 0 0 1 11.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 0 1 7 18a9.953 9.953 0 0 1-5.385-1.572ZM14.5 16h-.106c.07-.297.088-.611.048-.933a7.47 7.47 0 0 0-1.588-3.755 4.502 4.502 0 0 1 5.874 2.636.818.818 0 0 1-.36.98A7.465 7.465 0 0 1 14.5 16Z"/>
                                    </svg>
                                    <span class="mr-auto text-left"><?php echo e($menu_navbar->nama); ?></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 transition-transform rotate-0 shrink-0" x-bind:class="isExpanded1<?php echo e($menu_navbar->id); ?> ? 'rotate-180' : 'rotate-0'" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
                                    </svg>
                                </button>
                                <ul x-cloak x-collapse x-show="isExpanded1<?php echo e($menu_navbar->id); ?>" aria-labelledby="<?php echo e($menu_navbar->id); ?>" id="<?php echo e($menu_navbar->id); ?>">
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $menu_navbar->sub_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <!--[if BLOCK]><![endif]--><?php if($submenu->master_materi): ?>
                                        <li class="px-1 py-0.5 first:mt-2">
                                            <a href="<?php echo e(route('pembelajaran.master_materi', [$code_pembelajaran, $submenu->master_materi->id])); ?>" class="flex items-center rounded-lg gap-2 px-2 py-1.5 text-sm text-slate-700 underline-offset-2 hover:bg-blue-700/5 hover:text-black focus:outline-hidden focus-visible:underline dark:text-slate-300 dark:hover:bg-blue-600/5 dark:hover:text-white"><?php echo e($submenu->nama); ?></a>
                                        </li>
                                        <?php else: ?>
                                        <li class="px-1 py-0.5 first:mt-2">
                                            <a class="flex items-center rounded-lg gap-2 px-2 py-1.5 text-sm text-slate-700 underline-offset-2 hover:bg-blue-700/5 hover:text-black focus:outline-hidden focus-visible:underline dark:text-slate-300 dark:hover:bg-blue-600/5 dark:hover:text-white"><?php echo e($submenu->nama); ?> ( Belum ada materi)</a>
                                        </li>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </ul>
                            </div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </ul>
                </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    </div>
  
</nav>
<?php /**PATH C:\website\pro2lms\resources\views/livewire/pages/mahasiswa/components/navbar-materi.blade.php ENDPATH**/ ?>