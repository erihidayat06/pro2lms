<?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => $getFieldWrapperView()] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\DynamicComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['field' => $field,'class' => 'relative z-0']); ?>
    <div
        x-data="{ state: $wire.entangle('<?php echo e($getStatePath()); ?>'), initialized: false }"
        x-load-js="[<?php echo \Illuminate\Support\Js::from(\Filament\Support\Facades\FilamentAsset::getScriptSrc($getLanguageId(), 'mohamedsabil83/filament-forms-tinyeditor'))->toHtml() ?>]"
        x-init="(() => {
            $nextTick(() => {
                tinymce.createEditor('tiny-editor-<?php echo e($getId()); ?>', {
                    target: $refs.tinymce,
                    deprecation_warnings: false,
                    language: '<?php echo e($getInterfaceLanguage()); ?>',
                    language_url: 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/<?php echo e($getInterfaceLanguage()); ?>.min.js',
                    toolbar_sticky: <?php echo e($getToolbarSticky() ? 'true' : 'false'); ?>,
                    toolbar_sticky_offset: 64,
                    skin: {
                        light: 'oxide',
                        dark: 'oxide-dark',
                        system: window.matchMedia('(prefers-color-scheme: dark)').matches ? 'oxide-dark' : 'oxide',
                    }[typeof theme === 'undefined' ? 'light' : theme],
                    content_css: {
                        light: 'default',
                        dark: 'dark',
                        system: window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'default',
                    }[typeof theme === 'undefined' ? 'light' : theme],
                    max_height: <?php echo e($getMaxHeight()); ?>,
                    min_height: <?php echo e($getMinHeight()); ?>,
                    menubar: <?php echo e($getShowMenuBar() ? 'true' : 'false'); ?>,
                    plugins: ['<?php echo e($getPlugins()); ?>'],
                    external_plugins: <?php echo \Illuminate\Support\Js::from($getExternalPlugins())->toHtml() ?>,
                    toolbar: '<?php echo e($getToolbar()); ?>',
                    toolbar_mode: 'sliding',
                    document_base_url: '<?php echo e($getDocumentBaseUrl()); ?>',
                    relative_urls: <?php echo e($getRelativeUrls() ? 'true' : 'false'); ?>,
                    remove_script_host: <?php echo e($getRemoveScriptHost() ? 'true' : 'false'); ?>,
                    convert_urls: <?php echo e($getConvertUrls() ? 'true' : 'false'); ?>,
                    branding: false,
                    images_upload_handler: (blobInfo, success, failure, progress) => {
                        if (!blobInfo.blob()) return

                        $wire.upload(`componentFileAttachments.<?php echo e($getStatePath()); ?>`, blobInfo.blob(), () => {
                            $wire.getFormComponentFileAttachmentUrl('<?php echo e($getStatePath()); ?>').then((url) => {
                                if (!url) {
                                    failure('<?php echo e(__('Error uploading file')); ?>')
                                    return
                                }
                                success(url)
                            })
                        })
                    },
                    file_picker_callback: (cb, value, meta) => {
                        const input = document.createElement('input');
                        input.setAttribute('type', 'file');
                        input.addEventListener('change', (e) => {
                            const file = e.target.files[0];
                            const reader = new FileReader();
                            reader.addEventListener('load', () => {
                                $wire.upload(`componentFileAttachments.<?php echo e($getStatePath()); ?>`, file, () => {
                                    $wire.getFormComponentFileAttachmentUrl('<?php echo e($getStatePath()); ?>').then((url) => {
                                        if (!url) {
                                            cb('<?php echo e(__('Error uploading file')); ?>')
                                            return
                                        }
                                        cb(url)
                                    })
                                })
                            });
                            reader.readAsDataURL(file);
                        });

                        input.click();
                    },
                    automatic_uploads: true,
                    templates: <?php echo e($getTemplate()); ?>,
                    setup: function(editor) {
                        if(!window.tinySettingsCopy) {
                            window.tinySettingsCopy = [];
                        }

                        if (!window.tinySettingsCopy.some(obj => obj.id === editor.settings.id)) {
                            window.tinySettingsCopy.push(editor.settings);
                        }

                        editor.on('blur', function(e) {
                            state = editor.getContent()
                        })

                        editor.on('init', function(e) {
                            if (state != null) {
                                editor.setContent(state)
                            }
                        })

                        editor.on('OpenWindow', function(e) {
                            target = e.target.container.closest('.fi-modal')
                            if (target) target.setAttribute('x-trap.noscroll', 'false')

                            target = e.target.container.closest('.jetstream-modal')
                            if (target) {
                                targetDiv = target.children[1]
                                targetDiv.setAttribute('x-trap.inert.noscroll', 'false')
                            }
                        })

                        editor.on('CloseWindow', function(e) {
                            target = e.target.container.closest('.fi-modal')
                            if (target) target.setAttribute('x-trap.noscroll', 'isOpen')

                            target = e.target.container.closest('.jetstream-modal')
                            if (target) {
                                targetDiv = target.children[1]
                                targetDiv.setAttribute('x-trap.inert.noscroll', 'show')
                            }
                        })

                        function putCursorToEnd() {
                            editor.selection.select(editor.getBody(), true);
                            editor.selection.collapse(false);
                        }

                        $watch('state', function(newstate) {
                            // unfortunately livewire doesn't provide a way to 'unwatch' so this listener sticks
                            // around even after this component is torn down. Which means that we need to check
                            // that editor.container exists. If it doesn't exist we do nothing because that means
                            // the editor was removed from the DOM
                            if (editor.container && newstate !== editor.getContent()) {
                                editor.resetContent(newstate || '');
                                putCursorToEnd();
                            }
                        });
                    },
                    <?php echo e($getCustomConfigs()); ?>

                }).render();
            });

            // We initialize here because if the component is first loaded from within a modal DOMContentLoaded
            // won't fire and if we want to register a Livewire.hook listener Livewire.hook isn't available from
            // inside the once body
            if (!window.tinyMceInitialized) {
                window.tinyMceInitialized = true;
                $nextTick(() => {
                    Livewire.hook('morph.removed', (el, component) => {
                        if (el.el.nodeName === 'INPUT' && el.el.getAttribute('x-ref') === 'tinymce') {
                            tinymce.get(el.el.id)?.remove();
                        }
                    });
                });
            }
        })()"
        x-cloak
        class="overflow-hidden"
        wire:ignore
    >
        <!--[if BLOCK]><![endif]--><?php if (! ($isDisabled())): ?>
            <input
                id="tiny-editor-<?php echo e($getId()); ?>"
                type="hidden"
                x-ref="tinymce"
                placeholder="<?php echo e($getPlaceholder()); ?>"
            >
        <?php else: ?>
            <div
                x-html="state"
                style="<?php echo \Illuminate\Support\Arr::toCssStyles([
                    'max-height: '.$getPreviewMaxHeight().'px' => $getPreviewMaxHeight() > 0,
                    'min-height: '.$getPreviewMinHeight().'px' => $getPreviewMinHeight() > 0,
                ]) ?>"
                class="block w-full max-w-none rounded-lg border border-gray-300 bg-white p-3 opacity-70 shadow-sm transition duration-75 prose dark:prose-invert dark:border-gray-600 dark:bg-gray-700 dark:text-white overflow-y-auto"
            ></div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $attributes = $__attributesOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php /**PATH D:\MY PROJEK\HERD\CLIENT\pro2lms\vendor\mohamedsabil83\filament-forms-tinyeditor\src\/../resources/views/tiny-editor.blade.php ENDPATH**/ ?>