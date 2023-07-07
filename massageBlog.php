<?php include("INTconnexion.php"); ?>
<!DOCTYPE html>
<html lang="en">
<?php include("INChead.php"); ?>

<body>
    <?php include("INCnavbar.php"); ?>
    <div class="premierePartieBlog">
        <p>Our blog</p>
        <h1>Lasted News from Us</h1>
    </div>
    <section class="deuxiemePartieBlog">
        <?php
        $article = $salonMassage->select("articles", "*");

        foreach ($article as $uneDonnees) {
            echo '<form method="POST" action="Article.php">
   
   
        <div class="carteAvecBouton">
            <img src="' . $uneDonnees['photo'] . '" alt="">
            <p class="texteCarteAvecBouton">' . $uneDonnees['résumé'] . '</p>
            <p class="texteItalique">by ' . $uneDonnees['auteur'] . '</p>
            <input class="boutonCarte" type="submit" name="" id="" value="read more">
            <input  type="hidden" class="form-control" name="id" value="' . $uneDonnees['id'] . '">        
        </div>
    </form>';
        }
        ?>
    </section>

        <?php include("INCfooter.php"); ?>
</body>

</html>