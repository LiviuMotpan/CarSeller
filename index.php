<?php
    require "./connection.php";

    $sql = "SELECT * FROM cars";

    $statement = $connection->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
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
    <nav>
        <a href="index.php">Home</a>
        <a href="create.php">Create</a>
    </nav>
    <h1><center>Welcome to Car Seller</center></h1>
    <main>
        <?php if(count($result) > 0) { 
                foreach($result as $product) {?>

                    <a href="product.php?product=<?=$product["id"]?>" class="product">
                        <img src=<?=$product["image"]?> alt="">
                        <h1><?=$product["make"]. " " .$product["model"]?></h1>
                        <p>Year: <?=$product["year"]?></p>
                        <p>Mileage: <?=$product["mileage"]?> Km</p>
                        <p>Year: <?=$product["year"]?></p>
                        <p>Price: $<?=$product["price"]?></p>
                    </a>

        <?php   }
              } ?>
    </main>
</body>
</html>