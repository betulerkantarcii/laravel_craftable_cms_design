<?php echo "<?php";
?>


namespace <?php echo e($controllerNamespace); ?>;

<?php if($export): ?>
use App\Exports\<?php echo e($exportBaseName); ?>;
<?php endif; ?>
use App\Http\Controllers\Controller;
<?php if(!$withoutBulk): ?>
use App\Http\Requests\Admin\<?php echo e($modelWithNamespaceFromDefault); ?>\BulkDestroy<?php echo e($modelBaseName); ?>;
<?php endif; ?>
use App\Http\Requests\Admin\<?php echo e($modelWithNamespaceFromDefault); ?>\Destroy<?php echo e($modelBaseName); ?>;
use App\Http\Requests\Admin\<?php echo e($modelWithNamespaceFromDefault); ?>\Index<?php echo e($modelBaseName); ?>;
use App\Http\Requests\Admin\<?php echo e($modelWithNamespaceFromDefault); ?>\Store<?php echo e($modelBaseName); ?>;
use App\Http\Requests\Admin\<?php echo e($modelWithNamespaceFromDefault); ?>\Update<?php echo e($modelBaseName); ?>;
use <?php echo e($modelFullName); ?>;
use Brackets\AdminListing\Facades\AdminListing;
<?php if(!$withoutBulk && $hasSoftDelete): ?>
use Carbon\Carbon;
<?php endif; ?>
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
<?php if(count($relations)): ?>
<?php if(count($relations['belongsToMany'])): ?>
<?php $__currentLoopData = $relations['belongsToMany']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $belongsToMany): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
use <?php echo e($belongsToMany['related_model']); ?>;
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php endif; ?>
<?php if(!$withoutBulk): ?>
use Illuminate\Support\Facades\DB;
<?php endif; ?>
<?php if(in_array('created_by_admin_user_id', $columnsToQuery) || in_array('updated_by_admin_user_id', $columnsToQuery)): ?>
use Illuminate\Support\Facades\Auth;
<?php endif; ?>
<?php if($export): ?>use Maatwebsite\Excel\Facades\Excel;
<?php endif; ?>
<?php if($export): ?>use Symfony\Component\HttpFoundation\BinaryFileResponse;
<?php endif; ?>
use Illuminate\View\View;

class <?php echo e($controllerBaseName); ?> extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * <?php echo e('@'); ?>param Index<?php echo e($modelBaseName); ?> $request
     * <?php echo e('@'); ?>return array|Factory|View
     */
    public function index(Index<?php echo e($modelBaseName); ?> $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(<?php echo e($modelBaseName); ?>::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['<?php echo implode('\', \'', $columnsToQuery); ?>'],

            // set columns to searchIn
            ['<?php echo implode('\', \'', $columnsToSearchIn); ?>']<?php if(in_array('created_by_admin_user_id', $columnsToQuery) || in_array('updated_by_admin_user_id', $columnsToQuery)): ?>,<?php endif; ?>

<?php if(in_array('created_by_admin_user_id', $columnsToQuery) || in_array('updated_by_admin_user_id', $columnsToQuery)): ?>
    <?php if(in_array('created_by_admin_user_id', $columnsToQuery) && in_array('updated_by_admin_user_id', $columnsToQuery)): ?>
        function ($query) use ($request) {
                $query->with(['createdByAdminUser', 'updatedByAdminUser']);
            }
    <?php elseif(in_array('created_by_admin_user_id', $columnsToQuery)): ?>
        function ($query) use ($request) {
                $query->with(['createdByAdminUser']);
            }
    <?php elseif(in_array('updated_by_admin_user_id', $columnsToQuery)): ?>
        function ($query) use ($request) {
                $query->with(['updatedByAdminUser']);
            }
    <?php endif; ?>
<?php endif; ?>
        );

        if ($request->ajax()) {
<?php if(!$withoutBulk): ?>
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
<?php endif; ?>
            return ['data' => $data];
        }

        return view('admin.<?php echo e($modelDotNotation); ?>.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * <?php echo e('@'); ?>throws AuthorizationException
     * <?php echo e('@'); ?>return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.<?php echo e($modelDotNotation); ?>.create');

<?php if(count($relations) && count($relations['belongsToMany'])): ?>
        return view('admin.<?php echo e($modelDotNotation); ?>.create',[
<?php $__currentLoopData = $relations['belongsToMany']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $belongsToMany): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            '<?php echo e($belongsToMany['related_table']); ?>' => <?php echo e($belongsToMany['related_model_name']); ?>::all(),
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ]);
<?php else: ?>
        return view('admin.<?php echo e($modelDotNotation); ?>.create');
<?php endif; ?>
    }

    /**
     * Store a newly created resource in storage.
     *
     * <?php echo e('@'); ?>param Store<?php echo e($modelBaseName); ?> $request
     * <?php echo e('@'); ?>return array|RedirectResponse|Redirector
     */
    public function store(Store<?php echo e($modelBaseName); ?> $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
<?php if(in_array('created_by_admin_user_id', $columnsToQuery) || in_array('updated_by_admin_user_id', $columnsToQuery)): ?>
    <?php if(in_array('created_by_admin_user_id', $columnsToQuery) && in_array('updated_by_admin_user_id', $columnsToQuery)): ?>
    $sanitized['created_by_admin_user_id'] = Auth::getUser()->id;
        $sanitized['updated_by_admin_user_id'] = Auth::getUser()->id;
    <?php elseif(in_array('created_by_admin_user_id', $columnsToQuery)): ?>
        $sanitized['created_by_admin_user_id'] = Auth::getUser()->id;
    <?php elseif(in_array('updated_by_admin_user_id', $columnsToQuery)): ?>
        $sanitized['updated_by_admin_user_id'] = Auth::getUser()->id;
    <?php endif; ?>
<?php endif; ?>

        // Store the <?php echo e($modelBaseName); ?>

        $<?php echo e($modelVariableName); ?> = <?php echo e($modelBaseName); ?>::create($sanitized);

<?php if(count($relations)): ?>
<?php if(count($relations['belongsToMany'])): ?>
<?php $__currentLoopData = $relations['belongsToMany']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $belongsToMany): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        // But we do have a <?php echo e($belongsToMany['related_table']); ?>, so we need to attach the <?php echo e($belongsToMany['related_table']); ?> to the <?php echo e($modelVariableName); ?>

        $<?php echo e($modelVariableName); ?>-><?php echo e($belongsToMany['related_table']); ?>()->sync(collect($request->input('<?php echo e($belongsToMany['related_table']); ?>', []))->map->id->toArray());
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>
<?php endif; ?>
        if ($request->ajax()) {
            return ['redirect' => url('admin/<?php echo e($resource); ?>'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/<?php echo e($resource); ?>');
    }

    /**
     * Display the specified resource.
     *
     * <?php echo e('@'); ?>param <?php echo e($modelBaseName); ?> $<?php echo e($modelVariableName); ?>

     * <?php echo e('@'); ?>throws AuthorizationException
     * <?php echo e('@'); ?>return void
     */
    public function show(<?php echo e($modelBaseName); ?> $<?php echo e($modelVariableName); ?>)
    {
        $this->authorize('admin.<?php echo e($modelDotNotation); ?>.show', $<?php echo e($modelVariableName); ?>);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * <?php echo e('@'); ?>param <?php echo e($modelBaseName); ?> $<?php echo e($modelVariableName); ?>

     * <?php echo e('@'); ?>throws AuthorizationException
     * <?php echo e('@'); ?>return Factory|View
     */
    public function edit(<?php echo e($modelBaseName); ?> $<?php echo e($modelVariableName); ?>)
    {
        $this->authorize('admin.<?php echo e($modelDotNotation); ?>.edit', $<?php echo e($modelVariableName); ?>);

<?php if(in_array('created_by_admin_user_id', $columnsToQuery) || in_array('updated_by_admin_user_id', $columnsToQuery)): ?>
    <?php if(in_array('created_by_admin_user_id', $columnsToQuery) && in_array('updated_by_admin_user_id', $columnsToQuery)): ?>
    $<?php echo e($modelVariableName); ?>->load(['createdByAdminUser', 'updatedByAdminUser']);
    <?php elseif(in_array('created_by_admin_user_id', $columnsToQuery)): ?>
    $<?php echo e($modelVariableName); ?>->load('createdByAdminUser');
    <?php elseif(in_array('updated_by_admin_user_id', $columnsToQuery)): ?>
    $<?php echo e($modelVariableName); ?>->load('updatedByAdminUser');
    <?php endif; ?>
<?php endif; ?>

<?php if(count($relations)): ?>
<?php if(count($relations['belongsToMany'])): ?>
<?php $__currentLoopData = $relations['belongsToMany']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $belongsToMany): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        $<?php echo e($modelVariableName); ?>->load('<?php echo e($belongsToMany['related_table']); ?>');
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>
<?php endif; ?>
        return view('admin.<?php echo e($modelDotNotation); ?>.edit', [
            '<?php echo e($modelVariableName); ?>' => $<?php echo e($modelVariableName); ?>,
<?php if(count($relations)): ?>
<?php if(count($relations['belongsToMany'])): ?>
<?php $__currentLoopData = $relations['belongsToMany']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $belongsToMany): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            '<?php echo e($belongsToMany['related_table']); ?>' => <?php echo e($belongsToMany['related_model_name']); ?>::all(),
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php endif; ?>
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * <?php echo e('@'); ?>param Update<?php echo e($modelBaseName); ?> $request
     * <?php echo e('@'); ?>param <?php echo e($modelBaseName); ?> $<?php echo e($modelVariableName); ?>

     * <?php echo e('@'); ?>return array|RedirectResponse|Redirector
     */
    public function update(Update<?php echo e($modelBaseName); ?> $request, <?php echo e($modelBaseName); ?> $<?php echo e($modelVariableName); ?>)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
<?php if(in_array('updated_by_admin_user_id', $columnsToQuery)): ?>
        $sanitized['updated_by_admin_user_id'] = Auth::getUser()->id;
<?php endif; ?>

        // Update changed values <?php echo e($modelBaseName); ?>

        $<?php echo e($modelVariableName); ?>->update($sanitized);

<?php if(count($relations)): ?>
<?php if(count($relations['belongsToMany'])): ?>
<?php $__currentLoopData = $relations['belongsToMany']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $belongsToMany): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        // But we do have a <?php echo e($belongsToMany['related_table']); ?>, so we need to attach the <?php echo e($belongsToMany['related_table']); ?> to the <?php echo e($modelVariableName); ?>

        if ($request->has('<?php echo e($belongsToMany['related_table']); ?>')) {
            $<?php echo e($modelVariableName); ?>-><?php echo e($belongsToMany['related_table']); ?>()->sync(collect($request->input('<?php echo e($belongsToMany['related_table']); ?>', []))->map->id->toArray());
        }
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>
<?php endif; ?>
        if ($request->ajax()) {
            return [
                'redirect' => url('admin/<?php echo e($resource); ?>'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
<?php if($containsPublishedAtColumn): ?>
                'object' => $<?php echo e($modelVariableName); ?>

<?php endif; ?>
            ];
        }

        return redirect('admin/<?php echo e($resource); ?>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * <?php echo e('@'); ?>param Destroy<?php echo e($modelBaseName); ?> $request
     * <?php echo e('@'); ?>param <?php echo e($modelBaseName); ?> $<?php echo e($modelVariableName); ?>

     * <?php echo e('@'); ?>throws Exception
     * <?php echo e('@'); ?>return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(Destroy<?php echo e($modelBaseName); ?> $request, <?php echo e($modelBaseName); ?> $<?php echo e($modelVariableName); ?>)
    {
        $<?php echo e($modelVariableName); ?>->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    <?php if(!$withoutBulk): ?>/**
     * Remove the specified resources from storage.
     *
     * <?php echo e('@'); ?>param BulkDestroy<?php echo e($modelBaseName); ?> $request
     * <?php echo e('@'); ?>throws Exception
     * <?php echo e('@'); ?>return Response|bool
     */
    public function bulkDestroy(BulkDestroy<?php echo e($modelBaseName); ?> $request) : Response
    {
<?php if($hasSoftDelete): ?>
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('<?php echo e(str_plural($modelVariableName)); ?>')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });
<?php else: ?>
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    <?php echo e($modelBaseName); ?>::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });
<?php endif; ?>

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
<?php endif; ?>
<?php if($export): ?>

    /**
     * Export entities
     *
     * <?php echo e('@'); ?>return BinaryFileResponse|null
     */
    public function export(): ?BinaryFileResponse
    {
        return Excel::download(app(<?php echo e($exportBaseName); ?>::class), '<?php echo e(str_plural($modelVariableName)); ?>.xlsx');
    }
<?php endif; ?>}
<?php /**PATH /Users/betulerkantarci/Desktop/artB/vendor/brackets/admin-generator/src/../resources/views/controller.blade.php ENDPATH**/ ?>