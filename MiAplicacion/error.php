<?php
require "header.php";
?>

<div class="container mt-5">
    <h1 class="mb-4">ERROR</h1>
</div>
<div class="container mt-5">
    <h2><?php 
        if (isset($_GET['msg'])) {
            echo $_GET['msg'];
        }
    ?></h2>
</div>

<?php
require "footer.php";
?>