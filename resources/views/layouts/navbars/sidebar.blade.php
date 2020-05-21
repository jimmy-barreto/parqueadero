<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="#" class="simple-text logo-normal">
      {{ __('Menu') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'Paqueadero' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">local_parking</i>
            <p>{{ __('Parqueadero') }}</p>
        </a>
      </li>

      <li class="nav-item{{ $activePage == 'Parqueadero' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('parqueadero.index') }}">
          <i class="material-icons">library_books</i>
            <p>{{ __('Cupos') }}</p>
        </a>
      </li>

      <li class="nav-item{{ $activePage == 'Vehiculo' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('vehiculo.index') }}">
          <i class="material-icons">drive_eta</i>    
            <p>{{ __('Vehiculos') }}</p>
        </a>
      </li>

      <li class="nav-item{{ $activePage == 'Cliente' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('cliente.index') }}">
          <i class="material-icons">emoji_people</i>
          <p>{{ __('Clientes') }}</p>
        </a>         
      </li>
      
      <li class="nav-item{{ $activePage == 'Hora' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('detalle.index') }}">
          <i class="material-icons">timer</i>         
            <p>{{ __('Hora de ingreso') }}</p>
        </a>
      </li>     

      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="false">
          <i><span class="material-icons">person_pin</span></i>
          <p>{{ __('Panel Usuario') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse hide" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> PU </span>
                <span class="sidebar-normal">{{ __('Perfil de Usuario') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"> GU </span>
                <span class="sidebar-normal"> {{ __('Gestion de Usuario') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>

    </ul>
  </div>
</div>