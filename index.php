
<?php include ('./include/head.php'); ?>
<?php include ('./include/header.php'); ?>

<?php
	if (isset ($pageId) ){
		if  ($pageId == 'accueil') {
			include ('./accueil.php');
		}
		else if ($pageId == 'admin') {
			include ('./admin/admin.php');
		}
		else if ($pageId == 'contact') {
			include ('./contact.php');
		}
		else if ($pageId=='liste'){
		    include('./liste.php');
        }
	}
	else {
		include ('./accueil.php');
	}
?>


<?php include ('./include/footer.php'); ?>
</body>
</html>
