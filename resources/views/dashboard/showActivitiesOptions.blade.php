@extends('dashboard.partials.base')

@section('title')
    Selecciona actividades de voluntariado
@endsection

@section('headlibraries')

@endsection

@section('content')

    <div class="mainContainerActivitiesOptions">
        <div class="mainTrayActivitiesOptions">

            <div class="titleActivitiesOptions">
                Selecciona tus actividades de voluntariado
            </div>

            <div class="mainData center">    
                <div class="columnRight">
                    <a href="{{ route('dashboard.showActivitiesByDate')}}">
                    <img id="img1" src="images/imgDashboard/frame2.png" alt="Por tipo de actividad">
                    </a> 
                </div>
                <div class="columnLeft">
                    <a href="{{ route('dashboard.showActivitiesByCategory')}}">
                    <img id="img1" src="images/imgDashboard/frame1.png" alt="Por fecha">
                    </a>
                </div>

            </div>

        </div>
    </div>

@endsection
