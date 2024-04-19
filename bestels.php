<?php include ('connection.php'); ?>
<!DOCTYPE html>
<html lang="nl">
<?php include ('header.php'); ?>

<body>


    <form action="" method="GET">
        <section class="midden">
            <input class="invoeg opmaak" type="text" name="zoekterm" placeholder="Zoek producten">
            <button class="zoek opmaak" type="submit">Zoeken</button>
            <section class="midden">
             
            </section>
    </form>

    <?php

    if (isset($_GET['zoekterm'])) {
        $zoekterm = '%' . $_GET['zoekterm'] . '%';
        $sql = "SELECT * FROM producten WHERE productnaam LIKE :zoekterm OR beschrijving LIKE :zoekterm";
    } else {
        $sql = "SELECT * FROM producten";
    }

    $stmt = $conn->prepare($sql);

    if (isset($zoekterm)) {
        $stmt->bindParam(':zoekterm', $zoekterm);
    }
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
        ?>
        <form action="data/winkelmanddata.php" method="post">

            <input class="button-27" type="submit" name="Add">
        </form>

        <?php
        echo '</div>';
        echo '</div>';
    }
    ?>

    <?php include ('footer.php'); ?>
</body>

</html> d