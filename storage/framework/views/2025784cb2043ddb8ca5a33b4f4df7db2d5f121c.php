<div class="card-header">
	<?php if($mediaCollection->isImage()): ?>
		<i class="fa fa-file-image-o"></i>
	<?php else: ?>
		<i class="fa fa-file-o"></i>
	<?php endif; ?>
	
	<?php if(isset($label)): ?>
		<?php echo e($label); ?>

	<?php endif; ?>

	<?php if($mediaCollection->getMaxNumberOfFiles()): ?>
		<small><?php echo e(trans('brackets/admin-ui::admin.media_uploader.max_number_of_files', ['maxNumberOfFiles' => $mediaCollection->getMaxNumberOfFiles()])); ?></small>
	<?php endif; ?>
	<?php if($mediaCollection->getMaxFileSize()): ?>
		<small><?php echo e(trans('brackets/admin-ui::admin.media_uploader.max_size_pre_file', ['maxFileSize' => number_format($mediaCollection->getMaxFileSize()/1024/1024, 2)])); ?></small>
	<?php endif; ?>

	<?php if($mediaCollection->isPrivate()): ?>
		<a class="pull-right" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('brackets/admin-ui::admin.media_uploader.private_title')); ?>"> <i class="fa fa-lock" aria-hidden="true"></i></a>
	<?php endif; ?>
</div>

<media-upload
		ref="<?php echo e($mediaCollection->getName()); ?>_uploader"
		:collection="'<?php echo e($mediaCollection->getName()); ?>'"
		:url="'<?php echo e(route('brackets/media::upload')); ?>'"
		<?php if($mediaCollection->getMaxNumberOfFiles()): ?>
			:max-number-of-files="<?php echo e($mediaCollection->getMaxNumberOfFiles()); ?>"
		<?php endif; ?>
		<?php if($mediaCollection->getMaxFileSize()): ?>
			:max-file-size-in-mb="<?php echo e(round(($mediaCollection->getMaxFileSize()/1024/1024), 2)); ?>"
		<?php endif; ?>
		<?php if($mediaCollection->getAcceptedFileTypes()): ?>
			:accepted-file-types="'<?php echo e(implode(',', $mediaCollection->getAcceptedFileTypes())); ?>'"
		<?php endif; ?>
		<?php if(isset($media) && $media->count() > 0): ?>
			:uploaded-images="<?php echo e($media->toJson()); ?>"
		<?php endif; ?>
></media-upload><?php /**PATH /Users/betulerkantarci/Desktop/artB/vendor/brackets/admin-ui/src/../resources/views/admin/includes/media-uploader.blade.php ENDPATH**/ ?>