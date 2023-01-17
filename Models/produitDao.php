<?php
require_once '../Models/Produit.php';
    class produitDao
    {
         function addProduct($product)
        {
            include('../Controllers/connexion.php');
            $result = $conn->query("INSERT INTO `produit` (`reference`, `libelle`, `prixUnitaire`, `dateAchat`, `photoProduit`, `idCategorie`) VALUES ('$product->reference','$product->libelle','$product->prixUnitaire','$product->dateAchat','$product->photoProduit','$product->idCategorie')");
            $result->execute();
        }
        function deleteProduct($id)
        {
            include('../Controllers/connexion.php');
            $result = $conn->query("DELETE FROM produit WHERE reference='$id'");
            $result->execute();     
        }

        function getAllProducts()
        {
            include('../Controllers/connexion.php');
            $result = $conn->query("SELECT * FROM produit");
            $liste_products = $result->fetchAll();

            return $liste_products;
        }
        function getProduct($id)
        {
            include('../Controllers/connexion.php');
            $result = $conn->query("SELECT * FROM produit WHERE reference='$id'");
            $product = $result->fetchAll();
            return $product;
        }

        function updateProduct($product)
        {
            include('../Controllers/connexion.php');
            $result = $conn->query("UPDATE produit SET libelle='$product->libelle', prixUnitaire='$product->prixUnitaire', photoProduit='$product->photoProduit'  WHERE id='$product->reference' ");
            $result->execute();
        }

               
    }
