<div class="collapse navbar-collapse" id="mynavbar">
    <ul class="navbar-nav me-auto">
        @foreach ($list_menu as $menuitem)
        <x-main-menu-item :$menuitem />
        @endforeach
    </ul>
</div>