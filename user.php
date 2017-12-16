<?php
    session_start();
    if($_SESSION['visiteur']=='user')
    {
        echo"
            <center><fieldset style='margin-top: 3%; background-color:moccasin; width: 350px;'>
            <legend><h2>Bienvenue dans la session User</h2></legend>
            <h3>Menu</h3>
            <ol>
                <li><a href='calcul.php'>Site du calculatrice</a></li>
                <li><a href='heure.php'>Site de l'heure</a></li>
            </ol>
            <form method='post' action='#'>
                <input type='submit' name='deconnexion' value='Déconnxion'/>
            </form>
        </fieldset></center>
        ";
        if (isset($_POST['deconnexion']))
        {
            session_destroy();
            header("location: accueil.php");
        }
    }
    else
    {
        header("location: accueil.php");
    }
?>