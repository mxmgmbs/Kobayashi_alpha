<?php 

	session_start();
	ini_set('display_errors', true);
	include ("header.php");
	include ("controleur/controleur.php");
	include ("settings.php");

?>
    <html>

    <body>
        <center>
            <h1><a href="index.php">Kobayashi</a></h1>
        	<h2>Watch</h2></br></br>
        		<?php
	        		if(isset($_SESSION['nom'])){
	        			print('<div><a href="profil.php">'.$_SESSION['nom'].'</a></div>');
	        		}
	        		
	        		if(!isset($_SESSION['id'])){
	        			print('<div><a href="inscription.php">Inscription</a></div>');
	        			print('<div><a href="connexion.php">Connexion</a></div>');	
	        		} else {
	        			print('<div><a href="deconnexion.php">Déconnexion</a></div>');
	        		}
        		?>
                <div><a href="index.php?page=2">Rechercher</a></div>
				<?php 
					$resultatsVideo = $unControleur->selectVideo($_GET['id']);

					include ("vue/vueWatch.php");

					$resultatsComments= $unControleur->selectComments($_GET['id']);

					include ("vue/vueComments.php");
					include ("vue/vueEcrireComment.php")

				?> 

		</center></body>

    </html>