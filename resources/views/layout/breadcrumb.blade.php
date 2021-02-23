<ol class="breadcrumb">
         <li class="breadcrumb-item">
      
       <a href="{{url('/')}}">Home</a>
   </li>
         @php
    $segments=[];
    $l=count(Request::segments())-1
@endphp

@switch(Request::segments()[$l])
    @case('edit')
        @php
            $l--;
            $segments=array_slice(Request::segments(),0,$l);
            $segments[]=$model->slug 
        @endphp
    @break
    @default
        @php $segments=Request::segments() @endphp
@endswitch

@php
    $link=''
@endphp
@foreach($segments as $sg)
   @php $link.='/'.$sg @endphp
   @if($loop->index<$l)
      <li class="breadcrumb-item">
         <a href="{{url($link)}}">{{ucfirst($sg)}}</a>
      </li>
   @else
      <li class="breadcrumb-item active">
         {{ucfirst($sg)}}
      </li>
   @endif
@endforeach
</ol>