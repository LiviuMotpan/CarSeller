<?php
    require "./connection.php";

    $id = $_GET["product"];
    $s = $connection->prepare("SELECT * FROM cars WHERE id = :id");
    $s->bindValue(":id",$id);
    $s->execute();
    $product = $s->fetchAll(PDO::FETCH_ASSOC)[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="index.php" class="home">&larr; Home</a>
    
    <main class="product">
        <img src=<?=$product["image"]?> alt="">
        <h1><?=$product["make"]. " " .$product["model"]?></h1>
        <p>Year: <?=$product["year"]?></p>
        <p>Mileage: <?=$product["mileage"]?> Km</p>
        <p>Year: <?=$product["year"]?></p>
        <p>Price: $<?=$product["price"]?></p>      
        <div class="btns">
            <a href="update.php?product=<?=$id?>">Update</a>         
            <a href="delete.php?product=<?=$id?>">Delete</a>  
        </div>       
    </main>

</body>
</html>