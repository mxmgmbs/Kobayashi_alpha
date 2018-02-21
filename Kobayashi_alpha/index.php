<?php 

	session_start();
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
        		<br>
        		<div><a href="index.php?page=2"> Inscription </a></div>
        		<div><a href="index.php?page=5"> Connexion </a></div>
            	<br>

                <div><a href="index.php?page=3"> Rechercher utilisateur </a></div>
                <div><a href="index.php?page=4"> Supprimer utilisateur </a></div>
        
        

        <?php
        print($_SESSION['id']);
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
					//echo "<h3><br> Insertion reussie <br></center></h3>";					
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
			case 5 :
				include ("vue/vueConnexion.php");
				if(isset($_POST['valider']))
				{
					$emailCo = $_POST['email'];
					$mdpCo = $_POST['password'];
					//include ("vue/vue.php");
					$unControleur->researchUser($emailCo,$mdpCo);
				}
			break;
		}
	
	?> </center></body>

    </html>