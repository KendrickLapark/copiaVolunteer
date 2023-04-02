<div class="rowInfoUser">

    <div class="telfInfoUser">   
        <strong>Teléfono:</strong> {{$volunteer->telVol}}
    </div>
    <div class="dirInfoUser">
        <strong>Dirección:</strong> {{$volunteer->typeViaVol}} {{$volunteer->direcVol}} {{$volunteer->numVol}}
    </div>
    <div class="locationVolMyProfile">
        <strong>Localidad:</strong> {{$volunteer->stateVol}} {{$volunteer->townVol}} {{$volunteer->codPosVol}}
    </div>
    <div class="persMailVolMyProfile">
        <strong>Correo electrónico:</strong> {{$volunteer->persMailVol}}
    </div>
    <div class="birthVolMyProfile">
        <strong>Fecha de nacimiento:</strong> {{$volunteer->birthDateVol}}
    </div>
    <div class="sexoVolMyProfile">
        <strong>Género:</strong> {{$volunteer->sexVol}}
    </div>
    <div class="rolVolMyProfile">
        <strong>Rol:</strong>
        @if($volunteer->isAdminVol)
            Administrador
        @else
            @if($volunteer->sexVol == 'Hombre')
                Voluntario
            @else
                Voluntaria
            @endif
        @endif
    </div>

</div>


