<?php
    $max = count($coverPlatforms_urls);
?>


<!-- Platform -->

<div id="platforms" style="padding-top:150px;">

    <div class="etkinlik-genel" style="background-image:url()">
        <div >
            <div class="container">
                <div class="row wow animated fadeInLeft delay-1s">

                    <div id="etkinlik-slide" class="owl-carousel owl-theme etkinlik-slide">
                    <?php for($i=0; $i<$max; $i++): ?>
                        <div class="item">
                            <div class="etkinlik-bilgi">
                                <div class="etkinlik-resim"
                                    style="background-image:url(<?php echo e($coverPlatforms_urls[$i]); ?>)"><a href="<?php echo e($dataPlatforms[$i] -> link); ?>"></a></div>
                            </div>
                        </div>
                    <?php endfor; ?>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Platform --><?php /**PATH /Users/betulerkantarci/Desktop/artB/resources/views/partials/platform.blade.php ENDPATH**/ ?>