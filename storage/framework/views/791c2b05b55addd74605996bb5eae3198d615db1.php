<?php echo "<?php"
?>


namespace App\Http\Requests\Admin\<?php echo e($modelWithNamespaceFromDefault); ?>;
<?php
    if ($translatable->count() > 0) {
        $translatableColumns = $columns->filter(function($column) use ($translatable) {
            return in_array($column['name'], $translatable->toArray());
        });
        $standardColumn = $columns->reject(function($column) use ($translatable) {
            return in_array($column['name'], $translatable->toArray());
        });
    }
?>

<?php if($containsPublishedAtColumn): ?>
use Carbon\Carbon;
<?php endif; ?>
<?php if($translatable->count() > 0): ?>use Brackets\Translatable\TranslatableFormRequest;
<?php else: ?>
use Illuminate\Foundation\Http\FormRequest;
<?php endif; ?>
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

<?php if($translatable->count() > 0): ?>class Update<?php echo e($modelBaseName); ?> extends TranslatableFormRequest
<?php else: ?>
class Update<?php echo e($modelBaseName); ?> extends FormRequest
<?php endif; ?>
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * <?php echo e('@'); ?>return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.<?php echo e($modelDotNotation); ?>.edit', $this-><?php echo e($modelVariableName); ?>);
    }

<?php if($translatable->count() > 0): ?>/**
     * Get the validation rules that apply to the requests untranslatable fields.
     *
     * <?php echo e('@'); ?>return array
     */
    public function untranslatableRules(): array {
        return [
            <?php $__currentLoopData = $standardColumn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>'<?php echo e($column['name']); ?>' => [<?php echo implode(', ', (array) $column['serverUpdateRules']); ?>],
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php if(count($relations)): ?>
    <?php if(count($relations['belongsToMany'])): ?>

            <?php $__currentLoopData = $relations['belongsToMany']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $belongsToMany): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>'<?php echo e($belongsToMany['related_table']); ?>' => [<?php echo implode(', ', ['\'sometimes\'', '\'array\'']); ?>],
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<?php endif; ?>

        ];
    }

    /**
     * Get the validation rules that apply to the requests translatable fields.
     *
     * <?php echo e('@'); ?>return array
     */
    public function translatableRules($locale): array {
        return [
            <?php $__currentLoopData = $translatableColumns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>'<?php echo e($column['name']); ?>' => [<?php echo implode(', ', (array) $column['serverUpdateRules']); ?>],
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        ];
    }
<?php else: ?>
    /**
     * Get the validation rules that apply to the request.
     *
     * <?php echo e('@'); ?>return array
     */
    public function rules(): array
    {
        return [
            <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if(!($column['name'] == "updated_by_admin_user_id" || $column['name'] == "created_by_admin_user_id" )): ?>'<?php echo e($column['name']); ?>' => [<?php echo implode(', ', (array) $column['serverUpdateRules']); ?>],
<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php if(count($relations)): ?>
    <?php if(count($relations['belongsToMany'])): ?>

            <?php $__currentLoopData = $relations['belongsToMany']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $belongsToMany): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>'<?php echo e($belongsToMany['related_table']); ?>' => [<?php echo implode(', ', ['\'sometimes\'', '\'array\'']); ?>],
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<?php endif; ?>
<?php if($containsPublishedAtColumn): ?>'publish_now' => ['nullable', 'boolean'],
            'unpublish_now' => ['nullable', 'boolean'],
<?php endif; ?>

        ];
    }
<?php endif; ?>

    /**
     * Modify input data
     *
     * <?php echo e('@'); ?>return array
     */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

<?php if($containsPublishedAtColumn): ?>
        if (isset($sanitized['publish_now']) && $sanitized['publish_now'] === true) {
            $sanitized['published_at'] = Carbon::now();
        }

        if (isset($sanitized['unpublish_now']) && $sanitized['unpublish_now'] === true) {
            $sanitized['published_at'] = null;
        }
<?php endif; ?>

        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
<?php /**PATH /Users/betulerkantarci/Desktop/artB/vendor/brackets/admin-generator/src/../resources/views/update-request.blade.php ENDPATH**/ ?>