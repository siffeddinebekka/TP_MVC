<form method="post" action="">
	Mot de recherche : <input type="text" name="mot">
	<input type="submit" name="Rechercher" value="Rechercher">
</form>

<br/>

<table border ="1">
	<tr> 
	
		<td> Matiere </td> 
		<td> Nb Heures</td>
		
	</tr>
	<?php
	$total = 0;
	foreach ($lesMatieres as $uneMatiere) {
		echo " <tr> 
			<td> ".$uneMatiere['idMatiere']."</td>
			<td> ".$uneMatiere['nom']."</td>
			<td> ".$uneMatiere['nbheures']."</td>
		</tr>";
		$total += $uneMatiere['nbheures'];
	}
	?>
</table>
