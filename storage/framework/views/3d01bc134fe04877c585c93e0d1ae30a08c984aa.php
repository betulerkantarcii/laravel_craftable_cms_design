                        <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if($col['name'] == 'password'): ?><div class="form-group row align-items-center" :class="{'has-danger': errors.has('<?php echo e($col['name']); ?>'), 'has-success': fields.<?php echo e($col['name']); ?> && fields.<?php echo e($col['name']); ?>.valid }">
                            <label for="<?php echo e($col['name']); ?>" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-3'"><?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.columns.<?php echo e($col['name']); ?>') }}</label>
                            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-7'">
                                <input type="password" v-model="form.<?php echo e($col['name']); ?>" v-validate="'required|<?php echo e(implode('|', collect($col['frontendRules'])->reject(function($rule) use ($col) { return $rule === 'confirmed:'.$col['name'];})->toArray())); ?>'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('<?php echo e($col['name']); ?>'), 'form-control-success': fields.<?php echo e($col['name']); ?> && fields.<?php echo e($col['name']); ?>.valid}" id="<?php echo e($col['name']); ?>" name="<?php echo e($col['name']); ?>" placeholder="<?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.columns.<?php echo e($col['name']); ?>') }}" ref="<?php echo e($col['name']); ?>">
                                <div v-if="errors.has('<?php echo e($col['name']); ?>')" class="form-control-feedback form-text" v-cloak><?php echo e('@{{'); ?> errors.first('<?php echo e($col['name']); ?>') }}</div>
                            </div>
                        </div>
                        <div class="form-group row align-items-center" :class="{'has-danger': errors.has('<?php echo e($col['name']); ?>_confirmation'), 'has-success': fields.<?php echo e($col['name']); ?>_confirmation && fields.<?php echo e($col['name']); ?>_confirmation.valid }">
                            <label for="<?php echo e($col['name']); ?>_confirmation" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-3'"><?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.columns.<?php echo e($col['name']); ?>_repeat') }}</label>
                            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-7'">
                                <input type="password" v-model="form.<?php echo e($col['name']); ?>_confirmation" v-validate="'required|<?php echo e(implode('|', $col['frontendRules'])); ?>'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('<?php echo e($col['name']); ?>_confirmation'), 'form-control-success': fields.<?php echo e($col['name']); ?>_confirmation && fields.<?php echo e($col['name']); ?>_confirmation.valid}" id="<?php echo e($col['name']); ?>_confirmation" name="<?php echo e($col['name']); ?>_confirmation" placeholder="<?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.columns.<?php echo e($col['name']); ?>') }}" data-vv-as="<?php echo e($col['name']); ?>">
                                <div v-if="errors.has('<?php echo e($col['name']); ?>_confirmation')" class="form-control-feedback form-text" v-cloak><?php echo e('@{{'); ?> errors.first('<?php echo e($col['name']); ?>_confirmation') }}</div>
                            </div>
                        </div>
                        <?php elseif($col['name'] == 'language'): ?><div class="form-group row align-items-center" :class="{'has-danger': errors.has('<?php echo e($col['name']); ?>'), 'has-success': fields.<?php echo e($col['name']); ?> && fields.<?php echo e($col['name']); ?>.valid }">
                            <label for="<?php echo e($col['name']); ?>" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-3'"><?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.columns.<?php echo e($col['name']); ?>') }}</label>
                            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-7'">
                                <multiselect v-model="form.<?php echo e($col['name']); ?>" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_an_option') }}" :options="{{ $locales->toJson() }}" open-direction="bottom"></multiselect>
                                <div v-if="errors.has('<?php echo e($col['name']); ?>')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('<?php echo $col['name']; ?>') }}</div>
                            </div>
                        </div>
                        <?php elseif($col['type'] == 'date'): ?><div class="form-group row align-items-center" :class="{'has-danger': errors.has('<?php echo e($col['name']); ?>'), 'has-success': fields.<?php echo e($col['name']); ?> && fields.<?php echo e($col['name']); ?>.valid }">
                            <label for="<?php echo e($col['name']); ?>" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-3'"><?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.columns.<?php echo e($col['name']); ?>') }}</label>
                            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-7'">
                                <datetime v-model="form.<?php echo e($col['name']); ?>" :config="datePickerConfig" v-validate="'<?php echo e(implode('|', $col['frontendRules'])); ?>'" class="flatpickr" :class="{'form-control-danger': errors.has('<?php echo e($col['name']); ?>'), 'form-control-success': fields.<?php echo e($col['name']); ?> && fields.<?php echo e($col['name']); ?>.valid}" id="<?php echo e($col['name']); ?>" name="<?php echo e($col['name']); ?>" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
                                <div v-if="errors.has('<?php echo e($col['name']); ?>')" class="form-control-feedback form-text" v-cloak><?php echo e('@{{'); ?> errors.first('<?php echo e($col['name']); ?>') }}</div>
                            </div>
                        </div>
                        <?php elseif($col['type'] == 'time'): ?><div class="form-group row align-items-center" :class="{'has-danger': errors.has('<?php echo e($col['name']); ?>'), 'has-success': fields.<?php echo e($col['name']); ?> && fields.<?php echo e($col['name']); ?>.valid }">
                            <label for="<?php echo e($col['name']); ?>" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-3'"><?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.columns.<?php echo e($col['name']); ?>') }}</label>
                            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-7'">
                                <datetime v-model="form.<?php echo e($col['name']); ?>" :config="timePickerConfig" v-validate="'<?php echo e(implode('|', $col['frontendRules'])); ?>'" class="flatpickr" :class="{'form-control-danger': errors.has('<?php echo e($col['name']); ?>'), 'form-control-success': fields.<?php echo e($col['name']); ?> && fields.<?php echo e($col['name']); ?>.valid}" id="<?php echo e($col['name']); ?>" name="<?php echo e($col['name']); ?>" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_time') }}"></datetime>
                                <div v-if="errors.has('<?php echo e($col['name']); ?>')" class="form-control-feedback form-text" v-cloak><?php echo e('@{{'); ?> errors.first('<?php echo e($col['name']); ?>') }}</div>
                            </div>
                        </div>
                        <?php elseif($col['type'] == 'datetime'): ?><div class="form-group row align-items-center" :class="{'has-danger': errors.has('<?php echo e($col['name']); ?>'), 'has-success': fields.<?php echo e($col['name']); ?> && fields.<?php echo e($col['name']); ?>.valid }">
                            <label for="<?php echo e($col['name']); ?>" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-3'"><?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.columns.<?php echo e($col['name']); ?>') }}</label>
                            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-7'">
                                <datetime v-model="form.<?php echo e($col['name']); ?>" :config="datetimePickerConfig" v-validate="'<?php echo e(implode('|', $col['frontendRules'])); ?>'" class="flatpickr" :class="{'form-control-danger': errors.has('<?php echo e($col['name']); ?>'), 'form-control-success': fields.<?php echo e($col['name']); ?> && fields.<?php echo e($col['name']); ?>.valid}" id="<?php echo e($col['name']); ?>" name="<?php echo e($col['name']); ?>" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
                                <div v-if="errors.has('<?php echo e($col['name']); ?>')" class="form-control-feedback form-text" v-cloak><?php echo e('@{{'); ?> errors.first('<?php echo e($col['name']); ?>') }}</div>
                            </div>
                        </div>
                        <?php elseif($col['type'] == 'text'): ?><div class="form-group row align-items-center" :class="{'has-danger': errors.has('<?php echo e($col['name']); ?>'), 'has-success': fields.<?php echo e($col['name']); ?> && fields.<?php echo e($col['name']); ?>.valid }">
                            <label for="<?php echo e($col['name']); ?>" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-3'"><?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.columns.<?php echo e($col['name']); ?>') }}</label>
                            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-7'">
                                <div>
                                    <textarea v-model="form.<?php echo e($col['name']); ?>" v-validate="'<?php echo e(implode('|', $col['frontendRules'])); ?>'" @input="validate($event)" class="hidden-xs-up" id="<?php echo e($col['name']); ?>" name="<?php echo e($col['name']); ?>"></textarea>
                                    <quill-editor v-model="form.<?php echo e($col['name']); ?>" :options="wysiwygConfig" />
                                </div>
                                <div v-if="errors.has('<?php echo e($col['name']); ?>')" class="form-control-feedback form-text" v-cloak><?php echo e('@{{'); ?> errors.first('<?php echo e($col['name']); ?>') }}</div>
                            </div>
                        </div>
                        <?php elseif($col['type'] == 'boolean'): ?><div class="form-group row" :class="{'has-danger': errors.has('<?php echo e($col['name']); ?>'), 'has-success': fields.<?php echo e($col['name']); ?> && fields.<?php echo e($col['name']); ?>.valid }">
                            <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-9'">
                                <input class="form-check-input" id="<?php echo e($col['name']); ?>" type="checkbox" v-model="form.<?php echo e($col['name']); ?>" v-validate="'<?php echo e(implode('|', $col['frontendRules'])); ?>'" data-vv-name="<?php echo e($col['name']); ?>"  name="<?php echo e($col['name']); ?>_fake_element">
                                <label class="form-check-label" for="<?php echo e($col['name']); ?>">
                                    <?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.columns.<?php echo e($col['name']); ?>') }}
                                </label>
                                <input type="hidden" name="<?php echo e($col['name']); ?>" :value="form.<?php echo e($col['name']); ?>">
                                <div v-if="errors.has('<?php echo e($col['name']); ?>')" class="form-control-feedback form-text" v-cloak><?php echo e('@{{'); ?> errors.first('<?php echo e($col['name']); ?>') }}</div>
                            </div>
                        </div>
                        <?php else: ?><div class="form-group row align-items-center" :class="{'has-danger': errors.has('<?php echo e($col['name']); ?>'), 'has-success': fields.<?php echo e($col['name']); ?> && fields.<?php echo e($col['name']); ?>.valid }">
                            <label for="<?php echo e($col['name']); ?>" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-3'"><?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.columns.<?php echo e($col['name']); ?>') }}</label>
                            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-7'">
                                <input type="text" v-model="form.<?php echo e($col['name']); ?>" v-validate="'<?php echo e(implode('|', $col['frontendRules'])); ?>'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('<?php echo e($col['name']); ?>'), 'form-control-success': fields.<?php echo e($col['name']); ?> && fields.<?php echo e($col['name']); ?>.valid}" id="<?php echo e($col['name']); ?>" name="<?php echo e($col['name']); ?>" placeholder="<?php echo e('{{'); ?> trans('admin.<?php echo e($modelLangFormat); ?>.columns.<?php echo e($col['name']); ?>') }}">
                                <div v-if="errors.has('<?php echo e($col['name']); ?>')" class="form-control-feedback form-text" v-cloak><?php echo e('@{{'); ?> errors.first('<?php echo e($col['name']); ?>') }}</div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /Users/betulerkantarci/Desktop/artB/vendor/brackets/admin-generator/src/../resources/views/templates/profile/password/form.blade.php ENDPATH**/ ?>