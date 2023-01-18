<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
        <i class=" fas fa-building"></i><span>Panel de Control</span>
    </a>
    
    @can('ver-pedido')
    <a class="nav-link" href="#" style="background: #0a3d5e; color: #fff;">
        <span class="text-center">Menu Principal</span>

    </a>
    @endcan
    @can('ver-cliente')
    <a class="nav-link" href="/clientes">
        <i class="fas fa-users"></i></i><span>Clientes</span>
    </a>
         
    @endcan
    @can('ver-producto')
    <a class="nav-link" href="/productos">
        <i class="fas fa-box"></i></i><span>Productos</span>
    </a>
     
    @endcan

    @can('ver-pedido')
    <a class="nav-link" href="/pedidos">
        <i class="fas fa-shopping-cart"></i><span>Pedidos</span>
    </a>
         
    @endcan




    @can('ver-medidas')
    <a class="nav-link" href="#" style="background: #0a3d5e; color: #fff;">
        <span class="text-center">Opciones</span>

    </a>
@endcan
    @can('ver-carpeta')
    <a class="nav-link" href="/carpetas">
        <i class="fas fa-folder"></i><span>Carpetas</span>
    </a>
         
    @endcan

    @can('ver-medidas')
    <a class="nav-link" href="/medidas">
        <i class="fas fa-circle"></i><span>Medidas</span>
    </a>
    @endcan

    @can('ver-colores')
    <a class="nav-link" href="/colores">
        <i class="fas fa-circle"></i><span>Colores</span>
    </a>
    @endcan
    @can('ver-usuarios')
    <a class="nav-link" href="/usuarios">
        <i class=" fas fa-users"></i><span>Usuarios</span>
    </a>
    @endcan
    @can('ver-rol')
    <a class="nav-link" href="/roles">
        <i class=" fas fa-user-lock"></i><span>Roles</span>
    </a>
    @endcan
</li>
