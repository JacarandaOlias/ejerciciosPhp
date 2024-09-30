<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Mi Primer formulario</title>
</head>
<body>
<div class="container mt-5">
        <h1 class="text-center">Respuesta</h1>
<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Comprobar si los parámetros existen y no están vacíos
    if (isset($_GET['name']) && isset($_GET['age']) && !empty($_GET['name']) && !empty($_GET['age'])) {
        
        // Recibir los valores del formulario
        $name = htmlspecialchars(trim($_GET['name']));
        $age = htmlspecialchars(trim($_GET['age']));
        
        // Inicializamos un array de errores
        $errors = [];

        // Validar el nombre (solo letras y espacios)
        if (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
            $errors[] = "El nombre solo puede contener letras y espacios.";
        }

        // Validar la edad (debe ser un número positivo)
        if (!is_numeric($age) || $age < 0) {
            $errors[] = "La edad debe ser un número positivo.";
        }

        // Mostrar errores si existen
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
        }else {
            // Si no hay errores, procesamos la información
            $age = (int)$age; // Convertir la edad a número entero

            if ($age >= 18) {
                echo "<div class='alert alert-success'>Hola $name, eres mayor de edad.</div>";
            } else {
                echo "<div class='alert alert-warning'>Hola $name, eres menor de edad.</div>";
            }
        }
        echo "<a href='formulario1.php' class='btn btn-primary'>Volver</a>";

    } else {
        // Si no están presentes o están vacíos, mostramos un mensaje de error
        echo "<div class='alert alert-danger'>Por favor, asegúrate de completar todos los campos.</div>";
        echo "<a href='formulario1.php' class='btn btn-primary'>Volver</a>";
    }
}else {
    // Si no se accede mediante POST, redirigir o mostrar un error
    echo "<div class='alert alert-danger'>Acceso no permitido. Debes acceder por GET</div>";
    echo "<a href='formulario1.php' class='btn btn-primary'>Volver</a>";
}
?>
</div>

</body>
</html>
