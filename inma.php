<?php

echo "hola \ddddd";
echo 'hola \ddddd';
$cadena_con_especial = "Este es un carácter especial: &lt;br&gt;";

for ($i = 0; $i < strlen($cadena_con_especial); $i++)
    echo $cadena_con_especial[$i] . "<br>";
# code...

echo $cadena_con_especial;
$frutas = ["Manzana", "Naranja", "Banana"]; 
echo count($frutas);  
$frutas[0]="inma";
$frutas[10]="inma";
var_dump($frutas);
echo $frutas[9];
foreach ($frutas as $fruta){
    echo $fruta ."<br>";

}
