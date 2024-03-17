<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inscription</title>
</head>
<body>

<div class="container">
    <div class="box form-box">
        <?php
        include("C:\Users\stacy\OneDrive\PROJET D AXE\PROJETCDI\html\php\config.php");
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Pour vérifier l'email
            $verify_query = mysqli_query($con, "SELECT Email FROM utilisateurs WHERE Email='".$email."'");

            if (mysqli_num_rows($verify_query) != 0){
                echo "<div class='message'>
                <p> Cet email existe déjà </p>
                </div><br>";
                echo "<a href='javascript:self.history.back()'><button class='btn'>Retour</button></a>";
            } else {
                mysqli_query($con, "INSERT INTO utilisateurs(Username, Email, Password) VALUES('$username', '$email', '$password')") or die("Erreur");
                echo "<div class='message'>
                <p> Inscription réussie </p>
                </div><br>";
                echo "<a href='index.php'><button class='btn'>Connexion</button></a>";
            }
        }
        ?>

        <header>Inscription</header>
        <form action="" method="post">
            <div class="field input">
                <label for="username">Pseudo</label>
                <input type="text" name="username" id="username" autocomplete="on" required>
            </div>
            <div class="field input">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" autocomplete="on" required>
            </div>
            <div class="field input">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" autocomplete="on" required>
            </div>
            <div class="field">
                <input type="submit" class="btn" name="submit" value="Inscrire" required>
            </div>
            <div class="links">
                Déjà inscrit? <a href="index.php">Identifiez vous</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
