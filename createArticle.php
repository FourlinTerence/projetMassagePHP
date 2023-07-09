<?php include_once ("INTconnexion.php"); 
$createArticles = new MaConnexion ("salon de massage","","root","localhost");
$createArticles->insertArticle_Secure($_POST['titre'],$_POST['auteur'],$_POST['résumé'],$_POST['contenue1'],$_POST['titre_2'],$_POST['contenu_2'],$_POST['titre_3'],$_POST['contenu_3'],$_POST['photo']);
header("Location: gestionArticle.php");
?>