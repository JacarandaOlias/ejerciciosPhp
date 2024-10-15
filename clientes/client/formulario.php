<?php
require "../header.php";
// Simulación de base de datos: array asociativo
require "bd.php";
require_once("utility.php");

$client = findClient($data,$_GET['id']);

?>
<main class="container">

    <div class="container mt-5">
        <h1 class="mb-4">Listado de Clientes</h1>
        <form method="post">

            <!-- Campo oculto para el ID del cliente -->
            <input type="hidden" name="id" value="<?php echo $client['id']; ?>">

            <!-- Nombre -->
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $client['name']; ?>"
                    required>
            </div>

            <!-- Apellido -->
            <div class="mb-3">
                <label for="surname" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="surname" name="surname"
                    value="<?php echo $client['surname']; ?>" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $client['email']; ?>"
                    required>
            </div>

            <!-- Género -->
            <div class="mb-3">
                <label for="gender" class="form-label">Género</label>
                <select class="form-select" id="gender" name="gender" required>
                    <option value="male" <?php if ($client['gender'] == 'male')
                        echo 'selected'; ?>>Masculino</option>
                    <option value="female" <?php if ($client['gender'] == 'female')
                        echo 'selected'; ?>>Femenino</option>
                </select>
            </div>

            <!-- Dirección -->
            <div class="mb-3">
                <label for="address" class="form-label">Dirección</label>
                <textarea class="form-control" id="address" name="address" rows="3"
                    required><?php echo $client['address']; ?></textarea>
            </div>

            <!-- Botón de envío -->
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>

</main>

<?php
require "../footer.php";
?>
</body>

</html>