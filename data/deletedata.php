<?php


        $id_to_delete = $_POST['product_id'];
        $sql_delete = "DELETE FROM producten WHERE id = :id";
        $stmt_delete = $conn->prepare($sql_delete);
        $stmt_delete->bindParam(':id', $id_to_delete);
        $stmt_delete->execute();

        if($result){
            header('Location: ../menuaanpassen.php');
        }else{
            echo 'FOUT';
        }
    