@extends('dashboard.partials.base')

@section('title')
    Selecciona fecha para buscar las actividades de voluntariado
@endsection

@section('headlibraries')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src='https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js'></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    <script src='https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js'></script>

@endsection

@section('content')

<div class="mainContainerDateActivities">
    <div class="mainTrayDateActivities">
        <div class="columnDateActivities">
            <div class="titleDateActivites">
                Selecciona una semana
            </div>

            <div class="calendario" id="calendario">

            </div>

        </div>

        <div class="hiddenDaysActivities">
            <div class="titleDaysAct" id="titleDaysAct"></div>
            <div class="mainHiddenDaysActivities">
                <div class="leftColumnDaysAct">
                    <div class="searchDayActivity" id="searchDayActivity"> </div>
                    <div class="searchDayActivity" id="searchDayActivity"> </div>
                    <div class="searchDayActivity" id="searchDayActivity"> </div>
                </div>
                <div class="rightColumnDaysAct">
                    <div class="searchDayActivity" id="searchDayActivity"> </div>
                    <div class="searchDayActivity" id="searchDayActivity"> </div>
                    <div class="searchDayActivity" id="searchDayActivity"> </div>
                    <div class="searchDayActivity" id="searchDayActivity"> </div>                
                </div>                
            </div>   
        </div>

    </div>
</div>

<script>
    $(document).ready(function() {

        var SITEURL = "{{ url('/') }}";

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function ajaxCall(datos, pos, longitud){

            return $.ajax({

                url:"searchDayActivity",
                type:"GET",
                data:{'searchDayActivity':datos},
                success:function(data){

                    $( ".searchDayActivity" ).each(function( i ) {
                        if(i>=longitud){
                            $( ".searchDayActivity").eq(i).html("");
                        }
                    
                    });

                    $('.searchDayActivity').eq(pos).html(data.html);  
                    
                    $('.panel').eq(pos).hide();
                    $('.accordion').eq(pos).on("click", function(){
                        if($(this).next().is(':hidden'))
                            $(this).next().show('slow');                         

                        else{
                            $(this).next().hide('slow');
                            }   
                                                 
                    });

                    $('.panel').eq(pos).each(function(){
                        $(this).find('.panel2').each(function(){
                            $(this).hide();
                        })
                        $(this).find('.accordion2').each(function(){
                            $(this).on("click", function(){
                                if($(this).next().is(':hidden'))
                                    $(this).next().show('slow');                         
                                else{
                                    $(this).next().hide('slow');
                                    } 
                            })
                        })
                    });

                }

            })

        }

        var calendar = $('#calendario').fullCalendar({
            dayNamesShort: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            monthNames: [
                'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto',
                'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
            ],
            header: {
                left: 'prev',
                center: 'title,today',
                right: 'next'
            },
            buttonText: {
                today: 'HOY',
                day: 'DIA',
                week: 'SEMANA',
                month: 'MES'
            },
            firstDay: 1,
            editable: true,
            displayEventTime: true,
            events: SITEURL + "/fullcalender",
            displayEventTime: false,
            editable: true,
            events: [
            @foreach ($activities as $activity)
                {
                    color: '#064b98',
                    id: '{{ $activity->activity_id }}',
                    title: '{{ $activity->nameAct }}',
                    start: '{{ $activity->dateAct }}T{{ $activity->timeAct }}',
                    @if ($activity->isNulledAct)
                        color: '#8A8A8A',
                    @else
                        @if(count($activity->inscriptions)>0)
                            @foreach ($activity->inscriptions as $eachInscription)
                                @if ($eachInscription->volunteer_id==Auth::user()->id)
                                    @if ($eachInscription->isDoneIns == 1)
                                        color: '#00A300',
                                    @elseif ($eachInscription->isCompletedIns == 1) 
                                        color: '#8f1d21',
                                    @elseif (is_null($eachInscription->filenameIns) && is_null($eachInscription->isCompletedIns))
                                        color: '#000000', 
                                    @elseif ($eachInscription->filenameIns && $eachInscription->isCompletedIns == 0)
                                        color: '#ffa500',
                                    @endif    
                                @endif
                            @endforeach
                        @endif
                    @endif
                },
            @endforeach
            ],
            editable: false,
            selectable: true,
            selectHelper: true,

            select:function(start, end, allDays){           

                var fechas = []
                var cont = 0;
                for(dt=new Date(start); dt<new Date(end); dt.setDate(dt.getDate()+1)){
                    if(cont==7){
                        break;
                    }
                    fechas.push(new Date(dt));
                    cont+=1;
                }

                dt1 = new Date(start);
                dt2 = new Date(end);

                var mes1 = dt1.toLocaleDateString("es-Es", {month: 'long'});
                var mes2 = dt2.toLocaleDateString("es-Es", {month: 'long'});

                if(mes1!=mes2){
                    $('#titleDaysAct').text("Semana del "+fechas[0].getDate()+" de "+ mes1 +" al "+fechas[fechas.length-1].getDate()+" de "+mes2);
                }else{
                    $('#titleDaysAct').text("Semana del "+fechas[0].getDate()+" al "+fechas[fechas.length-1].getDate()+" de "+mes2);
                }

                for (var i = 0; i < fechas.length; i++){
                    ajaxCall(formateaFecha(fechas[i]), i, fechas.length);

                }

            },

        });

    });

    //formatea la fecha dada para adaptarla a un formato que se ajuste al de bd

    function formateaFecha(fecha){
        var year = fecha.toLocaleString("default", { year: "numeric" });
        var month = fecha.toLocaleString("default", { month: "2-digit" });
        var day = fecha.toLocaleString("default", { day: "2-digit" });

        var formattedDate = year + "-" + month + "-" + day;

        return formattedDate;

    }

    function displayMessage(message) {
        toastr.success(message, 'Event');
    }      
    
</script>

@endsection
