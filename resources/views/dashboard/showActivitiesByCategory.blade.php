@extends('dashboard.partials.base')

@section('title')
    Mostrar actividades por categoría
@endsection

@section('headlibraries')



@endsection

@section('content')
    <div class="mainTray">
        <div class="mainDataCatAct">
            <div class="container mainData">

                <div class="leftColumnCatAct">

                    <p class="titleOptCategories"> Selecciona: </p>

                    <div class="eachActOption">
                        <input type="radio" class="inputCatAct"  name="radioCategory"  value="Voluntariado medioambiental">
                        <label for="Voluntariado medioambiental" class="labelCatAct"> Voluntariado medioambiental </label>
                    </div>
                    <div class="eachActOption">
                        <input type="radio" class="inputCatAct" name="radioCategory"  value="Voluntariado comunitario">
                        <label for="Voluntariado comunitario" class="labelCatAct"> Voluntariado comunitario </label>
                    </div>
                    <div class="eachActOption">
                        <input type="radio" class="inputCatAct" name="radioCategory"  value="Voluntariado sociosanitario">
                        <label for="Voluntariado sociosanitario" class="labelCatAct"> Voluntariado sociosanitario </label>
                    </div>
                    <div class="eachActOption">
                        <input type="radio" class="inputCatAct" name="radioCategory"  value="Voluntariado cultural">
                        <label for="Voluntariado cultural" class="labelCatAct"> Voluntariado cultural </label>
                    </div>
                    <div class="eachActOption">
                        <input type="radio" class="inputCatAct" name="radioCategory"  value="Voluntariado educativo">
                        <label for="Voluntariado educativo" class="labelCatAct"> Voluntariado educativo </label>
                    </div>
                    <div class="eachActOption">
                        <input type="radio" class="inputCatAct" name="radioCategory"  value="Voluntariado internacional">
                        <label for="Voluntariado internacional" class="labelCatAct"> Voluntariado internacional </label>
                    </div>
                    <div class="eachActOption">
                        <input type="radio" class="inputCatAct" name="radioCategory"  value="Cooperación al desarrollo">
                        <label for="Cooperación al desarrollo" class="labelCatAct"> Cooperación al desarrollo </label>
                    </div>
                    <div class="eachActOption">
                        <input type="radio" class="inputCatAct" name="radioCategory"  value="Comercio justo">
                        <label for="Comercio justo" class="labelCatAct"> Comercio justo </label>
                    </div>
                    <div class="eachActOption">
                        <input type="radio" class="inputCatAct" name="radioCategory"  value="Voluntariado de ocio">
                        <label for="Voluntariado de ocio" class="labelCatAct"> Voluntariado de ocio </label>
                    </div>
                    <div class="eachActOption">
                        <input type="radio" class="inputCatAct" name="radioCategory"  value="Voluntariado de protección civil">
                        <label for="Voluntariado de protección civil" class="labelCatAct"> Voluntariado de protección civil </label>
                    </div>
                    <div class="eachActOption">
                        <input type="radio" class="inputCatAct" name="radioCategory"  value="Voluntariado social">
                        <label for="Voluntariado social" class="labelCatAct"> Voluntariado social </label>
                    </div>
                    <div class="eachActOption">
                        <input type="radio" class="inputCatAct" name="radioCategory"  value="Adicciones y dependencias">
                        <label for="Adicciones y dependencias" class="labelCatAct"> Adicciones y dependencias </label>
                    </div>

                </div>

                <div class="rightColumnCatAct">
                    <div class="imgContainer">
                        <div class="imgContainerLeft">
                            <div class="imgColumn">
                                <div class="imgContainerCell">
                                    <img src="images/imgActivitiesCategories/Component1.png">
                                </div>                                               
                                <div class="imgContainerCell">
                                    <img src="images/imgActivitiesCategories/Component5.png">
                                </div> 
                            </div>  
                            <div class="imgColumn">              
                                <div class="imgContainerCell">
                                    <img src="images/imgActivitiesCategories/Component2.png">
                                </div>
                                <div class="imgContainerCell">
                                    <img src="images/imgActivitiesCategories/Component6.png">

                                </div>
                            </div>
                        </div>
                        <div class="imgContainerRight">
                            <div class="imgColumn">
                                <div class="imgContainerCell">
                                    <img src="images/imgActivitiesCategories/Component3.png">
                                </div>
                            
                                <div class="imgContainerCell">
                                    <img src="images/imgActivitiesCategories/Component7.png">

                                </div>
                            </div>
                            <div class="imgColumn">
                                <div class="imgContainerCell">
                                    <img src="images/imgActivitiesCategories/Component4.png">

                                </div>
                                <div class="imgContainerCell">
                                    <img src="images/imgActivitiesCategories/Component8.png">

                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
            
        </div>
            
    </div>

@endsection
