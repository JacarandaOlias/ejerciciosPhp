<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Clientes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Listado de Clientes</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Simulación de base de datos: array asociativo
                $clientes = [
                    '12345678A' => [
                        'nombre' => 'Juan',
                        'apellidos' => 'Pérez',
                    ],
                    '87654321B' => [
                        'nombre' => 'Ana',
                        'apellidos' => 'García',
                    ]
                ];

                foreach ($clientes as $dni => $cliente) {
                    echo "<tr>
                        <td>{$cliente['nombre']}</td>
                        <td>{$cliente['apellidos']}</td>
                        <td>
                            <a href='formulario.php?accion=editar&dni=$dni' class='btn btn-primary btn-sm'>Editar</a>
                            <a href='formulario.php?accion=eliminar&dni=$dni' class='btn btn-danger btn-sm'>Eliminar</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>

        <a href="formulario.php?accion=añadir" class="btn btn-success">Añadir Cliente</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
