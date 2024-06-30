{{-- @if (count($list_menu) == 0)
    <li class="nav-item text-dark">
        <a class="nav-link" class="text-dark" href="{{ url($menu->link) }}">{{ $menu->name }}</a>
    </li>
@else
    <li class="nav-item dropdown ">
        <a href="#" class="nav-link dropdown-toggle id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            {{ $menu->name }}
        </a>
        <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
            @foreach ($list_menu as $item)
                <li><a class="dropdown-item" href="{{ url($item->link) }}">{{ $item->name }}</a></li>
            @endforeach
        </ul>
    </li>
@endif --}}
@if (count($list_menu) == 0)
    <li class="nav-item text-light mx-4">
        <a class="nav-link text-light" href="{{ url($menu->link) }}">{{ $menu->name }}</a>
    </li>
@else
    <li class="nav-item dropdown mx-4">
        <a href="#" class="nav-link dropdown-toggle text-light " id="navbarDropdown{{ $menu->id }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ $menu->name }}
        </a>
        <ul class="dropdown-menu " aria-labelledby="navbarDropdown{{ $menu->id }}">
            @foreach ($list_menu as $item)
                <li ><a class="dropdown-item" href="{{ url($item->link) }}">{{ $item->name }}</a></li>
            @endforeach
        </ul>
    </li>
@endif