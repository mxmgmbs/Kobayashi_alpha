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
?>


			</table>
			</div>
		</center>
	</body>
</html>