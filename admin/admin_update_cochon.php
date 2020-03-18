<?php //include ('./include/control_access.php');?>
<?php include ('./include/connexion.php');?>
<?php include ('./include/upload.php');?>
<?php
$db=new connexion();
session_start();
if (isset($_GET['id']) && isset($_POST['delete'])) {
	$param_id = $_GET['id'];
		// On supprime de la base de donnée
		$req = "DELETE FROM `cochon` WHERE idCochon = ?;";
	    $results=$db->prepare($req,array());
		$results->execute(array($param_id));
		//var_dump($req);
		//var_dump($results);
		 if ($results) {
			 echo "<div class='alert alert-info' role='alert'>Confirmation : l'élément ".$param_id." a été supprimé avec succès...</div>";
		 }
		 else {
			 echo "<div class='alert alert-warning' role='alert'>Erreur : la suppression de l'élément ".$param_id." a échoué...</div>";
		 }
}
elseif (isset($_GET['id']) && $_GET['id']=='new') {
	$param_id = 'new';
	if (isset($_POST['save']))  {
		$res_upload = upload();
		if ($res_upload['res'] == 0) {
			echo "<div class='alert alert-warning' role='alert'>".$res_upload['desc']."</div>";
		}
		else {
			// On ajoute dans la base de donnée
			$req = "INSERT INTO `cochon` (nomCochon,sexe,dateNaissance,dureeVie,poids,lienPhoto)
						VALUES(?,?,?,?,?,?);";
			$requete=$db->prepare($req,array());
			$requete->execute(array($_POST['nomCochon'],$_POST['sexe'],$_POST['dateNaissance'],$_POST['dureeVie'],$_POST['poids'],$res_upload['desc']));
			//var_dump($result);
		    //var_dump($requete);
			$req_last = "SELECT LAST_INSERT_ID() AS NEW_ID;";
			$results_last = $db->query($req_last);
			$last_insert = $results_last->fetch();
			$param_id = $last_insert['NEW_ID'];
			if ($requete) {
				echo "<div class='alert alert-info' role='alert'>Confirmation : l'élément ".$param_id." a été créé avec succès...</div>";
			}
			else {
				echo "<div class='alert alert-warning' role='alert'>Erreur : la création de l'élément a échoué...</div>";
			}
		}
	}
}
else {
	$param_id = $_GET['id'];
	if (isset($_POST['save']))  {
		$res_upload = upload();
		//var_dump($res_upload['desc']);
		if ($res_upload['res'] == 0) {
			echo "<div class='alert alert-warning' role='alert'>".$res_upload['desc']."</div>";
		}
		else {
			// On met à jour dans la base de donnée
			$req = "UPDATE `cochon`
						SET nomCochon=?,
						    sexe=?,
						    dateNaissance=?,
						    dureeVie=?,
							poids=?,
							lienPhoto=?
						WHERE `idCochon`=?;";
			$results=$db->prepare($req,array());
			$results->execute(array($_POST['nomCochon'],$_POST['sexe'],$_POST['dateNaissance'],$_POST['dureeVie'],$_POST['poids'],$res_upload['desc'],$param_id));
			///var_dump($req);

			//var_dump($req);
		    //var_dump($results);
			if ($results) {
				echo "<div class='alert alert-info' role='alert'>Confirmation : l'élément ".$param_id." a été modifié avec succès...</div>";
			}
			else {
				echo "<div class='alert alert-warning' role='alert'>Erreur : la modification de l'élément ".$param_id." a échoué...</div>";
			}
		}
	}
}

$idCochon = $param_id;
$nomCochon = '';
$poids = '';
$dureeVie = '';
$dateNaissance = null;
$sexe = '';
$lienPhoto = '';

if ($idCochon != "new") {
	$req = "SELECT * FROM `cochon` WHERE `idCochon`=:id";
	$results=$db->prepare($req,array());
	$results->execute(array(':id'=>$idCochon));
	//var_dump($req);
	//var_dump($results);
	$row = $results->fetch(); // On récupère une seule ligne
	//var_dump($row);
	$nomCochon = $row['nomCochon'];
	$poids = $row['poids'];
	$dureeVie = $row['dureeVie'];
	$dateNaissance = $row['dateNaissance'];
	$sexe = $row['sexe'];
	$lienPhoto = $row['lienPhoto'];
}
?>
<div id="admin_update" class="mb-5">

<?php
// on n'affiche pas le formulaire si on vient de supprimer ou de créer un élément
if (!isset($_POST['delete']) && !(isset($_GET['id']) && $_GET['id']=='new' && isset($_POST['save'])))
{
?>
<h3><?=(isset($_GET['id']) && $_GET['id']=='new')?"Création":"Modification"?> d'un cochon</h3>

<form action="" id="form_update" name="form_update" method="POST" enctype="multipart/form-data">

	<div class="form-group">
		<label for="idCochon">Identifiant</label>
		<input type="number" id="idCochon" name="idCochon" value="<?=$idCochon?>" readonly class="form-control">
	</div>

	<div class="form-group">
		<label for="nomCochon">Nom</label>
		<input type="text" id="nomCochon" name="nomCochon" value="<?=$nomCochon?>" required maxlength="50" class="form-control">
	</div>

	<div class="form-group">
		<label for="poids">Poids</label>
		<input type="number" id="poids" name="poids" value="<?=$poids?>" required class="form-control">
	</div>

	<div class="form-group">
		<label for="dureeVie">Durée de vie</label>
		<input type="number" id="dureeVie" name="dureeVie" value="<?=$dureeVie?>" required class="form-control">
	</div>

	<div class="form-group">
		<label for="dateNaissance">Date de naissance (AAAA-MM-JJ hh:mm:ss)</label>
		<input type="date" id="dateNaissance" name="dateNaissance" value="<?=$dateNaissance?>" placeholder="YYYY-MM-DD hh:mm:ss" required class="form-control">
	</div>

	<div class="form-group">
		<label for="sexe">Sexe</label>
		<select id="sexe" name="sexe" class="form-control" required>
  			<option value="F" <?php if ($sexe=='F') echo 'selected'; ?> >Femelle</option>
			<option value="M" <?php if ($sexe=='M') echo 'selected'; ?> >Mâle</option>
		</select>
	</div>

	<div class="form-group clearfix">
		<div class="float-left">
			<label for="lienPhoto">Image</label>
			<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
			<input type="file" id="file" name="file" class="form-control-file" accept="image/*" >
		</div>
		<?php if ($lienPhoto!='') {?>
		<div class="text-right"><img id="thumbnail" name="thumbnail" src="./upload/<?=$lienPhoto?>" alt="<?=$lienPhoto?>" title="<?=$lienPhoto?>" ></div>
		<?php } ?>
	</div>

	<span>
		<button type="submit" name="save" class="btn btn-primary " ><?=(isset($_GET['id']) && $_GET['id']=='new')?"Créer":"Modifier"?></button>
	</span>
	<?php if (!(isset($_GET['id']) && $_GET['id']=='new')) { ?>
	<span>
		<button type="submit" name="delete" class="btn btn-primary" >Tuer</button>
	</span>
	<?php } ?>

</form>
<?php
}
?>
<br>
<p class="text-left">
	<a class="btn btn-primary" href="index.php?pageId=admin&item=cochon">
		Liste des cochons
	</a>
</p>

</div>
