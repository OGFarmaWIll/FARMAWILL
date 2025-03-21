<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand" style="background:#3c8dbc">
        <!--begin::Brand Link-->
        <a href="./index.html" class="brand-link">
            <!--begin::Brand Image-->

            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">FARMAWILL </span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper" style="background:white; ">
        <nav class="mt-2">

           

            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-header">MENÚ</li>

                @tienePermiso('inicio')
                <li class="nav-item">
                    <a href="{{ route('inicio.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Inicio</p>
                    </a>
                </li>
                @endtienePermiso

                @tienePermiso('caja')
                <li class="nav-item">
                    <a href="{{ route('caja.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-cash-register"></i>
                        <p>Caja</p>
                    </a>
                </li>
                @endtienePermiso

                @tienePermiso('vender')
                <li class="nav-item">
                    <a href="{{ route('vender.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>Vender</p>
                    </a>
                </li>
                @endtienePermiso

                @tienePermiso('productos')
                <li class="nav-item">
                    <a href="{{ route('productos.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-box-open"></i>
                        <p>Producto</p>
                    </a>
                </li>
                @endtienePermiso

               @if(Auth::user()->tienePermiso('categorias') || Auth::user()->tienePermiso('laboratorios') 
               || Auth::user()->tienePermiso('clientes') || Auth::user()->tienePermiso('doctores') 
               || Auth::user()->tienePermiso('proveedores'))
                <li class="nav-item">
                  
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th-list"></i>
                        <p>
                            Catálogos
                            <i class="nav-arrow fas fa-chevron-right"></i>
                        </p>
                    </a>
                    

                    <ul class="nav nav-treeview">
                        @tienePermiso('categorias')
                        <li class="nav-item">
                            <a href="{{ route('categorias.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-tags"></i>
                                <p>Categorías</p>
                            </a>
                        </li>
                        @endtienePermiso

                        @tienePermiso('laboratorios')
                        <li class="nav-item">
                            <a href="{{ route('laboratorios.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-flask"></i>
                                <p>Laboratorios</p>
                            </a>
                        </li>
                        @endtienePermiso

                        @tienePermiso('clientes')
                        <li class="nav-item">
                            <a href="{{ route('clientes.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>Clientes</p>
                            </a>
                        </li>
                        @endtienePermiso

                        @tienePermiso('doctores')
                        <li class="nav-item">
                            <a href="{{ route('doctores.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-user-md"></i>
                                <p>Doctores</p>
                            </a>
                        </li>
                        @endtienePermiso

                        @tienePermiso('proveedores')
                        <li class="nav-item">
                            <a href="{{ route('proveedores.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-truck"></i>
                                <p>Proveedores</p>
                            </a>
                        </li>
                        @endtienePermiso

                    
                    </ul>
                </li>
                @endif
               
                @if(Auth::user()->tienePermiso('inventario') || Auth::user()->tienePermiso('reabastecimiento') 
                || Auth::user()->tienePermiso('pedidos') || Auth::user()->tienePermiso('guia_remision'))
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-warehouse"></i>
                        <p>
                            Almacén
                            <i class="nav-arrow fas fa-chevron-right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        @tienePermiso('inventario')
                        <li class="nav-item">
                            <a href="{{ route('inventario.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-boxes"></i>
                                <p>inventario</p>
                            </a>
                        </li>
                        @endtienePermiso

                        @tienePermiso('reabastecimiento')
                        <li class="nav-item">
                            <a href="{{ route('reabastecimiento.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-sync"></i>
                                <p>reabastecimiento</p>
                            </a>
                        </li>
                        @endtienePermiso

                        @tienePermiso('pedidos')
                        <li class="nav-item">
                            <a href="{{ route('pedidos.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>Pedidos</p>
                            </a>
                        </li>
                        @endtienePermiso

                        @tienePermiso('guia_remision')
                        <li class="nav-item">
                            <a href="{{ route('guia_remision.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-file-invoice"></i>
                                <p>Guia Remision</p>
                            </a>
                        </li>
                        @endtienePermiso


                    </ul>
                    </li>
                @endif



                @if(Auth::user()->tienePermiso('reporte_venta') || Auth::user()->tienePermiso('reporte_cliente') 
                || Auth::user()->tienePermiso('reporte_doctor') || Auth::user()->tienePermiso('reporte_usuario'))   

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-warehouse"></i>
                        <p>
                            Reportes
                            <i class="nav-arrow fas fa-chevron-right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        @tienePermiso('reporte_venta')
                        <li class="nav-item">
                            <a href="{{ route('reporte_venta.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-boxes"></i>
                                <p>Ventas</p>
                            </a>
                        </li>
                        @endtienePermiso

                        @tienePermiso('reporte_cliente')        
                        <li class="nav-item">
                            <a href="{{ route('reporte_cliente.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-boxes"></i>
                                <p>Ventas x cliente</p>
                            </a>
                        </li>
                        @endtienePermiso

                        @tienePermiso('reporte_doctor')
                        <li class="nav-item">
                            <a href="{{ route('reporte_doctor.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-boxes"></i>
                                <p>Ventas x doctor</p>
                            </a>
                        </li>
                        @endtienePermiso

                        @tienePermiso('reporte_usuario')
                        <li class="nav-item">
                            <a href="{{ route('reporte_usuario.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-boxes"></i>
                                <p>Ventas x usuario</p>
                            </a>
                        </li>
                        @endtienePermiso
                    </ul>
                </li>

                @endif


                @if(Auth::user()->tienePermiso('admin_roles'))
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-warehouse"></i>
                        <p>
                            Administracion
                            <i class="nav-arrow fas fa-chevron-right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        @tienePermiso('admin_roles')
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-boxes"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        @endtienePermiso
                    </ul>
                </li>
                @endif  

            </ul>


            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
