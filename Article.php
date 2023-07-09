<?php include ("INTconnexion.php");
 if(isset($_POST['id'])){
    $article = $salonMassage->selectArticles($_POST['id']);
}else{ $article = $salonMassage->selectArticles(1);} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blog massage: <?php echo $article[0]['titre']?></title>
    <link rel="shortcut icon" href="image/icon01.png" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    


<?php include ("INCnavbar.php"); 
echo '<div class="premierePartieArticle">
        <h1>'.$article[0]['titre'].'</h1>
        <p>Published on '.$article[0]['dateDePublication'].'</p>
    </div>;

<section class="deuxiemePartieArticle">
        <p>'.$article[0]['contenue1'].'</p>

        <h2>'.$article[0]['titre_2'].'</h2>
        <p>'.$article[0]['contenu_2'].'</p>
        
        <h3>'.$article[0]['titre_3'].'</h3>
        <p>'.$article[0]['contenu_3'].'</p>
        
        <img src="'.$article[0]['photo'].'" alt="">
        
        <h4>HEADING 3</h4>
        <p>Cheesecake lemon drops cookie icing oat cake topping lollipop. Dessert donut bonbon cookie lemon drops halvah. Donut sweet roll shortbread cotton candy cookie. Cheesecake macaroon soufflé chocolate cake biscuit. Sweet chocolate cake sugar plum lollipop carrot cake. Marzipan icing jujubes brownie bear claw muffin tootsie roll. Fruitcake lemon drops chupa chups liquorice marshmallow cake marshmallow. Shortbread lollipop chocolate marshmallow biscuit. Wafer brownie marshmallow sesame snaps jelly tootsie roll. Marshmallow cupcake sweet pudding muffin. Caramels icing sweet</p>
        
        <h5>HEADING 4</h5>
        <p>Cheesecake lemon drops cookie icing oat cake topping lollipop. Dessert donut bonbon cookie lemon drops halvah. Donut sweet roll shortbread cotton candy cookie. Cheesecake macaroon soufflé chocolate cake biscuit. Sweet chocolate cake sugar plum lollipop carrot cake. Marzipan icing jujubes brownie bear claw muffin tootsie roll. Fruitcake lemon drops chupa chups liquorice marshmallow cake marshmallow. Shortbread lollipop chocolate marshmallow biscuit. Wafer brownie marshmallow sesame snaps jelly tootsie roll. Marshmallow cupcake sweet pudding muffin. Caramels icing sweet</p>
        
        <h6>HEADING 5</h6>
        <p>Cheesecake lemon drops cookie icing oat cake topping lollipop. Dessert donut bonbon cookie lemon drops halvah. Donut sweet roll shortbread cotton candy cookie. Cheesecake macaroon soufflé chocolate cake biscuit. Sweet chocolate cake sugar plum lollipop carrot cake. Marzipan icing jujubes brownie bear claw muffin tootsie roll. Fruitcake lemon drops chupa chups liquorice marshmallow cake marshmallow. Shortbread lollipop chocolate marshmallow biscuit. Wafer brownie marshmallow sesame snaps jelly tootsie roll. Marshmallow cupcake sweet pudding muffin. Caramels icing sweet</p>
    </section>';
    ?>
    </body>
    <?php include ("INCfooter.php");?>
</html>