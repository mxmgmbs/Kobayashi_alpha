<html>
	<body>
	<center>
		<br><br><br><br>
		<div class="container">
		<table class ="table">

<?php 
		//parcours des resultats avec foreach
		foreach ($resultatsComments as $unResultat) 
		{
			//var_dump($unResultat['vidChemin']);
			echo "
					<p>".$unResultat['comID']."</p><br>
					<p>".$unResultat['comContent']."</p>
					<p>".$unResultat['comDate']."</p>
					<p>".$unResultat['comHour']. "</p>
					<p>".$unResultat['comAutorID']."</p>"
				;
		}		

			if(isset($_SESSION['id'])){
				include ("vue/vueInsertComment.php");
				if(isset($_POST['valider']))
				{
					//print("nom : ". $_POST['nom']."<br>");
					//print("email : ". $_POST['email']."<br>");
					//print("date de naissance : ". $_POST['dateNaiss']."<br>");
					//print("mot de passe : ". $_POST['mdp']."<br>");
					//print("verif mdp : ". $_POST['mdp2']."<br>");

					//jusque la ok
					
					$unControleur->insertComment($_POST['content'] ,$_SESSION['id'], $_GET['id']);
					header('Location: index.php');
					sleep(1);
				}
			} else {
				print("veuillez vous connecter pour poster un commentaire");
			}






?>


			</table>
			</div>
		</center>
	</body>
</html>