<?php 

	session_start();
	include ("header.php");
	include ("controleur/controleur.php");
	include ("controleur/user.class.php");
	require ("settings.php");

?>
    <html>

    <body>
        <center>
            <h1> Kobayashi </h1>
        <h2> Inscription </h2> </br>
        <a href="index.php">retour</a> </br>
        <?php

        		
        		if(!isset($_SESSION['id'])){
					include ("vue/vueInsert.php");
					if(isset($_POST['valider']))
					{
						//print("nom : ". $_POST['nom']."<br>");
						//print("email : ". $_POST['email']."<br>");
						//print("date de naissance : ". $_POST['dateNaiss']."<br>");
						//print("mot de passe : ". $_POST['mdp']."<br>");
						//print("verif mdp : ". $_POST['mdp2']."<br>");

						//instanciation de la classe Eleve
						$unUser = new User();
						//renseigner les attributs 
						$unUser->renseigner($_POST);

						//jusque la ok
						$unControleur->insert($unUser);
					}
				} else {
					print("vous etes deja enregistré.");
				}
		
	
	?> </center></body>

    </html>