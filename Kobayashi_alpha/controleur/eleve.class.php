<?php 

	class Eleve 
	{
			private $nom, $prenom, $age, $classe;
			
			public function __constrcut ()
			{
				$this->nom = "";
				$this->prenom = "";
				$this->classe = "";
				$this->age = "0";		
			}
			public function renseigner ($tab)
			{
				$this->nom = $tab['nom'];
				$this->prenom = $tab['prenom'];
				$this->classe = $tab['classe'];
				$this->age = $tab['age'];				
			}
			
			public function serialiser ()
			{
				$tab = array (
					"nom" => $this->nom,
					"prenom" => $this->prenom,
					"classe" => $this->classe,
					"age" => $this->age
				);
			return $tab;
			}
			
			public function afficher ()
			{
				return "
				<tr>
				<td>".$this->nom."</td>
				<td>".$this->prenom."</td>
				<td>".$this->classe."</td>
				<td>".$this->age."</td>
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
			
			
			
			public function getPrenom ()
			{
				return $this->prenom;
			}
			public function setPrenom ($nom)
			{
				$this->prenom = $prenom;
			}
			
			
			
			public function getClasse ()
			{
				return $this->classe;
			}
			public function setClasse ($nom)
			{
				$this->classe = $classe;
			}
			
			
			public function getAge ()
			{
				return $this->age;
			}
			public function setAge ($nom)
			{
				$this->age = $age;
			}
	}


?>