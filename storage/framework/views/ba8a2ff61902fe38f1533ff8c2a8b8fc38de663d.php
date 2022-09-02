import AppForm from '../app-components/Form/AppForm';

Vue.component('<?php echo e($modelJSName); ?>-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($column['name'].':'); ?> <?php if($column['type'] == 'json'): ?> <?php echo e('this.getLocalizedFormDefaults()'); ?> <?php elseif($column['type'] == 'boolean'): ?> <?php echo "false"; ?> <?php else: ?> <?php echo "''"; ?> <?php endif; ?>,
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            }
        }
    }

});<?php /**PATH /Users/betulerkantarci/Desktop/artB/vendor/brackets/admin-generator/src/../resources/views/form-js.blade.php ENDPATH**/ ?>