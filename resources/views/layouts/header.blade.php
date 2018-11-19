<header class="main-header">
  <!-- Logo -->
  <a href="index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"> <img  class="isotipo_logo" src="/img/isotipo_blanco.png" alt=""> </span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"> <img class="isotipo_logo" src="/img/isotipo_blanco.png" alt=""><b>Aventur</b>App</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">




        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="/img/user_icon.png" class="user-image" alt="User Image">
            <span class="hidden-xs">{{ Auth::user()->name }}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="/img/user_icon.png" class="img-circle" alt="User Image">

              <p>
                {{ Auth::user()->name }}
                <small>
                  {{ Auth::user()->email }} <br>
                  <strong>
                    @if(Auth::user()->role == 'administrator')
                     Administrador
                    @endif

                    @if(Auth::user()->role == 'company')
                     {{ Auth::user()->company->name }}
                    @endif

                  </strong>

                </small>


              </p>
            </li>
            <!-- Menu Body -->

            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Perfil</a>
              </div>
              <div class="pull-right">
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">
                    Salir
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>

              </div>
            </li>
          </ul>
        </li>

      </ul>
    </div>
  </nav>
</header>
