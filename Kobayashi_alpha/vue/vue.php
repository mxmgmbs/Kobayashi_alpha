<html>
	<body>
	<center>
		<br><br><br><br>
		<h3> Liste des Videos </h3>
		<div class="container">
		<table class ="table">
		<tr>
			<th>ID</th>
			<th>Nom</th>
			<th>Chemin</th>
			<th>Auteur </th>
			<th>Nombre de vues</th>
			<th>Date d'upload</th>
			<th>Heure d'upload</th>
		</tr>
<?php 
		//parcours des resultats avec foreach
		foreach ($resultats as $unResultat) 
		{
			echo "<tr>
					<td>".$unResultat['vidID']." </td>
					<td>".$unResultat['vidNom']." </td>
					<td>".$unResultat['vidChemin']."</td>
					<td>".$unResultat['vidAutorID']. "</td>
					<td>".$unResultat['vidVues']. "</td>
					<td>".$unResultat['vidDate']. "</td>
					<td>".$unResultat['vidHour']. "</td>
				</tr>";
			
		}
		
?>
			</table>
			</div>
		</center>
	</body>
</html>