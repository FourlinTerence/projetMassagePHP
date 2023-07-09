<?php include_once ("INTconnexion.php"); 
$deleteArticles = new MaConnexion ("salon de massage","","root","localhost");
$deleteArticles->deleteArticle_Secure($_POST['id']);
header("Location: gestionArticle.php");
?>