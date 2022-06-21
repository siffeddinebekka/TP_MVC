<h3> Gestion des Professeurs  </h3>
<?php
	$leProfesseur =null; 
	$lesMatieres = null;
	$unControleur->setTable ("professeur");
	$unControleur->setTable ("matiere");
	if (isset($_GET['idProfesseur']) && isset($_GET['action']))
	{
		$action = $_GET['action']; 
		$idProfesseur = $_GET['idProfesseur'];
		$where = array("idProfesseur"=>$idProfesseur);
		switch ($action) {
			case 'sup':
			 	$unControleur->delete($where);
				break;
			
			case 'edit':
				 $leProfesseur = $unControleur->selectWhere("*", $where);

				break;

				case 'voir':
				 $lesMatieres = $unControleur->selectWhereAll("*", $where);

				break;
		}
		$unControleur->setTable ("professeur");
	}

	require_once ("vue/vue_insert_professeur.php");

	if(isset($_POST['Modifier']))
	{
		$where = array("idProfesseur"=>$_GET['idProfesseur']);
		$tab=array("nom"=>$_POST["nom"], "prenom"=>$_POST["prenom"], 
			"email"=>$_POST["email"],  
			"tel"=>$_POST["tel"],"mdp"=>$_POST["mdp"] );
		$unControleur->update ($tab, $where); 
		header("Location: index.php?page=2"); 
	}
	if (isset($_POST['Valider']))
	{
		$tab=array("nom"=>$_POST["nom"], "prenom"=>$_POST["prenom"], 
			"email"=>$_POST["email"],  
			"tel"=>$_POST["tel"],"mdp"=>$_POST["mdp"] );
		$unControleur->insert ($tab); 
	}

	echo"<br/><h2> Liste des Professeurs </h2><br/>"; 
	
	if(isset($_POST['Rechercher']))
	{
		$mot = $_POST['mot']; 
		$tab=array("nom", "prenom", "email", "tel");
		$lesProfesseurs = $unControleur->selectSearch($tab, $mot);
	}else {
		 
		$lesProfesseurs = $unControleur->selectAll(); 
	}
	require_once ("vue/vue_select_all_professeurs.php"); 

	echo "<br> <br>";
	if($lesMatieres !=null){
		require_once("vue/vue_les_matiere_prof.php");
	}else{
		echo "Ce Prof n'a pas d'heure";
	}
?>

















