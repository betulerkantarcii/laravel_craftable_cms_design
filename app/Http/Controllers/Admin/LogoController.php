<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Logo\BulkDestroyLogo;
use App\Http\Requests\Admin\Logo\DestroyLogo;
use App\Http\Requests\Admin\Logo\IndexLogo;
use App\Http\Requests\Admin\Logo\StoreLogo;
use App\Http\Requests\Admin\Logo\UpdateLogo;
use App\Models\Logo;
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

class LogoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexLogo $request
     * @return array|Factory|View
     */
    public function index(IndexLogo $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Logo::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'enabled', 'title', 'description', 'link'],

            // set columns to searchIn
            ['id', 'title', 'description', 'link']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.logo.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.logo.create');

        return view('admin.logo.create',[
            'mode' => 'create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLogo $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreLogo $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Logo
        $logo = Logo::create($request->validated());

        if ($request->ajax()) {
            return ['redirect' => url('admin/logos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/logos');
    }

    /**
     * Display the specified resource.
     *
     * @param Logo $logo
     * @throws AuthorizationException
     * @return void
     */
    public function show(Logo $logo)
    {
        $this->authorize('admin.logo.show', $logo);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Logo $logo
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Logo $logo)
    {
        $this->authorize('admin.logo.edit', $logo);


        return view('admin.logo.edit', [
            'logo' => $logo,
            'mode' => 'edit',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLogo $request
     * @param Logo $logo
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateLogo $request, Logo $logo)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Logo
        $logo->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/logos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/logos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyLogo $request
     * @param Logo $logo
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyLogo $request, Logo $logo)
    {
        $logo->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyLogo $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyLogo $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Logo::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
