@if(!session()->has("status"))
<div class="sidebar">
@else
<div class="sidebar active">
@endif
    <div id="spaceTopMenu">
        <div class="logo-details">
            @if(!session()->has("status"))
            <img width="200" height="39" src="<?php echo asset('images/logoNeg.jpg'); ?>" alt="header-logo" id="logoImg" />
            @else
            <img width="200" height="39" src="<?php echo asset('images/fm_blanco.png'); ?>" alt="header-logo" id="logoImg" />
            @endif
        </div>
    </div>
    <ul class="nav-links">
        @if (!Auth::user()->isIncomplete() && Auth::user()->isRegisterComplete)
            <li>
                <a href="{{ route('dashboard.logged') }}" title="Inscripciones">
                    <i class='bx bxs-dashboard'></i>
                    <span class="links_name">Inscripciones</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.showActivitiesOptions') }}" title="actividades">
                    <i class='bx bxs-label'></i>
                    <span class="links_name">Actividades</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.showMyEducation') }}" title="mis estudios">
                    <i class='bx bxs-graduation'></i>
                    <span class="links_name">Mis Estudios</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.showUserDocument') }}" title="mi documentación">
                    <i class='bx bx-file'></i>
                    <span class="links_name">Mi documentación</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.showMyProfile') }}" title="mi perfil">
                    <i class='bx bxs-user-account'></i>
                    <span class="links_name">Mi perfil</span>
                </a>
            </li>
            {{-- @if (App\Http\Controllers\NotifyController::notifyLoggedTrigger()) --}}
                <li>
                    <a href="{{ route('dashboard.logged.showNotify') }}" title="notificaciones">
                        @if(App\Http\Controllers\NotifyController::notifyLoggedTrigger())
                            <i class='bx bxs-bell-ring bx-tada '></i>
                        @else
                            <i class='bx bxs-bell-ring'></i>
                        @endif
                        <span class="links_name ">Notificaciones</span>                       
                    </a>
                </li>
            {{-- @endif --}}
        @endcan
        @can('isAdmin')
            <li class="adminMenu">
                <a href="{{ route('dashboard.admin') }}"  title="dashboard">
                    <i class='bx bxs-dashboard'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li class="adminMenu">
                <a href="{{ route('dashboard.showAllUsers') }}"  title="usuarios">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Usuarios</span>
                </a>
            </li>
            <li class="adminMenu">
                <a href="{{ route('dashboard.showAllActivities') }}" title="actividades">
                    <i class='bx bxs-label'></i>
                    <span class="links_name">Actividades</span>
                </a>
            </li>
            @if (App\Http\Controllers\NotifyController::notifyTrigger())
                <li class="adminMenu">
                    <a href="{{ route('dashboard.admin.showNotify') }}" title="notificaciones">
                        <i class='iconAlert bx bxs-bell-ring bx-tada '></i>
                        <span class="textAlert links_name ">Notificaciones</span>
                    </a>
                </li>
            @endif

        @endcan
        <li class="log_out">
            <a href="{{ route('vol.logout') }}" title="cerrar sesión">
                <i class='bx bx-log-out'></i>
                <span class="links_name">Cerrar sesión</span>
            </a>
        </li>
</ul>
</div>
