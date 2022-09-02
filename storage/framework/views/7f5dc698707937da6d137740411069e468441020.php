<?php echo e('@'); ?>extends('brackets/admin-ui::admin.layout.default')

<?php echo e('@'); ?>section('title', trans('admin.<?php echo e($modelLangFormat); ?>.actions.create'))

<?php echo e('@'); ?>section('body')

    <div class="container-xl">

        <?php if(!$isUsedTwoColumnsLayout): ?>
        <div class="card">
        <?php endif; ?>

        <<?php echo e($modelJSName); ?>-form
            :action="'<?php echo e('{{'); ?> url('admin/<?php echo e($resource); ?>') }}'"
<?php if($hasTranslatable): ?>
            :locales="{{ json_encode($locales) }}"
            :send-empty-locales="false"
<?php endif; ?>
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" <?php echo e('@'); ?>submit.prevent="onSubmit" :action="action" novalidate>
                <?php if($isUsedTwoColumnsLayout): ?>

                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus"></i> <?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.actions.create') }}
                            </div>
                            <div class="card-body">
                                <?php echo e('@'); ?>include('admin.<?php echo e($modelDotNotation); ?>.components.form-elements')
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-12 col-xl-5 col-xxl-4">
                        <?php echo e('@'); ?>include('admin.<?php echo e($modelDotNotation); ?>.components.form-elements-right')
                    </div>
                </div>
                <?php else: ?>

                <div class="card-header">
                    <i class="fa fa-plus"></i> <?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.actions.create') }}
                </div>

                <div class="card-body">
                    <?php echo e('@'); ?>include('admin.<?php echo e($modelDotNotation); ?>.components.form-elements')
                </div>
                <?php endif; ?>
                <?php if($isUsedTwoColumnsLayout): ?>

                <button type="submit" class="btn btn-primary fixed-cta-button button-save" :disabled="submiting">
                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-save'"></i>
                    {{ trans('brackets/admin-ui::admin.btn.save') }}
                </button>
                <button type="submit" style="display: none" class="btn btn-success fixed-cta-button button-saved" :disabled="submiting" :class="">
                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-check'"></i>
                    <span>{{ trans('brackets/admin-ui::admin.btn.saved') }}</span>
                </button>
                <?php else: ?>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div>
                <?php endif; ?>

            </form>

        </<?php echo e($modelJSName); ?>-form>

        </div>

    <?php if(!$isUsedTwoColumnsLayout): ?>
    </div>

    <?php endif; ?>

<?php echo e('@'); ?>endsection<?php /**PATH /Users/betulerkantarci/Desktop/artB/vendor/brackets/admin-generator/src/../resources/views/create.blade.php ENDPATH**/ ?>