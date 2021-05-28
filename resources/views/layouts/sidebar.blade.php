  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('layouts/admin/dist/img/AdminLTELogo.png')}}" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admiministração</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('layouts/admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> {{auth()->user()->name}}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('home.index')}}" {!! Request::segment(2) == 'home' ? 'class="nav-link active"' : 'class="nav-link"' !!}>
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-header">LOJA</li>

          <li class="nav-item">
            <a href="{{route('sales.index')}}" {!! Request::segment(2) == 'sales' ? 'class="nav-link active"' : 'class="nav-link"' !!}>
              <i class="nav-icon fas fa-shopping-basket"></i>
              <p>Saídas</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('categories.index')}}" {!! Request::segment(2) == 'categories' ? 'class="nav-link active"' : 'class="nav-link"' !!}>
              <i class="nav-icon fas fa-box-tissue"></i>
              <p>Categorias</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('resources.index')}}" {!! Request::segment(2) == 'products' ? 'class="nav-link active"' : 'class="nav-link"' !!}>
              <i class="nav-icon fas fa-boxes"></i>
              <p>Recursos</p>
            </a>
          </li>
       
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-dolly-flatbed"></i>
              <p>Estoque</p>
            </a>
          </li>

          <li class="nav-header">CONTATOS</li>

          <li class="nav-item">
            <a href="{{route('clients.index')}}" {!! Request::segment(2) == 'clients' ? 'class="nav-link active"' : 'class="nav-link"' !!}>
              <i class="nav-icon far fa-id-card"></i>
              <p>Clientes</p>
            </a>
          </li>


          <li class="nav-header">GERENCIAMENTO</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Usuários</p>
            </a>     
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
