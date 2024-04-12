<?php



$sql = "SELECT * FROM product";
$stmt = $connect->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
?>