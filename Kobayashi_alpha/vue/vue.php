<html>
	<body>
	<center>
		<br><br><br><br>
		<h3> Liste des utilisateurs </h3>
		<div class="container">
		<table class ="table">
		<tr>
			<th>ID</th>
			<th>Nom</th>
			<th>Email</th>
			<th>password</th>
			<th>Date d'inscription</th>
			<th>Pays</th>
		</tr>
<?php 
		//parcours des resultats avec foreach
		foreach ($resultats as $unResultat) 
		{
			echo "<tr>
					<td>".$unResultat['usrID']." </td>
					<td>".$unResultat['usrNom']." </td>
					<td>".$unResultat['usrEmail']."</td>
					<td>".$unResultat['usrPassword']. "</td>
					<td>".$unResultat['usrDateInscription']. "</td>
					<td>".$unResultat['usrPays']. "</td>
				</tr>";
			
		}
		
?>
			</table>
			</div>
		</center>
	</body>
</html>