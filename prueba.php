
<?php
// Simulación de base de datos: array asociativo
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

// Funciones CRUD
function crearCliente(&$clientes, $dni, $datos) {
    if (!isset($clientes[$dni])) {
        $clientes[$dni] = $datos;
        echo "Cliente creado con éxito.\n";
    } else {
        echo "Error: El cliente ya existe.\n";
    }
}

function leerCliente($clientes, $dni) {
    if (isset($clientes[$dni])) {
        return $clientes[$dni];
    } else {
        return "Cliente no encontrado.\n";
    }
}

function actualizarCliente(&$clientes, $dni, $datosActualizados) {
    if (isset($clientes[$dni])) {
        $clientes[$dni] = array_merge($clientes[$dni], $datosActualizados);
        echo "Cliente actualizado con éxito.\n";
    } else {
        echo "Error: Cliente no encontrado.\n";
    }
}

function eliminarCliente(&$clientes, $dni) {
    if (isset($clientes[$dni])) {
        unset($clientes[$dni]);
        echo "Cliente eliminado con éxito.\n";
    } else {
        echo "Error: Cliente no encontrado.\n";
    }
}

// Simulación de operaciones CRUD
$accion = $_GET['accion'] ?? 'leer';
$dni = $_GET['dni'] ?? null;

switch ($accion) {
    case 'crear':
        $nuevoCliente = [
            'nombre' => 'Luis',
            'apellidos' => 'Martínez',
            'direccion' => 'Calle Nueva 456',
            'email' => 'luis.martinez@example.com',
            'fecha_nacimiento' => '1978-09-30',
            'premiun' => false
        ];
        crearCliente($clientes, $dni, $nuevoCliente);
        break;

    case 'leer':
        $resultado = leerCliente($clientes, $dni);
        echo "<pre>";
        print_r($resultado);
        echo "</pre>";
        break;

    case 'actualizar':
        $datosActualizados = [
            'direccion' => 'Calle Actualizada 999',
            'premiun' => true
        ];
        actualizarCliente($clientes, $dni, $datosActualizados);
        break;

    case 'eliminar':
        eliminarCliente($clientes, $dni);
        break;

    default:
        echo "Acción no válida.";
        break;
}
?>
