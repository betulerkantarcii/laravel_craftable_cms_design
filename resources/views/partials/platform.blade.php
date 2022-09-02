@php
    $max = count($coverPlatforms_urls);
@endphp


<!-- Platform -->

<div id="platforms" style="padding-top:150px;">

    <div class="etkinlik-genel" style="background-image:url()">
        <div >
            <div class="container">
                <div class="row wow animated fadeInLeft delay-1s">

                    <div id="etkinlik-slide" class="owl-carousel owl-theme etkinlik-slide">
                    @for($i=0; $i<$max; $i++)
                        <div class="item">
                            <div class="etkinlik-bilgi">
                                <div class="etkinlik-resim"
                                    style="background-image:url({{ $coverPlatforms_urls[$i] }})"><a href="{{ $dataPlatforms[$i] -> link }}"></a></div>
                            </div>
                        </div>
                    @endfor

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Platform -->