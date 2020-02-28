<?php
// connexion à la base de données
$host = 'localhost';
$user ='root';
$pwd = '';
$db_name = 'cochon_db';

$db = new mysqli($host, // nom du serveur
				 $user, // identifiant
				 $pwd, // mot de passe
				 $db_name // nom de la base de donnée
				);
?>
