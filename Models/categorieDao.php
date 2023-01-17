<?php
require_once 'Categorie.php';
    class categorieDao
    {  
        function getCategorie($id)
        {
            include('../Controllers/connexion.php');
            $result = $conn->query("SELECT * FROM categorie WHERE id='$id'");
            $liste = $result->fetchAll();
            return $liste;
        }
        function getAllCategories(){
            include('../Controllers/connexion.php');
            $result = $conn->query("SELECT * FROM categorie");
            $liste = $result->fetchAll();
            return $liste;
        }
               
    }
