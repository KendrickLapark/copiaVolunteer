@extends('common.base')

@section('title')
    Registro
@endsection

@section('content')
    <div id="registerContainer">
        <div class="sectionTitle">Registro</div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="formSubmitError">{{ $error }}</div>
            @endforeach
        @endif

        <form method="POST" action="{{ route('vol.save') }}" id="registerForm" aria-label="Formulario de registro">
            @csrf
            <div id="registerSheetOne">
                <div class="RegisterContainer">
                    <div class="eachRegisterElement">
                        <label id="nameVolLabel" class="formSections" for="nameVol">Nombre:<span
                                class="redMark" aria-hidden="true">*</span></label>
                        <br />
                        <input type="text" id="nameVol" name="nameVol" autocomplete="nombre" required autofocus>
                        <br />
                        <label id="nameError" class="formError" for="nameVol">Error, el nombre es obligatorio.</label>
                    </div>
                            
                    <div class="eachRegisterElement">
                        <label id="surnameVolLabel" class="formSections" for="surnameVol">Apellido:<span
                                class="redMark" aria-hidden="true">*</span></label>
                        <br />
                        <input type="text" id="surnameVol" name="surnameVol" required>
                        <br />
                        <label id="surnameError" class="formError" for="surnameVol">Error, el apellido es obligatorio.</label>
                    </div>

                    <div class="eachRegisterElement">
                        <label id="surname2VolLabel" class="formSections" for="surname2Vol">Segundo Apellido:<span
                                class="redMark" aria-hidden="true">*</span></label>
                        <br />
                        <input type="text" id="surname2Vol" name="surname2Vol" required>
                        <br />
                        <label id="surname2Error" class="formError" for="surname2Vol">Error, el segundo apellido es obligatorio.</label>
                    </div>
                </div>
                <div class="RegisterContainer">
                    <div class="eachRegisterElement">
                        <label id="birthDateVolLabel" class="formSections" for="birthDateVol">Fecha de Nacimiento:<span
                                class="redMark" aria-hidden="true">*</span></label>
                        <br />
                        <input type="date" id="birthDateVol" name="birthDateVol" required>
                        <br />
                        <label id="birthDateError" class="formError" for="birthDateVol">Error, la fecha de nacimiento no es correcta.</label>
                    </div>
                    <div class="eachRegisterElement">
                        <label id="typeDocVolLabel" class="formSections" for="typeDocVol">Tipo de documento:<span
                                class="redMark" aria-hidden="true">*</span></label>
                        <br />
                        <select id="typeDocVol" name="typeDocVol" required>
                            <option value="">Seleccione:</option>
                            <option value="dni">DNI</option>
                            <option value="nie">NIE</option>
                        </select>
                        <br />
                        <label id="typeDocError" class="formError" for="typeDocVol">Error, el tipo de documento es obligatorio.</label>
                    </div>
                    <div class="eachRegisterElement">
                        <label id="numDocVolLabel" class="formSections" for="numDocVol">Número de documento:<span
                                class="redMark" aria-hidden="true">*</span></label>
                        <br />
                        <input type="text" id="numDocVol" name="numDocVol" required>
                        <br />
                        <label id="numDocError" class="formError" for="numDocVol">Error, el número de documento es obligatorio.</label>
                        <label id="numDocWrongError" class="formError" for="numDocVol">Error, el número de documento no es válido.</label>

                    </div>
                </div>
                <div class="RegisterContainer" id="registerAuth">
                    <div class="eachRegisterElement">
                        <label id="nameAuthVolLabel" class="formSections" for="nameAuthVol">Nombre del autorizador:<span
                                class="redMark" aria-hidden="true">*</span></label>
                        <br />
                        <input type="text" id="nameAuthVol" name="nameAuthVol">
                        <br />
                        <label id="nameVolError" class="formError" for="nameAuthVol">Error, el nombre del autorizador es obligatorio.</label>
                    </div>
                    <div class="eachRegisterElement">
                        <label id="tlfAuthVolLabel" class="formSections" for="tlfAuthVol">Teléfono del autorizador:<span
                                class="redMark" aria-hidden="true">*</span></label>
                        <br />
                        <input type="tel" id="tlfAuthVol" name="tlfAuthVol">
                        <br />
                        <label id="telAuthError" class="formError" for="tlfAuthVol">Error, el teléfono es obligatorio.</label>
                    </div>
                    <div class="eachRegisterElement">
                        <label id="numDocAuthVolLabel" class="formSections" for="numDocAuthVol">Número de documento del
                            autorizador:<span class="redMark" aria-hidden="true">*</span></label>
                        <br />
                        <input type="text" id="numDocAuthVol" name="numDocAuthVol">
                        <br />
                        <label id="numDocAuthError" class="formError" for="numDocAuthVol">Error, el número de documento es obligatorio.</label>
                        <label id="numDocAuthWrongError" class="formError" for="numDocAuthVol">Error, el número de documento no es Valido.</label>
                    </div>
                </div>
                <div class="RegisterContainer">
                    <div class="eachRegisterElement">
                        <label id="telVolLabel" class="formSections" for="telVol">Teléfono:<span
                                class="redMark" aria-hidden="true">*</span></label>
                        <br />
                        <input type="tel" id="telVol" name="telVol" required>
                        <br />
                        <label id="telError" class="formError" for="telVol">Error, el teléfono es obligatorio.</label>
                    </div>
                    <div class="eachRegisterElement">
                        <label id="sexVolLabel" class="formSections" for="sexVol">Sexo:<span
                                class="redMark" aria-hidden="true">*</span></label>
                        <br />
                        <select id="sexVol" name="sexVol" required>
                            <option value="">Seleccione:</option>
                            <option value="hombre">Hombre</option>
                            <option value="mujer">Mujer</option>
                            <option value="otro">Otro</option>
                        </select>
                        <br />
                        <label id="sexVolError" class="formError" for="sexVol">Error, el sexo es obligatorio.</label>
                    </div>
                    <div class="eachRegisterElement">
                        <label id="shirtSizeVolLabel" class="formSections" for="shirtSizeVol">Talla de camiseta:<span
                                class="redMark" aria-hidden="true">*</span></label>
                        <br />
                        <select id="shirtSizeVol" name="shirtSizeVol" required>
                            <option value="">Seleccione:</option>
                            <option value="XS">XS</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="2XL">2XL</option>
                            <option value="3XL">3XL</option>
                        </select>
                        <br />
                        <label id="shirtSizeError" class="formError" for="shirtSizeVol">Error, la talla de camiseta es obligatoria.</label>
                    </div>
                </div>
                <div class="RegisterContainer">
                    <div class="eachRegisterElement">
                        <label id="persMailVolLabel" class="formSections" for="persMailVol">Correo electrónico:<span
                                class="redMark" aria-hidden="true">*</span></label>
                        <br />
                        <input type="email" id="persMailVol" name="persMailVol" required>
                        <br />
                        <label id="persMailError" class="formError" for="persMailVol">Error, el correo electrónico es obligatorio.</label>
                        <label id="persMailWrongError" class="formError" for="persMailVol">Error, el correo electrónico no es válido.</label>
                    </div>
                    <div class="eachRegisterElement">
                        <label id="persMailConfVolLabel" class="formSections" for="persMailConfVol">Repetir Correo
                            electrónico:<span class="redMark" aria-hidden="true">*</span></label>
                        <br />
                        <input type="email" id="persMailConfVol" name="persMailConfVol" required>
                        <br />
                        <label id="persMailConfError" class="formError" for="persMailConfVol">Error, el correo electrónico es obligatorio.</label>
                        <label id="persMailMatchError" class="formError" for="persMailConfVol">Error, los correos electrónicos no coinciden.</label>
                    </div>
                    <div class="eachRegisterElement" style="display:none;">
                        &nbsp;
                    </div>
                </div>
                <div class="RegisterContainer" style="margin-bottom: 50px;">
                    <div class="eachLongRegisterElement">
                        <input type="checkbox" name="dataConf" id="dataConf" required>
                        <label id="dataConfLabel" class="formSections" for="dataConf"><span class="redMark" aria-hidden="true">*</span>He
                            leído y aceptado la política de privacidad. </label>
                        <br />
                        <label id="dataConfError" class="formError" for="dataConf">Error, debes aceptar la política de privacidad.</label>
                    </div>
                    <div class="eachLongRegisterElement">
                        <input type="checkbox" name="offenseConf" id="offenseConf" required>
                        <label id="offenseConfLabel" class="formSections" for="offenseConf"><span
                                class="redMark" aria-hidden="true">*</span>Que la persona cuyos datos figuran como titular de la cuenta de
                            usuario carece de antecedentes penales por cualquiera de los delitos a que hace referencia el
                            apartado 5º del artículo 8 de la Ley 45/2015, de 14 de octubre, de Voluntariado, el cual señala
                            textualmente que: "No podrán ser voluntarias las personas que tengan antecedentes penales no
                            cancelados por delitos de violencia doméstica o de género, por atentar contra la vida, la
                            integridad física, la libertad, la integridad moral o la libertad e indemnidad sexual del otro
                            cónyuge o de los hijos, o por delitos de tráfico ilegal o inmigración clandestina de personas, o
                            por delitos de terrorismo en programas cuyos destinatarios hayan sido o puedan ser víctimas de
                            estos delitos". </label>
                        <br />
                        <label id="offenseConfError" class="formError" for="offenseConf">Error, debes aceptar este apartado.</label>
                    </div>
                </div>
                <div class="RegisterContainer">
                    <div class="eachRegisterElement" style="display:none;">
                        &nbsp;
                    </div>
                    <div class="eachRegisterElement" style="display:none;">
                        &nbsp;
                    </div>
                    <div class="eachRegisterElement">
                        <img width="40" height="40" src="<?php echo asset('images/icons/next.png'); ?>" title="Siguiente"
                            id="nextRegisterFirst" alt="Siguiente" />
                    </div>
                </div>
            </div>
            <div id="registerSheetTwo">
                <div class="RegisterContainer">
                    <div class="eachRegisterElement">
                        <label id="typeViaVolLabel" class="formSections" for="typeViaVol">Tipo de vía:<span
                                class="redMark" aria-hidden="true">*</span></label>
                        <br />
                        <select id="typeViaVol" name="typeViaVol" required>
                            <option value="">Seleccione:</option>
                            <option value="Autopista">Autopista</option>
                            <option value="Autovia">Autovía</option>
                            <option value="Avenida">Avenida</option>
                            <option value="Bulevar">Bulevar</option>
                            <option value="Calle">Calle</option>
                            <option value="Calle peatonal">Calle peatonal</option>
                            <option value="Callejon">Callejón</option>
                            <option value="Camino">Camino</option>
                            <option value="Cañada">Cañada real</option>
                            <option value="Carretera">Carretera</option>
                            <option value="Carretera de circunvalación">Carretera de circunvalación</option>
                            <option value="Carril">Carril</option>
                            <option value="Ciclovia">Ciclovía</option>
                            <option value="Corredera">Corredera</option>
                            <option value="Costanilla">Costanilla</option>
                            <option value="Parque">Parque</option>
                            <option value="Pasadizo elevado">Pasadizo elevado</option>
                            <option value="Pasaje">Pasaje</option>
                            <option value="Paseo maritimo">Paseo marítimo</option>
                            <option value="Plaza">Plaza</option>
                            <option value="Pretil">Pretil</option>
                            <option value="Puente">Puente</option>
                            <option value="Ronda">Ronda</option>
                            <option value="Sendero">Sendero</option>
                            <option value="Travesia">Travesía</option>
                            <option value="Tunel">Túnel</option>
                            <option value="Via pecuaria">Vía pecuaria</option>
                            <option value="Via rapida">Vía rápida</option>
                            <option value="Via verde">Vía verde</option>
                            <option value="Urbanizacion">Urbanización</option>
                        </select>
                        <br />
                        <label id="typeViaError" class="formError" for="typeViaVol">Error, el tipo de vía es obligatoria.</label>
                    </div>
                    <div class="eachRegisterElement">
                        <label id="direcVolLabel" class="formSections" for="direcVol">Dirección:<span
                                class="redMark" aria-hidden="true">*</span></label>
                        <br />
                        <input type="text" id="direcVol" name="direcVol" required>
                        <br />
                        <label id="direcError" class="formError" for="direcVol">Error, la dirección es obligatoria.</label>
                    </div>
                    <div class="eachRegisterElement">
                        <label id="numVolLabel" class="formSections" for="numVol">Número:<span
                                class="redMark" aria-hidden="true">*</span></label>
                        <br />
                        <input type="text" id="numVol" name="numVol" required>
                        <br />
                        <label id="numError" class="formError" for="numVol">Error, el número es obligatorio.</label>
                    </div>
                </div>
                <div class="RegisterContainer">
                    <div class="eachRegisterElement">
                        <label id="flatVolLabel" class="formSections" for="flatVol">Piso:</label>
                        <br />
                        <input type="text" id="flatVol" name="flatVol">
                        <br />
                    </div>
                    <div class="eachRegisterElement">
                        <label id="VolLabel" class="formSections" for="aditiInfoVol">Información adicional:</label>
                        <br />
                        <input type="text" id="aditiInfoVol" name="aditiInfoVol">
                        <br />
                    </div>
                    <div class="eachRegisterElement" style="display:none;">
                        &nbsp;
                    </div>
                </div>
                <div class="RegisterContainer">
                    <div class="eachRegisterElement">
                        <label id="codPosVolLabel" class="formSections" for="codPosVol">Código Postal:<span
                                class="redMark" aria-hidden="true">*</span></label>
                        <br />
                        <input type="text" id="codPosVol" name="codPosVol" required>
                        <br />
                        <label id="codPosError" class="formError" for="codPosVol">Error, el código postal es obligatorio.</label>
                        <label id="codPosMal" class="formError" for="codPosVol">Error, el código postal no es válido.</label>

                    </div>
                    <div class="eachRegisterElement">
                        <label id="stateVolLabel" class="formSections" for="stateVol">Provincia:<span
                                class="redMark" aria-hidden="true">*</span></label>
                        <br />
                        <input type="text" id="stateVol" name="stateVol" readonly>
                        <br />
                        <label id="stateError" class="formError" for="stateVol">El provincia es obligatoria.</label>
                    </div>
                    <div class="eachRegisterElement">
                        <label id="townVolLabel" class="formSections" for="townVol">Localidad:<span
                                class="redMark" aria-hidden="true">*</span></label>
                        <br />
                        <input type="text" id="townVol" name="townVol" required>
                        <br />
                        <label id="townError" class="formError" for="townVol">La localidad es obligatoria.</label>
                    </div>
                </div>
                <div class="fullRegisterContainer">
                    <button type="submit" id="registerSubmitButton">Enviar</button>
                </div>
                <div class="RegisterContainer">
                    <div class="eachRegisterElement">
                        <img width="40" height="40" src="<?php echo asset('images/icons/back.png'); ?>" title="Volver"
                            id="backRegisterSecond" alt="Volver" />
                    </div>
                    <div class="eachRegisterElement" style="display:none;">
                        &nbsp;
                    </div>
                    <div class="eachRegisterElement" style="display:none;">
                        &nbsp;
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection


@section('library')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/register.js') }}"></script>
@endsection
