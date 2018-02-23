<?php 

	session_start();
	ini_set('display_errors', true);
	include ("header.php");
	include ("controleur/controleur.php");
	include ("controleur/user.class.php");
	include ("settings.php");

?>
    <html>

    <body>
        <center>
            <h1><a href="index.php">Kobayashi</a></h1>
        	<h2>version alpha</h2></br></br>
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
		$page = (isset($_GET['page'])) ? $_GET['page'] : 1; //Si la pge est defini dans l'url alors on prend la page sinon on prend 0
		switch ($page)
		{
			case 1 :
				$resultatsVideo = $unControleur->selectAllVideos();
				// $tab = array("nom", "age");
				// $resultats = $unControleur->selectChamps($tab);
				// $where = array("nom"=>"illan", "age"=>23);
				// $resultats = $unControleur->selectWhere($tab, $where);
				include ("vue/vueListe.php");
			break;
			case 2 :
				include ("vue/vueRechercher.php");
				if(isset($_POST['rechercher']))
				{
					$resultatsVideo = $unControleur->researchVideo($_POST['motcle']);
					include ("vue/vueListe.php");
				}
			break;
		}
	
	?> </center></body>

    </html>