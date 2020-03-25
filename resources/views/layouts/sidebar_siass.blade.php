<div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        {{--     menu-machote           --}}
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            @if(Auth::user()->idRol==31 || Auth::user()->idRol==32 )
            <li class="nav-item has-treeview">
                <a href="{{ route('carga_carta_bancaria') }}" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                    <p class="btn-primario">
                        Reporte Trimestral
                        <i class="right fas fa-plus"></i>
                    </p>
                </a>
            </li>

            @endif

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
