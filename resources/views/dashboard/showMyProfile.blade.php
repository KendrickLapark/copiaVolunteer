@extends('dashboard.partials.base')

@section('title')
    Mostrar mi perfil
@endsection

@section('content')
    <div class="mainTray">
        <div class="sectionTitle">
            Mi perfil
        </div>
        @if (session()->has('successUpdateUser'))
            <div class="formSubmitSuccess center">
                {{ session('successUpdateUser') }}
            </div>
        @endif

            <div class="containerMyProfile">
                <div class="mainDataCenterRow">
                    <div class="rowTop">
                        <div class="topLeftCol">
                            <div class="containerImgMyProfile">
                                @if (Auth::user()->imageVol == 0 || Auth::user()->imageVol == null)
                                    <img class="avatarMyProfile" src="<?php echo asset('images/dashboard/noProfileImage.jpg'); ?>" alt="{{ Auth::user()->nameVol }}">
                                @else
                                    <img class="avatarMyProfile" src="data:image/jpeg;base64,{{ base64_encode(Storage::get('avatar/' . Auth::user()->imageVol)) }}"
                                    alt="{{ Auth::user()->nameVol }}" id="avatarInTopBar" />
                                @endif   
                            </div>   
                        </div>  

                        <div class="topRightCol">

                            <div class="nameVolMyProfile">
                                {{$volunteer->nameVol}} {{$volunteer->surnameVol}} {{$volunteer->surname2Vol}}
                            </div>

                            <div class="numDocVolMyProfile">
                                {{$volunteer->numDocVol}}
                            </div>

                            <div class="orgVolMyProfile">
                                {{$volunteer->organiVol}}
                            </div>

                        </div>
                                     
                    </div>

                </hr>

                    <div class="rowBottom">
                        
                        <div class="bottomLeftCol">
                            <div class="persMailVolMyProfile">
                                {{$volunteer->persMailVol}}
                            </div>

                            <div class="corpMailVolMyProfile">
                                {{$volunteer->corpMailVol}}
                            </div>

                            <div class="addressVolMyProfile">
                                {{$volunteer->typeViaVol}} {{$volunteer->direcVol}} {{$volunteer->numVol}}
                            </div>
                     
                        </div>

                        <div class="bottomRightCol">
                            <ul>
                                <li> <i class="bx bx-list-ol"></i> <a id="a1">Historial</a></li>
                                <li> <i class="bx bxs-user"></i> <a id="a2">Información</a></li>
                            </ul>   
                            <div class="containerDataMyProfile" id="id2">
                                
                            </div>                           

                        </div>
                                               
                    </div>
                    
                </div>
            </div>

            <div class="divButtonMyProfile">
                <form method="GET" action="{{ route('dashboard.showMyProfileForm') }}" accept-charset="UTF-8"
                    enctype="multipart/form-data">
                    <p><button type="submit" class="button_dashboard">Editar</button></p>
                </form>
            </div>

    </div>
@endsection

@section('headlibraries')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/codPos.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="<?php echo asset('css/itemListInscriptionDone.css'); ?>" type="text/css">

    <script>

        $(document).ready(function(){

            function ajaxCallInfoUser(){

                return $.ajax({

                    url:"myUser",
                    type:"GET",
                    success:function(data){
                        $('.titleContainer').text('Datos del usuario');
                        $('#id2').html(data.html);   

                    }

                })

            }
            
            ajaxCallInfoUser(); 

            function ajaxCallInfoIns(){

                return $.ajax({

                    url:"myDoneInscriptions",
                    type:"GET",
                    success:function(data){
                        $(".titleContainer").text("Historial de actividades realizadas");
                        $('#id2').html(data.html);   

                    }

                })

            }

            $('#a1').on("click", function(){
                ajaxCallInfoIns();
                
            });

            $('#a2').on("click", function(){
                ajaxCallInfoUser();
                
            });
       
        });

    </script>