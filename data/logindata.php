<?php

 include ('../connection.php'); 
 echo 'hallo';

$sql = "INSERT INTO users(gebruikersnaam, wachtwoord) VALUES (:gebruikersnaam,:wachtwoord)";
$stmt = $conn->prepare($sql);
$stmt -> bindParam(':gebruikersnaam', $_POST['gebruikersnaam']) ;
$stmt -> bindParam(':wachtwoord', $_POST['wachtwoord']) ;
$result = $stmt->execute();

$data = $stmt -> fetch();

if($result){
    session_start();
    $_SESSION['user'] = $data['gebruikersnaam'];
    $_SESSION['rol'] = $data['rol'];
    header('Location: ../login.php');
}else{
    echo 'FOUT';
}
    