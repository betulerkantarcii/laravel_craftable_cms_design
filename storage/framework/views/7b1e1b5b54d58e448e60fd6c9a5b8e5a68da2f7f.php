<?php if($hasTranslatable): ?><div class="row form-inline" style="padding-bottom: 10px;" v-cloak>
    <div :class="{'col-xl-10 col-md-11 text-right': !isFormLocalized, 'col text-center': isFormLocalized, 'hidden': onSmallScreen }">
        <small>{{ trans('brackets/admin-ui::admin.forms.currently_editing_translation') }}<span v-if="!isFormLocalized && otherLocales.length > 1"> {{ trans('brackets/admin-ui::admin.forms.more_can_be_managed') }}</span><span v-if="!isFormLocalized"> | <a href="#" @click.prevent="showLocalization">{{ trans('brackets/admin-ui::admin.forms.manage_translations') }}</a></span></small>
        <i class="localization-error" v-if="!isFormLocalized && showLocalizedValidationError"></i>
    </div>

    <div class="col text-center" :class="{'language-mobile': onSmallScreen, 'has-error': !isFormLocalized && showLocalizedValidationError}" v-if="isFormLocalized || onSmallScreen" v-cloak>
        <small>{{ trans('brackets/admin-ui::admin.forms.choose_translation_to_edit') }}
            <select class="form-control" v-model="currentLocale">
                <option :value="defaultLocale" v-if="onSmallScreen"><?php echo e('@{{'); ?>defaultLocale.toUpperCase()}}</option>
                <option v-for="locale in otherLocales" :value="locale"><?php echo e('@{{'); ?>locale.toUpperCase()}}</option>
            </select>
            <i class="localization-error" v-if="isFormLocalized && showLocalizedValidationError"></i>
            <span>|</span>
            <a href="#" @click.prevent="hideLocalization">{{ trans('brackets/admin-ui::admin.forms.hide') }}</a>
        </small>
    </div>
</div>
<?php endif; ?>

<?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(!in_array($col['name'], ['created_by_admin_user_id','updated_by_admin_user_id'])): ?><?php if($col['name'] == 'password'): ?><div class="form-group row align-items-center" :class="{'has-danger': errors.has('<?php echo e($col['name']); ?>'), 'has-success': fields.<?php echo e($col['name']); ?> && fields.<?php echo e($col['name']); ?>.valid }">
    <label for="<?php echo e($col['name']); ?>" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.columns.<?php echo e($col['name']); ?>') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="password" v-model="form.<?php echo e($col['name']); ?>" v-validate="'<?php echo e(implode('|', collect($col['frontendRules'])->reject(function($rule) use ($col) { return $rule === 'confirmed:'.$col['name'];})->toArray())); ?>'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('<?php echo e($col['name']); ?>'), 'form-control-success': fields.<?php echo e($col['name']); ?> && fields.<?php echo e($col['name']); ?>.valid}" id="<?php echo e($col['name']); ?>" name="<?php echo e($col['name']); ?>" placeholder="<?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.columns.<?php echo e($col['name']); ?>') }}" ref="<?php echo e($col['name']); ?>">
        <div v-if="errors.has('<?php echo e($col['name']); ?>')" class="form-control-feedback form-text" v-cloak><?php echo e('@{{'); ?> errors.first('<?php echo e($col['name']); ?>') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('<?php echo e($col['name']); ?>_confirmation'), 'has-success': fields.<?php echo e($col['name']); ?>_confirmation && fields.<?php echo e($col['name']); ?>_confirmation.valid }">
    <label for="<?php echo e($col['name']); ?>_confirmation" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.columns.<?php echo e($col['name']); ?>_repeat') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="password" v-model="form.<?php echo e($col['name']); ?>_confirmation" v-validate="'<?php echo e(implode('|', $col['frontendRules'])); ?>'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('<?php echo e($col['name']); ?>_confirmation'), 'form-control-success': fields.<?php echo e($col['name']); ?>_confirmation && fields.<?php echo e($col['name']); ?>_confirmation.valid}" id="<?php echo e($col['name']); ?>_confirmation" name="<?php echo e($col['name']); ?>_confirmation" placeholder="<?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.columns.<?php echo e($col['name']); ?>') }}" data-vv-as="<?php echo e($col['name']); ?>">
        <div v-if="errors.has('<?php echo e($col['name']); ?>_confirmation')" class="form-control-feedback form-text" v-cloak><?php echo e('@{{'); ?> errors.first('<?php echo e($col['name']); ?>_confirmation') }}</div>
    </div>
</div>
<?php elseif($col['type'] == 'date' && !in_array($col['name'], ['published_at'])): ?><div class="form-group row align-items-center" :class="{'has-danger': errors.has('<?php echo e($col['name']); ?>'), 'has-success': fields.<?php echo e($col['name']); ?> && fields.<?php echo e($col['name']); ?>.valid }">
    <label for="<?php echo e($col['name']); ?>" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.columns.<?php echo e($col['name']); ?>') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.<?php echo e($col['name']); ?>" :config="datePickerConfig" v-validate="'<?php echo e(implode('|', $col['frontendRules'])); ?>'" class="flatpickr" :class="{'form-control-danger': errors.has('<?php echo e($col['name']); ?>'), 'form-control-success': fields.<?php echo e($col['name']); ?> && fields.<?php echo e($col['name']); ?>.valid}" id="<?php echo e($col['name']); ?>" name="<?php echo e($col['name']); ?>" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('<?php echo e($col['name']); ?>')" class="form-control-feedback form-text" v-cloak><?php echo e('@{{'); ?> errors.first('<?php echo e($col['name']); ?>') }}</div>
    </div>
</div>
<?php elseif($col['type'] == 'time'): ?><div class="form-group row align-items-center" :class="{'has-danger': errors.has('<?php echo e($col['name']); ?>'), 'has-success': fields.<?php echo e($col['name']); ?> && fields.<?php echo e($col['name']); ?>.valid }">
    <label for="<?php echo e($col['name']); ?>" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.columns.<?php echo e($col['name']); ?>') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
            <datetime v-model="form.<?php echo e($col['name']); ?>" :config="timePickerConfig" v-validate="'<?php echo e(implode('|', $col['frontendRules'])); ?>'" class="flatpickr" :class="{'form-control-danger': errors.has('<?php echo e($col['name']); ?>'), 'form-control-success': fields.<?php echo e($col['name']); ?> && fields.<?php echo e($col['name']); ?>.valid}" id="<?php echo e($col['name']); ?>" name="<?php echo e($col['name']); ?>" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_time') }}"></datetime>
        </div>
        <div v-if="errors.has('<?php echo e($col['name']); ?>')" class="form-control-feedback form-text" v-cloak><?php echo e('@{{'); ?> errors.first('<?php echo e($col['name']); ?>') }}</div>
    </div>
</div>

<?php elseif($col['type'] == 'datetime' && !in_array($col['name'], ['published_at'])): ?><div class="form-group row align-items-center" :class="{'has-danger': errors.has('<?php echo e($col['name']); ?>'), 'has-success': fields.<?php echo e($col['name']); ?> && fields.<?php echo e($col['name']); ?>.valid }">
    <label for="<?php echo e($col['name']); ?>" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.columns.<?php echo e($col['name']); ?>') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.<?php echo e($col['name']); ?>" :config="datetimePickerConfig" v-validate="'<?php echo e(implode('|', $col['frontendRules'])); ?>'" class="flatpickr" :class="{'form-control-danger': errors.has('<?php echo e($col['name']); ?>'), 'form-control-success': fields.<?php echo e($col['name']); ?> && fields.<?php echo e($col['name']); ?>.valid}" id="<?php echo e($col['name']); ?>" name="<?php echo e($col['name']); ?>" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('<?php echo e($col['name']); ?>')" class="form-control-feedback form-text" v-cloak><?php echo e('@{{'); ?> errors.first('<?php echo e($col['name']); ?>') }}</div>
    </div>
</div>
<?php elseif($col['type'] == 'text' && in_array($col['name'], $wysiwygTextColumnNames)): ?><div class="form-group row align-items-center" :class="{'has-danger': errors.has('<?php echo e($col['name']); ?>'), 'has-success': fields.<?php echo e($col['name']); ?> && fields.<?php echo e($col['name']); ?>.valid }">
    <label for="<?php echo e($col['name']); ?>" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.columns.<?php echo e($col['name']); ?>') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.<?php echo e($col['name']); ?>" v-validate="'<?php echo e(implode('|', $col['frontendRules'])); ?>'" id="<?php echo e($col['name']); ?>" name="<?php echo e($col['name']); ?>" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('<?php echo e($col['name']); ?>')" class="form-control-feedback form-text" v-cloak><?php echo e('@{{'); ?> errors.first('<?php echo e($col['name']); ?>') }}</div>
    </div>
</div>
<?php elseif($col['type'] == 'text'): ?><div class="form-group row align-items-center" :class="{'has-danger': errors.has('<?php echo e($col['name']); ?>'), 'has-success': fields.<?php echo e($col['name']); ?> && fields.<?php echo e($col['name']); ?>.valid }">
    <label for="<?php echo e($col['name']); ?>" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.columns.<?php echo e($col['name']); ?>') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.<?php echo e($col['name']); ?>" v-validate="'<?php echo e(implode('|', $col['frontendRules'])); ?>'" id="<?php echo e($col['name']); ?>" name="<?php echo e($col['name']); ?>"></textarea>
        </div>
        <div v-if="errors.has('<?php echo e($col['name']); ?>')" class="form-control-feedback form-text" v-cloak><?php echo e('@{{'); ?> errors.first('<?php echo e($col['name']); ?>') }}</div>
    </div>
</div>
<?php elseif($col['type'] == 'boolean'): ?><div class="form-check row" :class="{'has-danger': errors.has('<?php echo e($col['name']); ?>'), 'has-success': fields.<?php echo e($col['name']); ?> && fields.<?php echo e($col['name']); ?>.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="<?php echo e($col['name']); ?>" type="checkbox" v-model="form.<?php echo e($col['name']); ?>" v-validate="'<?php echo e(implode('|', $col['frontendRules'])); ?>'" data-vv-name="<?php echo e($col['name']); ?>"  name="<?php echo e($col['name']); ?>_fake_element">
        <label class="form-check-label" for="<?php echo e($col['name']); ?>">
            <?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.columns.<?php echo e($col['name']); ?>') }}
        </label>
        <input type="hidden" name="<?php echo e($col['name']); ?>" :value="form.<?php echo e($col['name']); ?>">
        <div v-if="errors.has('<?php echo e($col['name']); ?>')" class="form-control-feedback form-text" v-cloak><?php echo e('@{{'); ?> errors.first('<?php echo e($col['name']); ?>') }}</div>
    </div>
</div>
<?php elseif($col['type'] == 'json'): ?><div class="row">
    @foreach($locales as $locale)
        <div class="col-md" v-show="shouldShowLangGroup('{{ $locale }}')" v-cloak>
            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('<?php echo e($col['name']); ?>_{{ $locale }}'), 'has-success': fields.<?php echo e($col['name']); ?>_{{ $locale }} && fields.<?php echo e($col['name']); ?>_{{ $locale }}.valid }">
                <label for="<?php echo e($col['name']); ?>_{{ $locale }}" class="col-md-2 col-form-label text-md-right"><?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.columns.<?php echo e($col['name']); ?>') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <?php if(in_array($col['name'], $wysiwygTextColumnNames)): ?><div>
                        <wysiwyg v-model="form.<?php echo e($col['name']); ?>.{{ $locale }}" v-validate="'<?php echo implode('|', $col['frontendRules']); ?>'" id="<?php echo e($col['name']); ?>_{{ $locale }}" name="<?php echo e($col['name']); ?>_{{ $locale }}" :config="mediaWysiwygConfig"></wysiwyg>
                    </div>
                    <?php else: ?><input type="text" v-model="form.<?php echo e($col['name']); ?>.{{ $locale }}" v-validate="'<?php echo implode('|', $col['frontendRules']); ?>'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('<?php echo e($col['name']); ?>_{{ $locale }}'), 'form-control-success': fields.<?php echo e($col['name']); ?>_{{ $locale }} && fields.<?php echo e($col['name']); ?>_{{ $locale }}.valid }" id="<?php echo e($col['name']); ?>_{{ $locale }}" name="<?php echo e($col['name']); ?>_{{ $locale }}" placeholder="<?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.columns.<?php echo e($col['name']); ?>') }}">
                    <?php endif; ?><div v-if="errors.has('<?php echo e($col['name']); ?>_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('<?php echo e($col['name']); ?>_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<?php elseif(!in_array($col['name'], ['published_at'])): ?><div class="form-group row align-items-center" :class="{'has-danger': errors.has('<?php echo e($col['name']); ?>'), 'has-success': fields.<?php echo e($col['name']); ?> && fields.<?php echo e($col['name']); ?>.valid }">
    <label for="<?php echo e($col['name']); ?>" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.columns.<?php echo e($col['name']); ?>') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.<?php echo e($col['name']); ?>" v-validate="'<?php echo e(implode('|', $col['frontendRules'])); ?>'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('<?php echo e($col['name']); ?>'), 'form-control-success': fields.<?php echo e($col['name']); ?> && fields.<?php echo e($col['name']); ?>.valid}" id="<?php echo e($col['name']); ?>" name="<?php echo e($col['name']); ?>" placeholder="<?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.columns.<?php echo e($col['name']); ?>') }}">
        <div v-if="errors.has('<?php echo e($col['name']); ?>')" class="form-control-feedback form-text" v-cloak><?php echo e('@{{'); ?> errors.first('<?php echo e($col['name']); ?>') }}</div>
    </div>
</div>
<?php endif; ?>
<?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php if(count($relations)): ?>
<?php if(count($relations['belongsToMany'])): ?>
<?php $__currentLoopData = $relations['belongsToMany']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $belongsToMany): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><div class="form-group row align-items-center" :class="{'has-danger': errors.has('<?php echo e($belongsToMany['related_table']); ?>'), 'has-success': fields.<?php echo e($belongsToMany['related_table']); ?> && fields.<?php echo e($belongsToMany['related_table']); ?>.valid }">
    <label for="<?php echo e($belongsToMany['related_table']); ?>" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.columns.<?php echo e(lcfirst($belongsToMany['related_model_name_plural'])); ?>') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.<?php echo e($belongsToMany['related_table']); ?>" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_options') }}" label="name" track-by="id" :options="<?php echo e('{{'); ?> $<?php echo e($belongsToMany['related_table']); ?>->toJson() }}" :multiple="true" open-direction="bottom"></multiselect>
        <div v-if="errors.has('<?php echo e($belongsToMany['related_table']); ?>')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('<?php echo $belongsToMany['related_table']; ?>') }}</div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php endif; ?>
<?php /**PATH /Users/betulerkantarci/Desktop/artB/vendor/brackets/admin-generator/src/../resources/views/form.blade.php ENDPATH**/ ?>