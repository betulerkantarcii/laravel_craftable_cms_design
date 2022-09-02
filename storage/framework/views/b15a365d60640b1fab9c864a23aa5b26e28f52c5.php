<?php echo e('@'); ?>extends('brackets/admin-ui::admin.layout.default')

<?php echo e('@'); ?>section('title', trans('admin.<?php echo e($modelLangFormat); ?>.actions.edit_profile'))

<?php echo e('@'); ?>section('body')

    <div class="container-xl">

        <div class="card">

            <<?php echo e($modelJSName); ?>-form
                :action="'<?php echo e('{{'); ?> url('<?php echo e($route); ?>') }}'"
                :data="<?php echo e('{{'); ?> $<?php echo e($modelVariableName); ?>->toJson() }}"
                <?php if($hasTranslatable): ?>:locales="{{ json_encode($locales) }}"
                :send-empty-locales="false"<?php endif; ?>

                inline-template>

                <form class="form-horizontal form-edit" method="post" <?php echo e('@'); ?>submit.prevent="onSubmit" :action="action">

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> <?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.actions.edit_profile') }}
                    </div>

                    <div class="card-body">

<?php
    $columns = $columns->reject(function($column) {
        return in_array($column['name'], ['password', 'activated', 'forbidden']);
    });
?>
                        <?php echo $__env->make('brackets/admin-generator::templates.profile.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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

<?php echo e('@'); ?>endsection<?php /**PATH /Users/betulerkantarci/Desktop/artB/vendor/brackets/admin-generator/src/../resources/views/templates/profile/full-form.blade.php ENDPATH**/ ?>