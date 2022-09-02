
/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('<?php echo e($resource); ?>')->name('<?php echo e($resource); ?>/')->group(static function() {
            <?php echo str_pad("Route::get('/',", 60); ?>'<?php echo e($controllerPartiallyFullName); ?>@index')->name('index');
            <?php echo str_pad("Route::get('/create',", 60); ?>'<?php echo e($controllerPartiallyFullName); ?>@create')->name('create');
            <?php echo str_pad("Route::post('/',", 60); ?>'<?php echo e($controllerPartiallyFullName); ?>@store')->name('store');
            <?php echo str_pad("Route::get('/{".$modelVariableName."}/edit',", 60); ?>'<?php echo e($controllerPartiallyFullName); ?>@edit')->name('edit');
<?php if(!$withoutBulk): ?>
            <?php echo str_pad("Route::post('/bulk-destroy',", 60); ?>'<?php echo e($controllerPartiallyFullName); ?>@bulkDestroy')->name('bulk-destroy');
<?php endif; ?>
            <?php echo str_pad("Route::post('/{".$modelVariableName."}',", 60); ?>'<?php echo e($controllerPartiallyFullName); ?>@update')->name('update');
            <?php echo str_pad("Route::delete('/{".$modelVariableName."}',", 60); ?>'<?php echo e($controllerPartiallyFullName); ?>@destroy')->name('destroy');
<?php if($export): ?>
            <?php echo str_pad("Route::get('/export',", 60); ?>'<?php echo e($controllerPartiallyFullName); ?>@export')->name('export');
<?php endif; ?>
        });
    });
});<?php /**PATH /Users/betulerkantarci/Desktop/artB/vendor/brackets/admin-generator/src/../resources/views/routes.blade.php ENDPATH**/ ?>