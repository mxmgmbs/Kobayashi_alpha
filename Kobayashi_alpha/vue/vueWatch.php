<html>
	<body>
	<center>
		<br><br><br><br>
		<div class="container">
		<table class ="table">

<?php 
		//parcours des resultats avec foreach
		foreach ($resultatsVideo as $unResultat) 
		{
			//var_dump($unResultat['vidChemin']);
			echo "
					<p>".$unResultat['vidNom']."</p><br>
					
					<video width='800' height='444' controls='controls'>
 		 			<source src='".$unResultat['vidChemin']."' type='video/mp4'/>
					</video>

					<p>".$unResultat['vidChemin']."</p>
					<p>".$unResultat['vidAutorID']."</p>
					<p>".$unResultat['vidVues']. "</p>
					<p>".$unResultat['vidDate']."</p>"
				;
		}
		

		
?>
			</table>
			</div>
		</center>
	</body>
</html>