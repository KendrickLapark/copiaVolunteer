@extends('dashboard.partials.base')

@section('title')
    Mostrar mi perfil
@endsection

@section('content')
    <div class="mainTray">
        <div class="sectionTitle">
            Mi perfil
        </div>
        @if (session()->has('successUpdateUser'))
            <div class="formSubmitSuccess center">
                {{ session('successUpdateUser') }}
            </div>
        @endif

            <div class="container">
                <div class="mainDataCenterRow">
                    <div class="leftCol">
                        <div class="auxItem"><span></span></div>

                        <div class="columnItem">

                        <ul class="contactVol">

                            <li class="dataVol-item">
                            <p>
                                    <span class="colTitle"><strong>Contacto</strong></span>
                                <br>
                            </p>
                            </li>

                            <li class="dataVol-item">
                                <p>
                                    <strong>Talla de camiseta:</strong>
                                    <br />
                                    <span class="shirtSizeVol"> {{ $volunteer->shirtSizeVol }}</span>
                                        
                                </p>
                            </li>
                            <li class="dataVol-item">
                                <p>
                                    <strong>Organización:</strong>
                                    <br />
                                    <span value="organiVol" {{ $volunteer->organiVol == 'SIN Empresa Asociada' ? 'selected' : '' }}>SIN Empresa Asociada </span>
                                </p>
                            </li>

                            <li class="dataVol-item">
                                <p>
                                    <strong>Teléfono:</strong>
                                    <br />
                                    <span class="telVol">{{ $volunteer->telVol }} </span>
                                </p>
                            </li>

                            <li class="dataVol-item">
                                
                                    <strong>Correo Electrónico Personal: </strong>
                                    <br />
                                    <span class="persMailVol"> {{ $volunteer->persMailVol }} </span>
                            </li>

                            <li class="dataVol-item">
                                    <strong>Correo Electrónico Corporativo: </strong>
                                    <br />
                                @if($volunteer->corpMailVol)
                                    <span class="corpMailVol"> {{ $volunteer->corpMailVol }} </span>
                                @else
                                    <span class="corpMailVol"> No dispone de correo electrónico corporativo. </span>
                                @endif                     
                            </li>
                        </ul>

                        </div>

                    </div>

                    <div class="centerCol">
                        <p>
                            @if (Auth::user()->imageVol == 0 || Auth::user()->imageVol == null)
                                <img class="avatarMyProfile" src="<?php echo asset('images/dashboard/noProfileImage.jpg'); ?>" alt="{{ Auth::user()->nameVol }}">
                            @else
                                <img class="avatarMyProfile" src="data:image/jpeg;base64,{{ base64_encode(Storage::get('avatar/' . Auth::user()->imageVol)) }}"
                                alt="{{ Auth::user()->nameVol }}" id="avatarInTopBar" />
                            @endif
                        </p>
                    </div>

                    <div class="rightCol">

                        <ul class="dataVol">
                                <li class="contactVol-item">
                                    <p>
                                        <span class =colTitle><strong>Datos personales</strong></span>
                                        <br>
                                    </p>

                                </li>                            

                                <li class="dataVol-item">
                                    <p>
                                        <strong>Nombre: </strong>                                
                                        <span class="surnameVol">
                                                {{ $volunteer->nameVol }}</span>                                    
                                    </p>
                                </li>

                                <li class="dataVol-item">
                                    <p>
                                        <strong>Apellidos:</strong>                            
                                        <span class="surnameVol">
                                                {{ $volunteer->surnameVol .' '. $volunteer->surname2Vol}} </span>
                                    </p>
                                </li>

                                <li class="dataVol-item">
                                    <p>
                                        <strong> {{ $volunteer->typeDocVol }}</strong>     
                                        <span class="numDocVol" > {{ $volunteer->numDocVol }}</span>
                                    </p>
                                </li>

                                <li class="dataVol-item">
                                    <p>
                                            <strong>Fecha de nacimiento:</strong>
                                            <span class="birthdateVol">{{ $volunteer->birthDateVol }}</span>
                                    </p>
                                </li>

                                <li class="dataVol-item">
                                    <p>
                                            <strong> Dirección: </strong>
                                            <span class="direcVol">{{ $volunteer->typeViaVol . ' ' . $volunteer->direcVol
                                            . ' ' . $volunteer->numVol. ' ' . $volunteer->flatVol}}</span>
                                    </p>
                                </li>

                                <li class="dataVol-item">
                                    <p>
                                        <strong>Provincia:</strong>
                                        <span class="stateVol">{{ $volunteer->stateVol }} </span>
                                    </p>
                                </li>

                                <li class="dataVol-item">
                                    <p>
                                        <strong>Localidad:</strong>
                                        <span class="townVol"> {{ $volunteer->townVol }} </span>
                                    </p>
                                </li>

                                <li class="dataVol-item">
                                    <p>
                                        <strong>Código Postal: </strong>
                                        <span class="codPosVol"> {{ $volunteer->codPosVol }} </span>
                                    </p>
                                </li>
                            
                    </div>
                    
                </div>
            </div>

            <div class="divButtonMyProfile">
                <form method="GET" action="{{ route('dashboard.showMyProfileForm') }}" accept-charset="UTF-8"
                    enctype="multipart/form-data">
                    <p><button type="submit" class="botonesControl">Editar</button></p>
                </form>
            </div>

    </div>
@endsection


@section('headlibraries')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/codPos.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>