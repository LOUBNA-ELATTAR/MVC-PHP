<?php session_start(); ?>
<?php
    include('../Controllers/connexion.php');
        $query=$conn->prepare("SELECT * FROM user ");
        $query->execute();
        $table=$query->fetchAll();
        $length=count($table);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP 1</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Authentification</h1>
        <form method="get">
            <div class="row">
                <div class="column">
                    <label for="login">Login</label>
                    <input type="text" id="login" name="login" placeholder="Enter your login ID">
                </div>
            </div>
            <div class="row">
                 <div class="column">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" placeholder="Your password">
                </div>
            </div>
            
            <button type="submit">S'authentifier</button>
        </form>
    </div>
</body>
</html>
                    <?php
                        if ( isset($_GET["login"]) && isset($_GET["password"]) ){
                            $login = $_GET["login"];
                            $pwd = $_GET["password"];
                            $q=0;
                            if ($length != 0)
                            {
                                foreach ($table as $user)
                                {
                                    if (($user['login'] == $login) && ($user['password'] == $pwd)){
                                        $q=1;
                                        $_SESSION['login'] = $login;
                                        $_SESSION['nom'] = $user['nom'];
                                        $_SESSION['prenom'] = $user['prenom'];
                                    }
                                }
                                
                                if($q==1){
                                    header("Location:index.php"); 
                                }else{
                                    echo "Ce compte n'existe pas";
                                }
                            }
                        }    
                    ?>
                </div>
            </div>
        </div>
    </div>
    </section>
    
    
</body>
</html>





<style type="text/css">
    *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: "Poppins",sans-serif;
    font-weight: 500;
}
body{
    height: 100vh;
    background: linear-gradient(
        135deg,
        #6f6df4,
        #4c46f5
    );
}
.container{
    background-color: #ffffff;
    width: 70%;
    min-width: 420px;
    padding: 35px 50px;
    transform: translate(-50%,-50%);
    position: absolute;
    left: 50%;
    top: 50%;
    border-radius: 10px;
    box-shadow: 20px 30px 25px rgba(0,0,0,0.15);
    text-align: center;
}
h1{
    font-size: 30px;
    text-align: center;
    color: #1c093c;
}
p{
    position: relative;
    margin: auto;
    width: 100%;
    text-align: center;
    color: #606060;
    font-size: 14px;
    font-weight: 400;
}
form{
    width: 100%;
    position: relative;
    margin: 30px auto 0 auto;
}
.row{
    width: 100%;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px,1fr));
    grid-gap: 20px 30px;
    margin-bottom: 20px;
}
label{
    color: #1c093c;
    font-size: 14px;
}
input{
    width: 100%;
    font-weight: 400;
    padding: 8px 10px;
    border-radius: 5px;
    border: 1.2px solid #c4cae0;
    margin-top: 5px;
}
input:focus{
    outline: none;
    border-color: #6f6df4;
}
button{
    border: none;
    padding: 10px 20px;
    background: linear-gradient(
        130deg,
        #6f6df4,
        #4c46f5
    );
    color: #ffffff;
    border-radius: 3px;
}
</style>
