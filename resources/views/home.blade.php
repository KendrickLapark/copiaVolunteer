@extends('common.base')

@section('title')
    Home
@endsection

@section('content')

    <div class="slider">
        <div class="slides">
            <input type="radio" name="radio-btn" id="radio1">
            <input type="radio" name="radio-btn" id="radio2">
            <input type="radio" name="radio-btn" id="radio3">
            <input type="radio" name="radio-btn" id="radio4">

            <div class="slide first">
                <img src="images/sliderhome/1.png" alt="Tres compañeros sonriéndo en las afueras de las instalaciones">
            </div>
            <div class="slide">
                <img src="images/sliderhome/2.png" alt="Tres compañeros chocando sus manos dentro de las instalaciones">
            </div>
            <div class="slide">
                <img src="images/sliderhome/3.png" alt="Tres compañeros embalando alimentos">
            </div>
            <div class="slide">
                <img src="images/sliderhome/4.png" alt="Tres compañeros sonriéndo en las afueras de las instalaciones en un día soleado">
            </div>

            <div class="navigation-auto">
                <div class="auto-btn1"></div>
                <div class="auto-btn2"></div>
                <div class="auto-btn3"></div>
                <div class="auto-btn4"></div>
            </div>              

        </div>

        <div class="navigation-manual">
            <label for="radio1" class="manual-btn" tabindex="0"></label>
            <label for="radio2" class="manual-btn" tabindex="0"></label>
            <label for="radio3" class="manual-btn" tabindex="0"></label>
            <label for="radio4" class="manual-btn" tabindex="0"></label>
        </div>
        
    </div>
    
    <div id="contentDiv">
        <div class="rowDiv">           
            <div class="eachCell">
                <img src="<?php echo asset('images/imgHome/volunteering.png'); ?>" alt="Acción Social" class="eachHomeBoxImage" />
            </div>
            <div class="eachCell withText">
                <h1 tabindex="0">Acción Social</h1>
                <p tabindex="0">Fomentamos la construcción de una sociedad igualitaria y comprometida a través de la promoción de actividades 
                    solidarias y de interés social</p>
            </div>
        </div>
        <div class="rowDiv">          
            <div class="eachCell">
                <img src="<?php echo asset('images/imgHome/rocket.png'); ?>" alt="Empleabilidad" class="eachHomeBoxImage" />
            </div>
            <div class="eachCell withText">
                <h1 tabindex="0">Empleabilidad</h1>
                <p tabindex="0">Trabajamos de forma conjunta con la División de I+D+i de Magtel para aplicar su conocimiento y experiencia
                     a favorecer la calidad de vida de personas con discapacidad y en situación de dependencia</p>
            </div>
        </div>
        <div class="rowDiv">
            <div class="eachCell">
                <img src="<?php echo asset('images/imgHome/employment.png'); ?>" alt="Innovación Social" class="eachHomeBoxImage" />
            </div>
            <div class="eachCell withText">
                <h1 tabindex="0">Innovación Social</h1>
                <p tabindex="0">Contribuimos a la generación de oportunidades laborales entre colectivos vulnerables o en riesgo de exclusión 
                    social a través de programas formativos y de prácticas</p>
            </div>
        </div>       
        <div class="rowDiv">
            <div class="eachCell">
                <img src="<?php echo asset('images/imgHome/earth.png'); ?>" alt="Cooperación Internacional" class="eachHomeBoxImage" />
            </div>
            <div class="eachCell withText">
                <h1 tabindex="0">Cooperación Internacional</h1>
                <p tabindex="0">Contribuimos a la generación de oportunidades laborales entre colectivos vulnerables o en riesgo de exclusión social 
                    a través de programas formativos y de prácticas</p>
            </div>
            
        </div>
    </div>
@endsection

@section('library')

    <script type="text/javascript">

        var counter = 1;
        setInterval(function() {
            document.getElementById('radio' + counter).checked = true;
            counter++;
            if(counter > 4){
                counter = 1;
            }
        }, 5000);

    </script> 

@endsection