<?php echo e('@'); ?>extends('brackets/admin-ui::admin.layout.default')

<?php echo e('@'); ?>section('title', trans('admin.<?php echo e($modelLangFormat); ?>.actions.edit', ['name' => $<?php echo e($modelVariableName); ?>-><?php echo e($modelTitle); ?>]))

<?php echo e('@'); ?>section('body')

    <div class="container-xl">

        <div class="card">

            <?php if($hasTranslatable): ?><<?php echo e($modelJSName); ?>-form
                :action="'<?php echo e('{{'); ?> $<?php echo e($modelVariableName); ?>->resource_url }}'"
                :data="<?php echo e('{{'); ?> $<?php echo e($modelVariableName); ?>->toJsonAllLocales() }}"
                :activation="!!'{{ $activation }}'"
                :locales="{{ json_encode($locales) }}"
                :send-empty-locales="false"
                inline-template>
            <?php else: ?><<?php echo e($modelJSName); ?>-form
                :action="'<?php echo e('{{'); ?> $<?php echo e($modelVariableName); ?>->resource_url }}'"
                :data="<?php echo e('{{'); ?> $<?php echo e($modelVariableName); ?>->toJson() }}"
                :activation="!!'{{ $activation }}'"
                inline-template>
            <?php endif; ?>

                <form class="form-horizontal form-edit" method="post" <?php echo e('@'); ?>submit.prevent="onSubmit" :action="action">

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> <?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.actions.edit', ['name' => $<?php echo e($modelVariableName); ?>-><?php echo e($modelTitle); ?>]) }}
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
<?php /**PATH /Users/betulerkantarci/Desktop/artB/vendor/brackets/admin-generator/src/../resources/views/templates/admin-user/edit.blade.php ENDPATH**/ ?>