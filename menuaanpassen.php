<?php include ('connection.php'); ?>
<!DOCTYPE html>

<html lang="nl">

<link rel="stylesheet" href="css/style.css">
<body>

<?php


session_start();
$_SESSION['user'] = $data['gebruikersnaam'];
$_SESSION['rol'] = $data['rol'];


?>
<?php include ('header.php'); ?>

<?php include ('admin.php'); ?>



    <?php


    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_product'])) {
        $id_to_delete = $_POST['product_id'];
        $sql_delete = "DELETE FROM producten WHERE id = :id";
        $stmt_delete = $conn->prepare($sql_delete);
        $stmt_delete->bindParam(':id', $id_to_delete);
        $stmt_delete->execute();
    }

    $sql = "SELECT * FROM producten";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    ?>

    <?php

    $index = 1;

    foreach ($result as $key) {
        
 
        echo '<div class="product">';
        echo '<div class="links">';
        if (array_key_exists('img', $key)) {
            echo '<img  height="100" src="', $key['img'], '" alt="', $key['productnaam'], '">';
        }
        echo '</div>';

        echo '<div class="rechts">';
        if (array_key_exists('productnaam', $key)) {
            echo '<h4 class="font">', $key['productnaam'], '</h4>';
        }
        if (array_key_exists('beschrijving', $key)) {
            echo '<h5 class="font">', $key['beschrijving'], '</h5>';
        }
        if (array_key_exists('prijs', $key)) {
            echo '<h6 class="font">', $key['prijs'], '</h6>';
        }
       
   
        echo '</div>';
        echo '</div>';
        echo '<form method="post" action="">';
        echo '<input type="hidden" name="product_id" value="' . $key['id'] . '">';
        echo '<input  type="submit" name="delete_product" value="Verwijderen">';
        echo '</form>';
    }

    ?>

    <?php include ('footer.php'); ?>
</body>
<?php

?>
</html>


<style>
   
</style>



<!-- if ($_SESSION['rol'] == 'admin') { 
} else {
    echo 'magniet';
} -->