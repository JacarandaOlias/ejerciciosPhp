<?php
    require "../header.php";
    // Simulación de base de datos: array asociativo
    require "bd.php";

?>
    <main class="container">

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
                 foreach ($data as $dni => $cliente) {
                    echo "<tr>
                        <td>{$cliente['id']}</td>
                        <td>{$cliente['name']}</td>
                        <td>{$cliente['surname']}</td>
                        <td>
                            <a href='formulario.php?accion=editar&id={$cliente['id']}' class='btn btn-primary btn-sm'>Editar</a>
                            <a href='formulario.php?accion=eliminar&id={$cliente['id']}' class='btn btn-danger btn-sm'>Eliminar</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>

    </div>
    </main>
   
<?php
    require "../footer.php";
?>
</body>

</html>
