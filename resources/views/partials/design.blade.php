@php
    $max = count($coverDesigns_urls);
@endphp 
 
 <!-- Design -->   
    
  <div id="designs" class="container" style="padding:100px 0;">
    @for($i=0; $i<$max; $i++)
    <div style="padding-top:50px;">
    <a href="{{ $dataDesigns[$i] -> link }}">
      <img style="width:80%; margin-left:10%;" src="{{ url($coverDesigns_urls[$i])  }}"/>
    </a>
  </div>
    @endfor
  </div>


 <!-- Design -->   