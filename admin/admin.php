<div class="container">
	<div class="row">
		<div class="col-sm-8">
<?php
/* Le ticket de connexion est enregistré dans une variable SESSION puis on le vérifie */
//if(session_status() == PHP_SESSION_NONE){
//	session_start();
//}

if (!isset($_GET['item'])) {
	// demande de deconnexion
	if (isset($_GET['disconnect'])) {
		$_SESSION["connected"] = false;
		echo "<div>Merci, votre déconnexion a bien été prise en compte...</div>";
	}
	// verification de l'etat de connexion
	elseif (isset($_SESSION['connected'])
		&& ($_SESSION["connected"]==true)) {
		echo "<div>Vous êtes connecté...</div>";
		echo "<div>Vous pouvez cliquez <a href='index.php?pageId=admin&disconnect'><b>ICI</b></a> pour vous déconnecter...</div>";
	}
	// demande de connexion
	elseif (isset($_POST['usermail'])
			&& isset($_POST['userpwd'])
			&& ($_POST['usermail'] == 'd.ritz@free.fr')
			&& (/*md5(*/$_POST['userpwd']/*)*/ == 'essai')) {
			$_SESSION["connected"] = true;
			// pwd == "cochons"
			echo "<div>Vous êtes connecté...</div>";
			echo "<div>Vous pouvez cliquez <a href='index.php?pageId=admin&disconnect'><b>ICI</b></a> pour vous déconnecter...</div>";
	}
	// non connecté
	else {
	?>			<h4>Vous n'êtes pas connecté. Connectez-vous...</h4>
				<form method="POST" action="" enctype="multipart/form-data">

					<div class="form-group ">
					<label for="usermail">Email</label>
					<input type="email" class="form-control formlarg"  name="usermail" id="usermail"  placeholder="Entrez votre email" required >
					</div>

					<div class="form-group">
					<label for="userpwd">Password</label>
					<input type="password" class="form-control formlarg" name="userpwd" id="userpwd" placeholder="Entrez votre mot de passe" required >
					</div>

					<button type="submit" class="btn btn-primary">Login</button>

				</form>
	<?php
	}
}
else {
	// acces aux pages des traitements
	switch ($_GET['item']){
		case 'cochon':
			include (isset($_GET['id'])?'admin_update_cochon.php':'admin_liste_cochon.php');
			break;
		}
}
?>
		</div>
	</div>
</div>
