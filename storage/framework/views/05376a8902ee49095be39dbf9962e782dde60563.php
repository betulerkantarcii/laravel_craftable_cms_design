
/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        <?php echo str_pad("Route::get('/profile',", 60); ?>'<?php echo e($controllerPartiallyFullName); ?>@editProfile')->name('edit-profile');
        <?php echo str_pad("Route::post('/profile',", 60); ?>'<?php echo e($controllerPartiallyFullName); ?>@updateProfile')->name('update-profile');
        <?php echo str_pad("Route::get('/password',", 60); ?>'<?php echo e($controllerPartiallyFullName); ?>@editPassword')->name('edit-password');
        <?php echo str_pad("Route::post('/password',", 60); ?>'<?php echo e($controllerPartiallyFullName); ?>@updatePassword')->name('update-password');
    });
});<?php /**PATH /Users/betulerkantarci/Desktop/artB/vendor/brackets/admin-generator/src/../resources/views/templates/profile/routes.blade.php ENDPATH**/ ?>