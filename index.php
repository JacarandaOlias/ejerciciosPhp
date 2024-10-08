<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    hello
    <?php 
    print_r(PDO::getAvailableDrivers());
       // phpinfo();

        $dbname="toor";
        $user="inma";
        $password="inma";
        try {
            $dsn = "mysql:host=db;dbname=$dbname";
            $dbh = new PDO($dsn, $user, $password);
        } catch (PDOException $e){
            echo $e->getMessage();
        }

        echo $dbname. "<br>";
        echo $user . "<br>";
        echo $password . "<br>";


    ?>
</body>
</html>