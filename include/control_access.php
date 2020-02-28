<?php
if(session_status() == PHP_SESSION_NONE){
	session_start();
}
if (!isset($_SESSION["connected"]) || !($_SESSION["connected"])) {
	exit("Vous n'avez pas la permission d'accéder à cette page...");
}
?>