@if (count($list_menu)==0)

<li class="nav-item">
    <a class="nav-link" href="{{url($menu->link)}}">{{$menu->name}}</a>
</li>
@else
<li class="nav-item">
    <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-activedescendant="false">{{$menu->name}}</a>
    <ul class="type-shoes">
        @foreach($list_menu as $item)
        <li><a href="{{url($menu->link)}}">{{$item->name}}</a></li>
        @endforeach
       
    </ul>
</li>
<li class="nav-item">
    <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-activedescendant="false">{{$menu->name}}</a>
    <ul class="type-shoes">
        @foreach($list_menu as $item)
        <li><a href="{{url($menu->link)}}">{{$item->name}}</a></li>
        @endforeach
       
    </ul>
</li>
@endif
