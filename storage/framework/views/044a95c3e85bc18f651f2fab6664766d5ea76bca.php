<?php
    $max = count($coverDesigns_urls);
?> 
 
 <!-- Design -->   
    
  <div id="designs" class="container" style="padding:100px 0;">
    <?php for($i=0; $i<$max; $i++): ?>
    <div style="padding-top:50px;">
    <a href="<?php echo e($dataDesigns[$i] -> link); ?>">
      <img style="width:80%; margin-left:10%;" src="<?php echo e(url($coverDesigns_urls[$i])); ?>"/>
    </a>
  </div>
    <?php endfor; ?>
  </div>


 <!-- Design -->   <?php /**PATH /Users/betulerkantarci/Desktop/artB/resources/views/partials/design.blade.php ENDPATH**/ ?>