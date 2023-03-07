@extends('dashboard.partials.base')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="mainTrayDashboard">
    @if (App\Http\Controllers\NotifyController::notifyLoggedTrigger())
        <div class="notifyTray">
            <div class="sectionTitle">
               {{--  <a href="{{ route('dashboard.logged.showNotify') }}"> --}}
                    <i class='bx bx-envelope' style="font-size: 24px;"></i>
                    <span class="badge"> " </span>
                        Tiene notificaciones pendientes
                    <i class='bx bx-caret-right' style="font-size: 20px"></i>
                {{-- </a> --}}
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
                        <div class="msg_noInscription">
                            No tienes inscripciones pendientes
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

        });
    </script>
@endsection
