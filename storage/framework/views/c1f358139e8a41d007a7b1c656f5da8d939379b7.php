<?php
    $translatableColumns = $columns->filter(function($column) use ($translatable) {
        return in_array($column['name'], $translatable->toArray());
    });
    $standardColumn = $columns->reject(function($column) use ($translatable) {
        return in_array($column['name'], $translatable->toArray());
    });
?>
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(<?php echo e($modelFullName); ?>::class, static function (Faker\Generator $faker) {
    return [
        <?php $__currentLoopData = $standardColumn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>'<?php echo e($col['name']); ?>' => <?php echo $col['faker']; ?>,
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php $__currentLoopData = $translatableColumns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>'<?php echo e($col['name']); ?>' => ['en' => <?php echo $col['faker']; ?>],
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    ];
});
<?php /**PATH /Users/betulerkantarci/Desktop/artB/vendor/brackets/admin-generator/src/../resources/views/factory.blade.php ENDPATH**/ ?>