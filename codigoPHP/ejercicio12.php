<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>codigo12</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="/208DWESProyectoTema3/webroot/css/style.css">
    </head>
      <body style="margin-top:70px">
            <nav class="navbar navbar-expand-lg bg-primary fixed-top">
                <div class="container">
                    <a class="navbar-brand text-white" href="/index.html">Ejercicio12</a>
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
            echo('<strong style="font-size:32px;">Utilizando print_r</strong>');

            echo('<p>Variable $GLOBALS</p>');
            print_r($GLOBALS);
            echo('<br></br><p>Variable $_SERVER</p>');
            print_r($_SERVER);
            echo('<br></br><p>Variable $_GET</p>');
            print_r($_GET);
            echo('<br></br><p>Variable $-POST</p>');
            print_r($_POST);
            echo('<br></br><p>Variable $_FILES</p>');
            print_r($_FILES);
            echo('<br></br><p>Variable $_COOKIE</p>');
            print_r($_COOKIE);
            if (isset($_SESSION)) {
                echo('<br></br><p>Variable $_SESSION</p>');
                print_r($_SESSION);
            } else {
                echo('<br></br>La variable $_SESSION no esta definida');
            }
            echo('<br></br><p>Variable $_REQUEST</p>');
            print_r($_REQUEST);
            echo('<br></br><p>Variable $_ENV</p>');
            print_r($_ENV);

            echo('<br></br><strong style="font-size:32px;">Utilizando foreach</strong>');
            echo('<p>Variable $GLOBALS</p>');
            foreach ($GLOBALS as $key => $value) {
                var_dump($value);
                echo ("<br>");
            }

            echo('<br></br><p>Variable $_SERVER</p>');
            foreach ($_SERVER as $key => $value) {
                echo "$key: $value<br>";
            }
            echo('<br></br><p>Variable $_GET</p>');
            foreach ($_GET as $key => $value) {
                echo "$key: $value<br>";
            }
            echo('<br></br><p>Variable $-POST</p>');
            foreach ($_POST as $key => $value) {
                echo "$key: $value<br>";
            }
            echo('<br></br><p>Variable $_FILES</p>');
            foreach ($_FILES as $key => $value) {
                echo "$key: $value<br>";
            }
            echo('<br></br><p>Variable $_COOKIE</p>');
            foreach ($_COOKIE as $key => $value) {
                echo "$key: $value<br>";
            }

            if (isset($_SESSION)) {
                echo('<br></br><p>Variable $_SESSION</p>');
                foreach ($_SESSION as $key => $value) {
                    echo "$key: $value<br>";
                }
            } else {
                echo('La variable $_SESSION no esta definida');
            }
            echo('<br></br><p>Variable $_REQUEST</p>');
            foreach ($_REQUEST as $key => $value) {
                echo "$key: $value<br>";
            }
            echo('<br></br><p>Variable $_ENV</p>');
            foreach ($_ENV as $key => $value) {
                echo "$key: $value<br>";
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










