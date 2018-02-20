<?php 

	class User 
	{
			private $nom, $email, $password, $pays, $dateNaiss, $dateInscription;
			
			public function __construct ()
			{
				$this->nom = "";
				$this->email = "";
				$this->pays = "";
				$this->dateNaiss = "";
				$this->password = "";
				$this->dateInscription = "";	
			}
			public function renseigner ($tab)
			{
				$this->nom = $tab['nom'];
				$this->email = $tab['email'];
				$this->pays = $tab['pays'];
				$this->password = $tab['password'];		
				$this->dateNaiss = $tab['dateNaiss'];			
			}
			
			public function serialiser ()
			{
				$tab = array (
					"usrNom" => $this->nom,
					"usrEmail" => $this->email,
					"usrPays" => $this->pays,
					"usrDateNaissance" => $this->dateNaiss,
					"usrPassword" => $this->password,
					"usrDateInscription" => "curdate()"
				);
			return $tab;
			}
			
			public function afficher ()
			{
				return "
				<tr>
				<td>".$this->nom."</td>
				<td>".$this->email."</td>
				<td>".$this->pays."</td>
				<td>".$this->password."</td>
				</tr>";
			}
			
			
			public function getNom ()
			{
				return $this->nom;
			}
			public function setNom ($nom)
			{
				$this->nom = $nom;
			}
			
			
			
			public function getEmail ()
			{
				return $this->email;
			}
			public function setEmail ($nom)
			{
				$this->email = $email;
			}
			
			
			
			public function getPays ()
			{
				return $this->pays;
			}
			public function setPays ($nom)
			{
				$this->pays = $pays;
			}
			
			
			public function getPassword ()
			{
				return $this->password;
			}
			public function setPassword ($nom)
			{
				$this->password = $password;
			}
	}


?>