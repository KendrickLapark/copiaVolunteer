<div class="eachDayAct">
    <p class="eachDayActTitle" id="eachDayActTitle"> {{date('d M', strtotime($query))}} </p>
    @if(count($activities))
        <button class="accordion" id="accordion"> <p> Actividades disponibles </p> <i class='bx bxs-chevron-down'></i> </button>
    @else
        <button class="accordion" id="accordion" style="background-color: grey"> <p> No hay actividades disponibles </p> 
            <i class='bx bxs-chevron-down'></i> </button>
    @endif 
        <div class="panel">    
            @foreach($activities as $activity)
                <button class="accordion2"><p>{{$activity->entity[0]->nameEntity}} <i class='bx bxs-chevron-down' style="font-size=20px;"></i> </p> </button>
                <div class="panel2">
                    <ul class="ul-accordion2">
                        <li> <p> {{$activity->nameAct}} </p> </li>
                        <li> <p> {{$activity->formaAct}} </p> </li>
                        <li id="li-accordion2"> 
                            <span class="spanTimeAct"> <p> {{date('H:i', strtotime($activity->timeAct)) 
                            ." - ".date('H:i', strtotime($activity->endTimeAct))}} horas </p> </span>                        
                            <a href={{ route('dashboard.showThatActivity', [$activity->activity_id])}} class="buttonSignUp"> <p> Me apunto </p> </a>
                        </li
                    </ul>
                </div>
            @endforeach
                    
        </div>
</div>
