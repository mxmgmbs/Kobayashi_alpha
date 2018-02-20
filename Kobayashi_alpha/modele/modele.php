<?php 
	class Modele
	{
		private $pdo, $table; //variable attribut privée de la classe modèle
		
		
		public function __construct($serveur,$bdd,$user,$mdp) 
		{	
		//instanciantion de la classe PDO
			$this->pdo= null;
			try
			{
			$this->pdo = new PDO ("mysql:host=".$serveur.";dbname=".$bdd,$user,$mdp);
			}
			catch (Exception $exp)
			{
				
				echo "<br/> Erreur de connexion à la BDD".$bdd;
			}
			$this->table = "";
		}
		
		public function setTable ($uneTable) {
			$this->table = $uneTable;
		}
		
		public function selectALL ()
		{
			if ($this->pdo ==null)
			{
				return null;

			} else {
			//execution de requete de selection des elves
			$requete = "select * from user ;";
			$select = $this->pdo->prepare ($requete);
			$select->execute ();
			$resultats = $select->fetchAll();	
			return $resultats;
			}
		}
		
		public function selectChamps ($tab)
		{
			$champs = implode (",",$tab); //concatene les champs dzns une chaine / inverse de explode
			if ($this->pdo ==null)
			{
				return null;
			} else {
			//execution de requete de selection des elves
			$requete = "select ".$champs." from ".$this->table." ; ";
			$select = $this->pdo->prepare ($requete);
			$select->execute ();
			$resultats = $select->fetchAll();	
			return $resultats;
			}
		}
		
		public function selectWhere ($tab, $where)
		{
			$champs = implode (",",$tab);
			$clause = array();
			$donnees = array();
			foreach ($where as $cle=>$valeur)
			{
				$clause[] = $cle ." = :".$cle; 		//Les crochets vides permet l'auto-incrementation
				$donnees[":".$cle] = $valeur;
			}
			$chaineClause = implode (" and ", $clause);
			
			if ($this->pdo ==null)
			{
				return null;
			} else {
			//execution de requete de selection des elves
			$requete = "select ".$champs." from ".$this->table." where ".$chaineClause. ";";
			$select = $this->pdo->prepare($requete);
			$select->execute($donnees);
			$resultats = $select->fetchAll();	
			return $resultats;
			}
		}
		
		public function insert ($tab)
		{
			$champs = array();
			$donnees = array();
			foreach ($tab as $cle => $valeur) 
			{
				$champs[] = $cle; //Le premier tableau est rempli avec $cle
				$target[] = ":".$cle; //deuxieme tableau est du style ":$cle" pour execute
				$donnees[":".$cle] = $valeur; //troisieme tableau possede les values
			}
			
			$chaineChamps = implode(", ",$champs);
			$chaineDonnees = implode(", ",$target);
			
			$requete = "insert into ".$this->table." (".$chaineChamps.") values (".$chaineDonnees.");";
			echo $requete."<br>";



			if ($this->pdo !=null)
			{
				$insert = $this->pdo->prepare($requete);
				$insert->execute ($donnees);	
			}
		}
		
		public function supprimer ($tab) {
			$champs = array();
			$donnees = array();
			foreach ($tab as $cle => $valeur)
			{
				$champs [] = $cle ." =:".$cle;
				$donnees[":".$cle] = $valeur;
			}
			$chaineChamps = implode (" and ", $champs);
			
			$requete = "delete from ".$this->table." where ".$chaineChamps." ;";
			
				if ($this->pdo !=null)
			{
				$insert = $this->pdo->prepare($requete);
				$insert->execute ($donnees);
			}
		}
		
		
		public function update ($tab, $where)
		{
			$champs = array();
			$donnees = array();
			$clause = array();
			foreach ($tab as $cle => $valeur)
			{
				$champs [] = $cle ." =:".$cle;
				$donnees[":".$cle] = $valeur;
			}
			$chaineChamps = implode (",", $champs);
			
			$clause = array();
			
			foreach ($where as $cle=> $valeur)
			{
				$clause [] = $cle ." =:".$cle;
				$donnees[":".$cle] = $valeur;
			}
			$chaineClause = implode(" and ", $clause);
			$requete = "update ".$this->table." set ".$chaineChamps." where ".$chaineClause.";";
			
			if ($this->pdo !=null)
			{
				$delete = $this->pdo->prepare($requete);
				$delete->execute ($donnees);
			}
		}
		
		
		
		public function rechercher ($motcle) 
		{
			$requete = "select * from eleve
						where nom like :motcle
						or prenom like :motcle 
						or classe like :motcle";
			$donnees = array (":motcle"=>'%'.$motcle.'%');
			if ($this->pdo ==null)
			{
				return null;
			} else {
				$select = $this->pdo->prepare($requete);
				$select->execute($donnees);
				$resultats = $select->fetchAll();
				return $resultats;
			}
			
		}
	}
?>