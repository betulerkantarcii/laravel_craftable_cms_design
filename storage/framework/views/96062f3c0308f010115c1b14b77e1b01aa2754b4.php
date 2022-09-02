<?php echo e('@'); ?>extends('brackets/admin-ui::admin.layout.default')

<?php echo e('@'); ?>section('title', trans('admin.<?php echo e($modelLangFormat); ?>.actions.index'))

<?php echo e('@'); ?>section('body')

    <<?php echo e($modelJSName); ?>-listing
        :data="<?php echo e('{{'); ?> $data->toJson() }}"
        :url="'<?php echo e('{{'); ?> url('admin/<?php echo e($resource); ?>') }}'"
<?php if($containsPublishedAtColumn): ?>
        :trans="<?php echo e('{{'); ?> json_encode(trans('brackets/admin-ui::admin.dialogs')) }}"
<?php endif; ?>
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> <?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.actions.index') }}
<?php if($export): ?>
                        <a class="btn btn-primary btn-sm pull-right m-b-0 ml-2" href="<?php echo e('{{'); ?> url('admin/<?php echo e($resource); ?>/export') }}" role="button"><i class="fa fa-file-excel-o"></i>&nbsp; <?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.actions.export') }}</a>
<?php endif; ?>
                        <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="<?php echo e('{{'); ?> url('admin/<?php echo e($resource); ?>/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; <?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.actions.create') }}</a>
                    </div>
                    <div class="card-body" v-cloak>
                        <div class="card-block">
                            <form @submit.prevent="">
                                <div class="row justify-content-md-between">
                                    <div class="col col-lg-7 col-xl-5 form-group">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="{{ trans('brackets/admin-ui::admin.placeholder.search') }}" v-model="search" @keyup.enter="filter('search', $event.target.value)" />
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-primary" @click="filter('search', search)"><i class="fa fa-search"></i>&nbsp; {{ trans('brackets/admin-ui::admin.btn.search') }}</button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-auto form-group ">
                                        <select class="form-control" v-model="pagination.state.per_page">
                                            
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                            </form>

                            <table class="table table-hover table-listing">
                                <thead>
                                    <tr>
<?php if(!$withoutBulk): ?>
                                        <th class="bulk-checkbox">
                                            <input class="form-check-input" id="enabled" type="checkbox" v-model="isClickedAll" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element" @click="onBulkItemsClickedAllWithPagination()">
                                            <label class="form-check-label" for="enabled">
                                                #
                                            </label>
                                        </th>
<?php endif; ?>

<?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($col['name'] === 'published_at'): ?>
                                        <th is='sortable' class="text-center" :column="'<?php echo e($col['name']); ?>'"><?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.columns.<?php echo e($col['name']); ?>') }}</th>
<?php else: ?>                                        <th is='sortable' :column="'<?php echo e($col['name']); ?>'"><?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.columns.<?php echo e($col['name']); ?>') }}</th>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <th></th>
                                    </tr>
<?php if(!$withoutBulk): ?>
                                    <tr v-show="(clickedBulkItemsCount > 0) || isClickedAll">
                                        <td class="bg-bulk-info d-table-cell text-center" colspan="<?php echo e(count($columns) + 2); ?>">
                                            <span class="align-middle font-weight-light text-dark">{{ trans('brackets/admin-ui::admin.listing.selected_items') }} <?php echo e('@{{'); ?> clickedBulkItemsCount }}.  <a href="#" class="text-primary" @click="onBulkItemsClickedAll('/admin/<?php echo e($resource); ?>')" v-if="(clickedBulkItemsCount < pagination.state.total)"> <i class="fa" :class="bulkCheckingAllLoader ? 'fa-spinner' : ''"></i> {{ trans('brackets/admin-ui::admin.listing.check_all_items') }} <?php echo e('@{{'); ?> pagination.state.total }}</a> <span class="text-primary">|</span> <a
                                                        href="#" class="text-primary" @click="onBulkItemsClickedAllUncheck()">{{ trans('brackets/admin-ui::admin.listing.uncheck_all_items') }}</a>  </span>

                                            <span class="pull-right pr-2">
                                                <button class="btn btn-sm btn-danger pr-3 pl-3" @click="bulkDelete('/admin/<?php echo e($resource); ?>/bulk-destroy')">{{ trans('brackets/admin-ui::admin.btn.delete') }}</button>
                                            </span>

                                        </td>
                                    </tr>
<?php endif; ?>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in collection" <?php if(!$withoutBulk): ?>:key="item.id" :class="bulkItems[item.id] ? 'bg-bulk' : ''"<?php endif; ?>>
<?php if(!$withoutBulk): ?>
                                        <td class="bulk-checkbox">
                                            <input class="form-check-input" :id="'enabled' + item.id" type="checkbox" v-model="bulkItems[item.id]" v-validate="''" :data-vv-name="'enabled' + item.id"  :name="'enabled' + item.id + '_fake_element'" @click="onBulkItemClicked(item.id)" :disabled="bulkCheckingAllLoader">
                                            <label class="form-check-label" :for="'enabled' + item.id">
                                            </label>
                                        </td>
<?php endif; ?>

                                    <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if($col['switch']): ?><td>
                                            <label class="switch switch-3d switch-success">
                                                <input type="checkbox" class="switch-input" v-model="collection[index].<?php echo e($col['name']); ?>" @change="toggleSwitch(item.resource_url, '<?php echo e($col['name']); ?>', collection[index])">
                                                <span class="switch-slider"></span>
                                            </label>
                                        </td>
<?php elseif($col['name'] === 'created_by_admin_user_id'): ?>    <div class="user-detail-tooltips-list">
                                            <td>
                                                <user-detail-tooltip :user="item.created_by_admin_user" v-if="item.created_by_admin_user">
                                                    <p>Created on <?php echo e('@{{'); ?> item.created_at | datetime('HH:mm:ss, DD.MM.YYYY') }}</p>
                                                </user-detail-tooltip>
                                            </td>
                                        </div>
<?php elseif($col['name'] === 'updated_by_admin_user_id'): ?>    <div class="user-detail-tooltips-list">
                                            <td>
                                                <user-detail-tooltip :user="item.updated_by_admin_user" v-if="item.updated_by_admin_user">
                                                    <p>Updated on <?php echo e('@{{'); ?> item.updated_at | datetime('HH:mm:ss, DD.MM.YYYY') }}</p>
                                                </user-detail-tooltip>
                                            </td>
                                        </div>
<?php elseif($col['name'] === 'published_at'): ?>    <td class="text-center text-nowrap">
                                            <span v-if="item.published_at <= now">
                                                <?php echo e('@{{'); ?> item.published_at | datetime('DD.MM.YYYY, HH:mm') }}
                                            </span>
                                                <span v-if="item.published_at > now">
                                                <small><?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.actions.will_be_published') }}</small><br />
                                                <?php echo e('@{{'); ?> item.published_at | datetime('DD.MM.YYYY, HH:mm') }}
                                                <span class="cursor-pointer" @click="publishLater(item.resource_url, collection[index], 'publishLaterDialog')" title="{{ trans('brackets/admin-ui::admin.operation.publish_later') }}" role="button"><i class="fa fa-calendar"></i></span>
                                            </span>
                                            <div v-if="!item.published_at">
                                                <span class="btn btn-sm btn-info text-white mb-1" @click="publishLater(item.resource_url, collection[index], 'publishLaterDialog')" title="{{ trans('brackets/admin-ui::admin.operation.publish_later') }}" role="button"><i class="fa fa-calendar"></i>&nbsp;&nbsp;{{ trans('brackets/admin-ui::admin.operation.publish_later') }}</span>
                                            </div>
                                            <div v-if="!item.published_at || item.published_at > now">
                                                <form class="d-inline" @submit.prevent="publishNow(item.resource_url, collection[index], 'publishNowDialog')">
                                                    <button type="submit" class="btn btn-sm btn-success text-white" title="{{ trans('brackets/admin-ui::admin.operation.publish_now') }}"><i class="fa fa-send"></i>&nbsp;&nbsp;{{ trans('brackets/admin-ui::admin.operation.publish_now') }}</button>
                                                </form>
                                            </div>
                                            <div v-if="item.published_at && item.published_at < now">
                                                <form class="d-inline" @submit.prevent="unpublishNow(item.resource_url, collection[index])">
                                                    <button type="submit" class="btn btn-sm btn-danger" title="{{ trans('brackets/admin-ui::admin.operation.unpublish_now') }}"><i class="fa fa-send"></i>&nbsp;&nbsp;{{ trans('brackets/admin-ui::admin.operation.unpublish_now') }}</button>
                                                </form>
                                            </div>
                                        </td>
                                        <?php else: ?><td><?php echo e('@{{'); ?> item.<?php echo e($col['name']); ?><?php echo e($col['filters']); ?> }}</td><?php endif; ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <td>
                                            <div class="row no-gutters">
                                                <div class="col-auto">
                                                    <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/edit'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button"><i class="fa fa-edit"></i></a>
                                                </div>
                                                <form class="col" @submit.prevent="deleteItem(item.resource_url)">
                                                    <button type="submit" class="btn btn-sm btn-danger" title="{{ trans('brackets/admin-ui::admin.btn.delete') }}"><i class="fa fa-trash-o"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="row" v-if="pagination.state.total > 0">
                                <div class="col-sm">
                                    <span class="pagination-caption">{{ trans('brackets/admin-ui::admin.pagination.overview') }}</span>
                                </div>
                                <div class="col-sm-auto">
                                    <pagination></pagination>
                                </div>
                            </div>

                            <div class="no-items-found" v-if="!collection.length > 0">
                                <i class="icon-magnifier"></i>
                                <h3>{{ trans('brackets/admin-ui::admin.index.no_items') }}</h3>
                                <p>{{ trans('brackets/admin-ui::admin.index.try_changing_items') }}</p>
                                <a class="btn btn-primary btn-spinner" href="<?php echo e('{{'); ?> url('admin/<?php echo e($resource); ?>/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; <?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.actions.create') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </<?php echo e($modelJSName); ?>-listing>

<?php echo e('@'); ?>endsection<?php /**PATH /Users/betulerkantarci/Desktop/artB/vendor/brackets/admin-generator/src/../resources/views/index.blade.php ENDPATH**/ ?>