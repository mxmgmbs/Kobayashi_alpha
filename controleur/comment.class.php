<?php 

	class Comment 
	{
			private $content, $auteur, $videoLiee;
			
			public function __construct ()
			{
				$this->content = "";
				$this->auteur = "";
				$this->videoLiee = "";
			}
			public function renseigner ($tab, $autor, $vid)
			{
				$this->content = $tab['content'];
				$this->auteur = $autor;
				$this->videoLiee = $vid;
			}
			
			public function serialiser ()
			{
				$tab = array (
					"comContent" => $this->content,
					"comAutorID" => $this->auteur,
					"comVideoID" => $this->videoLiee
				);
			return $tab;
			}
			
			public function afficher ()
			{
				return "
				<tr>
				<td>".$this->content."</td>
				<td>".$this->auteur."</td>
				<td>".$this->videoLiee."</td>
				</tr>";
			}
			
			
			public function getContent ()
			{
				return $this->content;
			}
			public function setContent ($content)
			{
				$this->content = $content;
			}
			
			
			
			public function getAuteur ()
			{
				return $this->auteur;
			}
			public function setAuteur ($auteur)
			{
				$this->auteur = $auteur;
			}
			
			
			
			public function getVideoLiee ()
			{
				return $this->videoLiee;
			}
			public function setVideoLiee ($video)
			{
				$this->video = $videoLiee;
			}
	}


?>