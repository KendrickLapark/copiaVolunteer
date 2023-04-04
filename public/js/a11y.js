$(() => {

        var all = document.getElementsByTagName('*');

        var resize = 10;

            $('#ti1').click(function(){

                //indica el fontsize
               var fs =  window.getComputedStyle(document.getElementById('ti1')).fontSize;

                alert("font-size "+fs);

                if(resize<200){
                    resize+= 10;
                }else{
                    resize = 18;
                }
                
                $('.sectionTitle').css('font-size', resize+"px");
                $('.toolbar').css('font-size', resize+"px");     

            });

            $('#ti2').click(function(){

                var fs =  window.getComputedStyle(document.getElementById('ti1')).fontSize;

                alert("font-size "+fs);

                    resize-= 10;
                
                $('.sectionTitle').css('font-size', resize+"px");
                $('.toolbar').css('font-size', resize+"px");

            });

});