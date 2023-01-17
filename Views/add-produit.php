<?php session_start(); ?>
<?php
    include('../Controllers/connexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP 1</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<style>
    
</style>
<body>
    <div class="container-xl mt-2 text-center">
            <div class="col-xl-12">

                <H2> Ajouter un  produit </H2>
                <br>
                <div>
                    <form method="GET">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Libelle</label>
                                <input type="text" name="libelle" class="form-control"  placeholder="Libelle">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Prix Unitaire</label>
                                <input type="number" name="prix" class="form-control"  placeholder="Prix du produit">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Date d'achat</label>
                                <input type="date" name="dateachat" class="form-control"  placeholder="date d'achat">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="custom-file-label">Photo du produit</label>
                                <input type="file" name="image" class="custom-file-input" id="customFile"> 
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Categorie du produit</label>
                                <select name="categorie" class="custom-select">
                                    <option selected> Veuillez indiquer la catégorie </option>
                                    <?php
                                        include("../Models/categorieDao.php");
                                        $categorieDao = new categorieDao();
                                        $liste = $categorieDao->getAllCategories();
                                        foreach ($liste as $categorie){
                                        print('
                                            <option value='.$categorie["id"].' >'.$categorie['denomination'].' </option>
                                            ');
                                        }

                                    ?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-lg text-center">Ajouter</button>
                    </form>
                    <?php
                    
                        if ( isset($_GET['submit'])){
                            include('../Models/produitDao.php');
                            $produitDAO = new ProduitDAO();
                            $produit = new Produit(rand(1, 123456), $_GET['libelle'], $_GET['prix'], $_GET['dateachat'], $_GET['image'], $_GET['categorie']);                            
                            $produitDAO->addProduct($produit);
                            echo "<p class='text-center'> Produit ajouté avec succès<p>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>

