<?php
    require "./connection.php";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $make = $_POST["make"];
        $model = $_POST["model"];
        $year = $_POST["year"];
        $mileage = $_POST["mileage"];
        $price = $_POST["price"];
        $image = $_POST["image"];
        $id = $_POST["id"];
        
        if(
            !empty($make) &&
            !empty($model) &&
            !empty($year) &&
            !empty($mileage) &&
            !empty($image) &&
            !empty($price)
        ) {
            $sql = "UPDATE cars SET make = :make, model = :model, year = :year, mileage = :mileage, price = :price,image = :image WHERE id = :id";
            $statement = $connection->prepare($sql);
            $statement->bindValue(":make",$make);
            $statement->bindValue(":model",$model);
            $statement->bindValue(":image",$image);
            $statement->bindValue(":year",$year);
            $statement->bindValue(":mileage",$mileage);
            $statement->bindValue(":price",$price);
            $statement->bindValue(":id",$id);
            $statement->execute();
            header("Location: ./index.php");
        }

    }

?>