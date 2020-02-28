<?php include ('./include/control_access.php');?>
<?php include ('./include/connexion_db.php');?>
<?php include ('./include/upload.php');?>
<?php
if (isset($_GET['id']) && isset($_POST['delete'])) {
	$param_id = $_GET['id'];
		// On supprime de la base de donnée
		$req = "DELETE FROM `cochon`
					WHERE coc_id = ".$db->escape_string($param_id).";";
		$results = $db->query($req);
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
			$req = "INSERT INTO `cochon` (coc_nom,
										coc_poids,
										coc_duree_vie,										
										coc_date_naissance,
										coc_sexe,
										coc_image
										) 
						VALUES('".$db->escape_string($_POST['coc_nom'])."',
								'".$db->escape_string($_POST['coc_poids'])."',
								'".$db->escape_string($_POST['coc_duree_vie'])."',
								'".$db->escape_string($_POST['coc_date_naissance'])."',
								'".$db->escape_string($_POST['coc_sexe'])."',
								'".$db->escape_string($res_upload['desc'])."'
							   );";
			$results = $db->query($req);
			//var_dump($req);
		    //var_dump($results);
			$req_last = "SELECT LAST_INSERT_ID() AS NEW_ID;";
			$results_last = $db->query($req_last);
			$last_insert = mysqli_fetch_array($results_last, MYSQLI_BOTH);
			$param_id = $last_insert['NEW_ID'];
			if ($results) {
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
		if ($res_upload['res'] == 0) {
			echo "<div class='alert alert-warning' role='alert'>".$res_upload['desc']."</div>";
		}
		else {
			// On met à jour dans la base de donnée
			$req = "UPDATE `cochon` 
						SET coc_nom='".$db->escape_string($_POST['coc_nom'])."',
							coc_poids='".$db->escape_string($_POST['coc_poids'])."',
							coc_duree_vie='".$db->escape_string($_POST['coc_duree_vie'])."',
							coc_date_naissance='".$db->escape_string($_POST['coc_date_naissance'])."',
							coc_sexe='".$db->escape_string($_POST['coc_sexe'])."'
							".($res_upload['res']==1?",coc_image='".$db->escape_string($res_upload['desc'])."'":"")."	
						WHERE `coc_id`=".$db->escape_string($param_id).";";
			$results = $db->query($req);
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

$coc_id = $param_id;
$coc_nom = '';
$coc_poids = '';
$coc_duree_vie = '';
$coc_date_naissance = null;
$coc_sexe = '';
$coc_image = '';

if ($param_id != "new") {
	$req = "SELECT * FROM `cochon` WHERE `coc_id`=".$db->escape_string($param_id).";";
	$results = $db->query($req);
	//var_dump($req);
	//var_dump($results);
	$row = mysqli_fetch_array($results, MYSQLI_BOTH); // On récupère une seule ligne (celle où tbl_id=$param_id)
	$coc_nom = $row['coc_nom'];
	$coc_poids = $row['coc_poids'];
	$coc_duree_vie = $row['coc_duree_vie'];
	$coc_date_naissance = $row['coc_date_naissance'];
	$coc_sexe = $row['coc_sexe'];
	$coc_image = $row['coc_image'];
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
		<label for="coc_id">Identifiant</label>
		<input type="number" id="coc_id" name="coc_id" value="<?=$coc_id?>" readonly class="form-control">
	</div>

	<div class="form-group">
		<label for="coc_nom">Nom</label>
		<input type="text" id="coc_nom" name="coc_nom" value="<?=$coc_nom?>" required maxlength="50" class="form-control">
	</div>

	<div class="form-group">
		<label for="coc_poids">Poids</label>
		<input type="number" id="coc_poids" name="coc_poids" value="<?=$coc_poids?>" required class="form-control">
	</div>

	<div class="form-group">
		<label for="coc_duree_vie">Durée de vie</label>
		<input type="number" id="coc_duree_vie" name="coc_duree_vie" value="<?=$coc_duree_vie?>" required class="form-control">
	</div>	

	<div class="form-group">
		<label for="coc_date_naissance">Date de naissance (AAAA-MM-JJ hh:mm:ss)</label>
		<input type="datetime" id="coc_date_naissance" name="coc_date_naissance" value="<?=$coc_date_naissance?>" placeholder="YYYY-MM-DD hh:mm:ss" required class="form-control">
	</div>	

	<div class="form-group">
		<label for="coc_sexe">Sexe</label>
		<select id="coc_sexe" name="coc_sexe" class="form-control" required>
  			<option value="F" <?php if ($coc_sexe=='F') echo 'selected'; ?> >Femelle</option>
			<option value="M" <?php if ($coc_sexe=='M') echo 'selected'; ?> >Mâle</option>
		</select>
	</div>

	<div class="form-group clearfix">
		<div class="float-left">
			<label for="coc_image">Image</label>
			<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
			<input type="file" id="file" name="file" class="form-control-file" accept="image/*" >
		</div>
		<?php if ($coc_image!='') {?>
		<div class="text-right"><img id="thumbnail" name="thumbnail" src="./upload/<?=$coc_image?>" alt="<?=$coc_image?>" title="<?=$coc_image?>" ></div>
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
