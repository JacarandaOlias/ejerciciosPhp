<?php
// Aquí deberías procesar el formulario y almacenar los datos actualizados en la "base de datos" (array o base real)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger datos del formulario
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $premiun = isset($_POST['premiun']) ? true : false;

    // Aquí actualizarías el array de clientes o la base de datos
    echo "Cliente guardado correctamente.";

    // Redirigir al listado de clientes
    header("Location: index.php");
}
?>
