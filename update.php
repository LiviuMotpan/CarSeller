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
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="index.php" class="home">&larr; Home</a>
    
    <h1 class="text-margin"><center>Update</center></h1>
    <form action="updateController.php" method="POST">
        <input type="text" name="make" placeholder="Make" value="<?=$product["make"]?>">
        <input type="text" name="model" placeholder="Model" value="<?=$product["model"]?>">
        <input type="text" name="image" placeholder="Image Link" value="<?=$product["image"]?>">
        <input type="number" name="year" placeholder="Year" value="<?=$product["year"]?>">
        <input type="number" name="mileage" step="0.01" placeholder="Mileage" value="<?=$product["mileage"]?>">
        <input type="number" name="price" step="0.01" placeholder="Price" value="<?=$product["price"]?>">
        <input type="hidden" name="id" value="<?=$id?>">
        <button>Update</button>
    </form>
</body>
</html>