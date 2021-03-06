<?php 
		include ("modele/modele.php"); 
		
		class Controleur /* POur chaque table de la base de données il y a un controleur */ 
		{
			private $unModele;
			
			public function __construct ($serveur, $bdd, $user, $mdp, $uneTable)
			{
				//instanciation de la classe Modele
				$this->unModele = new Modele ($serveur, $bdd, $user, $mdp); 
				//On specifie la table pour le modele 
				$this->unModele->setTable($uneTable);
			}
			
			
			public function selectAllVideos ()
			{
				return $this->unModele->selectAllVideos();
			}
			
			
			public function selectChamps ($tab) {
				return $this->unModele->selectChamps($tab);
			}
			
			public function selectWhere ($tab, $where) {
				return $this->unModele->selectWhere($tab, $where);
			}
			public function uploadVideo($nom,$description, $id,$name){
				return $this->unModele-> uploadVideo($nom,$description,$id,$name);
			}

			public function afficherNomUser($id){
				return $this->unModele->afficherNomUser($id);
			}
			public function recupID($id){
				return $this->unModele->recupID($id);
			}
			
			public function insert($unUser)
			{
				//On  traite les données
				//if ($unUser->getAge ()<0)
				//{
				//	$unUser->setAge(0);
				//}
				
				$tab = $unUser->serialiser();

				$this->unModele->insert($tab);
			}
			public function insertComment ($content, $autor, $vid)
			{
				//On  traite les données
				//if ($unUser->getAge ()<0)
				//{
				//	$unUser->setAge(0);
				//}
				$this->unModele->insertComment ($content, $autor, $vid);
			}
			
			public function supprimer ($tab) 
			{
				$this->unModele->supprimer($tab);
			}
			
			public function researchVideo($motcle) 
			{
				if (empty($motcle))
				{
						return null;
				} else {
					return $this->unModele->researchVideo($motcle);
				}
			}

			public function selectVideo($motcleID) 
			{
				if (empty($motcleID))
				{
						return null;
				} else {
					return $this->unModele->selectVideo($motcleID);
				}
			}

			public function selectComments($motcleID) 
			{
				if (empty($motcleID))
				{
						return null;
				} else {
					return $this->unModele->selectComments($motcleID);
				}
			}

			public function researchUser($email,$password) 
			{
				if (empty($email) OR empty($password))
				{
						return null;
				} else {
					return $this->unModele->researchUser($email,$password);
				}
			}
		} //fin de la classe
				
?>