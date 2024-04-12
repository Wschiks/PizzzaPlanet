<?php include ('connection.php'); ?>

<?php

$conn = new mysqli($servername, $username, $password, $dbname);

// Controleren op verbinding
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Gegevens van het formulier ophalen
$productnaam = $_POST['productnaam'];
$beschrijving = $_POST['beschrijving'];
$groten = $_POST['groten'];
$prijs = $_POST['prijs'];

// Afbeelding uploaden
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["afbeelding"]["name"]);
move_uploaded_file($_FILES["afbeelding"]["tmp_name"], $target_file);
$image_path = $target_file;

// SQL-query voor het toevoegen van een nieuwe pizza
$sql = "INSERT INTO pizza (productnaam, beschrijving, groten, prijs, afbeelding) VALUES ('$productnaam', '$beschrijving', '$groten', '$prijs', '$image_path')";

if ($conn->query($sql) === TRUE) {
    echo "Nieuwe pizza toegevoegd!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>



<style>
    .container {
    width: 50%;
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="text"], textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Admin Panel</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Voeg een nieuwe pizza toe</h2>
        <form action="add_pizza.php" method="post" enctype="multipart/form-data">
            <label for="productnaam">Productnaam:</label>
            <input type="text" id="productnaam" name="productnaam" required><br><br>
            <label for="beschrijving">Beschrijving:</label>
            <textarea id="beschrijving" name="beschrijving" required></textarea><br><br>
            <label for="groten">Groten:</label>
            <input type="text" id="groten" name="groten" required><br><br>
            <label for="prijs">Prijs:</label>
            <input type="text" id="prijs" name="prijs" required><br><br>
            <label for="afbeelding">Afbeelding:</label>
            <input type="text" id="afbeelding" name="afbeelding" required><br><br>
            <input type="submit" value="Voeg toe">
        </form>
    </div>
</body>
</html>
