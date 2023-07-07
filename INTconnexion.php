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
            $requete = "DELETE FROM articles WHERE id = :id";
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
$salonMassage->deleteArticle_Secure(7);


?>