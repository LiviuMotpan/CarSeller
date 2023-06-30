<?php
    require "./connection.php";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $make = $_POST["make"];
        $model = $_POST["model"];
        $year = $_POST["year"];
        $mileage = $_POST["mileage"];
        $price = $_POST["price"];
        $image = $_POST["image"];
        
        if(
            !empty($make) &&
            !empty($model) &&
            !empty($year) &&
            !empty($mileage) &&
            !empty($image) &&
            !empty($price)
        ) {
            $sql = "INSERT INTO cars(make,model,image,year,mileage,price) VALUES(:make,:model,:image,:year,:mileage,:price)";
            $statement = $connection->prepare($sql);
            $statement->bindValue(":make",$make);
            $statement->bindValue(":model",$model);
            $statement->bindValue(":image",$image);
            $statement->bindValue(":year",$year);
            $statement->bindValue(":mileage",$mileage);
            $statement->bindValue(":price",$price);
            $statement->execute();
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Seller</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="index.php" class="home">&larr; Home</a>
    
    <h1 class="text-margin"><center>Create A Car</center></h1>
    <form action="create.php" method="POST">
        <input type="text" name="make" placeholder="Make">
        <input type="text" name="model" placeholder="Model">
        <input type="text" name="image" placeholder="Image Link">
        <input type="number" name="year" placeholder="Year">
        <input type="number" name="mileage" step="0.01" placeholder="Mileage">
        <input type="number" name="price" step="0.01" placeholder="Price">
        <button>Create</button>
    </form>
</body>
</html>