$(()=>{

    var fecha = new Date (new Date().getFullYear(), 0, 31);

    var semanasGuardadas = dates( fecha )

    var diasIF = extraeDias(semanasGuardadas)

    titleGenially(fecha)

    setWeeks(fecha)

    seteaFecha( fechasBlade( diasIF) )

    asignValue ( semanasGuardadas )

    function titleGenially(fecha){

        var mesActualText = fecha.toLocaleDateString("es-Es", {month: 'long'});

        var mesActualDef = mesActualText.charAt(0).toUpperCase() + mesActualText.slice(1); 

        $("#tituloGenially").text(mesActualDef + " " + fecha.getFullYear())

    }

    function setWeeks(fecha){

        var intervalWeeks = "(" + numeroSemanaFecha(fecha) + "-" + (numeroSemanaFecha(fecha) + 4 + ")")

        $('#weeksGenially').text("Semanas "+ intervalWeeks);

    }

    function numeroSemanaFecha(fecha){
        
        startDate = new Date(fecha.getFullYear(), 0, 1);
        var days = Math.floor((fecha - startDate) /
        (24 * 60 * 60 * 1000));
         
        var weekNumber = Math.ceil(days / 7);
     
        // Display the calculated result      
        console.log("Week number of " + fecha +
            " is :   " + weekNumber);

        return weekNumber    
    }

    function dates(current) {   
        
        var semanas = new Array(5)

        var semana

        for(var j = 0; j < 5; j++){
            
            current.setDate((current.getDate() - current.getDay() +1));

            semana = new Array()
      
            for (var i = 0; i < 7; i++) {
                semana.push(
                    new Date(current)
                ); 
                current.setDate(current.getDate() +1);

            }   
            semanas[j] = semana;

        }
        return semanas;
    } 

    function extraeDias(semanas){

        var diasInicioFin = [];

        var parejaDias

        for(var i = 0; i < semanas.length; i++){
            parejaDias = new Array()

            for(var j = 0; j <semanas[i].length; j++){

                if(j == 0){
                    parejaDias.push ( semanas[i][j])

                }else if (j == semanas[i].length - 1){
                    parejaDias.push ( semanas[i][j])

                }
                diasInicioFin[i] = parejaDias;

            }
        }

        return diasInicioFin;

    }

    function fechasBlade(diasInicioFin){

        var dia1, dia2, mes1, mes2, fecha1, fecha2

        var arrayIntervalos = []

        for(var i = 0 ; i < diasInicioFin.length; i++){

            for (var j = 0; j < diasInicioFin[i].length; j++){

                if(j == 0){
                    dia1 = diasInicioFin[i][j].getDate();

                    mes1 = diasInicioFin[i][j].toLocaleDateString("es-Es", {month: 'long'})

                }else{
                    dia2 = diasInicioFin[i][j].getDate();

                    mes2 = diasInicioFin[i][j].toLocaleDateString("es-Es", {month: 'long'})

                    if( mes1 == mes2){
                        fecha = dia1 + " - "+ dia2 + " " + mes2
                    }else{
                        fecha = dia1 + " "+ mes1 + " - "+ dia2 + " " + mes2
                    }

                }               

            }
            arrayIntervalos.push( fecha )

        }     

        return arrayIntervalos;

    }

    function seteaFecha(diasInicioFin){

        for (var i = 0; i < diasInicioFin.length; i++) {
            $('.fechaGenially').eq(i).text(diasInicioFin[i])
        }

    }

    function asignValue(current){

        for (var i = 0; i < current.length; i++) {
            var semana = []
            
            for (var j = 0; j < current[i].length; j++){
                semana.push( current[i][j])

            }

             $('.week').eq(i).val(semana)           
            
        }

    }

    $('#geniallyButton1').on("click", () => {
        var semana = $('#week1').val() 
        
        for (var i = 0; i < semana.length; i++){

            console.log("Día "+i+" "+semana[i])

        }

    });

    $('#geniallyButton2').on("click", () => {
        var semana = $('#geniallyButton2').val()
    });

    $('#geniallyButton3').on("click", () => {
        var semana = $('#geniallyButton3').val()
    });

    $('#geniallyButton4').on("click", () => {
        var semana = $('#geniallyButton4').val()
    });

    $('#geniallyButton5').on("click", () => {
        var semana = $('#geniallyButton5').val()
    });

})