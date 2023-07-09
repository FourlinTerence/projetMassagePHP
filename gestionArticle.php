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
                    foreach ($article as $uneDonnees) {
                        echo '<form method="POST" action="miseAJourArticle.php">
                        <tr>
                            <td><input type="text"  class="form-control" name="titre" value="' . $uneDonnees['titre'] . '" required></td>
                            <td><input type="text" class="form-control" name="auteur" value="' . $uneDonnees['auteur'] . '" required></td>
                            <td><input type="text" class="form-control" name="résumé" value="' . $uneDonnees['résumé'] . '" required></td>
                            <td><textarea  class="form-control" name="contenue1" required>' . $uneDonnees['contenue1'] . '</textarea></td>
                            <td><input type="text" class="form-control" name="titre_2" value="' . $uneDonnees['titre_2'] . '" required></td>
                            <td><textarea  class="form-control" name="contenu_2" required>' . $uneDonnees['contenu_2'] . '</textarea></td>
                            <td><input type="text" class="form-control" name="titre_3" value="' . $uneDonnees['titre_3'] . '" required></td>
                            <td><textarea class="form-control" name="contenu_3" required>' . $uneDonnees['contenu_3'] . '</textarea></td>
                            <td><input type="text" class="form-control" name="photo" value="' . $uneDonnees['photo'] . '" required></td>
                            <td><input type="text" class="form-control" name="dateDePublication" value="' . $uneDonnees['dateDePublication'] . '" required></td>
                            <td>
                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#fonctionCreate">Ajout</button>
                                <button type="submit" class="btn btn-outline-warning">Modif</button>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#fonctionDelete'.$uneDonnees['id'].'">Suppr</button>
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

    <!-- Modal Formulaire Create-->
    <form method="POST" action="createArticle.php">
        <div class="modal fade" id="fonctionCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title fs-5" id="exampleModalLabel">Creation d'article</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="modalCreatetitre">Titre de l'article</label>
                        <input id="modalCreatetitre" type="text" class="form-control" name="titre" placeholder="Titre de l'article" required>

                        <label for="modalCreateauteur">Auteur de l'article</label>
                        <input id="modalCreateauteur" type="text" class="form-control" name="auteur" placeholder="Auteur de l'article" required>

                        <label for="modalCreaterésumé">Résumé de l'article</label>
                        <input id="modalCreaterésumé" type="text" class="form-control" name="résumé" placeholder="résumé de l'article" required>

                        <label for="modalCreatecontenue1">Premier texte</label>
                        <textarea id="modalCreatecontenue1" class="form-control" name="contenue1" placeholder="Premier texte de l'article"></textarea>

                        <label for="modalCreatetitre_2">Titre 2 de l'article</label>
                        <input for="modalCreatetitre_2" type="text" class="form-control" name="titre_2" placeholder="Titre 2 de l'article" required>

                        <label for="modalCreatecontenu_2">Deuxieme texte</label>
                        <textarea id="modalCreatecontenu_2" class="form-control" name="contenu_2" placeholder="Deuxieme texte de l'article" required></textarea>

                        <label for="modalCreatetitre_3">Titre 3 de l'article</label>
                        <input id="modalCreatetitre_3" type="text" class="form-control" name="titre_3" placeholder="Titre 3 de l'article" required>

                        <label for="modalCreatecontenu_3">Troisieme texte</label>
                        <textarea id="modalCreatecontenu_3" class="form-control" name="contenu_3" placeholder="Troisieme texte de l'article" required></textarea>

                        <label for="modalCreatephoto">Lien vers l'image</label>
                        <input for="modalCreatephoto" type="text" class="form-control" name="photo" placeholder="Lien vers l'image" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Valider</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal Fonction Delete-->
    <?php
    foreach ($article as $uneDonnees){
    echo
    '<form method="POST" action="deleteArticle.php">
        <div class="modal fade" id="fonctionDelete'.$uneDonnees['id'].'" tabindex="-1" aria-labelledby="exampleModalLabel'.$uneDonnees['id'].'" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title fs-5" id="exampleModalLabel'.$uneDonnees['id'].'">Suppression d article</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Etes vous sur de vouloir effacer l article: '.$uneDonnees['titre'].' écrit par: '.$uneDonnees['auteur'].'?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </div>
                </div>
            </div>
        </div>
        <input  type="hidden" name="id" value="'.$uneDonnees['id'].'">
    </form>';
    }
    ?>
    
    <?php include("INCfooter.php") ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>