<?php

 include ('../connection.php'); 

$sql = "INSERT INTO producten(productnaam, beschrijving, prijs, img) VALUES (:productnaam,:beschrijving,:prijs,:img)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':productnaam', $_POST['productnaam']) ;
$stmt->bindParam(':beschrijving', $_POST['beschrijving']) ;
$stmt->bindParam(':prijs', $_POST['prijs']) ;
$stmt->bindParam(':img', $_POST['img']) ;
$result = $stmt->execute();

if($result){
    header('Location: ../menuaanpassen.php');
}else{
    echo 'FOUT';
}


