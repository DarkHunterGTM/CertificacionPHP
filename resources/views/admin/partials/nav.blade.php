    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
        <li class="header">Navegacion</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="{{request()->is('admin')? 'active': ''}}" ><a href="{{route('dashboard')}}"><i class="fa fa-tachometer-alt"></i> <span>Inicio</span></a></li>




        @role('Super-Administrador|Administrador')

        <li class="treeview {{request()->is('negocio*')? 'active': ''}}">
            <a href="#"><i class="fa fa-edit"></i> <span>Gestion Estudiante</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>

            <ul class="treeview-menu">
              <li class="{{request()->is('Inscripciones')? 'active': ''}}">
                  <a href="{{route('inscripciones.index')}}">
                      <i class="fa fa-table"></i>Inscripciones</a>
              </li>
              <li class="{{request()->is('Estudiantes')? 'active': ''}}">
                  <a href="{{route('estudiantes.index')}}">
                      <i class="fa fa-table"></i>Estudiantes</a>
              </li>
            </ul>
        </li>
        @endrole


    </ul>

    <!-- /.sidebar-menu -->
