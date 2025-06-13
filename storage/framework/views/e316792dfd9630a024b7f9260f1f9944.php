<div x-data="{ sidebarIsOpen: false }" class="fixed flex w-full flex-col md:flex-row">
    <!-- This allows screen readers to skip the sidebar and go directly to the main content. -->
    <a class="sr-only" href="#main-content">skip to the main content</a>

    <!-- dark overlay for when the sidebar is open on smaller screens  -->
    <div x-cloak x-show="sidebarIsOpen" class="fixed inset-0 z-20 bg-slate-900/10 backdrop-blur-xs md:hidden"
        aria-hidden="true" x-on:click="sidebarIsOpen = false" x-transition.opacity></div>

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('pages.mahasiswa.components.sidebar-pertemuan', ['codePembelajaran' => $code_pembelajaran,'code_pembelajaran' => $code_pembelajaran]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1933150674-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

    <!-- top navbar & main content  -->
    <div class="h-svh w-full overflow-y-auto bg-white dark:bg-slate-900">
        <!-- top navbar  -->
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('pages.mahasiswa.components.navbar-mahasiswa', ['codePembelajaran' => $code_pembelajaran,'code_pembelajaran' => $code_pembelajaran]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1933150674-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        <!-- main content  -->
        <div id="main-content" class="p-4">
            <div class="overflow-y-auto">
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('pages.widgets.pertemuan-mahasiswa-overview', ['codePembelajaran' => $code_pembelajaran,'code_pembelajaran' => $code_pembelajaran]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1933150674-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            </div>
        </div>
    </div>


</div>
<?php /**PATH D:\MY PROJEK\HERD\CLIENT\pro2lms\resources\views/livewire/pages/mahasiswa/dashboard-pertemuan.blade.php ENDPATH**/ ?>