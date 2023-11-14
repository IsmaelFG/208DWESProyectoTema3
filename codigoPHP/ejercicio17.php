<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>codigo17</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="/208DWESProyectoTema3/webroot/css/style.css">
    </head>
    <body style="margin-top:70px; margin-bottom: 100px">
        <nav class="navbar navbar-expand-lg bg-primary fixed-top">
            <div class="container">
                <a class="navbar-brand text-white" href="/index.html">Ejercicio17</a>
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
         * @since 16/10/2023
         */
        // Inicializamos el array bidimensional para representar el teatro y los asientos reservados
        $ateatro = [];
        for ($fila = 1; $fila < 21; $fila++) {
            for ($asiento = 1; $asiento < 16; $asiento++) {
                $ateatro[$fila][$asiento] = '';
            }
        }
        $ateatro[2][3] = "María";
        $ateatro[5][8] = "Juan";
        $ateatro[10][12] = "Pedro";
        $ateatro[15][1] = "Julian";
        $ateatro[18][14] = "Paula";

// Recorrido con foreach
        echo "Recorrido con foreach:<br>";
        foreach ($ateatro as $fila => $asientos) {
            foreach ($asientos as $asiento => $persona) {
                echo "Fila $fila, Asiento $asiento - $persona<br>";
            }
        }
// Recorrido con for
        echo "<br>Recorrido con for:<br>";
        for ($fila = 1; $fila < 21; $fila++) {
            for ($asiento = 1; $asiento < 16; $asiento++) {
                if (isset($ateatro[$fila][$asiento])) {
                    echo "Fila $fila, Asiento $asiento - " . $ateatro[$fila][$asiento] . "<br>";
                }
            }
        }
//Recorrido con while
        echo "<br>Recorrido con while:<br>";
        while (key($ateatro) !== null) {
            $fila = key($ateatro);
            next($ateatro); // Avanza el puntero interno
            while (key($ateatro) !== null) {
                $asiento = key($ateatro);
                $nombre = current($ateatro);
                echo ("$fila, Reservado por: $nombre\n");

                next($ateatro); // Avanza el puntero interno
            }
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










