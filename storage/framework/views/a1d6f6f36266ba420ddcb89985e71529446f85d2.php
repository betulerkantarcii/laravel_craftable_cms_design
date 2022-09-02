<?php echo e('@'); ?>extends('brackets/admin-ui::admin.layout.default')

<?php echo e('@'); ?>section('title', trans('admin.<?php echo e($modelLangFormat); ?>.actions.edit_password'))

<?php echo e('@'); ?>section('body')

    <div class="container-xl">

        <div class="card">

            <<?php echo e($modelJSName); ?>-form
                :action="'<?php echo e('{{'); ?> url('<?php echo e($route); ?>') }}'"
                :data="<?php echo e('{{'); ?> $<?php echo e($modelVariableName); ?>->toJson() }}"
                inline-template>

                <form class="form-horizontal form-edit" method="post" <?php echo e('@'); ?>submit.prevent="onSubmit" :action="action">

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> <?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.actions.edit_password') }}
                    </div>

                    <div class="card-body">

<?php
    $columns = $columns->reject(function($column) {
        return !in_array($column['name'], ['password']);
    });
?>
                        <?php echo $__env->make('brackets/admin-generator::templates.profile.password.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
<?php /**PATH /Users/betulerkantarci/Desktop/artB/vendor/brackets/admin-generator/src/../resources/views/templates/profile/password/full-form.blade.php ENDPATH**/ ?>