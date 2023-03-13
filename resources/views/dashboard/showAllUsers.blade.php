@extends('dashboard.partials.base')

@section('title')
    Mostrar todos los usuarios
@endsection

@section('content')
    <div class="mainTray">
        
        <div class="sectionTitleSearch">
            MUESTRA TODOS LOS USUARIOS
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <input type="text" name="search" id="search" placeholder="Buscar contactos..." class="form-control" onfocus="this.value=''">
                    </div>
                    <div id="search_list"></div>
                </div>
                    <div class="col-lg-3"></div>
            </div>
        </div>
    </div>

    <div id="excelDownload">
        <a href="{{ route('CSV.getUsers') }}"><i class='bx bx-cloud-download'></i></a>
    </div>
@endsection

@section('headlibraries')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>   

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>   
    

    <script>

        $(document).ready(function(){

            function ajaxCall(datos){

                return $.ajax({

                    url:"searchUser",
                    type:"GET",
                    data:{'searchUser':datos},
                    success:function(data){
                        $('#search_list').html(data.html);

                        $(".hidden").hide();                

                            $(".bx.bxs-down-arrow").on("click", function(){
                               
                                if($(this).parent().parent().next().is(':hidden')){
                                    $(this).css("transform", "rotate(180deg)");
                                    $(this).parent().parent().next().show('slow');
                                }
                                else{
                                    $(this).css("transform", "");
                                    $(this).parent().parent().next().hide('slow');
                                }
                            });

                            $(".lessDetails").on("click", function() {
                                $('.bx.bxs-down-arrow').css("transform", "");
                                $(this).parent().parent().hide('slow');
                            });

                            $(".downloadPanel").hide();
                            $('.accordionUsers').on("click", function(){
                            if($(this).next().is(':hidden')){
                                $(this).next().show('slow');
                            }    
                            else{
                                $(this).next().hide('slow');
                            }                                         

                    });

                    }

                })

            }

                ajaxCall('');
            
            $('#search').on('keyup', function(){
                var query = $(this).val();

                ajaxCall(query);

            });  

            
          
        });

    </script>


@endsection
