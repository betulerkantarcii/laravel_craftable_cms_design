<?php echo "<?php"
?>


namespace App\Http\Requests\Admin\<?php echo e($modelWithNamespaceFromDefault); ?>;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class Index<?php echo e($modelBaseName); ?> extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * <?php echo e('@'); ?>return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.<?php echo e($modelDotNotation); ?>.index');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * <?php echo e('@'); ?>return array
     */
    public function rules(): array
    {
        return [
            'orderBy' => 'in:<?php echo e(implode(',', $columnsToQuery)); ?>|nullable',
            'orderDirection' => 'in:asc,desc|nullable',
            'search' => 'string|nullable',
            'page' => 'integer|nullable',
            'per_page' => 'integer|nullable',

        ];
    }
}
<?php /**PATH /Users/betulerkantarci/Desktop/artB/vendor/brackets/admin-generator/src/../resources/views/index-request.blade.php ENDPATH**/ ?>