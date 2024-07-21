<?php 

// CONN :
include 'configInscriConnex.php';
if (!empty($_GET ['id'])) {
    // VERIfication si ID est bien acquis :
    $id = $_GET ['id'];
}
else {
    header ('Location:mesEmplois.php');
}

// suppression
$statement = $db -> prepare ("DELETE FROM recruteurs WHERE id = ?");
$statement -> execute (array ($id));

header ('Location:mesEmplois.php');
?>