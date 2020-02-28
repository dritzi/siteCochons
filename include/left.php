<div class="col-sm-2 sidenav">
<?php
if (isset($_GET['pageId'])) {
	$pageId = $_GET['pageId'];
} 
else
{
	$pageId =  'accueil';
}
switch ($pageId) {
    case 'accueil':
?>
		<p><a href="https://www.cochondespres.fr/des-hommes-et-des-cochons-bio/" target="_blank">Factory n°1</a></p>
		<p><a href="https://www.facebook.com/Le-Cochon-de-Bretagne-163236227100925/" target="_blank">Factory n°2</a></p>
<?php
		echo '';
        break;
    case 'admin':
?>
		<p><a href="index.php?pageId=admin&item=cochon">Tous les cochons et cochonnes</a></p>
		<p><a href="index.php?pageId=admin&item=cochon&sexe=M">Les cochons</a></p>
		<p><a href="index.php?pageId=admin&item=cochon&sexe=F">Les cochonnes</a></p>
<?php
		echo '';
		break;
    case 'situer':
?>
		<p><a href="https://www.google.com/maps/dir//48.3004194,-3.0876122/@48.3004265,-3.0919896,16z/data=!3m1!4b1!4m2!4m1!3e0?hl=fr" target="_blank">Itinéraire</a></p>
<?php
		echo '';
        break;		
    default:
?>
		<p><a href="https://www.cochondespres.fr/des-hommes-et-des-cochons-bio/" target="_blank">Factory n°1</a></p>
		<p><a href="https://www.facebook.com/Le-Cochon-de-Bretagne-163236227100925/" target="_blank">Factory n°2</a></p>
<?php
		echo '';
}
?>	
</div>
