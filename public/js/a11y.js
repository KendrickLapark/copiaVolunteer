$(() => { 

        /* var p_element = document.querySelector('p');
        var p_estile = getComputedStyle(p_element);
        var p_color = p_estile.color;*/

        var p_color = getComputedStyle(document.querySelector('p')).color;
        var span_color = getComputedStyle(document.querySelector('span')).color;
        /* var h1_color = getComputedStyle(document.querySelector('.h1')).color;  */
        var i_color = getComputedStyle(document.querySelector('i')).color;
        var div_color = getComputedStyle(document.querySelector('div')).color;
        var span_color = getComputedStyle(document.querySelector('span')).color;
        /* var button_color = getComputedStyle(document.querySelector('button')).color; */
        var toolbar_text_color = getComputedStyle(document.querySelector('.toolbar-text')).color;
        var toolbar_inner_color = getComputedStyle(document.querySelector('.toolbar-inner')).color;

        
        var sidebar_bc = getComputedStyle(document.querySelector('.sidebar')).backgroundColor;
        var sidebar_li_bc = getComputedStyle(document.querySelector('.sidebar li')).backgroundColor;     
        var nav_bc = getComputedStyle(document.querySelector('nav')).backgroundColor;
        var home_section_bc = getComputedStyle(document.querySelector('.home-section')).backgroundColor;
        var toolbar_inner_bc = getComputedStyle(document.querySelector('.toolbar-inner')).backgroundColor;
        var spaceTopMenu_bc = getComputedStyle(document.querySelector('#spaceTopMenu')).backgroundColor;
        var div_bc = getComputedStyle(document.querySelector('div')).backgroundColor;
        /* var button_bc = getComputedStyle(document.querySelector('button')).backgroundColor; */
        var mainData_bc = getComputedStyle(document.querySelector('.mainData')).backgroundColor;
        /* var row_bc = getComputedStyle(document.querySelector('.row')).backgroundColor; */

        function defaultColors(){

            $('span').css('color', span_color);
            $('.toolbar-inner').css('color', toolbar_inner_color);
            $('.toolbar-text').css('color', toolbar_text_color);
            $('p').css('color', p_color);
            $('div').css('color', div_color);
            $('i').css('color', i_color);

            $('.sidebar').css('background', sidebar_bc);
            $('.sidebar li').css('background', sidebar_li_bc);
            $('nav').css('background', nav_bc);
            $('.home-section').css('background', home_section_bc);
            $('.toolbar-inner').css('background', toolbar_inner_bc);
            $('#spaceTopMenu').css('background', spaceTopMenu_bc);
            $('div').css('background', div_bc);
            $('.mainData').css('background', mainData_bc);

        }

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
                    defaultColors();
                }else{
                    high_contrast = true;
                    $('.sidebar, .sidebar li, nav, .home-section, .toolbar-inner, #spaceTopMenu, div, button, .mainData, .row').css('background-color', 'black');
                    $('.sidebar span, .toolbar-inner, .toolbar-text, p, div, span, button, h1, i').css('color', '#00FFFF');         
                }

            });

            var negative_contrast = false;

            $('#ti5').click(function(){

                if(negative_contrast){
                    negative_contrast = false;
                    defaultColors();
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
                    defaultColors();
                }else{
                    white_background = true; 
                    $('.sidebar, .sidebar li, nav, .home-section, .toolbar-inner, #spaceTopMenu, div, button, .mainData, .row').css('background-color', 'white');
                    $('.sidebar span, .toolbar-inner, .toolbar-text, p, div, span, button, h1, i').css('color', 'black');         
                }

            });

});