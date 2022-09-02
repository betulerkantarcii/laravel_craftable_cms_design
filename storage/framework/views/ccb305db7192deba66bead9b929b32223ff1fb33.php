<?php echo "<?php"
?>


namespace App\Http\Requests\Admin\<?php echo e($modelWithNamespaceFromDefault); ?>;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class BulkDestroy<?php echo e($modelBaseName); ?> extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * <?php echo e('@'); ?>return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.<?php echo e($modelDotNotation); ?>.bulk-delete');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * <?php echo e('@'); ?>return array
     */
    public function rules(): array
    {
        return [
            'ids.*' => 'integer'
        ];
    }
}
<?php /**PATH /Users/betulerkantarci/Desktop/artB/vendor/brackets/admin-generator/src/../resources/views/bulk-destroy-request.blade.php ENDPATH**/ ?>