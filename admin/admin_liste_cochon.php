<?php //include ('./include/control_access.php');?>
<?php include ('./include/connexion.php');?>

<?php
session_start();
$db=new connexion();

$sql = "SELECT count(*) AS nb_cochons FROM `cochon` WHERE sexe LIKE 'M';";
$results = $db->query($sql);
$row = $results->fetch();
$nbCochons = $row['nb_cochons'];

$sql = "SELECT count(*) AS nb_cochonnes FROM `cochon` WHERE sexe LIKE 'F';";
$results = $db->query($sql);
$row = $results->fetch();
$nbCochonnes = $row['nb_cochonnes'];
$sql = "SELECT * FROM `cochon` ";
if (isset($_REQUEST['sexe']) && ($_REQUEST['sexe']=='M' || $_REQUEST['sexe']=='F')) {
	$where = " WHERE sexe LIKE '".$_REQUEST['sexe']."' ";
	$sql = $sql . $where;
}
$sql = $sql . " ORDER BY idCochon;";

$results = $db->query($sql);

//var_dump($sql);
//var_dump($results);
?>



<div id="div_liste">
	<form action="index.php?pageId=admin&item=cochon" id="form_liste" name="form_liste" method="POST">
		<h3 class="text-center">Cochons et cochonnes (<?=$nbCochons+$nbCochonnes?>)</h3>
		<p class=>Nombre de cochons : <?=$nbCochons?></p>
		<p>Nombre de cochonnes : <?=$nbCochonnes?></p>

			<label for="sexe">Filtre par sexe</label>
			<select id="sexe" name="sexe" class="form-control-sm" onchange="submit()">
				<option value="">Tous</option>
				<option value="M" <?php if (isset($_REQUEST['sexe']) && $_REQUEST['sexe']=='M') echo 'selected'; ?> >Mâle</option>
				<option value="F" <?php if (isset($_REQUEST['sexe']) && $_REQUEST['sexe']=='F') echo 'selected'; ?> >Femelle</option>
			</select>
		</p>
	</form>
</div>

<br>

<div id="admin">
	<script>
		// on utilise le plugin tablesorter :
		// https://mottie.github.io/tablesorter/docs/
		$(function() {

			$("#table_cochon")
			.tablesorter()
			.tablesorterPager({
      			container: $('#pager'),
      			size: 25
      		});

			; });
	</script>
	<table id="table_cochon" class="tablesorter">
		<thead>
		  <tr>
			<th class="col-md-2 pr-3">Identifiant</th>
			<th class="col-md-2 pr-3">Nom</th>
			<th class="col-md-2 pr-3">Poids</th>
			<th class="col-md-2 pr-3">Durée de vie</th>
			<th class="col-md-2 pr-3">Date de naissance</th>
			<th class="col-md-2 pr-3">Sexe</th>
			<th class="col-md-2 pr-3">Photo</th>
		  </tr>
		</thead>

		<tbody>
				<?php

				while ($row = $results->fetch(PDO::FETCH_BOTH)){
				?>
				<tr style="cursor:pointer;" onclick="location.href='index.php?pageId=admin&item=cochon&id=<?=$row['idCochon']?>'">
					<td>
						<?=$row['idCochon']?>
					</td>
					<td>
						<a href="index.php?pageId=admin&item=cochon&id=<?=$row['idCochon']?>">
							<?=$row['nomCochon']?>
						</a>
					</td>
					<td><?=$row['poids']?></td>
					<td><?=$row['dureeVie']?></td>
					<td><?=$row['dateNaissance']?></td>
					<td><?=$row['sexe']?></td>
					<td><?php if ($row['lienPhoto']!='') {?>
						<div class="text-right"><img id="thumbnail" name="thumbnail" src="./upload/<?=$row['lienPhoto']?>" alt="<?=$row['lienPhoto']?>" title="<?=$row['lienPhoto']?>" ></div>
						<?php } ?>
					</td>
				</tr>
				<?php
				}
			?>
		</tbody>
	</table>

	<div id="pager" class="pager">
	   <img src="http://mottie.github.com/tablesorter/addons/pager/icons/first.png" class="first"/>
	   <img src="http://mottie.github.com/tablesorter/addons/pager/icons/prev.png" class="prev"/>
	   <span class="pagedisplay"></span>
	   <img src="http://mottie.github.com/tablesorter/addons/pager/icons/next.png" class="next"/>
	   <img src="http://mottie.github.com/tablesorter/addons/pager/icons/last.png" class="last"/>
	   <select class="pagesize" title="Lignes par page">
	      <option value="2">2</option>
	      <option selected="selected" value="3">3</option>
	      <option value="4">4</option>
	      <option value="3">5</option>
	      <option value="4">10</option>
	      <option value="3">20</option>
	      <option value="3">100</option>
	   </select>
	   <select class="gotoPage" title="Page"></select>
	</div>

	<br>
	<br>
	<p class="text-left">
		<a class="btn btn-primary" href="index.php?pageId=admin&item=cochon&id=new">
			Créer un nouveau cochon
		</a>
	</p>
</div>
