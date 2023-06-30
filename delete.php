<?php
    require "./connection.php";

    $id = $_GET["product"];
    $sql = "DELETE FROM cars WHERE id = :id";
    $stmt = $connection->prepare($sql);
    $stmt->bindValue(":id",$id);
    $stmt->execute();
    header("Location: ./index.php");


?>