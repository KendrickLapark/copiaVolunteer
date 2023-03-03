$(()=>{

    var iconosList = document.querySelectorAll('.bx.bxs-down-arrow');

    console.log("lista iconos longitud: "+iconosList.length)

        iconosList.forEach(function(icono) {
        icono.addEventListener('click', function() {

            if(icono.style.transform == ''){
                icono.style.transform = 'rotate(180deg)'
            }else{
                icono.style.transform = ''
            }
            
        });
    });   

})