<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Design\BulkDestroyDesign;
use App\Http\Requests\Admin\Design\DestroyDesign;
use App\Http\Requests\Admin\Design\IndexDesign;
use App\Http\Requests\Admin\Design\StoreDesign;
use App\Http\Requests\Admin\Design\UpdateDesign;
use App\Models\Design;
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

class DesignController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexDesign $request
     * @return array|Factory|View
     */
    public function index(IndexDesign $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Design::class)->processRequestAndGet(
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

        return view('admin.design.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.design.create');

        return view('admin.design.create',[
            'mode' => 'create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDesign $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreDesign $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Design
        $design = Design::create($request->validated());

        if ($request->ajax()) {
            return ['redirect' => url('admin/designs'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/designs');
    }

    /**
     * Display the specified resource.
     *
     * @param Design $design
     * @throws AuthorizationException
     * @return void
     */
    public function show(Design $design)
    {
        $this->authorize('admin.design.show', $design);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Design $design
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Design $design)
    {
        $this->authorize('admin.design.edit', $design);


        return view('admin.design.edit', [
            'design' => $design,
            'mode' => 'edit',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDesign $request
     * @param Design $design
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateDesign $request, Design $design)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Design
        $design->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/designs'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/designs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyDesign $request
     * @param Design $design
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyDesign $request, Design $design)
    {
        $design->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyDesign $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyDesign $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Design::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
