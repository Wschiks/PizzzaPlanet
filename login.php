<?php include ('header.php'); ?>
<body>

    <form method="POST">
        <div class="fotohacktergrond">
            <section class="midden">
                <label class="wit">gebruikersnaam</label>
                <input type="text" name="gebruikersnaam">

                <label class="wit">wachtwoord</label>
                <input type="password" name="wachtwoord">
                <input type="submit">
                <a href="nieuwlogin.php"><button type="button">nieuw account maken</button></a>
            </section>
        </div>
    </form>


</body>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
$_SESSION['user'] = $data['gebruikersnaam'];
$_SESSION['rol'] = $data['rol'];

include ('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST['gebruikersnaam']) && !empty($_POST['wachtwoord'])) {

        $sql = "SELECT * FROM users WHERE gebruikersnaam = :gebruikersnaam";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':gebruikersnaam', $_POST['gebruikersnaam']);
        $result = $stmt->execute();

        $user = $stmt->fetch();

       


        if ($_POST['wachtwoord'] == "admin" && $user['wachtwoord'] == "admin") {
            header("Location: menuaanpassen.php");
        } else {


            if ($user && $_POST['wachtwoord'] == $user['wachtwoord']) {
                header("Location: index.php");

            } else {

                echo "Fout: Ongeldige gebruikersnaam of wachtwoord.";
            }
        }

    } else {

        echo "Fout: Vul zowel gebruikersnaam als wachtwoord in.";
    }

}




?>

<style>
*{
    margin: 0px;
}

.midden{
    display: flex;
    align-items: center;
    flex-direction: column;
}
</style>