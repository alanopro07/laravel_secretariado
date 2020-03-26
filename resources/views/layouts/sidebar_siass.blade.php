<div class="sidebar" >

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        {{--     menu-machote           --}}
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            @if(Auth::user()->idRol==140)
                <label for="reporte trimestral" class="bg-white text-center">Reporte trimestral</label>
                <li class="nav-item has-treeview">
                    <a href="{{route('visualizar_reportes_trimestrales')}}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p class="btn-primario">
                            Lista de documentos
                            <i class="right fas fa-plus"></i>
                        </p>
                    </a>
                </li>
            @endif
                @if(Auth::user()->idRol==31 || Auth::user()->idRol==32)
                    <label for="reporte trimestral" class="bg-white text-center">Reporte trimestral</label>
                    <li class="nav-item has-treeview">
                        <a href="{{route('cargar_reporte_trimestral')}}" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p class="btn-primario">
                                Cargar Reporte
                                <i class="right fas fa-plus"></i>
                            </p>
                        </a>
                    </li>
                @endif

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
