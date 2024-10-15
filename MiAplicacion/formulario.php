<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Cliente</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">
            <?php
            $accion = $_GET['accion'] ?? 'añadir';
            echo ucfirst($accion) . " Cliente";
            ?>
        </h1>

        <?php
        // Simulación de base de datos
        $clientes = [
            '12345678A' => [
                'nombre' => 'Juan',
                'apellidos' => 'Pérez',
                'direccion' => 'Calle Falsa 123',
                'email' => 'juan.perez@example.com',
                'fecha_nacimiento' => '1990-01-01',
                'premiun' => true
            ],
            '87654321B' => [
                'nombre' => 'Ana',
                'apellidos' => 'García',
                'direccion' => 'Avenida Siempre Viva 742',
                'email' => 'ana.garcia@example.com',
                'fecha_nacimiento' => '1985-05-15',
                'premiun' => false
            ]
        ];

        $dni = $_GET['dni'] ?? '';
        $cliente = $clientes[$dni] ?? ['nombre' => '', 'apellidos' => '', 'direccion' => '', 'email' => '', 'fecha_nacimiento' => '', 'premiun' => false];

        if ($accion === 'eliminar') {
            unset($clientes[$dni]);
            echo "<div class='alert alert-success'>Cliente eliminado con éxito.</div>";
            echo "<a href='index.php' class='btn btn-primary'>Volver al listado</a>";
        } else {
        ?>

        <form action="guardar.php" method="POST">
            <div class="form-group">
                <label for="dni">DNI</label>
                <input type="text" name="dni" id="dni" class="form-control" value="<?= $dni ?>" <?= $accion === 'editar' ? 'readonly' : '' ?> required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="<?= $cliente['nombre'] ?>" required>
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos" id="apellidos" class="form-control" value="<?= $cliente['apellidos'] ?>" required>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" name="direccion" id="direccion" class="form-control" value="<?= $cliente['direccion'] ?>">
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" name="email" id="email" class="form-control" value="<?= $cliente['email'] ?>">
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" value="<?= $cliente['fecha_nacimiento'] ?>">
            </div>
            <div class="form-group">
                <label for="premiun">Cliente Premium</label>
                <input type="checkbox" name="premiun" id="premiun" <?= $cliente['premiun'] ? 'checked' : '' ?>>
            </div>

            <button type="submit" class="btn btn-primary"><?= ucfirst($accion) ?> Cliente</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>

        <?php } ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
