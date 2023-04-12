<?php
    class Categorie
    {
        private $ID;
        private $Naam;
        private $innovaties;

        function getId(){
            return $this->ID;
        }

        function getNaam(){
            return $this->Naam;
        }

        function getInnovaties($categorie){
            global $pdo;
    
            $sql = 'SELECT innovatie.ID, user.Naam as user, innovatie, categorieën.naam as categorie, datum, ratingMin, ratingPlus 
            FROM innovatie
            INNER JOIN categorieën on innovatie.categorie = categorieën.ID
            INNER JOIN user on innovatie.user = user.ID
            WHERE categorie = :cat';
    
            $statement = $pdo->prepare($sql);

            $statement->execute([
                ':cat' => $categorie
            ]); 
            
            
            $innovaties = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $innovaties;
        }

        function searchInnovaties(){
            if(isset($_POST['selectCategorie'])){
            
                $categorieid = filter_input(INPUT_POST, 'selectCategorie');
    
                $this->innovaties = $this->getInnovaties($categorieid); 
                
                return $this->innovaties;
    
            }
        }

    }
    ?>