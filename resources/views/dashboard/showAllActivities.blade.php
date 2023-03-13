@extends('dashboard.partials.base')

@section('title')
    Mostrar todas las actividades
@endsection

@section('content')
    <div class="mainTray">
        <div class="sectionTitleSearch">
            MUESTRA TODAS LAS ACTIVIDADES
        </div>

        @if (session()->has('sucessActivityCreated'))
            <div class="formSubmitSuccess center">
                {{ session('sucessActivityCreated') }}
            </div>
        @endif

        @if (session()->has('sucessActivityUpdated'))
            <div class="formSubmitSuccess center">
                {{ session('sucessActivityUpdated') }}
            </div>
        @endif

        @if (session()->has('sucessActivityDeleted'))
            <div class="formSubmitSuccess center">
                {{ session('sucessActivityDeleted') }}
            </div>
        @endif

        @if (session()->has('sucessVisibleActivity'))
            <div class="formSubmitSuccess center">
                {{ session('sucessVisibleActivity') }}
            </div>
        @endif

        @if (session()->has('successUpload'))
            <div class="formSubmitSuccess center">
                {{ session('successUpload') }}
            </div>
        @endif

        @if (session()->has('nullActivity'))
            <div class="formSubmitSuccess center">
                {{ session('nullActivity') }}
            </div>
        @endif

        <div class="container">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <input type="text" name="searchActivity" id="searchActivity" placeholder="Buscar actividades..." class="form-control" onfocus="this.value=''">
                    </div>
                    
                </div>
                    <div class="col-lg-3"></div>
            </div>
        </div>
        
        <div class="addNew">
            <form method="get" action="{{ route('dashboard.formCreateActivity') }}" accept-charset="UTF-8"
                enctype="multipart/form-data">
                @csrf
                <p><button type="submit" id="banUser" class="botonesControl">Crear Actividad</button></p>
            </form>
        </div>

        <div id="calendarCaption">
            <div class="eachCalendarCaption">
                <div class="eachColor" style="background-color:#DDBFC8;">
                    &nbsp;
                </div>
                Pasada
            </div>
            <div class="eachCalendarCaption">
                <div class="eachColor" style="background-color:#8A8A8A;">
                    &nbsp;
                </div>
                Anulada
            </div>

            <div class="eachCalendarCaption">
                <div class="eachColor" style="background-color:#406cbc;">
                    &nbsp;
                </div>
                Cita Normal
            </div>
        </div>
           
        <div class='mainActivityAct'>
            <div id="search_listAct"></div>
 
        </div>

    </div>
@endsection


@section('headlibraries')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    
<script>

    $(document).ready(function(){

        function ajaxCall(datos){

            return $.ajax({

                url:"searchActivity",
                type:"GET",
                data:{'searchActivity':datos},
                success:function(data){
                    $('#search_listAct').html(data.html);

                    $(".hidden").hide();
                        $(".row").on("click", function() {
                            if($(this).next().is(':hidden'))
                                $(this).next().show('slow');
                            else{
                                $(this).next().hide('slow');
                            }
                        });

                        $(".lessDetails").on("click", function() {
                            $(this).parent().parent().hide('slow');
                        });

                }

            })

        }

            ajaxCall('');

            $('#searchActivity').on('keyup', function(){

            var query = $(this).val();

            ajaxCall(query);

            });


    });


    </script>

@endsection
