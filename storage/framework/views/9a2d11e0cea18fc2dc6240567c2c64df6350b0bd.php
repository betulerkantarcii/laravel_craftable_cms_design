<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title"><?php echo e(trans('brackets/admin-ui::admin.sidebar.content')); ?></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(url('admin/logos')); ?>"><i class="nav-icon icon-flag"></i> <?php echo e(trans('admin.logo.title')); ?></a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(url('admin/platforms')); ?>"><i class="nav-icon icon-umbrella"></i> <?php echo e(trans('admin.platform.title')); ?></a></li>
           <li class="nav-item"><a class="nav-link" href="<?php echo e(url('admin/designs')); ?>"><i class="nav-icon icon-globe"></i> <?php echo e(trans('admin.design.title')); ?></a></li>
           <li class="nav-item"><a class="nav-link" href="<?php echo e(url('admin/pricings')); ?>"><i class="nav-icon icon-umbrella"></i> <?php echo e(trans('admin.pricing.title')); ?></a></li>
           

            <li class="nav-title"><?php echo e(trans('brackets/admin-ui::admin.sidebar.settings')); ?></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(url('admin/admin-users')); ?>"><i class="nav-icon icon-user"></i> <?php echo e(__('Manage access')); ?></a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(url('admin/translations')); ?>"><i class="nav-icon icon-location-pin"></i> <?php echo e(__('Translations')); ?></a></li>
            
            
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
<?php /**PATH /Users/betulerkantarci/Desktop/artB/resources/views/admin/layout/sidebar.blade.php ENDPATH**/ ?>