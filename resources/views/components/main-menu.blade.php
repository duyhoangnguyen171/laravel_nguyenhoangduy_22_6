{{-- <div class="collapse navbar-collapse" id="mynavbar">
    <ul class="navbar-nav me-auto">
        @foreach ($list_menu as $menuitem)
        <x-main-menu-item :$menuitem />
        @endforeach
    </ul>
</div> --}}
<nav class="navbar navbar-expand-lg navbar-light text-light">
    <div class="container-fluid">
       
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar" aria-controls="mynavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="mynavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @foreach ($list_menu as $menuitem)
                    <x-main-menu-item :$menuitem />
                @endforeach
            </ul>
        </div>
    </div>
</nav>