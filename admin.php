<?php
    session_start();
    if($_SESSION['visiteur']=='admin')
    {
        echo"
            <center><fieldset style='margin-top: 3%; background-color:moccasin; width: 350px;'>
            <legend><h2>Bienvenue dans la session Admin</h2></legend>
            <h3>Menu</h3>
                <ol>
                    <li><a href='editeur.php'>Site de l'editeur</a></li>
                    <li><a href='tableau.php'>Site du tableau</a></li>
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