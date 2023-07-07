<?php
 class MaConnexion{
    /*
    private $nomBaseDeDonnees = "";
    private $motDePasse = "";
    private $nomUtilisateur = "root";
    private $hote = "localhost";
    */
    private $nomBaseDeDonnees;
    private $motDePasse;
    private $nomUtilisateur;
    private $hote;
    private $connexionPDO;

    public function __construct($nomBaseDeDonnees, $motDePasse , $nomUtilisateur , $hote){
        
        $this->nomBaseDeDonnees = $nomBaseDeDonnees;
        $this->motDePasse = $motDePasse;
        $this->nomUtilisateur = $nomUtilisateur;
        $this->hote = $hote;
        
        try {
            $dsn = "mysql:host=$this->hote;dbname=$this->nomBaseDeDonnees;charset=utf8mb4";
            $this->connexionPDO = new PDO($dsn,$this->nomUtilisateur, $this->motDePasse);
            $this->connexionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           // echo "Connexion reussi";
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    public function select($table, $column){
        try {
            $requete = "SELECT $column from $table";
            $resultat = $this->connexionPDO->query($requete);
            $resultat = $resultat->fetchAll(PDO::FETCH_ASSOC);//Recupere le resultat de la requete dans un tableau associatif
            return $resultat;
        
        } catch (PDOException $e) {
            echo "Erreur : ".$e->getMessage();
        }    
    }
    
    public function selectArticles($id){
        try {
            $requete = "SELECT * from articles WHERE id = $id";
            $resultat = $this->connexionPDO->query($requete);
            $resultat = $resultat->fetchAll(PDO::FETCH_ASSOC);//Recupere le resultat de la requete dans un tableau associatif
            return $resultat;
        
        } catch (PDOException $e) {
            echo "Erreur : ".$e->getMessage();
        }    
    }
    
    public function insertionArticle_Secure($auteur,$titre,$résumé,$contenue1,$titre_2,$contenu_2,$titre_3,$contenu_3,$photo,$dateDePublication){
        try{
            $requete = "INSERT INTO articles (auteur,titre,résumé,contenue1,titre_2,contenu_2,titre_3,contenu_3,photo,dateDePublication)VALUES(:auteur,:titre,:résumé,:contenue1,:titre_2,:contenu_2,:titre_3,:contenu_3,:photo,:dateDePublication)";
            $requete_preparee = $this->connexionPDO->prepare($requete);
            
            $requete_preparee->bindParam(':auteur',$auteur,PDO::PARAM_STR);
            $requete_preparee->bindParam(':titre',$titre,PDO::PARAM_STR);
            $requete_preparee->bindParam(':résumé',$résumé,PDO::PARAM_STR);
            $requete_preparee->bindParam(':contenue1',$contenue1,PDO::PARAM_STR);
            $requete_preparee->bindParam(':titre_2',$titre_2,PDO::PARAM_STR);
            $requete_preparee->bindParam(':contenu_2',$contenu_2,PDO::PARAM_STR);
            $requete_preparee->bindParam(':titre_3',$titre_3,PDO::PARAM_STR);
            $requete_preparee->bindParam(':contenu_3',$contenu_3,PDO::PARAM_STR);
            $requete_preparee->bindParam(':photo',$photo,PDO::PARAM_STR);
            $requete_preparee->bindParam(':dateDePublication',$dateDePublication,PDO::PARAM_STR);
            
            $requete_preparee->execute();
            return"insersion reussie";
        } catch (PDOException $e){
            return $e->getMessage();
        }
    }

    public function insert_articles($titre, $résumé, $titre_2 , $contenue1, $titre_3, $contenu_2, $photo, $dateDePublication, $auteur, $contenu_3){
        try {

            $insertion = "INSERT INTO  `articles`(titre, résumé, titre_2 , contenue1, titre_3, contenu_2, photo, dateDePublication, auteur, contenu_3) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $requete = $this -> connexionPDO -> prepare($insertion);
            $requete->bindValue(1, $titre,PDO::PARAM_STR);
            $requete->bindValue(2, $résumé,PDO::PARAM_STR);
            $requete->bindValue(3, $titre_2,PDO::PARAM_STR);
            $requete->bindValue(4, $contenue1,PDO::PARAM_STR);
            $requete->bindValue(5, $titre_3,PDO::PARAM_STR);
            $requete->bindValue(6, $contenu_2);
            $requete->bindValue(7, $photo,PDO::PARAM_STR);
            $requete->bindValue(8, $dateDePublication,PDO::PARAM_STR);
            $requete->bindValue(9, $auteur,PDO::PARAM_STR);
            $requete->bindValue(10, $contenu_3,PDO::PARAM_STR);
            
        
            $requete->execute();

        } catch (PDOException $e) {

            echo "Erreur : " . $e->getMessage();

        }
    }
    
    
    public function miseAJour_Secure($table, $column, $newValue, $id)
    {
        try {
            $requete = "UPDATE $table SET $column  = ? WHERE ID_Produit = ?";
            $requete_preparee = $this->connexionPDO->prepare($requete);
            
            $requete_preparee->bindValue(1, $newValue, PDO::PARAM_STR);
            $requete_preparee->bindValue(2, $id, PDO::PARAM_INT);
            
            $requete_preparee->execute();
            return "mise à jour réussie";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function deleteArticle_Secure($id){
        try {
            $requete = "DELETE FROM articles WHERE ID_Client = :id";
            $requete_preparee = $this->connexionPDO->prepare($requete);
        
        $requete_preparee->bindParam(':id',$id,PDO::PARAM_INT);
        $requete_preparee->execute();
        return"insersion reussie";
        
        } catch (PDOException $e) {
            echo "Erreur : ".$e->getMessage();
        }    
    }

    public function selectArticleByID_Secure($id){
        try {
            $requete = "SELECT * FROM articles WHERE id = :id";
            $requete_preparee = $this->connexionPDO->prepare($requete);
            
        
        $requete_preparee->bindParam(':id',$id,PDO::PARAM_INT);
        $requete_preparee->execute();
        return"insersion reussie";
        
        } catch (PDOException $e) {
            echo "Erreur : ".$e->getMessage();
        }    
    }
 }

$salonMassage = new MaConnexion("salon de massage","","root","localhost");
$salonMassage->insert_articles("Article 5","Cupcake is good","Titre 2 Article 5","I love bear claw wafer chupa chups cheesecake pie jelly. Soufflé chocolate cheesecake cake fruitcake cookie I love sesame snaps cotton candy. Biscuit candy cake cotton candy toffee. Chupa chups cake lollipop pie gummi bears. Tootsie roll pudding donut icing jelly-o lollipop. ","Titre 3 Article 5","Chupa chups cake lollipop pie gummi bears. Tootsie roll pudding donut icing jelly-o lollipop. Candy I love cookie dragée jujubes I love. Candy canes shortbread I love dragée donut jelly. Jelly beans icing powder jelly beans oat cake. Gingerbread cake liquorice brownie toffee cake cupcake jelly-o. Cake cupcake shortbread I love I love marzipan. I love marshmallow cake pudding gummi bears. Powder chocolate bar liquorice apple pie chocolate cake tart pie. Halvah jujubes shortbread I love chocolate. ","image/massage35-1.jpg","2023-03-20","Francis Kuck","Chupa chups cake lollipop pie gummi bears. Tootsie roll pudding donut icing jelly-o lollipop. Candy I love cookie dragée jujubes I love. Candy canes shortbread I love dragée donut jelly. Jelly beans icing powder jelly beans oat cake. Gingerbread cake liquorice brownie toffee cake cupcake jelly-o. Cake cupcake shortbread I love I love marzipan. I love marshmallow cake pudding gummi bears. Powder chocolate bar liquorice apple pie chocolate cake tart pie. Halvah jujubes shortbread I love chocolate. ");


?>