<?php include_once("INTconnexion.php") ?>
<!DOCTYPE html>
<html lang="en">
<?php include("INChead.php") ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

<body>
    <?php include("INCnavbar.php") ?>
    <div class="premierePartieBlog">
        <h1>Gestion des articles</h1>
    </div>
    <div class="tableWarper">
        <div class="partieAdmin">
            <table>
                <thead>
                    <th>Titre article:</th>
                    <th>Auteur:</th>
                    <th>Résumé de l'article :</th>
                    <th>Premier texte :</th>
                    <th>Titre 2 :</th>
                    <th>Deuxieme texte :</th>
                    <th>Titre 3 :</th>
                    <th>Troisieme texte :</th>
                    <th>Lien vers photo :</th>
                    <th>Date et heure de publication :</th>
                    <th>Action</th>
                </thead>
                <tbody>
                
                <!-- TABLEAU DYNAMIQUE ET INTERACTIF -->
                <?php
                $article = $salonMassage->select("articles", "*");
                foreach ($article as $uneDonnees){
              echo '<form method="POST" action="miseAJourArticle.php">
                        <tr>
                            <td><input type="text"  class="form-control" name="titre" value="'.$uneDonnees['titre'].'" required></td>
                            <td><input type="text" class="form-control" name="auteur" value="'.$uneDonnees['auteur'].'" required></td>
                            <td><input type="text" class="form-control" name="résumé" value="'.$uneDonnees['résumé'].'" required></td>
                            <td><textarea  class="form-control" name="contenue1" required>'.$uneDonnees['contenue1'].'</textarea></td>
                            <td><input type="text" class="form-control" name="titre_2" value="'.$uneDonnees['titre_2'].'" required></td>
                            <td><textarea  class="form-control" name="contenu_2" required>'.$uneDonnees['contenu_2'].'</textarea></td>
                            <td><input type="text" class="form-control" name="titre_3" value="'.$uneDonnees['titre_3'].'" required></td>
                            <td><textarea class="form-control" name="contenu_3" required>'.$uneDonnees['contenu_3'].'</textarea></td>
                            <td><input type="text" class="form-control" name="photo" value="'.$uneDonnees['photo'].'" required></td>
                            <td><input type="text" class="form-control" name="dateDePublication" value="'.$uneDonnees['dateDePublication'].'" required></td>
                            <td>
                                <button type="button" class="btn btn-outline-success">Ajout</button>
                                <button type="submit" class="btn btn-outline-warning">Modif</button>
                                <button type="button" class="btn btn-outline-danger">Suppr</button>
                            </td>
                        </tr>
                        <input  type="hidden" name="id" value="'.$uneDonnees['id'].'">
                    </form>';
                }
                ?>
                </tbody>

            </table>
        </div>
    </div>
    <?php include("INCfooter.php") ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>