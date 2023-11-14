<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>codigo01</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="/208DWESProyectoTema3/webroot/css/style.css">
        <style>
            .cuerpo{
                margin-bottom: 200px;
            }
        </style>
    </head>
    <body class="mt-5">
    <body style="margin-top:70px">
        <nav class="navbar navbar-expand-lg bg-primary fixed-top">
            <div class="container">
                <a class="navbar-brand text-white" href="/index.html">Ejercicio01</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <p style = "font-size: 24px">ECHO:</p>
        <?php
        /**
         * @author Ismael Ferreras García
         * @version 1.0
         * @since 11/10/2023
         */
        $texto = "hola";
        $numero_entero = 1;
        $numero_decimal = 1.5;
        $interruptor = true;

        echo '<p>La variable <span style="color:red">$texto</span> es de tipo <span style="color:red">' . gettype($texto) . '</span> y tiene el valor <span style="color:red">' . " $texto</p></span>";
        echo '<p>La variable <span style="color:red">$numero_entero</span> es de tipo <span style="color:red">' . gettype($numero_entero) . '</span> y tiene el valor <span style="color:red">' . " $numero_entero</p></span>";
        echo '<p>La variable <span style="color:red">$numero_decimal</span> es de tipo <span style="color:red">' . gettype($numero_decimal) . '</span> y tiene el valor <span style="color:red">' . " $numero_decimal</p></span>";
        echo '<p>La variable <span style="color:red">$interruptor</span> es de tipo <span style="color:red">' . gettype($interruptor) . '</span> y tiene el valor <span style="color:red">' . " $interruptor</p></span>";
        ?>
        <p style="font-size: 24px">PRINT:</p>
        <?php
        print '<p>La variable <span style="color:red">$texto</span> es de tipo <span style="color:red">' . gettype($texto) . '</span> y tiene el valor <span style="color:red">' . " $texto</p></span>";
        print '<p>La variable <span style="color:red">$numero_entero</span> es de tipo <span style="color:red">' . gettype($numero_entero) . '</span> y tiene el valor <span style="color:red">' . " $numero_entero</p></span>";
        print '<p>La variable <span style="color:red">$numero_decimal</span> es de tipo <span style="color:red">' . gettype($numero_decimal) . '</span> y tiene el valor <span style="color:red">' . " $numero_decimal</p></span>";
        print '<p>La variable <span style="color:red">$interruptor</span> es de tipo <span style="color:red">' . gettype($interruptor) . '</span> y tiene el valor <span style="color:red">' . " $interruptor</p></span>";
        ?>
        <p style="font-size: 24px">PRINTF:</p>
        <?php
        printf('<p>La variable <span style="color:red">$texto</span> es de tipo <span style="color:red">' . gettype($texto) . '</span> y tiene el valor <span style="color:red">' . " $texto</p></span>");
        printf('<p>La variable <span style="color:red">$numero_entero</span> es de tipo <span style="color:red">' . gettype($numero_entero) . '</span> y tiene el valor <span style="color:red">' . " $numero_entero</p></span>");
        printf('<p>La variable <span style="color:red">$numero_decimal</span> es de tipo <span style="color:red">' . gettype($numero_decimal) . '</span> y tiene el valor <span style="color:red">' . " $numero_decimal</p></span>");
        printf('<p>La variable <span style="color:red">$interruptor</span> es de tipo <span style="color:red">' . gettype($interruptor) . '</span> y tiene el valor <span style="color:red">' . " $interruptor</p></span>");
        ?>
        <p style="font-size: 24px">PRINT_R:</p>
        <?php
        print_r('<p>La variable <span style="color:red">$texto</span> es de tipo <span style="color:red">' . gettype($texto) . '</span> y tiene el valor <span style="color:red">' . " $texto</p></span>");
        print_r('<p>La variable <span style="color:red">$numero_entero</span> es de tipo <span style="color:red">' . gettype($numero_entero) . '</span> y tiene el valor <span style="color:red">' . " $numero_entero</p></span>");
        print_r('<p>La variable <span style="color:red">$numero_decimal</span> es de tipo <span style="color:red">' . gettype($numero_decimal) . '</span> y tiene el valor <span style="color:red">' . " $numero_decimal</p></span>");
        print_r('<p>La variable <span style="color:red">$interruptor</span> es de tipo <span style="color:red">' . gettype($interruptor) . '</span> y tiene el valor <span style="color:red">' . " $interruptor</p></span>");
        ?>
        <p style="font-size: 24px">VAR_DUMP:</p>
        <?php
        var_dump('<p>La variable <span style="color:red">$texto</span> es de tipo <span style="color:red">' . gettype($texto) . '</span> y tiene el valor <span style="color:red">' . " $texto</p></span>");
        var_dump('<p>La variable <span style="color:red">$numero_entero</span> es de tipo <span style="color:red">' . gettype($numero_entero) . '</span> y tiene el valor <span style="color:red">' . " $numero_entero</p></span>");
        var_dump('<p>La variable <span style="color:red">$numero_decimal</span> es de tipo <span style="color:red">' . gettype($numero_decimal) . '</span> y tiene el valor <span style="color:red">' . " $numero_decimal</p></span>");
        var_dump('<p>La variable <span style="color:red">$interruptor</span> es de tipo <span style="color:red">' . gettype($interruptor) . '</span> y tiene el valor <span style="color:red">' . " $interruptor</p></span>");
        ?>
    </div>

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


