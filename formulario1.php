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
        <h1 class="text-center">Verificación de Edad</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            // Comprobar si los parámetros existen y no están vacíos
        if (isset($_GET['name']) && isset($_GET['age']) && !empty($_GET['name']) && !empty($_GET['age'])) {
        
            // Recibir los valores del formulario
            $name = trim($_GET['name']);
            $age = trim($_GET['age']);
        
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

            
        } 
}
?>

        <form method="GET">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" required pattern="[A-Za-z\s]+" title="El nombre solo puede contener letras y espacios">
                <div class="invalid-feedback">
                    El nombre es obligatorio y debe contener solo letras y espacios.
                </div>
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Edad</label>
                <input type="number" class="form-control" id="age" name="age" required min="0" title="Por favor, introduce una edad válida.">
                <div class="invalid-feedback">
                    Por favor, introduce una edad válida.
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
</div>

</body>
</html>


