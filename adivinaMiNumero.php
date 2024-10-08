<?php
// Initializo las varaibles
$thoughtNumber = isset($_GET['thoughtNumber']) ? (int)$_GET['thoughtNumber'] : rand(1, 100);
$attempts = isset($_GET['attempts']) ? (int)$_GET['attempts'] : 0;

// Initial message
$message = "Adivina un número entre el 1 y el  100";

if (isset($_GET['number']) ) {
    if (is_numeric($_GET['number'])){
        $userNumber = (int)$_GET['number'];
        $attempts++;
    
        if ($userNumber == $thoughtNumber) {
            $message = "<div class='alert alert-success'>Correcto! Has adivinado el número en $attempts intentos.</div>";
            // Reset the game
            $thoughtNumber = rand(1, 100);
            $attempts = 0;
        } elseif ($userNumber > $thoughtNumber) {
            $message = "<div class='alert alert-warning'>El número $userNumber es mayor que el número a adivinar. Ya has realizado $attempts intentos.</div>";
        } else {
            $message = "<div class='alert alert-warning'>El número $userNumber es menor que el número a adivinar. Ya has realizado $attempts intentos.</div>";
        }

    }else{
        $message = "No has introducido un número";
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adivina mi número</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center mb-4">Adivina</h1>
                <p class="text-center"><?php echo $message; ?></p>

                <form method="GET" class="card p-4 shadow-sm">
                    <div class="mb-3">
                        <label for="number" class="form-label">Introduce un número:</label>
                        <input type="number" id="number" name="number" min="1" max="100" class="form-control" required>
                    </div>
                    <input  name="thoughtNumber" value="<?php echo $thoughtNumber; ?>">
                    <input  name="attempts" value="<?php echo $attempts; ?>">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Including Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
