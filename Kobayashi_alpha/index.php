<?php 
	include ("header.php");
	include ("controleur/controleur.php");
	include ("controleur/eleve.class.php");

?>
    <html>

    <body>
        <center>
            <h1> Kobayashi </h1>
        <h2> version alpha </h2> </br>
        </br>

            
                <div><a href="index.php?page=1"> Lister les utilisateurs </a></div>
                <div><a href="index.php?page=2"> Ajouter un utilisateurs </a></div>
                <div><a href="index.php?page=3"> Rechercher utilisateur </a></div>
                <div><a href="index.php?page=4"> Supprimer utilisateur </a></div>
        
        

        <?php
		$page = (isset($_GET['page'])) ? $_GET['page'] : 0; //Si la pge est defini dans l'url alors on prend la page sinon on prend 0
		$unControleur = new Controleur("localhost","kobayashi_IA","root","root", "user");
		switch ($page)
		{
			case 1 :
				$resultats = $unControleur->selectAll();
				// $tab = array("nom", "age");
				// $resultats = $unControleur->selectChamps($tab);
				// $where = array("nom"=>"illan", "age"=>23);
				// $resultats = $unControleur->selectWhere($tab, $where);
				include ("vue/vue.php");
			break;	
			
			case 2 :
				include ("vue/vueSeConnecter.php");
				if(isset($_POST['valider']))
				{
					//instanciation de la classe Eleve
					$unEleve = new Eleve();
					//renseigner les attributs 
					$unEleve->renseigner($_POST);
					$unControleur->insert($unEleve);
					echo "<h3><br> Insertion reussie <br></center></h3>";					
				}			
			break;
			
			case 3 :
				include ("vue/vueRechercher.php");
				if(isset($_POST['rechercher']))
				{
					$resultats = $unControleur->rechercher($_POST['motcle']);
					include ("vue/vue.php");
				}
			break;
			case 4 :
				include ("vue/vueSupprimer.php");
				if(isset($_POST['supprimer']))
				{
					$tab = array("nom"=>$_POST['nom'], "prenom"=>$_POST['prenom']);
					
					$unControleur->supprimer($tab);
					$resultats = $unControleur->selectAll($tab);
					include ("vue/vue.php");
				}
			break;
		}
	
	?> </center></body>

    </html>