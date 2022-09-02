<?php echo "<?php"
?>


namespace <?php echo e($modelNameSpace); ?>;
<?php
    $hasRoles = false;
    if(count($relations) && count($relations['belongsToMany'])) {
        $hasRoles = $relations['belongsToMany']->filter(function($belongsToMany) {
            return $belongsToMany['related_table'] == 'roles';
        })->count() > 0;
        $relations['belongsToMany'] = $relations['belongsToMany']->reject(function($belongsToMany) {
            return $belongsToMany['related_table'] == 'roles';
        });
    }
?>

use Illuminate\Database\Eloquent\Model;
<?php if($fillable): ?><?php $__currentLoopData = $fillable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fillableColumn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($fillableColumn === "created_by_admin_user_id"): ?>use Brackets\Craftable\Traits\CreatedByAdminUserTrait;
<?php elseif($fillableColumn === "updated_by_admin_user_id"): ?>use Brackets\Craftable\Traits\UpdatedByAdminUserTrait;
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php if($hasSoftDelete): ?>use Illuminate\Database\Eloquent\SoftDeletes;
<?php endif; ?>
<?php if(isset($relations['belongsToMany']) && count($relations['belongsToMany'])): ?>
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
<?php endif; ?>
<?php if($hasRoles): ?>use Spatie\Permission\Traits\HasRoles;
<?php endif; ?>
<?php if($translatable->count() > 0): ?>use Brackets\Translatable\Traits\HasTranslations;
<?php endif; ?>

class <?php echo e($modelBaseName); ?> extends Model
{
<?php if($hasSoftDelete): ?>
    use SoftDeletes;
<?php endif; ?>
<?php if($hasRoles): ?>use HasRoles;
<?php endif; ?>
<?php if($translatable->count() > 0): ?>use HasTranslations;
<?php endif; ?>
<?php if($fillable): ?><?php $__currentLoopData = $fillable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fillableColumn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($fillableColumn === "created_by_admin_user_id"): ?>use CreatedByAdminUserTrait;
<?php elseif($fillableColumn === "updated_by_admin_user_id"): ?>    use UpdatedByAdminUserTrait;
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
    <?php if(!is_null($tableName)): ?>protected $table = '<?php echo e($tableName); ?>';

    <?php endif; ?>
<?php if($fillable): ?>protected $fillable = [
    <?php $__currentLoopData = $fillable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    '<?php echo e($f); ?>',
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    ];
    <?php endif; ?>

    <?php if($hidden && count($hidden) > 0): ?>protected $hidden = [
    <?php $__currentLoopData = $hidden; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    '<?php echo e($h); ?>',
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    ];
    <?php endif; ?>

    <?php if($dates): ?>protected $dates = [
    <?php $__currentLoopData = $dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    '<?php echo e($date); ?>',
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    ];
    <?php endif; ?>
<?php if($translatable->count() > 0): ?>// these attributes are translatable
    public $translatable = [
    <?php $__currentLoopData = $translatable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $translatableField): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    '<?php echo e($translatableField); ?>',
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    ];
    <?php endif; ?>
<?php if(!$timestamps): ?>public $timestamps = false;
    <?php endif; ?>

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/<?php echo e($resource); ?>/'.$this->getKey());
    }
<?php if(count($relations)): ?>

    /* ************************ RELATIONS ************************ */
<?php if(count($relations['belongsToMany'])): ?>
<?php $__currentLoopData = $relations['belongsToMany']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $belongsToMany): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>/**
    * Relation to <?php echo e($belongsToMany['related_model_name_plural']); ?>

    *
    * <?php echo e('@'); ?>return BelongsToMany
    */
    public function <?php echo e($belongsToMany['related_table']); ?>() {
        return $this->belongsToMany(<?php echo e($belongsToMany['related_model_class']); ?>, '<?php echo e($belongsToMany['relation_table']); ?>', '<?php echo e($belongsToMany['foreign_key']); ?>', '<?php echo e($belongsToMany['related_key']); ?>');
    }
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php endif; ?>}
<?php /**PATH /Users/betulerkantarci/Desktop/artB/vendor/brackets/admin-generator/src/../resources/views/model.blade.php ENDPATH**/ ?>