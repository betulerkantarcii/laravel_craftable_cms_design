@php
    $max = count($coverPricing_urls);
@endphp 

  <!-- Pricing -->  
    
    <div id="pricing" class="container" style="padding:100px 0;">
        <a href="{{ $dataPricing[0] -> link }}">
            <img style="width:80%; margin-left:10%;" src="{{ url($coverPricing_urls[0])  }}"/>
        </a>
    </div>

  <!-- Pricing -->  