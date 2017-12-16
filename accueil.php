<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr" >
<head>
    <title>Mon super site</title>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="com.css"/>
    <style>
        body{
            background: url("bg2.gif") no-repeat center fixed;
            background-size: cover;
            color: red;
        }
    </style>
</head>
<body>
    <?php
        $date = date("d-m-Y");
        $heure = date("H:i");
        echo"<h4 style='text-align: center; border: 1px solid black; width: 250px; height: 20px;'>Dakar, le $date | $heure</h4>";
    ?>
    <div id="info" >
        <center><fieldset style="margin-top: 0%; width: 350px;">
            <legend><h2>Page D'accueil</h2></legend>
            <form action="#" method="post">
                LOGIN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <input type="text" name="login" placeholder="Nom d'utilisateur" style="float: right;" required/> <br/> <br/>
                PASSWORD : <input type="password" name="password" placeholder="mot de passe" style="float: right;" required/> <br/> <br/>
                <select name="profil" style="float: right;" required/>
                    <option value="">Profil</option>
                    <option value="user">USER</option>
                    <option value="admin">ADMIN</option>
                </select><br/> <br/>
                <input type="submit" name="connexion" value="Connexion" style="float: right;"/> <br/> <br/>
            </form>
            <form action="inscription.php" method="post">
                <input type="submit" name="inscription" value="Inscritpion" style="float: right;" required/>
            </form>
            <br/>
            <br/>
            <?php
                if(isset($_POST['login']) && isset($_POST['password']) && isset($_POST['profil']))
                {
                    extract($_POST);
                    $nbre_de_validite=0;
                    $listUtilisateur = fopen('nouveauliste.txt','r');
                    $nbre_d_utilisateur = fopen('nbre_d_utilisateur.txt', 'r+');
                    $nombre = fgets($nbre_d_utilisateur);
                    for($i=0; $i<$nombre; $i++)
                    {
                        $Utilisateur = fgets($listUtilisateur);
                        $donnee = explode("-",$Utilisateur);
                        $login0=strval($donnee[0]);
                        $password0=strval($donnee[1]);
                        $profil0=strval($donnee[2]);
                        if($login==strval($login0) && $password==strval($password0) && $profil==strval($profil0))
                        {
                            if($profil=='admin')
                            {
                                $_SESSION['visiteur']='admin';
                                header("location: admin.php");
                            }
                            elseif ($profil=='user')
                            {
                                $_SESSION['visiteur']='user';
                                header("location: user.php");
                            }
                        }
                        else
                        {
                            $nbre_de_validite++;//Pour savoir combien de fois le boucle est fausse.
                        }
                    }
                    fclose($listUtilisateur);
                    fclose($nbre_d_utilisateur);
                }
                if(isset($nbre_de_validite) && ($nbre_de_validite>=2))
                {
                    echo"Nom d'utilisateur ou mot de passe incorrecte";
                }
            ?>
        </fieldset></center>
    </div>
</body>
</html>