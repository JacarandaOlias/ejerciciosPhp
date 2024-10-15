<?php
session_start();
require "../header.php";
// Simulación de base de datos: array asociativo
require "bd.php";
require_once("utility.php");
    // Si el método es por POST HAY QUE VER SI HAY QUE BORRAR O EDITAR.
    // Valido que me ha pasado un id y que es numérico. Si no lo es la función
    // lo manda a la pantalla de error.
    $id = validateId();
   
    // Valido que me ha pasado la acción que quiere realizar. Por ahora, edit, show o
    // delete. Si no es una de ella redirige a error.
    $action = validateAction();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        if ($action == 'delete'){
            $client = deleteClient($_SESSION['data'],$id);
            $action = 'Borrado';
        }else if ($action == 'edit'){

        }

    }else{
        // Busco el cliente. Si no existe la función lo manda a la pantalla de error.
        $client = findClient($_SESSION['data'], $_GET['id']);
   }
    
?>
<main class="container">

    <div class="container mt-5">
        <?php 
            showTitle($action);
        ?>
        
        <form method="post">

            <!-- Campo oculto para el ID del cliente -->
            <input type="hidden" name="id" value="<?php echo $client['id']; ?>">

            <!-- Nombre -->
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $client['name'];?>" <?php editOrNot($action)?>  required>
            </div>

            <!-- Apellido -->
            <div class="mb-3">
                <label for="surname" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="surname" name="surname"
                    value="<?php echo $client['surname']; ?>" <?php editOrNot($action)?>  required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $client['email']; ?>"
                <?php editOrNot($action)?>  required>
            </div>

            <!-- Género -->
            <div class="mb-3">
                <label for="gender" class="form-label">Género</label>
                <select class="form-select" id="gender" name="gender" <?php editOrNotSelect($action)?>  required>
                    <option value="male" <?php if ($client['gender'] == 'male')
                        echo 'selected'; ?>>Masculino</option>
                    <option value="female" <?php if ($client['gender'] == 'female')
                        echo 'selected'; ?>>Femenino</option>
                </select>
            </div>

            <!-- Dirección -->
            <div class="mb-3">
                <label for="address" class="form-label">Dirección</label>
                <textarea class="form-control" id="address" name="address" rows="3" <?php editOrNot($action)?> 
                    required><?php echo $client['address']; ?></textarea>
            </div>
        <?php 
            showButton($action);
        ?>
          
        </form>

</main>

<?php
require "../footer.php";
?>
</body>

</html>