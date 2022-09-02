    '<?php echo e($modelLangFormat); ?>' => [
        'title' => '<?php echo e($titlePlural); ?>',

        'actions' => [
            'index' => '<?php echo e($titlePlural); ?>',
            'create' => 'New <?php echo e($titleSingular); ?>',
            'edit' => 'Edit :name',
<?php if($export): ?>
            'export' => 'Export',
<?php endif; ?>
<?php if($containsPublishedAtColumn): ?>
            'will_be_published' => '<?php echo e($modelBaseName); ?> will be published at',
<?php endif; ?>
        ],

        'columns' => [
            'id' => 'ID',
            <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>'<?php echo e($col['name']); ?>' => '<?php echo e($col['defaultTranslation']); ?>',
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

    // Do not delete me :) I'm used for auto-generation<?php /**PATH /Users/betulerkantarci/Desktop/artB/vendor/brackets/admin-generator/src/../resources/views/lang.blade.php ENDPATH**/ ?>