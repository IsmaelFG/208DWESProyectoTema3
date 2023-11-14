<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>codigo16</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="/208DWESProyectoTema3/webroot/css/style.css">
    </head>
    <body style="margin-top:70px">
        <nav class="navbar navbar-expand-lg bg-primary fixed-top">
            <div class="container">
                <a class="navbar-brand text-white" href="/index.html">Ejercicio16</a>
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
        $aSueldoSemanal = [
            "Lunes" => 100,
            "Martes" => 120,
            "Miercoles" => 300,
            "Jueves" => 200,
            "Viernes" => 140,
            "Sabado" => 150,
            "Domingo" => 150
        ];
        
        $sumaSalario=0;

// Inicializa el puntero interno al comienzo del array
        reset($aSueldoSemanal);

        while (key($aSueldoSemanal) !== null) {
            $dia = key($aSueldoSemanal);
            $sueldo = current($aSueldoSemanal);
            $sumaSalario+=$sueldo;
            echo "$dia => $sueldo.\n";

            // Avanza el puntero interno una posición
            next($aSueldoSemanal);
        }
        echo("<br>Suma semanal: ".$sumaSalario);
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










