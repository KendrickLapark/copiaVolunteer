@foreach ($activities as $activity)
            <div class="mainActivity">
                <div class="row">

                    @if(strtotime(date('d-m-Y', strtotime($activity->dateAct)))<(strtotime(date('d-m-Y')))) 
                        <div class="divTime" style="background-color:#DDBFC8;">               
                    @elseif(!$activity->isNulledAct)
                        <div class="divTime" style="background-color: #406cbc;">                               
                    @else
                        <div class="divTime" style="background-color:#8A8A8A";>
                    @endif                               
                            <div class="dateDiv"> {{ date('d-m-Y', strtotime($activity->dateAct)) }}</div>
                            <div class="hourDiv"> {{ date('h:i', strtotime($activity->timeAct)) }}</div> 
                        </div>
                        
                        <div class="divMainDesc">
                            <div class="nameDiv">
                                <strong> {{ $activity->nameAct }} </strong>
                            </div>
                            <div class="descDiv">
                                {{$activity->descAct}}
                            </div>
                            <div class="cupoDiv">
                                <strong>Cupo: </strong>
                                {{ App\Http\Controllers\ActivityController::quotaCalculator($activity->quotasAct, $activity->activity_id) }}
                                /
                                {{ $activity->quotasAct }}
                                Libres
                            </div>
                        </div>    
                        
                        <div class="visDate">
                            @if ($activity->isVisible == 0)
                                <form method="POST" action="{{ route('dashboard.visibleActivity') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $activity->activity_id }}">
                                    <button type="submit" class="botonVis"
                                        onclick="return confirm('¿Estas seguro/a?')">
                                        PUBLICAR
                                        <br />
                                        <i class='bx bx-show'></i>
                                    </button>
                                </form>
                            @else
                                <form method="POST" action="{{ route('dashboard.invisibleActivity') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $activity->activity_id }}">
                                    <button type="submit" class="botonVis"
                                        onclick="return confirm('¿Estas seguro/a?')">
                                        DESPUBLICAR
                                        <br />
                                        <i class='bx bxs-low-vision'></i>
                                    </button>
                                </form>
                            @endif
                            
                            <div class="controlButton-moreDetails">
                                <i class='bx bxs-down-arrow'></i>
                            </div>
                            
                        </div>

            </div>
                        
            <div class="hidden">
                <div class="eachRow">
                    <div>
                        <strong>Descripcion: </strong>
                         {{ $activity->descAct }}
                    </div>
                    <div>
                        <strong>Entidad: </strong>
                        {{ $activity->entityAct }}
                    </div>
                    <div>
                        <strong>Dirección: </strong>
                        {{ $activity->direAct }}
                    </div>
                    <div>
                        <strong>Requisito Previo: </strong>
                        {{ $activity->requiPrevAct }}
                    </div>
                    <div>
                        <strong>Formacion deseada: </strong>
                        {{ $activity->formaAct }}
                    </div>
                    <div>
                        <strong>Requisitos: </strong>
                        {{ $activity->requiAct }}
                    </div>
                </div>
                <div class="eachRow">
                    <div>
                        <strong>Tipos de Actividad: </strong>
                        @foreach ($activityTypes as $activityType)
                            @foreach ($activity->typeAct as $itemActivityType)
                                @if ($activityType->typeAct_id == $itemActivityType->typeAct_id)
                                    <p>{{ $itemActivityType->nameTypeAct }}</p>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                </div>
                    
                    <div class="buttonsBar">

                                <div>
                                    <strong>Información Extra: </strong>
                                    <form method="POST" action="{{ route('dashboard.showAllExtraActivity') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $activity->activity_id }}">
                                        <button type="submit" class="botonesControl">
                                            
                                            <i class='bx bx-folder-plus' style="font-size:25px"></i>
                                        </button>
                                    </form>
                                </div>

                            <div>
                                <strong>Editar: </strong>

                                <form method="POST" action="{{ route('dashboard.getActivityUpdateData') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $activity->activity_id }}">
                                    <button type="submit" class="botonesControl">
                                        <i class='bx bxs-edit' style="font-size:25px"></i>
                                    </button>
                                </form>
                            </div>

                            <div>                        
                                    <strong>ANULAR: </strong>

                                    <form method="POST" action="{{ route('dashboard.nullActivity') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $activity->activity_id }}">
                                        <button type="submit" class="botonesControl"
                                            onclick="return confirm('¿Estas seguro/a?')">
                                            <i class='bx bxs-edit' style="font-size:25px"></i>
                                        </button>
                                    </form>
                               
                            </div>

                            <div>
                                <strong>Eliminar: </strong>
                                <form method="POST" action="{{ route('dashboard.deleteActivity') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $activity->activity_id }}">
                                    <button type="submit" class="botonesControl"
                                        onclick="return confirm('¿Estas seguro/a?')"><i class='bx bx-trash'
                                            style="font-size:25px;"></i></button>
                                </form>
                            </div>
                    
                </div>
            </div>
    </div>
    
    @endforeach