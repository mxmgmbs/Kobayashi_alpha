<center>
	<div class="container">

		<?php
			if(isset($_POST) && !empty($_POST)){

				if($_FILES['monfichier']['error'] ==0){
					if($_FILES['monfichier']['size'] < 30000000){
						$extension = strrchr(($_FILES['monfichier']['name']),'.');
						if($extension == '.mpeg'|| 
						   $extension == '.mp4'|| 
						   $extension == '.gif' || 
						   $extension == '.avi'	||
						   $extension == '.mpg' || 
						   $extension == '.m4v' ||
						   $extension == '.m4p'	||
						   $extension == '.mov' || 
						   $extension == '.mkv' 
						){
							move_uploaded_file(($_FILES['monfichier']['tmp_name']), 'video/'.$_FILES['monfichier']['name']);
							$unControleur->uploadVideo($_POST['nom'],$_POST['description'],$_SESSION['id'],$_FILES['monfichier']['name']);
						}

						//} else {$error ='Veuillez choisir un fichier avec une extension dans la liste suivante : jpg, mpeg, gif, avi, mgp, m4v, m4p, mov, mkv.';}
					} else {$error ='Votre fichier est trop volumineux. Taille maximale: XXX Go';}
				} else {$error ='probleme upload :'. $_FILES['monfichier']['error'];}
			}

		?>

	<form method ="POST" action="#" enctype="multipart/form-data">
									<div style="color: red;"><?php print($error);?></div>
			<input type="text" name="nom" placeholder="Nom du fichier"><br>
			<input type="text" name="description" placeholder="Description du fichier"><br>
			<input type="file" name="monfichier" value=""><br><br>
		<input type="submit" name="valider" value="Charger le fichier">
	</form>
	</div>
</center>