<html>
	<body>
	<center>
		<br><br><br><br>
		<h3> Liste des Videos </h3>
		<div class="container">
		<table class ="table">
		<tr>
			<th>Nom</th>
			<th>Description</th>
			<th>Auteur </th>
			<th>Nombre de vues</th>
			<th>Date d'upload</th>

		</tr>
<?php 
		//parcours des resultats avec foreach
		foreach ($resultatsVideo as $unResultat) 
		{
			echo "<tr>
					<td><a href='watch.php?id=".$unResultat['vidID']."'>".$unResultat['vidNom']." </a></td>
					<td>".$unResultat['vidDescription']."</td>
					<td>".$unResultat['vidAutorID']. "</td>
					<td>".$unResultat['vidVues']. "</td>
					<td>".$unResultat['vidDate']. "</td>
				</tr>";

		}
		//<td>".$unControleur->recupID($unResultat['vidAutorID']). "</td>
?>
			</table>
			</div>
		</center>
	</body>
</html>