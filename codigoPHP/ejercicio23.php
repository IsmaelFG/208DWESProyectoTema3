<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>codigo23</title>
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

            input[type="text"],
            input[type="number"],
            select {
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 5px;
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
                <a class="navbar-brand text-white" href="/index.html">Ejercicio23</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <?php
        include('../core/231018libreriaValidacion.php');
        $entradaOK = true; //Indica si todas las respuestas son correctas
        $aRespuestas = []; //Almacena las respuestas
        $aErrores = []; //Almacena los errores
        if (isset($_REQUEST['enviar'])) {
            $aErrores = [
                "nombre" => validacionFormularios::comprobarAlfabetico($_REQUEST["nombre"], 50, 3),
                "fecha_nacimiento" => validacionFormularios::validarFecha($_REQUEST["f_nacimiento"]),
                "altura" => validacionFormularios::comprobarEntero($_REQUEST["altura"], 250, 100)
            ];
            foreach ($aErrores as $key => $value) {
                if ($value == !null) {
                    $entradaOK = false;
                }
            }
        } else {
            $entradaOK = false;
        }
        if ($entradaOK) {
            $aRespuestas = [
                "nombre" => $_REQUEST["nombre"],
                "fecha_nacimiento" => $_REQUEST["f_nacimiento"],
                "altura" => $_REQUEST["altura"]
            ];

            echo "<h1>Respuestas:</h1>";
            foreach ($aRespuestas as $key => $value) {
                echo "$key => $value <br>";
            }
        } else {
            ?>
            <h1>Cuestionario</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre">
                <?php if (!empty($aErrores["nombre"])){ ?>
                    <span style="color: red;"><?php echo $aErrores["nombre"]; ?></span>
                <?php } ?>
                <br>

                <label for="f_nacimiento">Fecha Nacimiento:</label>
                <input type="text" id="f_nacimiento" name="f_nacimiento">
                <?php if (!empty($aErrores["fecha_nacimiento"])){ ?>
                    <span style="color: red;"><?php echo $aErrores["fecha_nacimiento"]; ?></span>
                <?php } ?>
                <br>

                <label for="altura">Altura:</label>
                <input type="text" id="altura" name="altura">
                <?php if (!empty($aErrores["altura"])){ ?>
                    <span style="color: red;"><?php echo $aErrores["altura"]; ?></span>
                <?php } ?>
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





