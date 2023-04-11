$(() => { 

        var resize = 10;

            $('#ti1').click(function(){

               var fs =  window.getComputedStyle(document.getElementById('ti1')).fontSize;

                if(resize<60){
                    resize+= 10;
                }
                
                $('.sectionTitle').css('font-size', resize+"px");
                $('.toolbar-item').css('font-size', resize+"px");
                $('p').css('font-size', resize+"px");     

            });

            $('#ti2').click(function(){

                var fs =  window.getComputedStyle(document.getElementById('ti1')).fontSize;

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

            $('#ti4').click(function(){

                if(high_contrast){
                    high_contrast = false;
                    $('i').css('color', 'red');
                    $('.sidebar').css('background', '');
                }else{
                    high_contrast = true;
                    $('.sidebar, .sidebar li, nav, .home-section, .toolbar-inner, #spaceTopMenu, div, button, .mainData, .row').css('background-color', 'black');
                    $('.sidebar span, .toolbar-inner, .toolbar-text, p, div, span, button, h1, i').css('color', '#00FFFF');         
                }

            });

            var negative_contrast = false;

            var color = $('.toolbar-text').css('color');

            alert("documentoo "+color);

            $('#ti5').click(function(){

                if(negative_contrast){
                    negative_contrast = false;
                }else{
                    negative_contrast = true; 
                    $('.sidebar, .sidebar li, nav, .home-section, .toolbar-inner, #spaceTopMenu, div, button, .mainData, .row').css('background-color', 'black');
                    $('.sidebar span, .toolbar-inner, .toolbar-text, p, div, span, button, h1, i').css('color', 'yellow');         
                }

            });

            var white_background = false;

            $('#ti6').click(function(){

                if(white_background){
                    white_background = false;
                    $('i').css('color', 'red');
                    $('.sidebar').css('background', '');
                }else{
                    white_background = true; 
                    $('.sidebar, .sidebar li, nav, .home-section, .toolbar-inner, #spaceTopMenu, div, button, .mainData, .row').css('background-color', 'white');
                    $('.sidebar span, .toolbar-inner, .toolbar-text, p, div, span, button, h1, i').css('color', 'black');         
                }

            });

});