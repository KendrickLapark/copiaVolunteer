$(() => { 

        /* var p_element = document.querySelector('p');
        var p_estile = getComputedStyle(p_element);
        var p_color = p_estile.color;*/

        var p_color = getComputedStyle(document.querySelector('p')).color;
        var span_color = getComputedStyle(document.querySelector('span')).color;
        /* var h1_color = getComputedStyle(document.querySelector('.h1')).color; */
        /* var i_color = getComputedStyle(document.querySelector('i')).color;  */
        var div_color = getComputedStyle(document.querySelector('div')).color;
        var span_color = getComputedStyle(document.querySelector('span')).color;
        /* var button_color = getComputedStyle(document.querySelector('button')).color; */
        var toolbar_text_color = getComputedStyle(document.querySelector('.toolbar-text')).color;
        var toolbar_inner_color = getComputedStyle(document.querySelector('.toolbar-inner')).color;
        var toolbar_icon_color = getComputedStyle(document.querySelector('.toolbar-icon')).color;   

        if($('.toolbar_icon')[0]){
            var header_bc = getComputedStyle(document.querySelector('header')).backgroundColor;
        } 

        if($('.sidebar-button')[0]){
            var sidebar_button_bc = getComputedStyle(document.querySelector('.sidebar-button')).backgroundColor;
        }

        if($('.dashboard')[0]){
            var dashboard_c = getComputedStyle(document.querySelector('.dashboard')).color;
        }

        if($('.bx bx-menu sidebarBtn')[0]){
            var sidebarBtn_c = getComputedStyle(document.querySelector('.bx bx-menu sidebarBtn'));
        }

        if($('i')[0]){
            var i_c = getComputedStyle(document.querySelector('i')).color;
        } 

        if($('#spaceTopMenu')){
            var spaceTopMenu_bc = getComputedStyle(document.querySelector('#spaceTopMenu')).backgroundColor;
        }

        if($('header')[0]){
            var header_bc = getComputedStyle(document.querySelector('header')).backgroundColor;
            $('header').css('background', header_bc);
        }

        if($('nav')[0]){
            var nav_bc = getComputedStyle(document.querySelector('nav')).backgroundColor;
            $('nav').css('background', nav_bc);
        }

        if($('.home-content')[0]){
            var home_content_bc = getComputedStyle(document.querySelector('.home-content')).backgroundColor;
        }

        if($('.sidebar')[0]){
            var sidebar_bc = getComputedStyle(document.querySelector('.sidebar')).backgroundColor;
        }

        if($('.sidebar li')[0]){
            var sidebar_li_bc = getComputedStyle(document.querySelector('.sidebar li')).backgroundColor; 
        }

        if($('.sidebar li')[0]){
            var sidebar_li_bc = getComputedStyle(document.querySelector('.sidebar li')).backgroundColor; 
        }

        if($('.sectionTitle')[0]){
            var sectionTitle_bc = getComputedStyle(document.querySelector('.sectionTitle')).backgroundColor; 
        }

        if($('.home-section')[0]){
            var home_section_bc = getComputedStyle(document.querySelector('.home-section')).backgroundColor;
        }

        if($('.mainTrayDashboard')[0]){
            var mainTrayDashboard_bc = getComputedStyle(document.querySelector('.mainTrayDashboard')).backgroundColor;
        }

        if($('.notifyTray')[0]){
            var notifyTray_bc = getComputedStyle(document.querySelector('.notifyTray')).backgroundColor;
        }

        if($('main')[0]){
            var main_bc = getComputedStyle(document.querySelector('main')).backgroundColor;
        }

        if($('.profile-details')[0]){
            var profile_details_bc = getComputedStyle(document.querySelector('.profile-details')).backgroundColor; 
        }

        if($('.logo-details')[0]){
            var logo_details_bc = getComputedStyle(document.querySelector('.logo-details')).backgroundColor; 
        }

        if($('.mainActivityDashboard')[0]){
            var mainActivityDashboard_bc = getComputedStyle(document.querySelector('.mainActivityDashboard')).backgroundColor;      
        }

        if($('.listTrayDashboard')[0]){
            var listTrayDashboard_bc = getComputedStyle(document.querySelector('.listTrayDashboard')).backgroundColor;
        }

        if($('.msg_Inscription')[0]){
            var msg_Inscription_bc = getComputedStyle(document.querySelector('.msg_Inscription')).backgroundColor;
        }

        if($('.hidden_msg_Inscription')[0]){
            var hidden_msg_Inscription_bc = getComputedStyle(document.querySelector('.hidden_msg_Inscription')).backgroundColor;
        }

        if($('.inner_hidden_msg_Inscription')[0]){
            var inner_hidden_msg_Inscription_bc = getComputedStyle(document.querySelector('.inner_hidden_msg_Inscription')).backgroundColor;
        }
        
        /* var sidebar_bc = getComputedStyle(document.querySelector('.sidebar')).backgroundColor;
        var sidebar_li_bc = getComputedStyle(document.querySelector('.sidebar li')).backgroundColor;     
        var nav_bc = getComputedStyle(document.querySelector('nav')).backgroundColor; */
        /* var home_section_bc = getComputedStyle(document.querySelector('.home-section')).backgroundColor; */
        var toolbar_inner_bc = getComputedStyle(document.querySelector('.toolbar-inner')).backgroundColor;
        /* var spaceTopMenu_bc = getComputedStyle(document.querySelector('#spaceTopMenu')).backgroundColor; */
        var div_bc = getComputedStyle(document.querySelector('div')).backgroundColor;
        /* var button_bc = getComputedStyle(document.querySelector('button')).backgroundColor; */
        /* var mainData_bc = getComputedStyle(document.querySelector('.mainData')).backgroundColor;
        var row_bc = getComputedStyle(document.querySelector('.row')).backgroundColor; */

        function defaultColors(){

            $('span').css('color', span_color);
            $('.toolbar-inner').css('color', toolbar_inner_color);
            $('.toolbar-text').css('color', toolbar_text_color);
            $('p').css('color', p_color);
            $('div').css('color', div_color);
            $('.toolbar-icon').css('color', toolbar_icon_color); 

            if($('i')[0]){
                $('i').css('color', i_c);
            } 

            if($('.sidebar')[0]){
                $('.sidebar').css('background', sidebar_bc);
            }

            if($('#spaceTopMenu')[0]){
                $('#spaceTopMenu').css('background', spaceTopMenu_bc);
            }

            if($('.mainTrayDashboard')[0]){
                $('.mainTrayDashboard').css('background', mainTrayDashboard_bc);
            }

            if($('.notifyTray')[0]){
                $('.notifyTray').css('background', notifyTray_bc);
            }

            if($('main')[0]){
                $('main').css('background', main_bc);
            }

            if($('.home-content')[0]){
                $('.home-content').css('background', home_content_bc);
            }

            if($('.profile-details')[0]){
                $('.profile-details').css('background', profile_details_bc);
            }

            if($('.logo-details')[0]){
                $('.logo-details').css('background', logo_details_bc);
            }

            if($('.home-section')[0]){
                $('.home-section').css('background', home_section_bc);
            }

            if($('.sectionTitle')[0]){
                $('.sectionTitle').css('background', sectionTitle_bc);
            }

            if($('.sidebar-button')[0]){
                $('.sidebar-button').css('background', sidebar_button_bc);
            }

            if($('.dashboard')[0]){
                $('.dashboard').css('color', dashboard_c);
            }

            if($('.toolbar_icon')[0]){
                $('.toolbar-icon').css('background', toolbar_icon_bc); 
            }      
    
            if($('header')[0]){
                $('header').css('background', header_bc);
            }
    
            if($('nav')[0]){
                $('nav').css('background', nav_bc);
            }
    
            if($('.sidebar')[0]){
                $('.sidebar').css('background', sidebar_bc);
            }
    
            if($('.sidebar li')[0]){
                $('.sidebar li').css('background', sidebar_bc);
            }

            if($('.mainActivityDashboard')[0]){
                $('.mainActivityDashboard').css('background', mainActivityDashboard_bc);
            }

            if($('.listTrayDashboard')[0]){
                $('.listTrayDashboard').css('background', listTrayDashboard_bc);
            }  
            
            if($('.msg_Inscription')[0]){
                $('.msg_Inscription').css('background', msg_Inscription_bc);
            }

            if($('.hidden_msg_Inscription')[0]){
                $('.hidden_msg_Inscription').css('background', hidden_msg_Inscription_bc);
            }

            if($('.inner_hidden_msg_Inscription')[0]){
                $('.inner_hidden_msg_Inscription').css('background', inner_hidden_msg_Inscription_bc);
            }

            /* $('nav').css('background', nav_bc); */
            /* $('.home-section').css('background', home_section_bc); */
            $('.toolbar-inner').css('background', toolbar_inner_bc);            
            /* $('#spaceTopMenu').css('background', spaceTopMenu_bc); */
            /* $('div').css('background', div_bc); */
            /* $('.mainData').css('background', mainData_bc); */

            

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