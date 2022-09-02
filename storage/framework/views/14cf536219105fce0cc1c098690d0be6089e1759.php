<div class="row form-inline" style="padding-bottom: 10px;" v-cloak>
    <div :class="{'col-xl-10 col-md-11 text-right': !isFormLocalized, 'col text-center': isFormLocalized, 'hidden': onSmallScreen }">
        <small><?php echo e(trans('brackets/admin-ui::admin.forms.currently_editing_translation')); ?><span v-if="!isFormLocalized && otherLocales.length > 1"> <?php echo e(trans('brackets/admin-ui::admin.forms.more_can_be_managed')); ?></span><span v-if="!isFormLocalized"> | <a href="#" @click.prevent="showLocalization"><?php echo e(trans('brackets/admin-ui::admin.forms.manage_translations')); ?></a></span></small>
        <i class="localization-error" v-if="!isFormLocalized && showLocalizedValidationError"></i>
    </div>

    <div class="col text-center" :class="{'language-mobile': onSmallScreen, 'has-error': !isFormLocalized && showLocalizedValidationError}" v-if="isFormLocalized || onSmallScreen" v-cloak>
        <small><?php echo e(trans('brackets/admin-ui::admin.forms.choose_translation_to_edit')); ?>

            <select class="form-control" v-model="currentLocale">
                <option :value="defaultLocale" v-if="onSmallScreen">{{defaultLocale.toUpperCase()}}</option>
                <option v-for="locale in otherLocales" :value="locale">{{locale.toUpperCase()}}</option>
            </select>
            <i class="localization-error" v-if="isFormLocalized && showLocalizedValidationError"></i>
            <span>|</span>
            <a href="#" @click.prevent="hideLocalization"><?php echo e(trans('brackets/admin-ui::admin.forms.hide')); ?></a>
        </small>
    </div>
</div>

<div class="row">
    <?php $__currentLoopData = $locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md" v-show="shouldShowLangGroup('<?php echo e($locale); ?>')" v-cloak>
            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('title_<?php echo e($locale); ?>'), 'has-success': fields.title_<?php echo e($locale); ?> && fields.title_<?php echo e($locale); ?>.valid }">
                <label for="title_<?php echo e($locale); ?>" class="col-md-2 col-form-label text-md-right"><?php echo e(trans('admin.platform.columns.title')); ?></label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.title.<?php echo e($locale); ?>" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('title_<?php echo e($locale); ?>'), 'form-control-success': fields.title_<?php echo e($locale); ?> && fields.title_<?php echo e($locale); ?>.valid }" id="title_<?php echo e($locale); ?>" name="title_<?php echo e($locale); ?>" placeholder="<?php echo e(trans('admin.platform.columns.title')); ?>">
                    <div v-if="errors.has('title_<?php echo e($locale); ?>')" class="form-control-feedback form-text" v-cloak><?php echo e('{{'); ?> errors.first('title_<?php echo e($locale); ?>') }}</div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>


<div class="row">
    <?php $__currentLoopData = $locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md" v-show="shouldShowLangGroup('<?php echo e($locale); ?>')" v-cloak>
            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('description_<?php echo e($locale); ?>'), 'has-success': fields.description_<?php echo e($locale); ?> && fields.description_<?php echo e($locale); ?>.valid }">
                <label for="description_<?php echo e($locale); ?>" class="col-md-2 col-form-label text-md-right"><?php echo e(trans('admin.platform.columns.description')); ?></label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <div>
                        <wysiwyg v-model="form.description.<?php echo e($locale); ?>" v-validate="''" id="description_<?php echo e($locale); ?>" name="description_<?php echo e($locale); ?>" :config="mediaWysiwygConfig"></wysiwyg>
                    </div>
                    <div v-if="errors.has('description_<?php echo e($locale); ?>')" class="form-control-feedback form-text" v-cloak><?php echo e('{{'); ?> errors.first('description_<?php echo e($locale); ?>') }}</div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('enabled'), 'has-success': fields.enabled && fields.enabled.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enabled" type="checkbox" v-model="form.enabled" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element">
        <label class="form-check-label" for="enabled">
            <?php echo e(trans('admin.platform.columns.enabled')); ?>

        </label>
        <input type="hidden" name="enabled" :value="form.enabled">
        <div v-if="errors.has('enabled')" class="form-control-feedback form-text" v-cloak>{{ errors.first('enabled') }}</div>
    </div>
</div>

<div class="row">
    <?php $__currentLoopData = $locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md" v-show="shouldShowLangGroup('<?php echo e($locale); ?>')" v-cloak>
            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('link_<?php echo e($locale); ?>'), 'has-success': fields.link_<?php echo e($locale); ?> && fields.link_<?php echo e($locale); ?>.valid }">
                <label for="link_<?php echo e($locale); ?>" class="col-md-2 col-form-label text-md-right"><?php echo e(trans('admin.logo.columns.link')); ?></label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.link.<?php echo e($locale); ?>" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('link_<?php echo e($locale); ?>'), 'form-control-success': fields.link_<?php echo e($locale); ?> && fields.link_<?php echo e($locale); ?>.valid }" id="link_<?php echo e($locale); ?>" name="link_<?php echo e($locale); ?>" placeholder="<?php echo e(trans('admin.logo.columns.link')); ?>">
                    <div v-if="errors.has('link_<?php echo e($locale); ?>')" class="form-control-feedback form-text" v-cloak><?php echo e('{{'); ?> errors.first('link_<?php echo e($locale); ?>') }}</div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php if($mode === 'create'): ?>
<div class="row">
    <div class="col-md">
        <div class="form-group row align-items-center">
            <div class="col-md-2"></div>
            <div class="col-md">
                <div class="row">
                    <div class="col-md-9">
                    <?php echo $__env->make('brackets/admin-ui::admin.includes.media-uploader', [
                            'mediaCollection' => app(App\Models\Platform::class)->getMediaCollection('cover'),
                            'label' => trans('Cover photo')
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php else: ?>
<div class="row">
        <div class="col-md">
            <div class="form-group row align-items-center">
                <div class="col-md-2"></div>
                <div class="col-md">
                    <div class="row">
                        <div class="col-md-9">
                            <?php echo $__env->make('brackets/admin-ui::admin.includes.media-uploader', [
                               'mediaCollection' => $platform->getMediaCollection('cover'),
                               'media' => $platform->getThumbs200ForCollection('cover'),
                               'label' => trans('Cover photo')
                           ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php endif; ?>


<?php /**PATH /Users/betulerkantarci/Desktop/artB/resources/views/admin/platform/components/form-elements.blade.php ENDPATH**/ ?>