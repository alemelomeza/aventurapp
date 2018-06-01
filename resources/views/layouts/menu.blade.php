
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">


    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Menu Navegacion</li>

          @if(Auth::user()->role == 'administrator')
          <li class="{{ Request::is('home*') ? 'active' : ''}}">
            <a href="/home">
              <i class="fa fa-home"></i> <span>Home</span>
            </a>
          </li>
          <li class="{{ Request::is('companies*') ? 'active' : ''}}">
            <a href="/companies">
              <i class="fa fa-building"></i> <span>Empresas</span>
            </a>
          </li>
          <li class="{{ Request::is('users*') ? 'active' : ''}}">
            <a href="/users">
              <i class="fa fa-users"></i> <span>Usuarios</span>
            </a>
          </li>

          <li class="{{ Request::is('activities*') ? 'active' : ''}}">
            <a href="/activities">
              <i class="fa fa-map"></i> <span>Actividades & Eventos</span>
            </a>
          </li>

          <li class="">
            <a href="#">
              <i class="fa fa-hand-pointer-o"></i> <span>Participaciones</span>
            </a>
          </li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-gears"></i> <span>Mantenedores</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="">
            <li><a href="#"><i class="fa fa-circle-o"></i> Tipo de Turismo</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Tipo de Actividad</a></li>
          </ul>
        </li>
              @endif

          @if(Auth::user()->role =='company')
          <li class="active">
            <a href="#">
              <i class="fa fa-home"></i> <span>Home</span>
            </a>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-files-o"></i>
              <span>Gestion Aventuras</span>

            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-circle-o"></i> Actividades</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> Eventos</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> Solicitudes & <br>Participacion</a></li>
            </ul>
          </li>

              @endif

          @if(Auth::user()->role =='normal')
          <li class="active">
            <a href="#">
              <i class="fa fa-map"></i> <span>Actividades & Aventuras</span>
            </a>
          </li>

          <li class="">
            <a href="#">
              <i class="fa fa-check-square-o"></i> <span>Mi Participacion</span>
            </a>
          </li>

          <li class="">
            <a href="#">
              <i class="fa fa-comments-o"></i> <span>Solicitudes & Mensajes</span>
            </a>
          </li>

              @endif







      <li class="treeview">
        <a href="#">
          <i class="fa  fa-list-alt"></i> <span>Mi Perfil / Datos</span>
        </a>
      </li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
