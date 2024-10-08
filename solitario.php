<?php
// Iniciar la sesión para almacenar los contadores de victorias y derrotas
session_start();

// Inicializar contadores si no existen
if (!isset($_SESSION['winCount'])) {
    $_SESSION['winCount'] = 0;
}
if (!isset($_SESSION['loseCount'])) {
    $_SESSION['loseCount'] = 0;
}

// Función para generar cartas aleatorias
function generateRandomCards() {
    $suits = ['c', 'd', 'p', 't']; // Corazones, Diamantes, Picas, Tréboles
    $deck = [];
    $selectedCards = [];

    // Crear la baraja con todas las combinaciones de cartas (1-10) y palos
    foreach ($suits as $suit) {
        for ($value = 1; $value <= 10; $value++) {
            $deck[] = $suit . $value;
        }
    }

    // Generar 7 cartas sin repetición
    while (count($selectedCards) < 7) {
        $randomIndex = rand(0, count($deck) - 1); // Elegir una carta al azar
        $randomCard = $deck[$randomIndex];        // Obtener la carta

        // Si la carta no ha sido seleccionada aún, añadirla
        if (!in_array($randomCard, $selectedCards)) {
            $selectedCards[] = $randomCard;
        }
    }

    return $selectedCards; // Devolver las 7 cartas seleccionadas
}

$cards = generateRandomCards();
// comprueba si ha ganado o no
$lost = false;

for ($i = 0; $i < 7 && !$lost; $i++) {
    // Obtener el valor numérico de la carta (extraer el número)
    // Usamos strlen para ver si el valor es de 1 o 2 dígitos
   
    $cardValue = (int) substr($cards[$i],1,strlen($cards[$i])-1);
    // Comprobar si el valor coincide con el número de posición
    if ($cardValue == $i + 1) {
        $lost = true;
    }
}

// Actualizar contadores
if ($lost) {
    $_SESSION['loseCount']++;
    $message = "¡Has perdido! Juega de nuevo.";
} else {
    $_SESSION['winCount']++;
    $message = "¡Has ganado! Juega de nuevo.";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solitario PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Solitario de Tréboles</h1>
        <div class="row text-center">
            <p class="lead"><?php echo $message; ?></p>
            <p class="lead">Victorias: <?php echo $_SESSION['winCount']; ?> | Derrotas: <?php echo $_SESSION['loseCount']; ?></p>
        </div>

        <div class="row text-center">
            <?php for ($i = 0; $i < 7; $i++): ?>
                <div class="col">
                    <p><strong><?php echo $i + 1; ?></strong></p>
                    <img src="cartas/<?php echo $cards[$i]; ?>.svg" alt="Carta <?php echo $cards[$i]; ?>" class="img-fluid">
                </div>
            <?php endfor; ?>
        </div>

        <div class="row text-center mt-4">
            <a href="" class="btn btn-primary">Jugar de nuevo</a>
        </div>
    </div>
</body>
</html>
