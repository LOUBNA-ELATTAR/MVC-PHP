<?php
    class Produit
    {
        public $reference;
        public $prixUnitaire;
        public $libelle;
        public $dateAchat;
        public $photoProduit;
        public $idCategorie;
        
        function __construct($ref, $prix, $lib, $dateAchat, $photo, $idCat){
            $this->reference = $ref;
            $this->prixUnitaire = $prix;
            $this->libelle = $lib;
            $this->dateAchat = $dateAchat;
            $this->photoProduit = $photo;
            $this->idCategorie = $idCat;
        }
    }
   
?>