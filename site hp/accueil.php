<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Accueil</title>
</head>
<body>
    <header>
        <div class="header"> 
        <div class="nav">
            <div class="logo">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 120 120">
                    
                </svg>
            </div>
            <ul>
                <li class="active">
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">Menu</a>
                </li>
                <li>
                    <a href="#">Cartes</a>
                </li>
                <li>
                    <a href="#">Contacts</a>
                </li>
            </ul>
        </div>
        <div class="titre">
            <h1>HOGWARTS SWAP</h1>
        </div>
        <div class="bouton">
        <a href="#"class="btn">CARTES DU JOUR</a>
        </div>
    </header>

    <div class="liens">
        <?php
            session_start();
            include("C:\Users\stacy\OneDrive\PROJET D AXE\PROJETCDI\html\php\config.php");
            if(isset($_SESSION['id'])) {
                $id = $_SESSION['id'];
                $query = mysqli_query($con, "SELECT * FROM utilisateurs WHERE Id=$id");
                
                while($result = mysqli_fetch_assoc($query)) {
                    $res_Uname = $result['Username'];
                    $res_id = $result['id'];
                }
                echo "<a href='index.php?Id=$res_id'>Changer de profil</a>";
            }
        ?>
        <a href="C:\xampp\htdocs\config.php"><button class="btn">Déconnexion</button></a>
    </div>

    <main>
        <div class="box-top">
            <div class="top">
                <div class="box">
                    <p>Bonjour <b><?php echo isset($res_Uname) ? $res_Uname : ''; ?></b>, Bienvenue</p>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
