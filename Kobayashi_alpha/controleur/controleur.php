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
			
			
			public function selectAll ()
			{
				return $this->unModele->selectAll();
			}
			
			
			public function selectChamps ($tab) {
				return $this->unModele->selectChamps($tab);
			}
			
			public function selectWhere ($tab, $where) {
				return $this->unModele->selectWhere($tab, $where);
			}
			
			
			public function insert($unEleve)
			{
				//On  traite les données
				if ($unEleve->getAge ()<0)
				{
					$unEleve->setAge(0);
				}
				
				$tab = $unClient->serialiser();
				$this->unModele->insert ($tab);
			}
			
			public function supprimer ($tab) 
			{
				$this->unModele->supprimer($tab);
			}
			
			public function rechercher($motcle) 
			{
				if (empty($motcle))
				{
						return null;
				} else {
					return $this->unModele->rechercher($motcle);
				}
			}
		} //fin de la classe
				
?>