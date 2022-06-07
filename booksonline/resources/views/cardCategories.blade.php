@if ($item->code_name == 'all')
    <a class="main-center-block-categories-btn all-btn @if(Route::getCurrentRoute()->category == $item->code_name) active-categories-btn  @endif" href="{{route('category', $item->code_name)}}">
        {{$item->name}}
    </a>
@elseif($item->code_group == '1')
     <a class="main-center-block-categories-btn group-btn  @if(Route::getCurrentRoute()->category == $item->code_name) active-categories-btn  @endif" href="{{route('category', $item->code_name)}}">
         {{$item->name}}
     </a>
@else
    <a class="main-center-block-categories-btn @if(Route::getCurrentRoute()->category == $item->code_name) active-categories-btn  @endif" href="{{route('category', $item->code_name)}}">
        {{$item->name}}
    </a>
@endif