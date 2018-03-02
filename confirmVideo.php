<?php 

	session_start();
	ini_set('display_errors', true);
	include ("header.php");
	include ("controleur/controleur.php");
	include ("controleur/comment.class.php");
	include ("controleur/video.class.php");
	include ("controleur/user.class.php");
	include ("settings.php");

?>
    <html>

    <body>
        <center>
            <h1><a href="index.php">Kobayashi</a></h1>
        	<h2>Envoi d'une video</h2></br></br>
        		<?php


        			$name = $_FILES['file']['name'];
   					$temp_name = $_FILES['file']['temp_name'];
   					$size =$_FILES['file']['size'];

        			$extensions = array('jpg','png');

        			$extension_fichier =  strtolower(substr(strrchr($_FILES['file']['name'], '.'), 1));
        			if (in_array($extensions, $extension_fichier)) {echo "extension correcte";}
        			else {echo "non";}
	        		//$_FILE['icone']['name']
	        		//$_FILE['icone']['type']
	        		//$_FILE['icone']['size']
	        		//$_FILE['icone']['tmp_name']
	        		//$_FILE['icone']['error']

				?> 

		</center></body>

    </html>