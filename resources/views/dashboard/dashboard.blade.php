@extends('dashboard.partials.base')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="mainTrayDashboard">
    @if (App\Http\Controllers\NotifyController::notifyLoggedTrigger())
        <div class="notifyTray">
            <div class="sectionTitle">
                    <i class='bx bx-envelope'></i>
                    {{-- <span class="badge"> </span> --}}
                        Tienes notificaciones
                    <i class='bx bx-caret-right' style="font-size: 20px"></i>
            </div>
        </div>
    @else
        <div class="notifyTray">
            <div class="sectionTitle">
                    <i class='bx bx-envelope'></i>
                    {{-- <span class="badge"> </span> --}}
                        No tienes notificaciones
                    <i class='bx bx-caret-right'></i>
            </div>
        </div>
    @endif 
        @if (count($inscriptions) == 0)         
            <div class="sectionTitleNoInscriptions">
                No tienes inscripciones hechas en ninguna actividad.
            </div>                          
        @else     
        <div class="listTrayDashboard" id="#listTrayDashboard">         
            @foreach ($inscriptions as $inscription)                      
                <div class="mainActivityDashboard">
                    @if($inscription->filenameIns == null)
                        @include('dashboard.partials.itemListInscription')
                    @elseif($inscription->filenameIns != null)
                        <div class="msg_Inscription">
                            Inscripcion realizada para actividad : {{$inscription->activity->nameAct}}
                            <i class='bx bx-caret-down' id="downArrow" ></i>
                        </div> 
                        <div class="hidden_msg_Inscription">
                            <div class="inner_hidden_msg_Inscription">
                                <div class="descIns">
                                    <strong> Descripción: </strong>
                                    {{$inscription->activity->descAct}}
                                </div>
                                <div class="entityIns">
                                    <strong> Entidad: </strong>
                                    {{$inscription->activity->entityAct}}
                                </div>
                                <div class="direIns">
                                    <strong> Dirección: </strong>
                                    {{$inscription->activity->direAct}}
                                </div>
                                <div class="dateIns">
                                    <strong> Fecha: </strong>
                                    {{$inscription->activity->dateAct}}
                                </div>
                                <div class="timeIns">
                                    <strong> Hora: </strong>
                                    {{$inscription->activity->timeAct}}
                                </div>
                                <div class="isCompletedIns">
                                    @if($inscription->isCompletedIns)
                                        <strong> Inscripción completada </strong>
                                    @else
                                        <strong> Inscripción incompleta, esperando aceptación administradora </strong>
                                    @endif
                                </div>
                                <form method="POST" action="{{ route('PDF.generatepreinscription') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $inscription->inscription_id }}">
                                    <button type="submit" class="button_dashboard">
                                    <i class='bx bx-caret-down'></i> Descargar documento</button>
                                </form>
                                <form method="POST" action="{{ route('dashboard.unDoInscription') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $inscription->inscription_id }}">
                                    <button type="submit" class="button_dashboard" id="dash_but2">
                                        <i class='bx bx-x-circle'></i>Cancelar preinscripción</button>
                                </form>
                            </div>
                        </div>
                                                                                   
                    @endif
                </div>                               
            @endforeach
        @endif
    </div>
</div>
@endsection

@section('headlibraries')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script>
        $(() => {
            $(".row_act_dashboard").on("click", function() {
                var icono = document.querySelector(".row_act_dashboard > #bx.bx-caret-down");
                if ($(this).siblings().is(':visible')) {
                    $(this).siblings().hide();
                    icono.style.transform = ''
                } else {
                    $(this).siblings().show();
                    icono.style.transform = 'rotate(180deg)'
                }
            });

            $('.bx.bx-caret-right').on("click", function(){
 
                    var listaInscripciones = document.querySelector(".listTrayDashboard");
                    var icono = document.querySelector(".bx.bx-caret-right");

                    if(listaInscripciones.style.visibility == 'visible'){
                        console.log('visible')
                        listaInscripciones.style.visibility = 'hidden';
                        icono.style.transform = ''
                    }else{
                        console.log('invisible')
                        listaInscripciones.style.visibility = 'visible'
                        icono.style.transform = 'rotate(180deg)'
                    }                   

            });

            $(".msg_Inscription").on("click", function() {
                var icono = document.querySelector(".row_act_dashboard > #bx.bx-caret-down");
                if ($(this).siblings().is(':visible')) {
                    $(this).siblings().hide();
                    icono.style.transform = ''
                } else {
                    $(this).siblings().show();
                    icono.style.transform = 'rotate(180deg)'
                }
            });

        });
    </script>
@endsection
