$(() => {

        var all = document.getElementsByTagName('*');

        var resize = 10;

            $('#ti1').click(function(){

                //indica el fontsize
               var fs =  window.getComputedStyle(document.getElementById('ti1')).fontSize;

                /* alert("font-size "+fs); */

                if(resize<200){
                    resize+= 10;
                }else{
                    resize = 18;
                }
                
                $('.sectionTitle').css('font-size', resize+"px");
                $('.toolbar-item').css('font-size', resize+"px");
                $('p').css('font-size', resize+"px");     

            });

            $('#ti2').click(function(){

                var fs =  window.getComputedStyle(document.getElementById('ti1')).fontSize;

                /* alert("font-size "+fs); */

                    resize-= 10;
                
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

});