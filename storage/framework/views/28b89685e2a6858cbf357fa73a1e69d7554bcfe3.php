<?php echo e('@'); ?>extends('brackets/admin-ui::admin.layout.default')

<?php echo e('@'); ?>section('title', trans('admin.<?php echo e($modelLangFormat); ?>.actions.index'))

<?php echo e('@'); ?>section('body')

    <<?php echo e($modelJSName); ?>-listing
        :data="<?php echo e('{{'); ?> $data->toJson() }}"
        :activation="!!'{{ $activation }}'"
        :url="'<?php echo e('{{'); ?> url('admin/<?php echo e($resource); ?>') }}'"
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
                                    <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><th is='sortable' :column="'<?php echo e($col['name']); ?>'"<?php if($col['name'] == 'activated'): ?> v-if="activation"<?php endif; ?>><?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.columns.<?php echo e($col['name']); ?>') }}</th>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in collection">
                                    <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><td <?php if($col['name'] == 'activated'): ?>v-if="activation"<?php endif; ?>><?php if($col['switch']): ?>

                                        <label class="switch switch-3d switch-success">
                                            <input type="checkbox" class="switch-input" v-model="collection[index].<?php echo e($col['name']); ?>" @change="toggleSwitch(item.resource_url, '<?php echo e($col['name']); ?>', collection[index])">
                                            <span class="switch-slider"></span>
                                        </label>
                                    <?php elseif($col['name'] == 'forbidden'): ?>

                                        <label class="switch switch-3d switch-danger">
                                            <input type="checkbox" class="switch-input" v-model="collection[index].<?php echo e($col['name']); ?>" @change="toggleSwitch(item.resource_url, '<?php echo e($col['name']); ?>', collection[index])">
                                            <span class="switch-slider"></span>
                                        </label>
                                    <?php else: ?><?php echo e('@{{'); ?> item.<?php echo e($col['name']); ?><?php echo e($col['filters']); ?> }}<?php endif; ?></td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <td>
                                        <div class="row no-gutters">
                                            <?php echo e('@'); ?>can('admin.admin-user.impersonal-login')
                                            <div class="col-auto">
                                                <button class="btn btn-sm btn-success" v-show="item.activated" @click="impersonalLogin(item.resource_url + '/impersonal-login', item)" title="Impersonal login" role="button"><i class="fa fa-user-o"></i></button>
                                            </div>
                                            <?php echo e('@'); ?>endcan
                                            <div class="col-auto">
                                                <button class="btn btn-sm btn-warning" v-show="!item.activated" @click="resendActivation(item.resource_url + '/resend-activation')" title="Resend activation" role="button"><i class="fa fa-envelope-o"></i></button>
                                            </div>
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
                            <a class="btn btn-primary btn-spinner" href="<?php echo e('{{'); ?> url('admin/<?php echo e($resource); ?>/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('brackets/admin-ui::admin.btn.new') }} <?php echo e($modelBaseName); ?></a>
	                    </div>
                    </div>
                </div>
            </div>
        </div>
    </<?php echo e($modelJSName); ?>-listing>

<?php echo e('@'); ?>endsection
<?php /**PATH /Users/betulerkantarci/Desktop/artB/vendor/brackets/admin-generator/src/../resources/views/templates/admin-user/index.blade.php ENDPATH**/ ?>