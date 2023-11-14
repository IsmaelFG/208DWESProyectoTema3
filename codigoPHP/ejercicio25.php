<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>codigo25</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="/208DWESProyectoTema3/webroot/css/style.css">
        <style>
            body {
                margin-top: 70px;
                margin-bottom: 100px;
                font-family: Arial, sans-serif;
            }

            .navbar {
                background-color: #007BFF;
            }

            .navbar-brand {
                color: #fff;
            }

            h1 {
                text-align: center;
            }

            form {
                max-width: 800px;
                margin: 0 auto;
                padding: 20px;
                border: 1px solid #ccc;
                border-radius: 5px;
                background-color: #f9f9f9;
            }

            label {
                display: block;
                margin-bottom: 10px;
            }
            #f_actual{
                background-color: #bbb;
                color: black;
            }
            input[type="text"],
            select {
                width: 200px;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }
            input[type="text"],
            .radioq
            select {
                width: 200px;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            .obligatorio{
                background-color: #f5ec78;
            }

            input[type="radio"] {
                margin: 10px;
            }
            .radio {
                display: flex; /* Hace que los elementos radio se muestren en línea */
                align-items: center; /* Centra verticalmente los elementos radio */
            }

            .radio input[type="radio"] {
                margin-right: 10px; /* Agrega un margen derecho entre los elementos radio */
                width: auto; /* Ancho automático para evitar que los elementos se expandan */
            }
            input{
                min-width: 20px;
            }

            input[type="reset"],
            input[type="submit"] {
                background-color: #007BFF;
                color: #fff;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                margin-top: 20px;
                margin-right: 20px;

            }
            .error{
                color: red;
            }
            input[type="reset"]:hover,
            input[type="submit"]:hover {
                background-color: #0056b3;
            }
        </style>
    </head>
    <body style="margin-top:70px; margin-bottom: 100px">
        <nav class="navbar navbar-expand-lg bg-primary fixed-top">
            <div class="container">
                <a class="navbar-brand text-white" href="/index.html">Ejercicio25</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <?php
        /**
         * @author Ismael Ferreras García
         * @version 1.0
         * @since 25/10/2023
         */
        include_once('../core/231018libreriaValidacion.php'); //Importar la libreria de validacion
        $entradaOK = true; //Indica si todas las respuestas son correctas
        $_REQUEST['fecha_deshabilitada'] = date('Y-m-d - H:i:s'); //Inicializamos la fecha actual ya que es un campo desabilitado
        //Almacena las respuestas
        $aRespuestas = [
            'texto_obligatorio' => '',
            'texto_opcional' => '',
            'num_entero_opcional' => '',
            'num_entero_obligatorio' => '',
            'floatObligatorio' => '',
            'floatOpcional' => '',
            'fecha_deshabilitada' => '',
            'alfanumericoObligatorio' => '',
            'alfanumericoOpcional' => '',
            'input_radio_obligatorio' => '',
            'input_radio_opcional' => '',
            'listaDesplegableObligatoria' => '',
            'correoObligatorio' => '',
            'correoOpcional' => '',
            'urlObligatorio' => '',
            'urlOpcional' => '',
            'fechaObligatorio' => '',
            'fechaOpcional' => '',
            'dniObligatorio' => '',
            'dniOpcional' => '',
            'cpObligatorio' => '',
            'cpOpcional' => '',
            'passwordObligatorio' => '',
            'passwordOpcional' => '',
            'telefonoObligatorio' => '',
            'telefonoOpcional' => '',
            'textAreaObligatorio' => '',
            'textAreaOpcional' => '',
            'file' => '',
            'color' => '',
        ];
        //Almacena los errores
        $aErrores = [
            'texto_obligatorio' => '',
            'texto_opcional' => '',
            'num_entero_opcional' => '',
            'num_entero_obligatorio' => '',
            'fecha_deshabilitada' => '',
            'alfanumericoObligatorio' => '',
            'alfanumericoOpcional' => '',
            'floatObligatorio' => '',
            'floatOpcional' => '',
            'correoObligatorio' => '',
            'correoOpcional' => '',
            'urlObligatorio' => '',
            'urlOpcional' => '',
            'fechaObligatorio' => '',
            'fechaOpcional' => '',
            'dniObligatorio' => '',
            'dniOpcional' => '',
            'cpObligatorio' => '',
            'cpOpcional' => "",
            'passwordObligatorio' => '',
            'passwordOpcional' => '',
            'telefonoObligatorio' => '',
            'telefonoOpcional' => '',
            'textAreaObligatorio' => '',
            'textAreaOpcional' => '',
        ];
        //Validar los campos
        if (isset($_REQUEST['enviar'])) {

            $aErrores = [
                'texto_obligatorio' => validacionFormularios::comprobarAlfabetico($_REQUEST['texto_obligatorio'], 100, 1, 1),
                'texto_opcional' => validacionFormularios::comprobarAlfabetico($_REQUEST['texto_opcional'], 100, 1),
                'num_entero_obligatorio' => validacionFormularios::comprobarEntero($_REQUEST['num_entero_obligatorio'], PHP_INT_MAX, PHP_INT_MIN, 1),
                'num_entero_opcional' => validacionFormularios::comprobarEntero($_REQUEST['num_entero_opcional'], PHP_INT_MAX, PHP_INT_MIN),
                'alfanumericoObligatorio' => validacionFormularios::comprobarAlfaNumerico($_REQUEST['alfanumericoObligatorio'], PHP_FLOAT_MAX, PHP_FLOAT_MIN, 1),
                'alfanumericoOpcional' => validacionFormularios::comprobarAlfaNumerico($_REQUEST['alfanumericoOpcional'], PHP_FLOAT_MAX, PHP_FLOAT_MIN),
                'floatObligatorio' => validacionFormularios::comprobarFloat($_REQUEST['floatObligatorio'], PHP_FLOAT_MAX, PHP_FLOAT_MIN, 1),
                'floatOpcional' => validacionFormularios::comprobarFloat($_REQUEST['floatOpcional'], PHP_FLOAT_MAX, PHP_FLOAT_MIN),
                'correoObligatorio' => validacionFormularios::validarEmail($_REQUEST['correoObligatorio'], 1),
                'correoOpcional' => validacionFormularios::validarEmail($_REQUEST['correoOpcional']),
                'urlObligatorio' => validacionFormularios::validarURL($_REQUEST['urlObligatorio'], 1),
                'urlOpcional' => validacionFormularios::validarURL($_REQUEST['urlObligatorio']),
                'fechaObligatorio' => validacionFormularios::validarFecha($_REQUEST['fechaObligatorio'], date('d-m-Y'), "01/01/1900", 1),
                'fechaOpcional' => validacionFormularios::validarFecha($_REQUEST['fechaOpcional'], date('d-m-Y'), "01/01/1900"),
                'dniObligatorio' => validacionFormularios::validarDni($_REQUEST['dniObligatorio'], 1),
                'dniOpcional' => validacionFormularios::validarDni($_REQUEST['dniOpcional']),
                'cpObligatorio' => validacionFormularios::validarCp($_REQUEST['cpObligatorio'], 1),
                'cpOpcional' => validacionFormularios::validarCp($_REQUEST['cpOpcional']),
                'passwordObligatorio' => validacionFormularios::validarPassword($_REQUEST['passwordObligatorio'], 24, 4, 1, 1),
                'passwordOpcional' => validacionFormularios::validarPassword($_REQUEST['passwordOpcional'], 24, 4, 1, 0),
                'telefonoObligatorio' => validacionFormularios::validarTelefono($_REQUEST['telefonoObligatorio'], 1),
                'telefonoOpcional' => validacionFormularios::validarTelefono($_REQUEST['telefonoOpcional']),
                'textAreaObligatorio' => validacionFormularios::comprobarAlfabetico($_REQUEST['texto_obligatorio'], 1000, 1, 1),
                'textAreaOpcional' => validacionFormularios::comprobarAlfabetico($_REQUEST['texto_obligatorio'], 1000, 1)
            ];
            //Recorre aErrores para ver si hay alguno
            foreach ($aErrores as $campo => $valor) {
                if ($valor == !null) {
                    $entradaOK = false;
                    //Limpiamos el campo
                    $_REQUEST[$campo] = '';
                }
            }
        } else {
            $entradaOK = false;
        }
        //En caso de que '$entradaOK' sea true, cargamos las respuestas en el array '$aRespuestas' 
        if ($entradaOK) {
            $aRespuestas = [
                'texto_obligatorio' => $_REQUEST['texto_obligatorio'],
                'texto_opcional' => $_REQUEST['texto_opcional'],
                'num_entero_obligatorio' => $_REQUEST['num_entero_obligatorio'],
                'num_entero_opcional' => $_REQUEST['num_entero_opcional'],
                'fecha_deshabilitada' => $_REQUEST['fecha_deshabilitada'],
                'alfanumericoObligatorio' => $_REQUEST['alfanumericoObligatorio'],
                'alfanumericoOpcional' => $_REQUEST['alfanumericoOpcional'],
                'input_radio_obligatorio' => $_REQUEST['input_radio_obligatorio'],
                'input_radio_opcional' => $_REQUEST['input_radio_opcional'],

                'listaDesplegableObligatoria' => $_REQUEST['listaDesplegableObligatoria'],
                'floatObligatorio' => $_REQUEST['floatObligatorio'],
                'floatOpcional' => $_REQUEST['floatOpcional'],
                'correoObligatorio' => $_REQUEST['correoObligatorio'],
                'correoOpcional' => $_REQUEST['correoOpcional'],
                'urlObligatorio' => $_REQUEST['urlObligatorio'],
                'urlOpcional' => $_REQUEST['urlOpcional'],
                'fechaObligatorio' => $_REQUEST['fechaObligatorio'],
                'fechaOpcional' => $_REQUEST['fechaOpcional'],
                'dniObligatorio' => $_REQUEST['dniObligatorio'],
                'dniOpcional' => $_REQUEST['dniOpcional'],
                'cpObligatorio' => $_REQUEST['cpObligatorio'],
                'cpOpcional' => $_REQUEST['cpOpcional'],
                'passwordObligatorio' => $_REQUEST['passwordObligatorio'],
                'passwordOpcional' => $_REQUEST['passwordOpcional'],
                'telefonoObligatorio' => $_REQUEST['telefonoObligatorio'],
                'telefonoOpcional' => $_REQUEST['telefonoOpcional'],
                'textAreaObligatorio' => $_REQUEST['textAreaObligatorio'],
                'textAreaOpcional' => $_REQUEST['textAreaOpcional'],
                'file' => $_REQUEST['file'],
                'color' => $_REQUEST['color']
            ];
            //Muestra las respuestas
            echo "<h1>Respuestas:</h1>";
            foreach ($aRespuestas as $campo => $valor) {
                echo "$campo => $valor <br>";
            }
        } else {
            //Formulario que se le muetra al cliente para que lo rellene
            ?>

            <h1>Cuestionario</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <table>
                    <tr>
                        <td><label for="texto_obligatorio">texto_obligatorio:</label></td>
                        <td><input class="obligatorio" type="text" id="texto_obligatorio" name="texto_obligatorio" value="<?php echo (isset($_REQUEST['texto_obligatorio']) ? $_REQUEST['texto_obligatorio'] : ''); ?>"></td>
                        <td class="error"><?php echo (!empty($aErrores["texto_obligatorio"]) ? $aErrores["texto_obligatorio"] : ''); ?></td>
                    </tr>
                    <tr>
                        <td><label for="texto_opcional">texto_opcional:</label></td>
                        <td><input type="text" id="texto_opcional" name="texto_opcional" value="<?php echo (isset($_REQUEST['texto_opcional']) ? $_REQUEST['texto_opcional'] : ''); ?>"></td>
                        <td class="error"><?php echo (!empty($aErrores["texto_opcional"]) ? $aErrores["texto_opcional"] : ''); ?></td>
                    </tr>
                    <tr>
                        <td><label for="num_entero_obligatorio">num_entero_obligatorio:</label></td>
                        <td><input class="obligatorio" type="text" id="num_entero_obligatorio" name="num_entero_obligatorio" value="<?php echo (isset($_REQUEST['num_entero_obligatorio']) ? $_REQUEST['num_entero_obligatorio'] : ''); ?>"></td>
                        <td class="error"><?php echo (!empty($aErrores["num_entero_obligatorio"]) ? $aErrores["num_entero_obligatorio"] : ''); ?></td>
                    </tr>
                    <tr>
                        <td><label for="num_entero_opcional">num_entero_opcional:</label></td>
                        <td><input type="text" id="num_entero_opcional" name="num_entero_opcional" value="<?php echo (isset($_REQUEST['num_entero_opcional']) ? $_REQUEST['num_entero_opcional'] : ''); ?>"></td>
                        <td class="error"><?php echo (!empty($aErrores["num_entero_opcional"]) ? $aErrores["num_entero_opcional"] : ''); ?></td>
                    </tr>
                    <tr>
                        <td><label for="fechaDeshabilitada">Fecha deshabilitada:</label></td>
                        <td><input type="text" id="fechaDeshabilitada" name="fechaDeshabilitada" value="<?php echo $_REQUEST['fecha_deshabilitada'] ?>" disabled></td>
                        <td class="error"></td>
                    </tr>
                    <tr>
                        <td><label for="alfanumericoObligatorio">Alfanumerico obligatorio:</label></td>
                        <td><input class="obligatorio" type="text" id="alfanumericoObligatorio" name="alfanumericoObligatorio" value="<?php echo (isset($_REQUEST['alfanumericoObligatorio']) ? $_REQUEST['alfanumericoObligatorio'] : ''); ?>"></td>
                        <td class="error"><?php echo (!empty($aErrores["alfanumericoObligatorio"]) ? $aErrores["alfanumericoObligatorio"] : ''); ?></td>
                    </tr>
                    <tr>
                        <td><label for="alfanumericoOpcional">Alfanumerico opcional:</label></td>
                        <td><input type="text" id="alfanumericoOpcional" name="alfanumericoOpcional" value="<?php echo (isset($_REQUEST['alfanumericoOpcional']) ? $_REQUEST['alfanumericoOpcional'] : ''); ?>"></td>
                        <td class="error"><?php echo (!empty($aErrores["alfanumericoOpcional"]) ? $aErrores["alfanumericoOpcional"] : ''); ?></td>
                    </tr>
                    <tr>
                        <td><label for="input_radio_obligatorio">input_radio_obligatorio:</label></td>
                        <td>
                            <div class="radio obligatorio">
                                <input type="radio" name="input_radio_obligatorio" value="opcion1" checked> opcion1
                                <input type="radio" name="input_radio_obligatorio" value="opcion2"> opcion2
                                <input type="radio" name="input_radio_obligatorio" value="opcion3"> opcion3
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="input_radio_opcional">input_radio_opcional:</label></td>
                        <td>
                            <div class="radio">
                                <input type="radio" name="input_radio_opcional" value="opcion1" <?php echo isset($_REQUEST['input_radio_opcional']) && $_REQUEST['input_radio_opcional'] === 'opcion1' ? 'checked' : ''; ?>> opcion1
                                <input type="radio" name="input_radio_opcional" value="opcion2" <?php echo isset($_REQUEST['input_radio_opcional']) && $_REQUEST['input_radio_opcional'] === 'opcion2' ? 'checked' : ''; ?>> opcion2
                                <input type="radio" name="input_radio_opcional" value="opcion3" <?php echo isset($_REQUEST['input_radio_opcional']) && $_REQUEST['input_radio_opcional'] === 'opcion3' ? 'checked' : ''; ?>> opcion3
                            </div>
                        </td>
                    </tr>
                    <td><label for="listaDesplegableObligatoria">Lista Desplegable:</label></td>
                    <td>                                                                                                
                        <select class="obligatorio" name="listaDesplegableObligatoria">
                            <option value="opcion1" <?php isset($_REQUEST['listaDesplegableObligatoria']) ? 'selected' : ''; ?>>opcion1</option>
                            <option value="opcion2" <?php isset($_REQUEST['listaDesplegableObligatoria']) ? 'selected' : ''; ?>>opcion2</option>
                            <option value="opcion3" <?php isset($_REQUEST['listaDesplegableObligatoria']) ? 'selected' : ''; ?>>opcion3</option>
                        </select> 
                    </td> 
                    <tr>
                        <td>
                            <label for="floatObligatorio">Float Obligatorio:</label>
                        </td>
                        <td>                                                                                               
                            <input class="obligatorio" type="text" name="floatObligatorio" value="<?php echo (isset($_REQUEST['floatObligatorio']) ? $_REQUEST['floatObligatorio'] : ''); ?>">
                        </td>
                        <td class="error"><?php echo (!empty($aErrores['floatObligatorio']) ? $aErrores['floatObligatorio'] : ''); ?></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="floatOpcional">Float Opcional:</label>
                        </td>
                        <td>                                                                                               
                            <input class="d-flex justify-content-start" type="text" name="floatOpcional" value="<?php echo (isset($_REQUEST['floatOpcional']) ? $_REQUEST['floatOpcional'] : ''); ?>">
                        </td>
                        <td class="error"><?php echo (!empty($aErrores['floatOpcional']) ? $aErrores['floatOpcional'] : ''); ?></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="correoObligatorio">Correo Obligatorio:</label>
                        </td>
                        <td>                                                                                               
                            <input class="obligatorio" type="text" name="correoObligatorio" placeholder="correo@gmail.com" value="<?php echo (isset($_REQUEST['correoObligatorio']) ? $_REQUEST['correoObligatorio'] : ''); ?>">
                        </td>
                        <td class="error"><?php echo (!empty($aErrores['correoObligatorio']) ? $aErrores['correoObligatorio'] : ''); ?></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="correoOpcional">Correo Opcional:</label>
                        </td>
                        <td>                                                                                              
                            <input  type="text" name="correoOpcional" placeholder="correo@gmail.com" value="<?php echo (isset($_REQUEST['correoOpcional']) ? $_REQUEST['correoOpcional'] : ''); ?>">
                        </td>
                        <td class="error"><?php echo (!empty($aErrores['correoOpcional']) ? $aErrores['correoOpcional'] : ''); ?></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="urlObligatorio">URL Obligatorio:</label>
                        </td>
                        <td>                                                                                               
                            <input class="obligatorio" type="text" name="urlObligatorio" placeholder="https://www.pagina.com" value="<?php echo (isset($_REQUEST['urlObligatorio']) ? $_REQUEST['urlObligatorio'] : ''); ?>">
                        </td>
                        <td class="error"><?php echo (!empty($aErrores['urlObligatorio']) ? $aErrores['urlObligatorio'] : ''); ?></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="urlOpcional">URL Opcional:</label>
                        </td>
                        <td>                                                                                               
                            <input type="text" name="urlOpcional" placeholder="https://www.pagina.com" value="<?php echo (isset($_REQUEST['urlOpcional']) ? $_REQUEST['urlOpcional'] : ''); ?>">
                        </td>
                        <td class="error"><?php echo (!empty($aErrores['urlOpcional']) ? $aErrores['urlOpcional'] : ''); ?></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="fechaObligatorio">Fecha Obligatorio:</label>
                        </td>
                        <td>                                                                                               
                            <input class="obligatorio" type="text" name="fechaObligatorio" placeholder="aaaa/mm/dd" value="<?php echo (isset($_REQUEST['fechaObligatorio']) ? $_REQUEST['fechaObligatorio'] : ''); ?>">
                        </td>
                        <td class="error"><?php echo (!empty($aErrores['fechaObligatorio']) ? $aErrores['fechaObligatorio'] : ''); ?></td>
                    </tr>
                    <tr>
                        <td >
                            <label for="fechaOpcional">Fecha Opcional:</label>
                        </td>
                        <td>                                                                                             
                            <input type="text" name="fechaOpcional" placeholder="aaaa/mm/dd" value="<?php echo (isset($_REQUEST['fechaOpcional']) ? $_REQUEST['fechaOpcional'] : ''); ?>">
                        </td>
                        <td class="error"><?php echo (!empty($aErrores['fechaOpcional']) ? $aErrores['fechaOpcional'] : ''); ?></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="dniObligatorio">DNI Obligatorio:</label>
                        </td>
                        <td>                                                                                               
                            <input class="obligatorio" type="text" name="dniObligatorio"  placeholder="71155441A" value="<?php echo (isset($_REQUEST['dniObligatorio']) ? $_REQUEST['dniObligatorio'] : ''); ?>">
                        </td>
                        <td class="error"><?php echo (!empty($aErrores['dniObligatorio']) ? $aErrores['dniObligatorio'] : ''); ?></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="dniOpcional">DNI Opcional:</label>
                        </td>
                        <td>                                                                                               
                            <input type="text" name="dniOpcional" placeholder="71155441A" value="<?php echo (isset($_REQUEST['dniOpcional']) ? $_REQUEST['dniOpcional'] : ''); ?>">
                        </td>
                        <td class="error"><?php echo (!empty($aErrores['dniOpcional']) ? $aErrores['dniOpcional'] : ''); ?></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="cpObligatorio">CP Obligatorio:</label>
                        </td>
                        <td>                                                                                               
                            <input class="obligatorio" type="text" name="cpObligatorio" placeholder="49000" value="<?php echo (isset($_REQUEST['cpObligatorio']) ? $_REQUEST['cpObligatorio'] : ''); ?>">
                        </td>
                        <td class="error"><?php echo (!empty($aErrores['cpObligatorio']) ? $aErrores['cpObligatorio'] : ''); ?></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="cpOpcional">CP Opcional:</label>
                        </td>
                        <td>                                                                                             
                            <input type="text" name="cpOpcional" placeholder="49000" value="<?php echo (isset($_REQUEST['cpOpcional']) ? $_REQUEST['cpOpcional'] : ''); ?>">
                        </td>
                        <td class="error"><?php echo (!empty($aErrores['cpOpcional']) ? $aErrores['cpOpcional'] : ''); ?></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="passwordObligatorio">Password Obligatorio:</label>
                        </td>
                        <td>                                                                                              
                            <input class="obligatorio" type="password" placeholder="paso" name="passwordObligatorio" value="<?php echo (isset($_REQUEST['passwordObligatorio']) ? $_REQUEST['passwordObligatorio'] : ''); ?>">
                        </td>
                        <td class="error"><?php echo (!empty($aErrores['passwordObligatorio']) ? $aErrores['passwordObligatorio'] : ''); ?></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="passwordOpcional">Password Opcional:</label>
                        </td>
                        <td>                                                                                               
                            <input type="password" name="passwordOpcional" placeholder="paso" value="<?php echo (isset($_REQUEST['passwordOpcional']) ? $_REQUEST['passwordOpcional'] : ''); ?>">
                        </td>
                        <td class="error"><?php echo (!empty($aErrores['passwordOpcional']) ? $aErrores['passwordOpcional'] : ''); ?></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="telefonoObligatorio">Telefono Obligatorio:</label>
                        </td>
                        <td>                                                                                               
                            <input class="obligatorio" type="text" name="telefonoObligatorio"placeholder="666777888" value="<?php echo (isset($_REQUEST['telefonoObligatorio']) ? $_REQUEST['telefonoObligatorio'] : ''); ?>">
                        </td>
                        <td class="error"><?php echo (!empty($aErrores['telefonoObligatorio']) ? $aErrores['telefonoObligatorio'] : ''); ?></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="telefonoOpcional">Telefono Opcional:</label>
                        </td>
                        <td>                                                                                              
                            <input type="text" name="telefonoOpcional" placeholder="666777888" value="<?php echo (isset($_REQUEST['telefonoOpcional']) ? $_REQUEST['telefonoOpcional'] : ''); ?>">
                        </td>
                        <td class="error"><?php echo (!empty($aErrores['telefonoOpcional']) ? $aErrores['telefonoOpcional'] : ''); ?></td>
                    </tr>
                    <tr>
                        <td><label for="textAreaObligatorio">textArea Obligatorio:</label></td>
                        <td><textarea class="obligatorio" id="textAreaObligatorio" name="textAreaObligatorio"><?php echo (isset($_REQUEST['textAreaObligatorio']) ? $_REQUEST['textAreaObligatorio'] : ''); ?></textarea></td>
                        <td class="error"><?php echo (!empty($aErrores["textAreaObligatorio"]) ? $aErrores["textAreaObligatorio"] : ''); ?></td>
                    </tr>
                    <tr>
                        <td><label for="textAreaObligatorio">textArea Opcional:</label></td>
                        <td><textarea id="textAreaOpcional" name="textAreaOpcional"><?php echo (isset($_REQUEST['textAreaOpcional']) ? $_REQUEST['textAreaOpcional'] : ''); ?></textarea></td>
                        <td class="error"><?php echo (!empty($aErrores["textAreaOpcional"]) ? $aErrores["textAreaOpcional"] : ''); ?></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="file">Archivo:</label>
                        </td>
                        <td>
                            <input type="file" name="file" value="<?php echo (isset($_REQUEST['file']) ? $_REQUEST['file'] : ''); ?>">
                        </td>
                        <td class="error"><?php echo (!empty($aErrores['file']) ? $aErrores['file'] : ''); ?></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="color">Color:</label>
                        </td>
                        <td>                                                                                              
                            <input type="color" name="color" value="<?php echo (isset($_REQUEST['color']) ? $_REQUEST['color'] : ''); ?>">
                        </td>
                        <td class="error"><?php echo (!empty($aErrores['color']) ? $aErrores['color'] : ''); ?></td>
                    </tr>                                                                                               
                </table>
                <input type="reset" value="Borrar">
                <input name="enviar" type="submit" value="Enviar">
            </form>
            <?php
        }
        ?>
        <footer class="bg-primary text-light py-4 fixed-bottom">
            <div class="container">
                <div class="row">
                    <div class="col text-center text-white">
                        <a href="/index.html">
                            <p class="text-white">&copy; 2023/24 Ismael Ferreras
                                García. Todos los derechos
                                reservados.</p>
                        </a>
                    </div>
                    <div class="col text-end">
                        <a href="../indexProyectoTema3.html">
                            <img src="/webroot/imagenes/casa-removebg-preview.png" alt="Home" width="35" height="35">
                        </a>
                        <a href="https://github.com/IsmaelFG" target="_blank">
                            <img src="/webroot/imagenes/github-removebg-preview.png" alt="GitHub" width="35" height="35">
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>










