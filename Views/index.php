<?php 
    include('../Controllers/connexion.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>TP 1</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Application Produits</a></li>
                        <li class="nav-item"><a class="nav-link" href="">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="add-produit.php">Ajouter Produits</a></li>
                        <li class="nav-item"><a class="nav-link" href="../Controllers/logout.php">Quitter la session</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <header class="bg-dark py-5">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center my-5">
                            <h1 class="display-5 fw-bolder text-white">
                            <?php if(date('H:m:s/24') < '18:00:00'){
                                echo "Bonjour" . " " . $_SESSION["prenom"] . " " . $_SESSION["nom"]; 
                            
                            }else{
                                echo "Bonsoir" . " " . $_SESSION["prenom"] . " " . $_SESSION["nom"];
                            }
                            ?>         
                            </h1> 
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="container mt-4 py-5">
          <h2>Liste des produits</h2>        
          <table class="table table-striped py-5 text-center">
                    <thead>
                      <tr>
                        <th>Référence</th>
                        <th>Libellé</th>
                        <th>Prix unitaire</th>
                        <th>Date d'achat</th>
                        <th>Photo produit</th>
                        <th>Supprimer</th>
                      </tr>
                    </thead>
                    <?php include('../Controllers/liste-produits.php');
                    if ($length == 0 ){
                        print('Pas de produits disponibles');
                        }else{
                            foreach ($prod as $produit){
                                print('
                                    <tr>
                                        <th scope="row">'.$produit['reference'].'</th>
                                        <td>'.$produit['libelle'].'</td>
                                        <td>'.$produit['prixUnitaire'].'</td>
                                        <td>'.$produit['dateAchat'].'</td>
                                        <td><img width="100" heigh="100" src="./assets/img/'.$produit['photoProduit'].'"</td>
                                        ');
                                    ?>

                                    <?php
                                        $a = $conn->prepare("SELECT * FROM categorie WHERE idCategorie=:i");
                                        $a->execute(array(":i" =>$produit['idCategorie']));
                                        $list = $a->fetchAll();
                                        foreach($list as $y){
                                            $categorie = $y['denomination'];
                                        }

                                    ?>
                                      
                                    <?php print('
                                        <td>
                                            <a href="../Controllers/delete.php?a='.$produit['reference'].'"> <i class="bi bi-trash"></i> </a>
                                        </td>
                                    </tr>  
                                ');
                            }
                        }
                                    
                ?>                         
          </table>
        </div>  

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>



