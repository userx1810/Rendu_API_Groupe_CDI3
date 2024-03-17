<?php
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php 
                include("C:\Users\stacy\OneDrive\PROJET D AXE\PROJETCDI\html\php\config.php");
                if(isset($_POST['submit'])){
                    $email= mysqli_real_escape_string($con,$_POST['email']);
                    $password= mysqli_real_escape_string($con,$_POST['password']);
                
                    $result = mysqli_query($con, "SELECT * FROM utilisateurs WHERE Email='".$email."' AND Password='".$password."'") or die("Select error");
                    $row= mysqli_fetch_assoc($result);

                    if(is_array($row) && !empty($row)){
                        $_SESSION['username']= $row['Username'];
                        $_SESSION['valid']= $row['Email'];
                        $_SESSION['id']= $row['id'];
                        header("Location: home.html"); // Redirige vers la page d'accueil
                        exit(); // Assure que le script se termine ici pour éviter toute exécution supplémentaire
                    } else {
                        echo "<div class='message'><p> Vérifiez votre mot de passe ou votre nom d'utilisateur </p></div><br>";
                        echo "<a href='index.php'><button class='btn'>Retour</button></a>";
                    }
                }
            ?>
            <header>Identification</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" required>
                </div>

                <div class="field input">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Connexion" required>
                </div>
                <div class="links">
                    Tu n'as pas de compte? <a href="creationCompte.php">Créer un compte</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
