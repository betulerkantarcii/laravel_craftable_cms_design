import AppForm from '../app-components/Form/AppForm';

Vue.component('<?php echo e($modelJSName); ?>-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($column['name'].':'); ?> <?php if($column['type'] == 'json'): ?> <?php echo e('{}'); ?> <?php elseif($column['type'] == 'boolean'): ?> <?php echo "false"; ?> <?php else: ?> <?php echo "''"; ?> <?php endif; ?>,
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            },
            mediaCollections: ['avatar']
        }
    },
    methods: {
        onSuccess(data) {
            if(data.notify) {
                this.$notify({ type: data.notify.type, title: data.notify.title, text: data.notify.message});
            } else if (data.redirect) {
                window.location.replace(data.redirect);
            }
        }
    }
});<?php /**PATH /Users/betulerkantarci/Desktop/artB/vendor/brackets/admin-generator/src/../resources/views/templates/profile/form-js.blade.php ENDPATH**/ ?>