@foreach ($volunteers as $volunteer)
            <div class="mainData">
                <div class="rowUser">
                    <div class="avatarUserRow">
                        @if ($volunteer->imageVol == 0 || $volunteer == null)
                            <img src="<?php echo asset('images/dashboard/noProfileImage.jpg'); ?>" alt="No hay imagen" class="avatarInShowAllUsers">
                        @else
                            <img src="{{ asset('img_directory/' . $volunteer->imageVol) }}" alt="{{ $volunteer->nameVol }}"
                                class="avatarInShowAllUsers">
                        @endif
                    </div>
                    <div class="nameSurVol">
                        <strong>
                            <span> {{ $volunteer->nameVol }} </span>        
                            <span> {{ $volunteer->surnameVol }} </span>
                            <span> {{ $volunteer->surname2Vol }} </span>
                        </strong>
                        <br />

                    </div>

                    <div class="controlButtonMoreDetails">
                        <i class='bx bxs-down-arrow' id="downArrow"></i>
                    </div>
                                       
                </div>
                <div class="hidden" id="hiddenUser">

                    <div class="eachRow">
                        <div>
                            <strong> Empresa asociada: </strong>
                        @if ($volunteer->organiVol == false)
                            SIN Empresa Asociada
                        @else
                            {{ $volunteer->organiVol }}
                        @endif
                        </div>
                    </div>

                    <div class="eachRow">
                        <div class="mailVol">
                            <i class='bx bx-envelope' style="font-size: 20px"></i>
                            <a href="mailto:{{ $volunteer->persMailVol }}" style="color:white">{{ $volunteer->persMailVol }}</a>
                            @if ($volunteer->corpMailVol)
                                (C)
                                <a href="mailto:{{ $volunteer->corpMailVol }}">{{ $volunteer->corpMailVol }}</a>
                            @endif
                        </div>
                    </div>

                    <div class="eachRow">
                        <div class="mailVol">
                            <i class='bx bx-envelope' style="font-size: 20px"></i>
                            <a href="mailto:{{ $volunteer->persMailVol }}" style="color:white">{{ $volunteer->persMailVol }}</a>
                            @if ($volunteer->corpMailVol)
                                (C)
                                <a href="mailto:{{ $volunteer->corpMailVol }}">{{ $volunteer->corpMailVol }}</a>
                            @endif
                        </div>
                    </div>

                    <div class="eachRow">
                        <div class="tlfVol">
                            <strong> Teléfono: </strong>
                            <i class='bx bxs-phone' style="font-size: 20px"></i>
                            <a href="tel:+34{{ $volunteer->telVol }}" style="color:white">{{ $volunteer->telVol }}</a>
                        </div>
                    </div>

                    <div class="eachRow">
                        <div>
                            <strong>Fecha de nacimiento: </strong>
                            {{ date('d-m-Y', strtotime($volunteer->birthDateVol)) }}
                        </div>
                        <div>
                            <strong>{{ $volunteer->typeDocVol }}: </strong>
                            {{ $volunteer->numDocVol }}
                        </div>
                        <div>
                            <strong>Sexo:</strong>
                            {{ $volunteer->sexVol }}
                        </div>
                        <div>
                            <strong>Talla de camiseta: </strong>
                            {{ $volunteer->shirtSizeVol }}
                        </div>
                    </div>
                    <div class="eachRow">
                        <div>
                            <strong>Delegaciones: </strong>
                            @if (count($volunteer->delegations) == 0)
                                No tiene delegación
                            @else
                                @foreach ($volunteer->delegations as $delegation)
                                    {{ $delegation->nameDel }},
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="eachRow">
                        <div>
                            <strong>Dirección: </strong> <br />
                            <div>
                                {{ $volunteer->typeViaVol }}
                                {{ $volunteer->direcVol }}
                            </div>
                            <div>
                                <strong>Nº: </strong>
                                {{ $volunteer->numVol }}
                                {{ $volunteer->flatVol }}
                            </div>
                            <div>
                                <strong>Código Postal: </strong>
                                {{ $volunteer->codPosVol }}
                            </div>
                            <div>
                                <strong>Provincia: </strong>
                                {{ $volunteer->stateVol }}
                            </div>
                            <div>
                                <strong>Ciudad: </strong>
                                {{ $volunteer->townVol }}
                            </div>
                            <div>
                                <strong>Información Adicional: </strong>
                                {{ $volunteer->aditiInfoVol }}
                            </div>

                        </div>
                        <div>
                            <strong>Educación: </strong><br />
                            @if (count($volunteer->education) == 0)
                                No tiene titulación registrada
                            @else
                                @foreach ($volunteer->education as $education)
                                <button class="accordionUsers">{{ $education->titleEdu }} <i class='bx bxs-down-arrow' id='arrowDownload'></i> </button> 
                                <div class="downloadPanel">                                   
                                    <form method="POST" action="{{ route('dashboard.downloadThatEducation') }}"
                                        accept-charset="UTF-8" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $education->education_id }}">
                                        <p><button type="submit" id="downloadEdu" class="downloadButton"><i
                                                    class='bx bx-save'></i></button></p>
                                    </form>
                                </div>
                                @endforeach
                            @endif
                        </div>
                        <div>
                            <strong>Documentos: </strong> <br />
                            @if (count($volunteer->documents) == 0)
                                No tiene titulación registrada
                            @else
                                <div class="accordionPanel">
                                    @foreach ($volunteer->documents as $document)
                                        <button class="accordionUsers">{{ $document->titleDoc }} 
                                            <i class='bx bxs-down-arrow' id='arrowDownload'></i> 
                                        </button>  
                                        <div class="downloadPanel">                                  
                                            <form method="POST" action="{{ route('dashboard.showDocument') }}">
                                                @csrf
                                                <input type="hidden" name="doc" value="{{ $document->doc_id }}">
                                                <button type="submit" {{--id="showDocDoc"--}} class="downloadButton"><i
                                                        class='bx bx-save'></i></button>
                                            </form>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    @if (date('Y') - date('Y', strtotime($volunteer->birthDateVol)) <= 17)
                        <div class="eachRow">
                            <div>
                                <span class="redMark">ES MENOR</span>
                                <div>
                                    <strong>Autorizador:</strong>
                                    {{ $volunteer->nameAuthVol }}
                                </div>
                                <div>
                                    <strong>Documento de identidad del autorizador:</strong>
                                    {{ $volunteer->numDocAuthVol }}
                                </div>
                                <div>
                                    <strong>Teléfono del autorizador:</strong>
                                    <a href="tel:+34{{ $volunteer->tlfAuthVol }}">{{ $volunteer->tlfAuthVol }}</a>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="eachRow">
                        <div>
                                <div><strong>Intereses:</strong></div>
                                @if (count(App\Http\Controllers\UsersController::showEachInterest($volunteer->activities)) == 0)
                                    <div>Aun no tenemos suficientes datos para mostrar intereses 
                                    </div>
                                @else
                                    <div>
                                        @foreach (App\Http\Controllers\UsersController::showEachInterest($volunteer->activities) as $typeAct)
                                            <p>{{ $typeAct }}</p>
                                        @endforeach
                                    </div>
                                @endif                           
                        </div>
                    </div>
                    <div class="eachRow">
                        <div>
                            <div class="eachRow">
                                <div><strong>Actividades a las que se ha inscrito:</strong></div>
                            </div>
                            @if (count($volunteer->inscriptions) == 0)
                                <div class="eachRowInscription">
                                    <div>No se ha unido a ninguna actividad aun</div>
                                </div>
                            @else
                                @foreach ($volunteer->inscriptions as $eachInscription)
                                    <div class="eachRowInscription">
                                        <div style="width:200px;">
                                            <strong>{{ $eachInscription->activity->nameAct }}</strong>
                                        </div>
                                        <div style="width:100px;">
                                            {{ $eachInscription->activity->dateAct }}
                                        </div>
                                        <div>
                                            @if ($eachInscription->isCompletedIns)
                                                ACEPTADO
                                            @elseif(is_null($eachInscription->filenameIns) && is_null($eachInscription->isCompletedIns))
                                                RECHAZADO
                                            @elseif ($eachInscription->filenameIns == null)
                                                DEBES DE SUBIR EL DOCUMENTO FIRMADO EN LA SECCIÓN DE NOTIFICACIONES
                                            @elseif ($eachInscription->filenameIns != null)
                                                PREINSCRIPCIÓN REALIZADA<br />
                                                ESPERANDO VALIDACIÓN DE UN ADMINISTRADOR
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="eachRow">
                        <div class="controlButton lessDetails">
                            <i class='bx bxs-up-arrow' style="font-size:20px"></i>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <script type="text/javascript" src="{{ URL::asset('js/iconos.js') }}"></script>