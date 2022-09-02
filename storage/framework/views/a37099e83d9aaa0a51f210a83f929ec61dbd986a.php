<?php echo "<?php"
?>


namespace App\Http\Requests\Admin\<?php echo e($modelWithNamespaceFromDefault); ?>;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class ImpersonalLogin<?php echo e($modelBaseName); ?> extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * <?php echo e('@'); ?>return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.<?php echo e($modelDotNotation); ?>.impersonal-login', $this-><?php echo e($modelVariableName); ?>);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * <?php echo e('@'); ?>return array
     */
    public function rules(): array
    {
        return [];
    }
}
<?php /**PATH /Users/betulerkantarci/Desktop/artB/vendor/brackets/admin-generator/src/../resources/views/templates/admin-user/impersonal-login-request.blade.php ENDPATH**/ ?>