<?php include ('connection.php'); ?>
<!DOCTYPE html>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

<link rel="stylesheet" href="css/style.css">

<html lang="nl">

<?php include ('header.php'); ?>

<body>


    <?php
    $sql = "SELECT * FROM producten";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    foreach ($result as $key) {
        echo '<div class="product">';
        echo '<div class="links">';
        if (array_key_exists('img', $key)) {
            echo '<img  height="300" src="', $key['img'], '" alt="', $key['productnaam'], '">';
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
        echo '<button class="button-27" role="button">Add</button>';
        echo '</div>';
        echo '</div>';
    }
    ?>


    <?php include ('footer.php'); ?>
</body>

</html>