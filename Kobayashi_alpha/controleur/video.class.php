<?php 

	class Video 
	{
			private $nom, $chemin, $auteur;
			
			public function __construct ()
			{
				$this->nom = "";
				$this->chemin = "";
				$this->auteur = "";
			}
			public function renseigner ($tab)
			{
				$this->nom = $tab['nom'];
				$this->chemin = $tab['chemin'];
				$this->auteur = $tab['auteur'];
			}
			
			public function serialiser ()
			{
				$tab = array (
					"vidNom" => $this->nom,
					"vidChemin" => $this->chemin,
					"vidAutorID" => $this->auteur
				);
			return $tab;
			}
			
			public function afficher ()
			{
				return "
				<tr>
				<td>".$this->nom."</td>
				<td>".$this->chemin."</td>
				<td>".$this->auteur."</td>
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
			
			
			
			public function getChemin ()
			{
				return $this->chemin;
			}
			public function setChemin ($chemin)
			{
				$this->chemin = $chemin;
			}
			
			
			
			public function getAuteur ()
			{
				return $this->auteur;
			}
			public function setAuteur ($auteur)
			{
				$this->auteur = $auteur;
			}
	}


?>