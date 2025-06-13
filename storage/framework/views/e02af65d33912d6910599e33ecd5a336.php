<div class="flex h-screen flex-col items-center justify-center gap-2">
    <!--[if BLOCK]><![endif]--><?php if(auth()->user()->dosen): ?>
        <p> Halo <?php echo e(auth()->user()->dosen->nama); ?>,</p>
        <p>Silahkan masuk dashboard dosen</p>
        <button class="rounded-md bg-emerald-500 px-2 shadow-md hover:bg-emerald-400" wire:click='masuk_dosen'>Masuk</button>
    <?php else: ?>
        <p> Halo <?php echo e(auth()->user()->mahasiswa->nama); ?>,</p>
        <p>Silahkan masuk dashboard mahasiswa</p>
        <button class="rounded-md bg-emerald-500 px-2 shadow-md hover:bg-emerald-400" wire:click='masuk_mahasiswa'>Masuk</button>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div><?php /**PATH D:\MY PROJEK\HERD\CLIENT\pro2lms\resources\views\livewire/welcome-auth.blade.php ENDPATH**/ ?>