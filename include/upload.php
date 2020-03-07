<?php
/* Fonction upload()
	Vérifie le téléchargement de fichier et le déplace dans le dossier upload/
	- Si succès : renvoie un tableau : 1 et le nom du fichier téléchargé
	- En cas d'erreur : renvoie un tableau : 0 et une chaine de caractère décrivant la cause de l'erreur
	- Si aucun fichier envoyé : renvoie un tableau : -1 et une chaine vide
*/
function upload(){
	// gérer le cas du fichier déjà existant
	if(!empty($_FILES['file']['name'])) {
		$dossier = 'upload/';
		$fichier = basename($_FILES['file']['name']);
		$taille_maxi = 1000000;
		$taille = filesize($_FILES['file']['tmp_name']);
		$extensions = array('.png', '.gif', '.jpg', '.jpeg');
		$extension = strrchr($_FILES['file']['name'], '.');
		//Début des vérifications de sécurité...
		if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
		{
			 return array( "res" => 0,
						   "desc" => "Erreur : Vous devez uploader un fichier de type .png, .gif, .jpg ou .jpeg...");
		}
		if ($taille>$taille_maxi)
		{
			 return array( "res" => 0,
						   "desc" => "Erreur : Le fichier uploadé est trop gros (>100Ko)...");
		}

		//On formate le nom du fichier ici...
		$fichier = strtr($fichier,
		  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
		  'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
		$fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
		if(move_uploaded_file($_FILES['file']['tmp_name'], $dossier . $fichier)) //Si la fonction move_uploaded_file renvoie TRUE, c'est que ça a fonctionné...
		{
		  return array( "res" => 1,
						"desc" => $fichier);
		}
		else //Sinon (la fonction move_uploaded_file renvoie FALSE).
		{
		  return array( "res" => 0,
						"desc" => "Erreur : Le téléchargement du fichier a échoué...");
		}
	}
	else {
		return array( "res" => -1,
					  "desc" => "");
	}
}
?>
