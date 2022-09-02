<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Platform\BulkDestroyPlatform;
use App\Http\Requests\Admin\Platform\DestroyPlatform;
use App\Http\Requests\Admin\Platform\IndexPlatform;
use App\Http\Requests\Admin\Platform\StorePlatform;
use App\Http\Requests\Admin\Platform\UpdatePlatform;
use App\Models\Platform;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PlatformController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPlatform $request
     * @return array|Factory|View
     */
    public function index(IndexPlatform $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Platform::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['description', 'enabled', 'id', 'title', 'link'],

            // set columns to searchIn
            ['description', 'id', 'title', 'link']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.platform.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.platform.create');

        return view('admin.platform.create',[
            'mode' => 'create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePlatform $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePlatform $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Platform
        $platform = Platform::create($request->validated());

        if ($request->ajax()) {
            return ['redirect' => url('admin/platforms'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/platforms');
    }

    /**
     * Display the specified resource.
     *
     * @param Platform $platform
     * @throws AuthorizationException
     * @return void
     */
    public function show(Platform $platform)
    {
        $this->authorize('admin.platform.show', $platform);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Platform $platform
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Platform $platform)
    {
        $this->authorize('admin.platform.edit', $platform);


        return view('admin.platform.edit', [
            'platform' => $platform,
            'mode' => 'edit',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePlatform $request
     * @param Platform $platform
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePlatform $request, Platform $platform)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Platform
        $platform->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/platforms'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/platforms');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPlatform $request
     * @param Platform $platform
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPlatform $request, Platform $platform)
    {
        $platform->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPlatform $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPlatform $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Platform::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
