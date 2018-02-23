<?php 

	session_start();
	include ("header.php");
	include ("controleur/controleur.php");
	include ("controleur/eleve.class.php");
	require ("settings.php");

?>
    <html>

    <body>
        <center>
            <h1> Kobayashi </h1>
        <h2> Connexion </h2> </br>

        <a href="index.php">retour</a> </br>
        <?php

        		
        		if(!isset($_SESSION['id'])){
					include ("vue/vueConnexion.php");
					if(isset($_POST['valider']))
					{
						$emailCo = $_POST['email'];
						$mdpCo = $_POST['password'];
						//include ("vue/vue.php");
						$unControleur->researchUser($emailCo,$mdpCo);
						if(!isset($_SESSION['id'])){
							print('Problême d\'identification, veuillez réessayer');
						} else {
							print($_SESSION['id']);
							print($_SESSION['nom']);
							header('Location: index.php');
						}
					} 
				} else {
					print("vous etes deja connecté, ".($_SESSION['nom']));
				}
		
	
	?> </center></body>

    </html>