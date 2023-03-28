
<div id="divHeader">
    <div id="logo" title="Recargar página principal" >
        <a href="{{ route('home') }}">
            <img width="200" height="30" src="<?php echo asset('images/logo-fundacion-magtel-horizontal.png'); ?>" alt="Recargar página principal" />
        </a>
    </div>
    <div id="mainMenu">
        <ul>
            <li><a href="{{ route('vol.login') }}" role="button" class="botones botonesAB" title="Accede" tabindex="0">Accede</a></li>
            <li><a href="{{ route('vol.create') }}" role="button" class="botones botonesAB" title="Hazte voluntario" tabindex="0">Hazte voluntario</a></li>
        </ul>
    </div>
</div>

