<div class="titleContainer"> <strong>Historial de actividades realizadas</strong></div>

    <hr>

@foreach($doneInscriptions as $inscription)

    <div class="rowDoneInscription">
        <div class="inner_rowDoneInscription">
            <div class="doneActNam">
                <strong> Nombre actividad: </strong>
                {{$inscription->activity->nameAct}}
            </div>

            <div class="doneActDesc">
                <strong> Descripción: </strong>
                {{$inscription->activity->descAct}}
            </div>

            <div class="doneActEnt">
            <strong>Entidad:</strong>  
                {{$inscription->activity->entityAct}}
            </div>

            <div class="doneActDir">
                <strong>Dirección:</strong> 
                {{$inscription->activity->direAct}}
            </div>

            <div class="doneActDate">
                <strong>Fecha:</strong> 
                {{$inscription->activity->dateAct}}
            </div>

            <div class="doneActType">
                <strong>Tipo de actividad:</strong>
                {{$inscription->activity->typeAct[0]->nameTypeAct}}
            </div>
        </div>
    </div>

    <hr>

@endforeach