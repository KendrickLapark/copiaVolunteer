<div class="row_act_dashboard">
    <div class="row_act_entity"> <strong> Entidad: </strong> {{ $inscription->activity->entityAct }}</div>
    <i class='bx bx-caret-down' id="downArrow" ></i>
</div>
<div class="hidden_row_desc_act">
    <div class="inner_hidden_row">
        <div class="inner_hidden_leftCol">
            <div class="row_act_desc"> <strong> Descripción: </strong>{{ $inscription->activity->nameAct }}</div>
            <div class="row_act_title"> <strong> Requisito previo: </strong> {{ $inscription->activity->requiPrevAct }}</div>
            <div class="row_act_timeAct"> <strong> Formación deseada: </strong> {{ $inscription->activity->formaAct }}</div>
            <div class="row_act_dateAct"> <strong> Tipo de actividad: </strong>{{ date('d-m-Y', strtotime($inscription->activity->dateAct))}}</div>
            <div class="row_act_status"> 
                @if ($inscription->isDoneIns)
                    HAS PARTICIPADO EN ESTA ACTIVIDAD
                @elseif($inscription->activity->isNulledAct)
                    ACTIVIDAD ANULADA
                @elseif($inscription->isCompletedIns)
                    ACEPTADO
                @elseif(is_null($inscription->filenameIns) && is_null($inscription->isCompletedIns))
                    RECHAZADO
                @elseif ($inscription->filenameIns == null)
                    DEBES DE SUBIR EL DOCUMENTO FIRMADO
                @elseif ($inscription->filenameIns != null)
                    PREINSCRIPCIÓN REALIZADA<br />
                    ESPERANDO VALIDACIÓN DE UN ADMINISTRADOR
                @endif
            </div>
        </div>
        <div class="inner_hidden_rightCol">
            <form method="POST" action="{{ route('PDF.generatepreinscription') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $inscription->inscription_id }}">
                <button type="submit" id="dashboard_downloadPDF"><i
                        class='bx bx-caret-down'></i> Descargar documento</button>
            </form>
        </div>
    </div>

            <form method="POST" action="{{ route('dashboard.uploadPreinscription') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $inscription->inscription_id }}">
                <p><input type="file" name="file" accept="application/pdf" required></p>
                <p><button type="submit" id="dashboard_downloadPDF" style="background-color: #ececec;">SUBIR PDF FIRMADO</button></p>
            </form>
</div>