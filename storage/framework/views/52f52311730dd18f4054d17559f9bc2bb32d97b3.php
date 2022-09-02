<?php echo e('@'); ?>extends('brackets/admin-ui::admin.layout.default')

<?php echo e('@'); ?>section('title', trans('admin.<?php echo e($modelLangFormat); ?>.actions.create'))

<?php echo e('@'); ?>section('body')

    <div class="container-xl">

        <div class="card">

            <<?php echo e($modelJSName); ?>-form
                :action="'<?php echo e('{{'); ?> url('admin/<?php echo e($resource); ?>') }}'"
                :activation="!!'{{ $activation }}'"
                <?php if($hasTranslatable): ?>:locales="{{ json_encode($locales) }}"
                :send-empty-locales="false"<?php endif; ?>

                inline-template>

                <form class="form-horizontal form-create" method="post" <?php echo e('@'); ?>submit.prevent="onSubmit" :action="action">

                    <div class="card-header">
                        <i class="fa fa-plus"></i> <?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.actions.create') }}
                    </div>

                    <div class="card-body">

                        <?php echo e('@'); ?>include('admin.<?php echo e($modelDotNotation); ?>.components.form-elements')

                    </div>

                    <div class="card-footer">
	                    <button type="submit" class="btn btn-primary" :disabled="submiting">
		                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
	                    </button>
                    </div>

                </form>

            </<?php echo e($modelJSName); ?>-form>

        </div>

    </div>

<?php echo e('@'); ?>endsection
<?php /**PATH /Users/betulerkantarci/Desktop/artB/vendor/brackets/admin-generator/src/../resources/views/templates/admin-user/create.blade.php ENDPATH**/ ?>