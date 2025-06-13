<div>
    <div class="flex h-screen flex-col p-4">
        <!--[if BLOCK]><![endif]--><?php if(auth()->user()->mahasiswa): ?>
            <a aria-current="page"
                class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                href="<?php echo e(route('pembelajaran.master_soal', [$pembelajaran->code, $this->master_soal_id])); ?>">
                <svg class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left" fill="none" height="24"
                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                    viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 0h24v24H0z" fill="none" stroke="none" />
                    <path d="M15 6l-6 6l6 6" />
                </svg>
                <span class="ms-3 flex-1 whitespace-nowrap">Kembali ke Master Soal</span>
            </a>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <div class="mb-52 mt-2 flex flex-col gap-2 overflow-y-scroll" wire:poll.visible>
            <div class="flex items-start gap-2.5">
                <div class="leading-1.5 flex w-full flex-col rounded-md border-gray-200 bg-white dark:bg-gray-700">
                    <div class="p-2 text-sm font-normal text-gray-900 dark:text-white">
                        <?php echo $soal->pertanyaan; ?>

                    </div>
                </div>
            </div>
            <!--[if BLOCK]><![endif]--><?php if($diskusi_kelompok->chat_diskusi_kelompoks): ?>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $diskusi_kelompok->chat_diskusi_kelompoks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!--[if BLOCK]><![endif]--><?php if($value->pengirim_id == auth()->user()->id): ?>
                        <div class="flex items-start gap-2.5" dir="rtl">
                            <div
                                class="leading-1.5 flex flex-col rounded-e-xl rounded-es-xl border-gray-200 bg-emerald-400 p-4 dark:bg-gray-700">
                                <!--[if BLOCK]><![endif]--><?php if($value->parent): ?>
                                    <div class="rounded-md border-l-2 border-emerald-200 bg-gray-200 p-2">
                                        <span class="text-sm font-semibold text-gray-900 dark:text-white">
                                            <?php echo e($value->parent->pengirim->mahasiswa ? $value->parent->pengirim->mahasiswa->nama : $value->parent->pengirim->dosen->nama); ?>

                                        </span>
                                        <div class="p-2">
                                            <?php echo $value->parent->isi_pesan; ?>

                                        </div>
                                    </div>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                    <span class="text-sm font-semibold text-gray-900 dark:text-white">Anda |
                                        <?php echo e(auth()->user()->mahasiswa ? auth()->user()->mahasiswa->nama : auth()->user()->dosen->nama); ?></span>
                                    <span
                                        class="text-sm font-normal text-gray-200 dark:text-gray-400"><?php echo e($value->created_at); ?></span>
                                </div>
                                <div class="py-2.5 text-sm font-normal text-white">
                                    <?php echo $value->isi_pesan; ?>

                                </div>

                            </div>
                        </div>
                    <?php else: ?>
                        <div class="flex items-start gap-2.5">

                            <div
                                class="leading-1.5 flex flex-col rounded-e-xl rounded-es-xl border-gray-200 bg-white p-2 dark:bg-gray-700">

                                <!--[if BLOCK]><![endif]--><?php if($value->parent): ?>
                                    <div class="rounded-md border-l-2 border-emerald-700 bg-gray-200 p-2">
                                        <span class="text-sm font-semibold text-gray-900 dark:text-white">
                                            <?php echo e($value->parent->pengirim->mahasiswa ? $value->parent->pengirim->mahasiswa->nama : $value->parent->pengirim->dosen->nama); ?>

                                        </span>
                                        <div class="p-2">
                                            <?php echo $value->parent->isi_pesan; ?>

                                        </div>
                                    </div>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                    <span
                                        class="text-sm font-semibold text-gray-900 dark:text-white"><?php echo e($value->pengirim->mahasiswa ? $value->pengirim->mahasiswa->nama : $value->pengirim->dosen->nama); ?></span>
                                    <span
                                        class="text-sm font-normal text-gray-500 dark:text-gray-400"><?php echo e($value->created_at); ?></span>
                                </div>
                                <div class="py-2.5 text-sm font-normal text-gray-900 dark:text-white">
                                    <?php echo $value->isi_pesan; ?></div>
                                <span
                                    class="cursor-pointer text-sm font-normal text-emerald-500 hover:text-emerald-600 dark:text-gray-400"
                                    wire:click='balasChat(<?php echo e($value->id); ?>)'>Balas</span>
                            </div>
                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            <?php else: ?>
                <p class="text-center text-gray-500 dark:text-gray-400">Belum ada Dikusi</p>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
        <div class="">
            <div class="fixed bottom-0 right-0 flex w-full flex-col gap-2 p-2">
                <!--[if BLOCK]><![endif]--><?php if($chat_dibalas): ?>
                    <div class="relative mx-2 rounded-md bg-white p-2">
                        <div class="rounded-md border-l-2 border-emerald-700 bg-gray-200 p-2">
                            <span class="absolute -right-2 -top-3 cursor-pointer font-bold"
                                wire:click='hapusChatDibalas'>X</span>
                            <span class="text-sm font-semibold text-gray-900 dark:text-white">
                                <?php echo e($chat_dibalas->pengirim->mahasiswa ? $chat_dibalas->pengirim->mahasiswa->nama : $chat_dibalas->pengirim->dosen->nama); ?>

                            </span>
                            <div>
                                <?php echo $chat_dibalas->isi_pesan; ?>

                            </div>
                        </div>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <div class="w-full" wire:ignore>
                    <textarea id="isi_pesan"></textarea>
                </div>
                <div>
                    <!--[if BLOCK]><![endif]--><?php if($isi_pesan): ?>
                        <button class='rounded bg-emerald-600 px-4 py-2 font-bold text-white hover:bg-emerald-700'
                            wire:click="send_chat">Kirim</button>
                    <?php else: ?>
                        <button
                            class='cursor-not-allowed rounded bg-gray-500 px-4 py-2 font-bold text-white hover:bg-gray-600'>Kirim</button>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>

            </div>
        </div>
    </div>

</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        var editor_config = {
            path_absolute: "/",
            selector: '#isi_pesan',
            relative_urls: false,
            height: 150,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table directionality",
                "emoticons template paste textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            setup: (editor) => {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    window.Livewire.find('<?php echo e($_instance->getId()); ?>').set(`isi_pesan`, editor.getContent());
                });
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
            tinymce.get("isi_pesan").setContent("");
        })
        window.addEventListener('set-textarea', event => {
            tinymce.get("jawab_soal").setContent(event.detail.jawaban);

        })
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\website\pro2lms\resources\views/livewire/pages/mahasiswa/chat-diskusi.blade.php ENDPATH**/ ?>