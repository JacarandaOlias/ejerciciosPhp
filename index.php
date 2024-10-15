<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    echo "cabecera";
    <?php

    function pueba(&$array){
        $array[0]="inma";
    }
    $arrrayEjemplo = ["peras","manzana","kkk"];
    var_dump($arrrayEjemplo);
    pueba($arrrayEjemplo);
    var_dump($arrrayEjemplo);
    ?>
</body>

</html>