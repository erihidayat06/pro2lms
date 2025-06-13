<div x-data="{ sidebarIsOpen: false, sidebarMateri: false }" class="fixed flex w-full flex-col md:flex-row">
    <!-- This allows screen readers to skip the sidebar and go directly to the main content. -->
    <a class="sr-only" href="#main-content">skip to the main content</a>

    <!-- dark overlay for when the sidebar is open on smaller screens  -->
    <div x-cloak x-show="sidebarIsOpen" class="fixed inset-0 z-20 bg-slate-900/10 backdrop-blur-xs md:hidden"
        aria-hidden="true" x-on:click="sidebarIsOpen = false" x-transition.opacity></div>
    <div x-cloak x-show="sidebarMateri" class="fixed inset-0 z-10 bg-slate-900/10 backdrop-blur-xs md:hidden"
        aria-hidden="true" x-on:click="sidebarMateri = false" x-transition.opacity></div>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('pages.mahasiswa.components.sidebar-pertemuan', ['codePembelajaran' => $code_pembelajaran,'code_pembelajaran' => $code_pembelajaran]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2491584564-0', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('pages.mahasiswa.components.navbar-materi', ['codePembelajaran' => $code_pembelajaran,'code_pembelajaran' => $code_pembelajaran]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2491584564-1', $__slots ?? [], get_defined_vars());

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
                <div x-data="{
                    jam: $persist(0),
                    menit: $persist(0),
                    detik: $persist(20),
                    isLoad: $persist(false),
                    start_timer() {
                        $wire.dispatch('close-modal', 'popup-konfirmasi')
                        if (!this.isLoad) {
                            this.jam = $wire.jam
                            this.menit = $wire.menit
                            this.detik = $wire.detik
                            this.isLoad = true
                        }
                
                
                        var total = this.jam * 3600 + this.menit * 60 + this.detik;
                        setInterval(() => {
                            total--
                            if (total > 0) {
                                var jam = Math.floor(total / 3600)
                                var menit = Math.floor((total / 60) - (jam * 60))
                                var detik = total - ((jam * 3600) + (menit * 60))
                                var jamFix = jam < 10 ? `0${jam}` : jam
                                var menitFix = menit < 10 ? `0${menit}` : menit
                                var detikFix = detik < 10 ? `0${detik}` : detik
                
                                this.jam = jamFix
                                this.menit = menitFix
                                this.detik = detikFix
                
                            } else {
                                $wire.kirim_semua_jawaban()
                                this.isLoad = false
                            }
                        }, 1000)
                    }
                }">
                    <div class="flex flex-row text-sm ">
                        <div
                            class="flex w-full flex-col gap-4 rounded-md border border-gray-200 p-4 dark:border-gray-700 ">
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $main_soals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!--[if BLOCK]><![endif]--><?php if($value->index): ?>
                                    <div class="rounded-md bg-white p-2 text-xl font-bold"><?php echo e($value->index); ?>.
                                        <?php echo e($value->judul); ?></div>
                                    <!--[if BLOCK]><![endif]--><?php if($value->konten): ?>
                                        <div class="prose text-sm rounded-md border border-dashed bg-white p-2">
                                            <div class="konten-mahasiswa"><?php echo $value->konten; ?></div>

                                        </div>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                <ul class="flex list-decimal flex-col gap-3 rounded-md bg-white p-2 pl-5 md:pl-8">
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $value->soals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $soal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="prose text-sm"><?php echo $soal->pertanyaan; ?></li>

                                        
                                        <!--[if BLOCK]><![endif]--><?php if($is_sharing): ?>
                                            <div class="flex flex-col rounded-md border border-dashed p-2 mt-2">
                                                <p class="border-b text-sm font-semibold">Kunci Jawaban</p>
                                                <!--[if BLOCK]><![endif]--><?php if(!empty($soal->kunci_jawaban)): ?>
                                                    <div class="text-sm mt-2"><?php echo $soal->kunci_jawaban; ?></div>
                                                <?php else: ?>
                                                    <div class="text-red-500 text-sm mt-2">Kunci jawaban tidak tersedia
                                                    </div>
                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                            </div>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                        <!--[if BLOCK]><![endif]--><?php if($soal->type_soal == 'ganda'): ?>
                                            <ul>
                                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $soal->pilihan_jawabans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="flex flex-row items-center gap-2 cursor-pointer">
                                                        <input name="<?php echo e($soal->id); ?>" type="radio"
                                                            value="<?php echo e($option->id); ?>"
                                                            wire:model="pilihan_jawaban.<?php echo e($soal->id); ?>.pilihan_id">
                                                        <span><?php echo e($option->index); ?></span>.
                                                        <span><?php echo $option->jawaban; ?></span>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                            </ul>
                                            <!--[if BLOCK]><![endif]--><?php if($master_fix == false): ?>
                                                <!--[if BLOCK]><![endif]--><?php if(isset($pilihan_jawaban[$soal->id])): ?>
                                                    <div class="w-full cursor-pointer rounded-md bg-yellow-400 px-2 py-1 text-center text-white hover:bg-yellow-500 md:w-24"
                                                        wire:click='send_id_soal_update(<?php echo e($soal->id); ?>,1)'>
                                                        Ganti
                                                    </div>
                                                <?php else: ?>
                                                    <div class="w-full cursor-pointer rounded-md bg-emerald-400 px-2 py-1 text-center text-white hover:bg-emerald-500 md:w-24"
                                                        wire:click='send_id_soal(<?php echo e($soal->id); ?>,1)'>
                                                        Pilih
                                                    </div>
                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                            <?php else: ?>
                                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $jawaban_fixs[$soal->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jawaban): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="flex flex-row items-center gap-2">
                                                        <!--[if BLOCK]><![endif]--><?php if($jawaban['is_correct']): ?>
                                                            <div
                                                                class=" flex flex-col p-2 rounded-md border items-center">
                                                                <!--[if BLOCK]><![endif]--><?php if($jawaban['is_true']): ?>
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        fill="none" viewBox="0 0 24 24"
                                                                        stroke-width="1.5" stroke="currentColor"
                                                                        class="size-6 text-green-500">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="m4.5 12.75 6 6 9-13.5" />
                                                                    </svg>
                                                                <?php else: ?>
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        fill="none" viewBox="0 0 24 24"
                                                                        stroke-width="1.5" stroke="currentColor"
                                                                        class="size-6 text-red-500">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="M6 18 18 6M6 6l12 12" />
                                                                    </svg>
                                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                            </div>
                                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                                        <div class="flex flex-col rounded-md border border-dashed p-2">
                                                            <p class="border-b text-sm "> Jawaban anda
                                                            <p>
                                                                <!--[if BLOCK]><![endif]--><?php if($jawaban['jawaban'] == ''): ?>
                                                                    <div class="text-red-500">Tidak ada jawaban</div>
                                                                <?php else: ?>
                                                                    <div class="text-sm mt-2"><?php echo $jawaban['jawaban']; ?>

                                                                    </div>
                                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                        </div>
                                                    </div>

                                                    <!--[if BLOCK]><![endif]--><?php if($jawaban->is_fix): ?>
                                                        <div class="flex flex-col rounded-md border border-dashed p-2">
                                                            <p class="border-b text-sm "> Kunci Jawaban
                                                            <p>
                                                                <!--[if BLOCK]><![endif]--><?php if($soal->kunci_jawaban): ?>
                                                                    <div class="text-red-500 text-sm mt-2">Kunci jawaban
                                                                        tidak tersedia</div>
                                                                <?php else: ?>
                                                                    <div class="text-sm mt-2"><?php echo $soal->kunci_jawaban; ?>

                                                                    </div>
                                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                        </div>
                                                        <!--[if BLOCK]><![endif]--><?php if($jawaban->is_correct): ?>
                                                            <div class="flex flex-row items-center gap-2">
                                                                <div
                                                                    class=" flex flex-col p-2 rounded-md border items-center">
                                                                    <p class="border-b text-sm "> Bobot nilai
                                                                    <p>
                                                                    <p class="font-bold text-sm mt-2">
                                                                        <?php echo e($jawaban['bobot_nilai']); ?></p>
                                                                </div>
                                                                <div
                                                                    class="rounded-md border border-yellow-400 border-dashed p-2 ">
                                                                    <p class="border-b text-sm "> Feedback dosen
                                                                    <p>
                                                                    <div class="text-sm font-bold mt-2">
                                                                        <?php echo $jawaban['feedback_dosen'] ?? 'Tidak ada Feedback Dosen'; ?></div>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                        <?php else: ?>
                                            <!--[if BLOCK]><![endif]--><?php if($master_fix == false): ?>
                                                <div class="flex flex-col gap-2">
                                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = range(1, $soal->qty_jawaban); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index_jawaban): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <!--[if BLOCK]><![endif]--><?php if(isset($jawabans[$soal->id][$index_jawaban])): ?>
                                                            <div class="rounded-md border border-dashed p-2">

                                                                <div class="text-sm mt-2"><?php echo $jawabans[$soal->id][$index_jawaban]; ?></div>

                                                            </div>
                                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                                </div>
                                                <div class="flex flex-row gap-2">


                                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = range(1, $soal->qty_jawaban); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index_jawaban): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                            // Cek apakah jawaban untuk soal ini dan index_jawaban sudah is_fix
                                                            $jawaban_fix = collect($jawaban_all)->first(function (
                                                                $jawaban,
                                                            ) use ($soal, $index_jawaban) {
                                                                return $jawaban->soal_id == $soal->id &&
                                                                    $jawaban->index_jawaban == $index_jawaban &&
                                                                    $jawaban->is_fix;
                                                            });

                                                            // Cek apakah mahasiswa ini sudah pernah menjawab
                                                            $jawaban_mahasiswa = $jawaban_all->first(function (
                                                                $jawaban,
                                                            ) use ($soal, $index_jawaban) {
                                                                return $jawaban->soal_id == $soal->id &&
                                                                    $jawaban->index_jawaban == $index_jawaban &&
                                                                    $jawaban->mahasiswa_id ==
                                                                        Auth::user()->mahasiswa->id;
                                                            });
                                                        ?>

                                                        
                                                        <!--[if BLOCK]><![endif]--><?php if($jawaban_fix): ?>
                                                            <!--[if BLOCK]><![endif]--><?php if($soal->type_penyelesaian == 'kelompok'): ?>
                                                                <p>Soal kelompok sudah dijawab</p>
                                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                                            
                                                            <!--[if BLOCK]><![endif]--><?php if($jawaban_mahasiswa): ?>
                                                                <div
                                                                    class="flex flex-col rounded-md border border-dashed p-2">
                                                                    <p class="border-b text-sm">
                                                                        <?php echo e($soal->type_penyelesaian == 'kelompok' ? 'Jawaban Kelompok Anda' : 'Jawaban Anda'); ?>

                                                                    </p>
                                                                    <!--[if BLOCK]><![endif]--><?php if($jawaban_mahasiswa->jawaban == ''): ?>
                                                                        <div class="text-red-500">Tidak ada jawaban
                                                                        </div>
                                                                    <?php else: ?>
                                                                        <div class="text-sm mt-2">
                                                                            <?php echo $jawaban_mahasiswa->jawaban; ?></div>
                                                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                                </div>
                                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                        <?php else: ?>
                                                            
                                                            <!--[if BLOCK]><![endif]--><?php if($jawaban_mahasiswa): ?>
                                                                
                                                                <div class="w-full cursor-pointer rounded-md bg-yellow-400 px-2 py-1 text-center hover:bg-yellow-500 md:w-24"
                                                                    wire:click='send_id_soal_update(<?php echo e($soal->id); ?>, <?php echo e($index_jawaban); ?>)'>
                                                                    Ganti
                                                                    <?php echo e($index_jawaban > 1 ? $index_jawaban : ''); ?>

                                                                </div>
                                                            <?php else: ?>
                                                                
                                                                <div class="w-full cursor-pointer rounded-md bg-emerald-400 px-2 py-1 text-center text-white hover:bg-emerald-500 md:w-24"
                                                                    wire:click='send_id_soal(<?php echo e($soal->id); ?>, <?php echo e($index_jawaban); ?>)'>
                                                                    Jawab
                                                                    <?php echo e($index_jawaban > 1 ? $index_jawaban : ''); ?>

                                                                </div>
                                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->



                                                </div>
                                            <?php else: ?>
                                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $jawaban_fixs[$soal->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $jawaban): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="flex flex-row items-center gap-2">
                                                        <!--[if BLOCK]><![endif]--><?php if($jawaban['is_correct']): ?>
                                                            <div
                                                                class=" flex flex-col p-2 rounded-md border items-center">
                                                                <!--[if BLOCK]><![endif]--><?php if($jawaban['is_true']): ?>
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        fill="none" viewBox="0 0 24 24"
                                                                        stroke-width="1.5" stroke="currentColor"
                                                                        class="size-6 text-green-500">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="m4.5 12.75 6 6 9-13.5" />
                                                                    </svg>
                                                                <?php else: ?>
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        fill="none" viewBox="0 0 24 24"
                                                                        stroke-width="1.5" stroke="currentColor"
                                                                        class="size-6 text-red-500">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="M6 18 18 6M6 6l12 12" />
                                                                    </svg>
                                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                            </div>
                                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                                        <div class="flex flex-col rounded-md border border-dashed p-2">
                                                            <p class="border-b text-sm ">
                                                                <?php echo e($soal->type_penyelesaian == 'kelompok' ? 'Jawaban Kelompok anda' : 'Jawaban anda'); ?>

                                                            <p>
                                                                <!--[if BLOCK]><![endif]--><?php if($jawaban['jawaban'] == ''): ?>
                                                                    <div class="text-red-500">Tidak ada jawaban</div>
                                                                <?php else: ?>
                                                                    <div class="text-sm mt-2"><?php echo $jawaban['jawaban']; ?>

                                                                    </div>
                                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                        </div>
                                                    </div>
                                                    <!--[if BLOCK]><![endif]--><?php if($jawaban->is_fix): ?>
                                                        <div class="flex flex-col rounded-md border border-dashed p-2">
                                                            <p class="border-b text-sm "> Kunci Jawaban
                                                            <p>
                                                                <!--[if BLOCK]><![endif]--><?php if($soal['kunci_jawaban'] == ''): ?>
                                                                    <div class="text-red-500 text-sm mt-2">Kunci
                                                                        jawaban tidak tersedia</div>
                                                                <?php else: ?>
                                                                    <div class="text-sm mt-2"><?php echo $soal['kunci_jawaban']; ?>

                                                                    </div>
                                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                        </div>
                                                        <!--[if BLOCK]><![endif]--><?php if($jawaban->is_correct): ?>
                                                            <div class="flex flex-row items-center gap-2">
                                                                <div
                                                                    class=" flex flex-col p-2 rounded-md border items-center">
                                                                    <p class="border-b text-sm "> Bobot nilai
                                                                    <p>
                                                                    <p class="font-bold text-sm mt-2">
                                                                        <?php echo e($jawaban['bobot_nilai']); ?></p>
                                                                </div>
                                                                <div
                                                                    class="rounded-md border border-yellow-400 border-dashed p-2 ">
                                                                    <p class="border-b text-sm "> Feedback dosen
                                                                    <p>
                                                                    <div class="text-sm font-bold mt-2">
                                                                        <?php echo $jawaban['feedback_dosen'] ?? 'Tidak ada Feedback Dosen'; ?></div>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                        <!--[if BLOCK]><![endif]--><?php if($soal->type_penyelesaian == 'kelompok'): ?>
                                            <div class="flex md:justify-end">
                                                <button
                                                    class="flex w-full flex-row items-center gap-2 rounded bg-emerald-500 px-4 py-1 font-bold text-white hover:bg-emerald-700 md:w-64"
                                                    wire:click='chatDiskusi(<?php echo e($soal->id); ?>)'>
                                                    <svg class="icon icon-tabler icons-tabler-outline icon-tabler-brand-hipchat"
                                                        fill="none" height="24" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        stroke="currentColor" viewBox="0 0 24 24" width="24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M0 0h24v24H0z" fill="none" stroke="none" />
                                                        <path
                                                            d="M17.802 17.292s.077 -.055 .2 -.149c1.843 -1.425 3 -3.49 3 -5.789c0 -4.286 -4.03 -7.764 -9 -7.764c-4.97 0 -9 3.478 -9 7.764c0 4.288 4.03 7.646 9 7.646c.424 0 1.12 -.028 2.088 -.084c1.262 .82 3.104 1.493 4.716 1.493c.499 0 .734 -.41 .414 -.828c-.486 -.596 -1.156 -1.551 -1.416 -2.29z" />
                                                        <path d="M7.5 13.5c2.5 2.5 6.5 2.5 9 0" />
                                                    </svg>
                                                    <p>Diskusi dengan kelompok</p>
                                                </button>
                                            </div>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </ul>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            <div class="rounded-md bg-white p-2"><?php echo e($main_soals->links(data: ['scrollTo' => false])); ?>

                            </div>

                            <div class="flex flex-row justify-between gap-2 rounded-md bg-white md:justify-end md:p-2">
                                <button
                                    class="flex w-full flex-row items-center gap-2 rounded bg-emerald-500 px-4 py-1 font-bold text-white hover:bg-emerald-700 md:w-64"
                                    wire:click='chatDosen("<?php echo e($mahasiswa_id); ?>")'>
                                    <svg class="icon icon-tabler icons-tabler-outline icon-tabler-brand-hipchat"
                                        fill="none" height="24" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" width="24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 0h24v24H0z" fill="none" stroke="none" />
                                        <path
                                            d="M17.802 17.292s.077 -.055 .2 -.149c1.843 -1.425 3 -3.49 3 -5.789c0 -4.286 -4.03 -7.764 -9 -7.764c-4.97 0 -9 3.478 -9 7.764c0 4.288 4.03 7.646 9 7.646c.424 0 1.12 -.028 2.088 -.084c1.262 .82 3.104 1.493 4.716 1.493c.499 0 .734 -.41 .414 -.828c-.486 -.596 -1.156 -1.551 -1.416 -2.29z" />
                                        <path d="M7.5 13.5c2.5 2.5 6.5 2.5 9 0" />
                                    </svg>
                                    <p>Chat dosen</p>
                                </button>
                                <!--[if BLOCK]><![endif]--><?php if($master_fix == false): ?>
                                    <button
                                        class="flex w-full flex-row items-center gap-2 rounded bg-emerald-500 px-4 py-1 font-bold text-white hover:bg-emerald-700 md:w-64"
                                        wire:click='kirim_semua_jawaban'>
                                        <svg class="icon icon-tabler icons-tabler-outline icon-tabler-brand-telegram"
                                            fill="none" height="24" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                                            viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 0h24v24H0z" fill="none" stroke="none" />
                                            <path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4" />
                                        </svg>
                                        <p>Kirim Jawaban</p>
                                    </button>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </div>


                        </div>

                        <!--[if BLOCK]><![endif]--><?php if($show_timer): ?>
                            <div class="mt-14 hidden w-[30%] justify-center p-2 md:flex"></div>
                            <div class="fixed right-2 top-16 w-32 rounded-md bg-white shadow-md md:w-60 md:p-2">
                                <div class="flex w-full flex-col">
                                    <div class="flex flex-col items-center overflow-hidden rounded-md border">
                                        <div
                                            class="w-full bg-emerald-600 text-center text-sm text-white md:px-2 md:py-1 ">
                                            Timer
                                        </div>
                                        <div class="flex w-full flex-row items-center justify-center bg-white">
                                            <span x-text="jam" class="text-sm font-bold md:p-2 md:text-lg"></span>:
                                            <span x-text="menit" class="text-sm font-bold md:p-2 md:text-lg"></span>:
                                            <span x-text="detik" class="text-sm font-bold md:p-2 md:text-lg"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                    <?php if (isset($component)) { $__componentOriginal9f64f32e90b9102968f2bc548315018c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9f64f32e90b9102968f2bc548315018c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.modal','data' => ['show' => $errors->isNotEmpty(),'focusable' => true,'maxWidth' => '2xl','name' => 'jawab_soal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['show' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->isNotEmpty()),'focusable' => true,'maxWidth' => '2xl','name' => 'jawab_soal']); ?>
                        <form class="p-6" wire:submit="<?php echo e($updated ? 'jawabActionUpdated' : 'jawabAction'); ?>">

                            <h2 class="text-center text-lg font-medium uppercase text-gray-900 dark:text-gray-100">
                                <?php echo e(__('Kirim Jawaban')); ?>

                            </h2>

                            <div wire:ignore>
                                <textarea class="" id="jawab_soal" wire:model=''></textarea>

                            </div>
                            <div class="mt-6 flex justify-end">
                                <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['wire:click' => 'closeModal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'closeModal']); ?>
                                    <?php echo e(__('Cancel')); ?>

                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af)): ?>
<?php $attributes = $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af; ?>
<?php unset($__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3b0e04e43cf890250cc4d85cff4d94af)): ?>
<?php $component = $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af; ?>
<?php unset($__componentOriginal3b0e04e43cf890250cc4d85cff4d94af); ?>
<?php endif; ?>

                                <?php if (isset($component)) { $__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.danger-button','data' => ['class' => 'ms-3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('danger-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ms-3']); ?>
                                    <?php echo e($updated ? 'Update' : 'Submit'); ?>

                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11)): ?>
<?php $attributes = $__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11; ?>
<?php unset($__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11)): ?>
<?php $component = $__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11; ?>
<?php unset($__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11); ?>
<?php endif; ?>
                            </div>
                        </form>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9f64f32e90b9102968f2bc548315018c)): ?>
<?php $attributes = $__attributesOriginal9f64f32e90b9102968f2bc548315018c; ?>
<?php unset($__attributesOriginal9f64f32e90b9102968f2bc548315018c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9f64f32e90b9102968f2bc548315018c)): ?>
<?php $component = $__componentOriginal9f64f32e90b9102968f2bc548315018c; ?>
<?php unset($__componentOriginal9f64f32e90b9102968f2bc548315018c); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginaleb8c89a7efda50450a3a76fb82e931fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleb8c89a7efda50450a3a76fb82e931fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popup','data' => ['show' => $show_timer,'focusable' => true,'name' => 'popup-konfirmasi']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['show' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($show_timer),'focusable' => true,'name' => 'popup-konfirmasi']); ?>
                        <div class="m-4 flex flex-col items-center justify-center gap-4">
                            <p>Apakah anda sudah siap untuk mengerjakan soal?
                            <p>
                            <div class="flex flex-row gap-2">
                                <button class="rounded-md bg-red-600 px-2 py-1 text-white"
                                    wire:click="konfirmasi_tolak">Tidak</button>
                                <button class="rounded-md bg-emerald-600 px-5 py-1 text-white"
                                    @click="start_timer">Ya</button>
                            </div>

                        </div>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaleb8c89a7efda50450a3a76fb82e931fd)): ?>
<?php $attributes = $__attributesOriginaleb8c89a7efda50450a3a76fb82e931fd; ?>
<?php unset($__attributesOriginaleb8c89a7efda50450a3a76fb82e931fd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleb8c89a7efda50450a3a76fb82e931fd)): ?>
<?php $component = $__componentOriginaleb8c89a7efda50450a3a76fb82e931fd; ?>
<?php unset($__componentOriginaleb8c89a7efda50450a3a76fb82e931fd); ?>
<?php endif; ?>

                </div>

                <?php $__env->startPush('scripts'); ?>
                    <script>
                        var editor_config = {
                            path_absolute: "/",
                            selector: '#jawab_soal',
                            relative_urls: false,
                            plugins: [
                                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                                "searchreplace wordcount visualblocks visualchars code fullscreen",
                                "insertdatetime media nonbreaking save table directionality",
                                "emoticons template paste textpattern"
                            ],
                            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | rumus",
                            setup: (editor) => {
                                editor.on('init change', function() {
                                    editor.save();
                                });
                                editor.on('change', function(e) {
                                    let id = window.Livewire.find('<?php echo e($_instance->getId()); ?>').id_soal
                                    let index = window.Livewire.find('<?php echo e($_instance->getId()); ?>').index_jawaban
                                    window.Livewire.find('<?php echo e($_instance->getId()); ?>').set(`jawabans.${id}.${index}`, editor.getContent());
                                });

                                editor.ui.registry.addMenuButton('rumus', {
                                    text: 'Rumus',
                                    icon: 'math',
                                    fetch: (callback) => {
                                        const items = [{
                                                type: 'menuitem',
                                                text: 'Penjumlahan',
                                                onAction: () => {
                                                    editor.insertContent('\\( a + b \\)');
                                                }
                                            },
                                            {
                                                type: 'menuitem',
                                                text: 'Pengurangan',
                                                onAction: () => {
                                                    editor.insertContent('\\( a - b \\)');
                                                }
                                            },
                                            {
                                                type: 'menuitem',
                                                text: 'Perkalian',
                                                onAction: () => {
                                                    editor.insertContent('\\( a \\times b \\)');
                                                }
                                            },
                                            {
                                                type: 'menuitem',
                                                text: 'Pembagian',
                                                onAction: () => {
                                                    editor.insertContent('\\( \\frac{a}{b} \\)');
                                                }
                                            },
                                            {
                                                type: 'menuitem',
                                                text: 'Persamaan Kuadrat',
                                                onAction: () => {
                                                    editor.insertContent(
                                                        '\\( x = \\frac{-b \\pm \\sqrt{b^2 - 4ac}}{2a} \\)');
                                                }
                                            },
                                            {
                                                type: 'menuitem',
                                                text: 'Integral x²',
                                                onAction: () => {
                                                    editor.insertContent(
                                                        '\\( \\int x^2 \\, dx = \\frac{1}{3}x^3 + C \\)');
                                                }
                                            },
                                            {
                                                type: 'menuitem',
                                                text: 'Limit sin(x)/x',
                                                onAction: () => {
                                                    editor.insertContent(
                                                        '\\( \\lim_{x \\to 0} \\frac{\\sin x}{x} = 1 \\)');
                                                }
                                            },
                                            {
                                                type: 'menuitem',
                                                text: 'Turunan f(x) = xⁿ',
                                                onAction: () => {
                                                    editor.insertContent('\\( \\frac{d}{dx}x^n = nx^{n-1} \\)');
                                                }
                                            },
                                            {
                                                type: 'menuitem',
                                                text: 'Teorema Pythagoras',
                                                onAction: () => {
                                                    editor.insertContent('\\( a^2 + b^2 = c^2 \\)');
                                                }
                                            }
                                        ];
                                        callback(items);
                                    }
                                });

                                // Fungsi render ulang MathJax di iframe editor
                                function renderMathInEditor() {
                                    const iframe = document.querySelector('iframe.tox-edit-area__iframe');
                                    const iframeDoc = iframe?.contentDocument;
                                    if (iframeDoc && iframe.contentWindow.MathJax) {
                                        iframe.contentWindow.MathJax.typesetPromise([iframeDoc.body]);
                                    }
                                }
                            },

                            file_picker_callback: function(callback, value, meta) {
                                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
                                    'body')[0].clientWidth;
                                var y = window.innerHeight || document.documentElement.clientHeight || document
                                    .getElementsByTagName('body')[0].clientHeight;

                                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
                                if (meta.filetype == 'image') {
                                    cmsURL = cmsURL + "&type=Images";
                                } else {
                                    cmsURL = cmsURL + "&type=Files";
                                }

                                tinyMCE.activeEditor.windowManager.openUrl({
                                    url: cmsURL,
                                    title: 'Filemanager',
                                    width: x * 0.8,
                                    height: y * 0.8,
                                    resizable: "yes",
                                    close_previous: "no",
                                    onMessage: (api, message) => {
                                        callback(message.content);
                                    }
                                });
                            }
                        };

                        tinymce.init(editor_config);
                        window.addEventListener('hapus-textarea', event => {
                            tinymce.get("jawab_soal").setContent("");
                        })
                        window.addEventListener('set-textarea', event => {
                            tinymce.get("jawab_soal").setContent(event.detail.jawaban);

                        })
                    </script>
                    <script>
                        window.MathJax = {
                            tex: {
                                inlineMath: [
                                    ['\\(', '\\)']
                                ]
                            },
                            svg: {
                                fontCache: 'global'
                            }
                        };
                    </script>
                    <script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-svg.js" defer></script>

                    <script>
                        // function startTimer(jam, menit, detik) {

                        //     var total = jam * 3600 + menit * 60 + detik

                        //     setInterval(() => {

                        //         total--

                        //         if (total > 0) {

                        //             var showJam = document.getElementById("jam");
                        //             var showMenit = document.getElementById("menit");
                        //             var showDetik = document.getElementById("detik");

                        //             var jam = Math.floor(total / 3600)
                        //             var menit = Math.floor((total / 60) - (jam * 60))
                        //             var detik = total - ((jam * 3600) + (menit * 60))

                        //             var jamFix = jam < 10 ? `0${jam}` : jam
                        //             var menitFix = menit < 10 ? `0${menit}` : menit
                        //             var detikFix = detik < 10 ? `0${detik}` : detik

                        //             // window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('jam', jam);
                        //             this.jamLoad = jam
                        //             this.menitLoad = menit
                        //             this.menitLoad = detik
                        //             // window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('menit', menit);
                        //             // window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('detik', detik);

                        //             Livewire.dispatch('waktu_aktif', 'popup-konfirmasi')

                        //             showJam.innerHTML = jamFix
                        //             showMenit.innerHTML = menitFix
                        //             showDetik.innerHTML = detikFix

                        //         } else {
                        //             Livewire.dispatch('waktu_selesai', )
                        //         }

                        //     }, 1000)

                        // }
                    </script>
                <?php $__env->stopPush(); ?>

            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\website\pro2lms\resources\views/livewire/pages/mahasiswa/master-soal.blade.php ENDPATH**/ ?>