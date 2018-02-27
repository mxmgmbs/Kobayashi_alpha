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
		
		public function selectAllVideos ()
		{
			if ($this->pdo ==null)
			{
				return null;

			} else {
			//execution de requete de selection des elves
			$requete = "select * from video order by rand() limit 0,16;";
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
			
			$requete = "insert into ".$this->table." (".$chaineChamps.",usrDateInscription) values (".$chaineDonnees.",now());";



			if ($this->pdo !=null)
			{
				$insert = $this->pdo->prepare($requete);
				$insert->execute ($donnees);
				echo "vous vous etes enregistre avec succes !";	
			}
		}
		public function uploadVideo ($nom, $id,$name) {
				$requete = "insert into video(vidNom, vidChemin, vidDate, vidHour,vidVues, vidAutorID) values (:vidNom,:vidChemin, now(),now(),0,:vidAutorID);";

				$donnees = array (":vidNom" => $nom, ":vidChemin" => "video/".$name , ":vidAutorID" => $id);
				
				?><pre><?php var_dump($donnees); ?> </pre><?php
				if ($this->pdo ==null)
			{
				return null;
			} else {
				$insert = $this->pdo->prepare($requete);
				$insert->execute($donnees);
			}
			}

		public function insertComment ($content, $autor, $vid)
		{
			print($content);
			print($autor);
			print($vid);
			$requete = "insert into comment (comContent, comDate, comHour, comAutorID,comVideoID) values (:content,now(),now(),:autor, :vid);";

			$donnees = array (":content" => $content, ":autor" => $autor,":vid" => $vid);
			var_dump($donnees);
			//print($requete);

			if ($this->pdo ==null)
			{
				return null;
			} else {
				$insert = $this->pdo->prepare($requete);
				$insert->execute($donnees);
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
		
		
		public function selectVideo($motcleID){
			$requete = "select * from video
						where vidID like :motcleID" ;
			$donnees = array (":motcleID"=>$motcleID);
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
		public function afficherNomUser($id){
			$requete = "select usrNom from user
						where usrID == :id" ;
			$donnees = array (":id"=>$id);
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

		public function selectComments($motcleID){
			$requete = "select * from comment
						where comVideoID like :motcleID" ;
			$donnees = array (":motcleID"=>$motcleID);
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

		public function researchVideo ($motcle) 
		{
			$requete = "select * from video
						where vidNom like :motcle order by vidVues DESC" ;
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
		public function researchUser($email, $password) 
		{
			$req = $this->pdo->prepare("select * from user
						where usrEmail = :email
						and usrPassword = :password ;");

			$req->execute(array('email' => $email, 'password' => $password));
			$resultat = $req->fetch();

			if (!$resultat)
			{
				print("Mauvais identifiant ou mot de passe...");
			} else {
				session_start();
				$_SESSION['id'] = $resultat['usrID'];
				$_SESSION['nom'] = $resultat['usrNom'];
				print("Vous etes maintenant connecte.");
			}
			
		}
	}
?>