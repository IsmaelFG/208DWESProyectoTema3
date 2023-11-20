<!DOCTYPE html>
<!--
        Descripción: CodigoEjercicio25
        Autor: Carlos García Cachón
        Fecha de creación/modificación: 28/10/2023
-->
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Carlos García Cachón">
        <meta name="description" content="CodigoEjercicio25">
        <meta name="keywords" content="CodigoEjercicio, 25">
        <meta name="generator" content="Apache NetBeans IDE 19">
        <meta name="generator" content="60">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Ismael Ferreras García</title>
        <link rel="icon" type="image/jpg" href="../webroot/media/images/favicon.ico"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="../webroot/css/style.css">
        <style>
            .obligatorio {
                background-color: #ffff7a;
            }
            .bloqueado:disabled {
                background-color: #665 ;
                color: white;
            }
            .error {
                color: red;
                width: 450px;
            }
            form{
                margin-bottom: 100px;
            }
        </style>
    </head>

    <body>
        <header class="text-center">
            <h1>27. ENCUESTA INDIVIDUAL DE VALORACION-EJERCICIO 27</h1>
            <h2>UTILIZANDO LA PLANTILLA DE DESARROLLO DE FORMARIOS COMO CHURROS</h2>
        </header>
        <main>
            <div class="container mt-3 text-center">
                <div class="row">
                    <div class="col d-flex justify-content-center">
                        <?php
                        /**
                         * @author Carlos García Cachón
                         * @version 1.2
                         * @since 30/10/2023
                         */
                        //Incluyo las librerias de validación para comprobar los campos
                        require_once '../core/231018libreriaValidacion.php';

                        //Declaración de constantes por OBLIGATORIEDAD
                        define('OPCIONAL', 0);
                        define('OBLIGATORIO', 1);

                        //Declaración de los limites para el metodo comprobar ALFABETICO
                        define('TAM_MAX_ALFABETICO', 1000);
                        define('TAM_MIN_ALFABETICO', 1);

                        //Declaración de los limites para el metodo comprobar ALFANUMERICO
                        define('TAM_MAX_ALFANUMERICO', 1000);
                        define('TAM_MIN_ALFANUMERICO', 1);

                        //Declaración de los limites para el metodo comprobar ENTERO
                        define('TAM_MAX_ENTERO', PHP_INT_MAX);
                        define('TAM_MIN_ENTERO', PHP_INT_MIN);

                        //Declaración de los limites para el metodo comprobar FLOAT
                        define('TAM_MAX_FLOAT', PHP_FLOAT_MAX);
                        define('TAM_MIN_FLOAT', PHP_FLOAT_MIN);

                        //Declaración de los limites para el metodo comprobar FECHA
                        define('FECHA_MAX', date('d-m-Y'));
                        define('FECHA_MIN', "01/01/1950");

                        //Declaración de los limites para el metodo comprobar PASSWORD
                        define('LONG_MAX', 16);
                        define('LONG_MIN', 2);
                        //Hace referencia a los tipos de complejidad de la contraseña
                        define('LOW', 1);
                        define('MEDIUM', 2);
                        define('HARD', 3);

                        //Declaración del limite de caracteres para metodos que comprueben un MAXIMO y MINIMO (MINTAMANIO/MAXTAMANIO/NOMBREARCHIVO)
                        define('TAM_MAX_CARACTERES', 16);
                        define('TAM_MIN_CARACTERES', 1);

                        //Declaración del limite de alfanumericos dentro del campo TEXTAREA
                        define("TAM_MAX_TEXTO", 255);
                        define("TAM_MIN_TEXTO", 1);

                        //Declaración de un array para que almacene las EXTENSIONES por defecto de la función validarNombreArchivo
                        $aExtensiones = ['txt', 'json'];

                        //Declaración de un array LISTA
                        $aLista = ['Ni Idea', 'Con la familia','De fiesta','Trabajando','Estudiando DWES'];

                        //Declaración de variables de estructura para validar la ENTRADA de RESPUESTAS o ERRORES
                        //Valores por defecto
                        $entradaOK = true;

                        $aRespuestas = [
                            'alfabeticoObligatorio' => "",
                            'fechaObligatorio' => "",
                            'radioButtonObligatorio' => "",
                            'enteroObligatorio' => "",
                            'listaObligatorio' => "",
                            'textAreaObligatorio' => ""
                        ];

                        $aErrores = [
                            'alfabeticoObligatorio' => "",
                            'fechaObligatorio' => "",
                            'radioButtonObligatorio' => "",
                            'enteroObligatorio' => "",
                            'listaObligatorio' => "",
                            'textAreaObligatorio' => ""
                        ];
                        //En el siguiente if pregunto si el '$_REQUEST' recupero el valor 'enviar' que enviamos al pulsar el boton de enviar del formulario.
                        if (isset($_REQUEST['enviar'])) {
                            /*
                             * Ahora inicializo cada 'key' del ARRAY utilizando las funciónes de la clase de 'validacionFormularios' , la cuál 
                             * comprueba el valor recibido (en este caso el que recibe la variable '$_REQUEST') y devuelve 'null' si el valor es correcto,
                             * o un mensaje de error personalizado por cada función dependiendo de lo que validemos.
                             */
                            $aErrores = [
                                'alfabeticoObligatorio' => validacionFormularios::comprobarAlfabetico($_REQUEST['alfabeticoObligatorio'], TAM_MAX_ALFABETICO, TAM_MIN_ALFABETICO, OBLIGATORIO),
                                'fechaObligatorio' => validacionFormularios::validarFecha($_REQUEST['fechaObligatorio'], FECHA_MAX, FECHA_MIN, OBLIGATORIO),
                                'radioButtonObligatorio' => NULL,
                                'enteroObligatorio' => validacionFormularios::comprobarEntero($_REQUEST['enteroObligatorio'], TAM_MAX_ENTERO, TAM_MIN_ENTERO, OBLIGATORIO),
                                'listaObligatorio' => validacionFormularios::validarElementoEnLista($_REQUEST['listaObligatorio'], $aLista),
                                'textAreaObligatorio' => validacionFormularios::comprobarAlfanumerico($_REQUEST['textAreaObligatorio'], TAM_MAX_TEXTO, TAM_MIN_TEXTO, OBLIGATORIO)
                            ];

                            /*
                             * En los siguientes 'if' comprobamos que existe valor dentro de las siguientes variables y en caso negativo mostramos un mensaje error.
                             * Ya que dentro de la función validarElementoLista' no tenemos manera de hacerlo obligatorio, lo hacemos por el siguiente 'if'.
                             */
                            if (!isset($_REQUEST['radioButtonObligatorio'])) {
                                $aErrores['radioButtonObligatorio'] = "Debes elegir al menos 1 opción.";
                            }

                            /*
                             * En este foreach recorremos el array buscando que exista NULL (Los metodos anteriores si son correctos devuelven NULL)
                             * y en caso negativo cambiara el valor de '$entradaOK' a false y borrara el contenido del campo.
                             */
                            foreach ($aErrores as $campo => $error) {
                                if ($error != null) {
                                    $_REQUEST[$campo] = "";
                                    $entradaOK = false;
                                }
                            }
                        } else {
                            $entradaOK = false;
                        }
                        //En caso de que '$entradaOK' sea true, cargamos las respuestas en el array '$aRespuestas'
                        if ($entradaOK) {
                            $aRespuestas = [
                                'alfabeticoObligatorio' => $_REQUEST['alfabeticoObligatorio'],
                                'fechaObligatorio' => $_REQUEST['fechaObligatorio'],
                                'radioButtonObligatorio' => $_REQUEST['radioButtonObligatorio'],
                                'enteroObligatorio' => $_REQUEST['enteroObligatorio'],
                                'listaObligatorio' => $_REQUEST['listaObligatorio'],
                                'textAreaObligatorio' => $_REQUEST['textAreaObligatorio']
                            ];
                            //Aqui recorremos el array mostrando los valores alamacenados en el array anterior
                            echo("<div>");
                            echo "<h2>Respuestas:</h2>";
                            foreach ($aRespuestas as $campo => $respuesta) {
                                if ($campo == 'checkBoxObligatorio') {
                                    echo "<p class='d-flex justify-content-start'>" . strtoupper($campo) . " : [</p>";
                                    foreach ($_REQUEST['checkBoxObligatorio'] as $campo => $respuesta) {
                                        echo "<p>" . $campo . " => " . $respuesta . "</p>";
                                    }
                                    echo "]";
                                } else {
                                    echo "<p class='d-flex justify-content-start'>" . strtoupper($campo) . " : " . $respuesta . "</p>";
                                }
                            }
                            echo("</div>");
                        } else {
                            ?>
                            <!-- Codigo del formulario -->
                            <form name="plantilla" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <fieldset>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="rounded-top" colspan="3"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <!-- Alfabético Obligatorio -->
                                                <td class="d-flex justify-content-start">
                                                    <label for="alfabeticoObligatorio">Nombre y Apellidos del alumno:</label>
                                                </td>
                                                <td>                                                                                                <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                                                                                                                                    comprobamos que exista la variable y no sea 'null'. En el caso verdadero devovleremos el contenido del campo
                                                                                                                                                    que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->
                                                    <input class="obligatorio d-flex justify-content-start" type="text" name="alfabeticoObligatorio" value="<?php echo (isset($_REQUEST['alfabeticoObligatorio']) ? $_REQUEST['alfabeticoObligatorio'] : ''); ?>">
                                                </td>
                                                <td class="error">
                                                    <?php
                                                    if (!empty($aErrores['alfabeticoObligatorio'])) {
                                                        echo $aErrores['alfabeticoObligatorio'];
                                                    }
                                                    ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                                </td>
                                            </tr>
                                            <tr>
                                                <!-- Fecha Obligatorio -->
                                                <td class="d-flex justify-content-start">
                                                    <label for="fechaObligatorio">Fecha de nacimiento:</label>
                                                </td>
                                                <td>                                                                                                <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                                                                                                                                    comprobamos que exista la variable y no sea 'null'. En el caso verdadero devovleremos el contenido del campo
                                                                                                                                                    que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->
                                                    <input class="obligatorio d-flex justify-content-start" type="text" name="fechaObligatorio" value="<?php echo (isset($_REQUEST['fechaObligatorio']) ? $_REQUEST['fechaObligatorio'] : ''); ?>">
                                                </td>
                                                <td class="error">
                                                    <?php
                                                    if (!empty($aErrores['fechaObligatorio'])) {
                                                        echo $aErrores['fechaObligatorio'];
                                                    }
                                                    ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                                </td>
                                            </tr>
                                            <tr>
                                                <!-- Radio Obligatorio -->
                                                <td class="d-flex justify-content-start">
                                                    <label for="radioButtonObligatorio">¿Como te sientes hoy?:</label>
                                                </td>
                                                <td class="obligatorio">                                                                                                
                                                    <label for="radioButtonObligatorio">MUY MAL</label>
                                                    <input type="radio" id="radioButtonItem2" name="radioButtonObligatorio" value="mal" <?php
                                                    if (is_null($aErrores['radioButtonObligatorio']) && isset($_REQUEST['radioButtonObligatorio']) && $_REQUEST['radioButtonObligatorio'] == 'radioButtonItem2') {
                                                        echo 'checked';
                                                    }
                                                    ?>><br> <!-- Si el campo es correcto se queda seleccionado. -->
                                                    <label for="radioButtonObligatorio">MAL</label>
                                                    <input type="radio" id="radioButtonItem2" name="radioButtonObligatorio" value="mal" <?php
                                                    if (is_null($aErrores['radioButtonObligatorio']) && isset($_REQUEST['radioButtonObligatorio']) && $_REQUEST['radioButtonObligatorio'] == 'radioButtonItem2') {
                                                        echo 'checked';
                                                    }
                                                    ?>><br> <!-- Si el campo es correcto se queda seleccionado. -->
                                                     <label for="radioButtonObligatorio">REGULAR</label>
                                                    <input type="radio" id="radioButtonItem2" name="radioButtonObligatorio" value="mal" <?php
                                                    if (is_null($aErrores['radioButtonObligatorio']) && isset($_REQUEST['radioButtonObligatorio']) && $_REQUEST['radioButtonObligatorio'] == 'radioButtonItem2') {
                                                        echo 'checked';
                                                    }
                                                    ?>><br> <!-- Si el campo es correcto se queda seleccionado. -->
                                                     <label for="radioButtonObligatorio">BIEN</label>
                                                    <input type="radio" id="radioButtonItem2" name="radioButtonObligatorio" value="mal" <?php
                                                    if (is_null($aErrores['radioButtonObligatorio']) && isset($_REQUEST['radioButtonObligatorio']) && $_REQUEST['radioButtonObligatorio'] == 'radioButtonItem2') {
                                                        echo 'checked';
                                                    }
                                                    ?>><br> <!-- Si el campo es correcto se queda seleccionado. -->
                                                     <label for="radioButtonObligatorio">MUY BIEN</label>
                                                    <input type="radio" id="radioButtonItem2" name="radioButtonObligatorio" value="mal" <?php
                                                    if (is_null($aErrores['radioButtonObligatorio']) && isset($_REQUEST['radioButtonObligatorio']) && $_REQUEST['radioButtonObligatorio'] == 'radioButtonItem2') {
                                                        echo 'checked';
                                                    }
                                                    ?>><br> <!-- Si el campo es correcto se queda seleccionado. -->
                                                    
                                                </td>
                                                <td class="error">
                                                    <?php
                                                    if (!empty($aErrores['radioButtonObligatorio'])) {
                                                        echo $aErrores['radioButtonObligatorio'];
                                                    }
                                                    ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                                </td>
                                            </tr>
                                            <tr>
                                                <!-- Entero Obligatorio -->
                                                <td class="d-flex justify-content-start">
                                                    <label for="enteroObligatorio">¿Como va el curso?[0-10]:</label>
                                                </td>
                                                <td>                                                                                                <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                                                                                                                                    comprobamos que exista la variable y no sea 'null'. En el caso verdadero devovleremos el contenido del campo
                                                                                                                                                    que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->
                                                    <input class="obligatorio d-flex justify-content-start" type="text" name="enteroObligatorio" value="<?php echo (isset($_REQUEST['enteroObligatorio']) ? $_REQUEST['enteroObligatorio'] : ''); ?>">
                                                </td>
                                                <td class="error">
                                                    <?php
                                                    if (!empty($aErrores['enteroObligatorio'])) {
                                                        echo $aErrores['enteroObligatorio'];
                                                    }
                                                    ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                                </td>
                                            </tr>
                                            <tr>
                                                <!-- Lista Obligatorio -->
                                                <td class="d-flex justify-content-start">
                                                    <label for="listaObligatorio">¿Como se presentan las vacaciones de navidad?:</label>
                                                </td>
                                                <td>                                                                                                
                                                    <select class="obligatorio" name="listaObligatorio">
                                                        <option value="Ni Idea" <?php
                                                        if (isset($_REQUEST['listaObligatorio'])) {
                                                            echo 'selected';
                                                        }
                                                        ?>>Ni Idea</option> <!-- Si el campo es correcto se queda seleccionado. -->
                                                        <option value="Con la familia" <?php
                                                        if (isset($_REQUEST['listaObligatorio'])) {
                                                            echo 'selected';
                                                        }
                                                        ?>>Con la familia</option> <!-- Si el campo es correcto se queda seleccionado. -->
                                                        <option value="De fiesta" <?php
                                                        if (isset($_REQUEST['listaObligatorio'])) {
                                                            echo 'selected';
                                                        }
                                                        ?>>De fiesta</option> <!-- Si el campo es correcto se queda seleccionado. -->
                                                        <option value="Trabajando" <?php
                                                        if (isset($_REQUEST['listaObligatorio'])) {
                                                            echo 'selected';
                                                        }
                                                        ?>>Trabajando</option> <!-- Si el campo es correcto se queda seleccionado. -->
                                                        <option value="Estudiando DWES" <?php
                                                        if (isset($_REQUEST['listaObligatorio'])) {
                                                            echo 'selected';
                                                        }
                                                        ?>>Estudiando DWES</option> <!-- Si el campo es correcto se queda seleccionado. -->
                                                    </select> 
                                                </td>
                                                <td class="error">
                                                    <?php
                                                    if (!empty($aErrores['listaObligatorio'])) {
                                                        echo $aErrores['listaObligatorio'];
                                                    }
                                                    ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                                </td>
                                            </tr>
                                            <tr>
                                                <!-- TextArea Obligatorio -->
                                                <td class="d-flex justify-content-start">
                                                    <label for="textAreaObligatorio">Describe brevemente tu estado de animo:</label>
                                                </td>
                                                <td>                                                                                                    <!-- En el siguiente 'if' comprobamos que en el array '$aErrores' , guarde valor 'NULL' y que la variable ese declarada y sin 
                                                                                                                                                             ausencia de valor, si es así, devuelvo el contenido almacenado en '$_REQUEST['textAreaObligatorio']' -->                                                                            
                                                    <textarea class="obligatorio d-flex justify-content-start" rows="4" cols="50" name="textAreaObligatorio"><?php
                                                        if ($aErrores['textAreaObligatorio'] == null && isset($_REQUEST['textAreaObligatorio'])) {
                                                            echo ($_REQUEST['textAreaObligatorio']);
                                                        }
                                                        ?></textarea>
                                                </td>
                                                <td class="error">
                                                    <?php
                                                    if (!empty($aErrores['textAreaObligatorio'])) {
                                                        echo $aErrores['textAreaObligatorio'];
                                                    }
                                                    ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="submit" name="enviar">Enviar</button>
                                </fieldset>
                            </form>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </main>
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    </body>

</html>

