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
    
    public function select($id){
        try {
            $requete = "SELECT * from articles WHERE id = $id";
            $resultat = $this->connexionPDO->query($requete);
            $resultat = $resultat->fetchAll(PDO::FETCH_ASSOC);//Recupere le resultat de la requete dans un tableau associatif
            return $resultat;
        
        } catch (PDOException $e) {
            echo "Erreur : ".$e->getMessage();
        }    
    }
    
    public function insertionProduit_Secure($nom,$prix,$description){
        try{
            $requete = "INSERT INTO produit (Nom,Prix,Description)VALUES(:nom, :prix, :description)";
            $requete_preparee = $this->connexionPDO->prepare($requete);
            
            $requete_preparee->bindParam(':nom',$nom,PDO::PARAM_STR,25);//Values viséé, parametre concerné, indique si c est une chaine de caractere, taille de la chaine si s en ai une 
            $requete_preparee->bindParam(':prix',$prix,PDO::PARAM_STR,25);
            $requete_preparee->bindParam(':description',$description,PDO::PARAM_STR,25);
            
            $requete_preparee->execute();
            return"insersion reussie";
        } catch (PDOException $e){
            return $e->getMessage();
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

    public function deleteClient_Secure($id){
        try {
            $requete = "DELETE FROM client WHERE ID_Client = :id";
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


?>