<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>codigo24</title>
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
                max-width: 400px;
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
            input[type="number"],
            select {
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            #nombre{
                background-color: #f5ec78;
            }

            input[type="radio"] {
                margin: 10px;
            }

            input[type="reset"],
            input[type="submit"] {
                background-color: #007BFF;
                color: #fff;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                margin-right: 20px;

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
                <a class="navbar-brand text-white" href="/index.html">Ejercicio24</a>
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
        $_REQUEST['fecha_actual'] = date('Y-m-d - H:i:s'); //Inicializamos la fecha actual ya que es un campo desabilitado
        //Almacena las respuestas
        $aRespuestas = [
            'nombre' => '',
            'fecha_nacimiento' => '',
            'altura' => '',
            'fecha_actual' => ''
        ];
        //Almacena los errores
        $aErrores = [
            'nombre' => '',
            'fecha_nacimiento' => '',
            'altura' => '',
            'fecha_actual' => ''
        ];
        //Validar los campos
        if (isset($_REQUEST['enviar'])) {

            $aErrores = [
                'nombre' => validacionFormularios::comprobarAlfabetico($_REQUEST['nombre'], 50, 3, 1), //valida que solo se escriban letras que la longitud sea entre 50 y 3 caracteres y sea obligatorio
                'fecha_nacimiento' => validacionFormularios::validarFecha($_REQUEST['fecha_nacimiento']), //valida que la fecha este bien escrita, sea entre 01/01/2200 y 01/01/1900
                'altura' => validacionFormularios::comprobarEntero($_REQUEST['altura'], 250, 100) //valida que la altura sea un numero entero entre 250 y 100
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
        if ($entradaOK) { //Si todo esta bien escrito almacenar en aRespuestas la informacion
            $aRespuestas = [
                'nombre' => $_REQUEST['nombre'],
                'fecha_nacimiento' => $_REQUEST['fecha_nacimiento'],
                'altura' => $_REQUEST['altura'],
                'fecha_actual' => $_REQUEST['fecha_actual']
            ];

            echo "<h1>Respuestas:</h1>"; //muestra las respuestas
            foreach ($aRespuestas as $campo => $valor) {
                echo "$campo => $valor <br>";
            }
        } else {
            ?>

            <h1>Cuestionario</h1> 
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo (isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : ''); ?>">
                <?php echo (!empty($aErrores["nombre"]) ? '<span style="color: red;">' . $aErrores["nombre"] . '</span>' : ''); ?>
                <br>

                <label for="fecha_nacimiento">Fecha Nacimiento:</label>
                <input type="text" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo(isset($_REQUEST['fecha_nacimiento']) ? $_REQUEST['fecha_nacimiento'] : ''); ?>" placeholder="AAAA/MM/DD">
                <?php echo (!empty($aErrores["fecha_nacimiento"]) ? '<span style="color: red;">' . $aErrores["fecha_nacimiento"] . '</span>' : ''); ?>
                <br>

                <label for="altura">Altura(cm):</label>
                <input type="text" id="altura" name="altura" value="<?php echo (isset($_REQUEST['altura']) ? $_REQUEST['altura'] : ''); ?>">
                <?php echo (!empty($aErrores["altura"]) ? '<span style="color: red;">' . $aErrores["altura"] . '</span>' : ''); ?>
                <br>

                <label for="f_actual">Fecha actual:</label>
                <input type="text" id="f_actual" name="f_actual" value="<?php echo $_REQUEST['fecha_actual'] ?>" disabled>

                <br>

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





