<?php
    include ('../Models/produitDao.php');
    $produitDAO = new ProduitDao();
    if (isset($_GET['prod'])){
        $produitDAO->deleteProduct($_GET['prod']);    }
    header('location: ../Views/index.php');

?>