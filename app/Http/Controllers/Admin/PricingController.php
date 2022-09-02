<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pricing\BulkDestroyPricing;
use App\Http\Requests\Admin\Pricing\DestroyPricing;
use App\Http\Requests\Admin\Pricing\IndexPricing;
use App\Http\Requests\Admin\Pricing\StorePricing;
use App\Http\Requests\Admin\Pricing\UpdatePricing;
use App\Models\Pricing;
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

class PricingController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPricing $request
     * @return array|Factory|View
     */
    public function index(IndexPricing $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Pricing::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['description', 'enabled', 'id', 'title','link'],

            // set columns to searchIn
            ['description', 'id', 'title','link']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.pricing.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.pricing.create');

        return view('admin.pricing.create',[
            'mode' => 'create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePricing $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePricing $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Pricing
        $pricing = Pricing::create($request->validated());

        if ($request->ajax()) {
            return ['redirect' => url('admin/pricings'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/pricings');
    }

    /**
     * Display the specified resource.
     *
     * @param Pricing $pricing
     * @throws AuthorizationException
     * @return void
     */
    public function show(Pricing $pricing)
    {
        $this->authorize('admin.pricing.show', $pricing);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Pricing $pricing
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Pricing $pricing)
    {
        $this->authorize('admin.pricing.edit', $pricing);


        return view('admin.pricing.edit', [
            'pricing' => $pricing,
            'mode' => 'edit',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePricing $request
     * @param Pricing $pricing
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePricing $request, Pricing $pricing)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Pricing
        $pricing->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/pricings'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/pricings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPricing $request
     * @param Pricing $pricing
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPricing $request, Pricing $pricing)
    {
        $pricing->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPricing $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPricing $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Pricing::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
