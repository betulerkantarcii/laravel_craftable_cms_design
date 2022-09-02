<?php $__env->startSection('title', trans('admin.logo.actions.edit', ['name' => $logo->title])); ?>

<?php $__env->startSection('body'); ?>

    <div class="container-xl">
        <div class="card">

            <logo-form
                :action="'<?php echo e($logo->resource_url); ?>'"
                :data="<?php echo e($logo->toJsonAllLocales()); ?>"
                :locales="<?php echo e(json_encode($locales)); ?>"
                :send-empty-locales="false"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> <?php echo e(trans('admin.logo.actions.edit', ['name' => $logo->title])); ?>

                    </div>

                    <div class="card-body">
                        <?php echo $__env->make('admin.logo.components.form-elements', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            <?php echo e(trans('brackets/admin-ui::admin.btn.save')); ?>

                        </button>
                    </div>
                    
                </form>

        </logo-form>

        </div>
    
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('brackets/admin-ui::admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/betulerkantarci/Desktop/artB/resources/views/admin/logo/edit.blade.php ENDPATH**/ ?>