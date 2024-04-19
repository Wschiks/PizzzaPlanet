<?php
require_once '../connection.php';

$product_id = $_POST['product_id'];
$new_description = $_POST['new_description'];

if (isset($new_description)) {
    $sql = "UPDATE producten SET beschrijving=:beschrijving WHERE id=:id";      
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':beschrijving', $new_description);
    $stmt->bindParam(':id', $product_id);

    if ($stmt->execute()) {
        header('Location: ../menuaanpassen.php');
    } else {
        echo "Error updating product description";
    }
}
else{
    echo "werkt nie";
}
?>
