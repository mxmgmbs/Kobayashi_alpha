<?php 

	session_start();
	include ("header.php");
	include ("controleur/controleur.php");
	include ("controleur/eleve.class.php");
	include ("settings.php");

?>
    <html>

    <body>
        <center>
            <h1><a href="index.php"> Kobayashi </a></h1>
        <h2> version alpha </h2> </br>

        </br>


        		<div><a href="inscription.php"> Inscription </a></div>
        		<div><a href="connexion.php"> Connexion </a></div>
            	<div><a href="index.php"> Accueil </a></div>
                <div><a href="index.php?page=2"> Rechercher </a></div>
        
        

        <?php
        print($_SESSION['id']);
		$page = (isset($_GET['page'])) ? $_GET['page'] : 1; //Si la pge est defini dans l'url alors on prend la page sinon on prend 0
		switch ($page)
		{
			case 1 :
				$resultats = $unControleur->selectAllVideos();
				// $tab = array("nom", "age");
				// $resultats = $unControleur->selectChamps($tab);
				// $where = array("nom"=>"illan", "age"=>23);
				// $resultats = $unControleur->selectWhere($tab, $where);
				include ("vue/vue.php");
			break;
			case 2 :
				include ("vue/vueRechercher.php");
				if(isset($_POST['rechercher']))
				{
					$resultats = $unControleur->researchVideo($_POST['motcle']);
					include ("vue/vue.php");
				}
			break;
		}
	
	?> </center></body>

    </html>