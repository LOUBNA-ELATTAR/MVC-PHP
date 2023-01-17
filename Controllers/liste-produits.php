<?php
    include('connexion.php');
    $ls=$conn->prepare("SELECT * FROM produit ");
    $ls->execute();
    $prod=$ls->fetchAll();
    $length=count($prod);
?>

