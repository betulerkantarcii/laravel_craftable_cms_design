/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(<?php echo e($modelFullName); ?>::class, function (Faker\Generator $faker) {
    return [
        <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if($col['name'] == 'activated'): ?>'<?php echo e($col['name']); ?>' => true,
<?php elseif($col['name'] == 'language'): ?>'<?php echo e($col['name']); ?>' => 'en',
<?php else: ?>'<?php echo e($col['name']); ?>' => <?php echo $col['faker']; ?>,
<?php endif; ?>        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    ];
});<?php /**PATH /Users/betulerkantarci/Desktop/artB/vendor/brackets/admin-generator/src/../resources/views/templates/admin-user/factory.blade.php ENDPATH**/ ?>