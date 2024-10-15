<?php
session_start();
$msg = [];
$words = ["manzana", "perro", "casa", "libro", "sol", "luna", "árbol", "flor", "mesa", "gato"];
if (!isset($_SESSION["word"]) || !isset($_GET["submit"])) {
    $num = random_int(0, 9);
    $_SESSION["word"] = $words[$num];
    $msg = "Empezamos. Adivina mi palabra";
    $error = 0;
    $_SESSION["wordToShow"] = "";
    for ($i = 0; $i < strlen($_SESSION["word"]); $i++) {
        $_SESSION["wordToShow"] = $_SESSION["wordToShow"] . "_ ";
    }

} else {
    if (isset($_GET["letterInput"]) && strlen($_GET["letterInput"]) == 1) {
        for ($i = 0; $i < strlen($_SESSION["word"]); $i++) {
            if ($_SESSION["word"][$i] == $_GET["letterInput"]) {
                $_SESSION["wordToShow"][$i*2] = $_GET["letterInput"];
            }
        }
    } else {
        $msg = "Debes introducir solo un carácter";
    }



}
echo $_SESSION["word"];
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Adivinanza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Arbolado</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center">Palabra a Adivinar</h3>
                        <div class="d-flex justify-content-center mb-4">

                            <p id="word" class="fs-4"><!-- Aquí se mostrarán los guiones -->
                                <?php
                                    echo $_SESSION["wordToShow"];
                                ?>
                            </p>
                        </div>
                        <form id="guessForm">
                            <div class="mb-3">
                                <label for="letterInput" class="form-label">Introduce una letra</label>
                                <input type="text" class="form-control" name="letterInput" id="letterInput"
                                    maxlength="1" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" value="" id="submit" name="submit"
                                    class="btn btn-primary">Adivinar Letra</button>
                            </div>
                        </form>
                        <div id="message" class="mt-3 text-center"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>