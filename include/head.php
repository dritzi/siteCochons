<!DOCTYPE html>
<?php
if (isset($_GET['pageId'])) {
	$pageId = $_GET['pageId'];
}
else
{
	$pageId =  'accueil';
}
// Initialisation de la variable $title
switch ($pageId){
	case 'accueil':
		$title = "Site cochon - Accueil";
		break;
	case 'cochons':
		$title = "Site cochon - Mes cochons";
		break;
	case 'societe':
		$title = "Site cochon - Nous situer";
		break;
	case 'gestion':
	    $title="Site cochon -La gestion";
	    break;
	default :
		$title = "Usine à cochons";
}
?>
<html lang="fr">
<head>
  <title><?php echo $title ?></title>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html;charset=utf8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.1/js/jquery.tablesorter.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.1/js/extras/jquery.tablesorter.pager.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.1/css/theme.default.min.css" rel="stylesheet" media="all" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.1/css/jquery.tablesorter.pager.min.css" rel="stylesheet" media="all" type="text/css">
  <link rel="stylesheet" href="css/style.css" rel="stylesheet" media="all" type="text/css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
