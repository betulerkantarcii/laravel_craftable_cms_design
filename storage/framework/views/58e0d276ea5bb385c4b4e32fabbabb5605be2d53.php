    '<?php echo e($modelLangFormat); ?>' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
<?php if($export): ?>
            'export' => 'Export',
<?php endif; ?>
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>'<?php echo e($col['name']); ?>' => '<?php echo e(ucfirst(str_replace('_', ' ', $col['name']))); ?>',
<?php if($col['name'] == 'password'): ?>            '<?php echo e($col['name']); ?>_repeat' => '<?php echo e(ucfirst(str_replace('_', ' ', $col['name']))); ?> Confirmation',
<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php if(count($relations)): ?>
    <?php if(count($relations['belongsToMany'])): ?>

            //Belongs to many relations
            <?php $__currentLoopData = $relations['belongsToMany']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $belongsToMany): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>'<?php echo e(lcfirst($belongsToMany['related_model_name_plural'])); ?>' => '<?php echo e(ucfirst(str_replace('_', ' ', $belongsToMany['related_model_name_plural']))); ?>',
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<?php endif; ?>

        ],
    ],

    // Do not delete me :) I'm used for auto-generation<?php /**PATH /Users/betulerkantarci/Desktop/artB/vendor/brackets/admin-generator/src/../resources/views/templates/admin-user/lang.blade.php ENDPATH**/ ?>