<?php

include ('../connection.php'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_naam = $_POST['product_naam'];
    $prijs = $_POST['prijs'];
    $img = $_POST['img'];

    $sql = "INSERT INTO winkelmadnje(product_naam, prijs, img) VALUES (:product_naam, :prijs, :img)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':product_naam', $product_naam);
    $stmt->bindParam(':prijs', $prijs);
    $stmt->bindParam(':img', $img);
    $result = $stmt->execute();
}
?>


