$(() => {

        var all = document.getElementsByTagName('*');

        var resize = 10;

            $('#ti1').click(function(){

                //indica el fontsize
               var fs =  window.getComputedStyle(document.getElementById('ti1')).fontSize;

               var np = fs.replace("px", "");

                /* alert("font-size "+np); */

                if(resize<60){
                    resize+= 10;
                }
                
                $('.sectionTitle').css('font-size', resize+"px");
                $('.toolbar-item').css('font-size', resize+"px");
                $('p').css('font-size', resize+"px");     

            });

            $('#ti2').click(function(){

                var fs =  window.getComputedStyle(document.getElementById('ti1')).fontSize;

                var np = fs.replace("px", "");

                /* alert("font-size "+fs); 
                alert("resize"+resize); */

                if(resize>20){
                    resize-= 10;
                }
     
                $('.sectionTitle').css('font-size', resize+"px");
                $('.toolbar-item').css('font-size', resize+"px");
                $('p').css('font-size', resize+"px");

            });

            var htmlElement = document.querySelector("html");

            var grayscale = false;

            $('#ti3').click(function(){

                if(!grayscale){
                    $(htmlElement).css('-moz-filter', 'grayscale(100%)');
                    $(htmlElement).css('-webkit-filter', 'grayscale(100%)');
                    $(htmlElement).css('filter', 'grayscale(100%)');              
                    $(htmlElement).css('filter', 'gray');
                        grayscale = true;
                }else{
                    $(htmlElement).css('-moz-filter', 'grayscale(0%)');
                    $(htmlElement).css('-webkit-filter', 'grayscale(0%)');
                    $(htmlElement).css('filter', 'grayscale(0%)');          
                        grayscale = false;
                }
                
            });

            var high_contrast = false;
            var icon_sidebar = document.getElementsByClassName('.sidebar i');  
            var elementium = document.querySelector('i');
            var estilazo = getComputedStyle(elementium);

            var color = estilazo.color;

            $('#ti4').click(function(){

                if(high_contrast){
                    alert("desactivando");
                    elementium.style.color = 'red';
                    high_contrast = false;
                }else{
                    alert("activando");
                    elementium.style.color = 'blue';
                    hight_contrast = true;
                }

            });

});