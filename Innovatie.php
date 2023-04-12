<?php
    class Innovatie
    {
        private $id;
        private $user;
        private $categorie;
        private $innovatie;
        private $datum;
        private $rating;

        function getId()
        {
            return $this->id;
        }

        function setId($id)
        {
            $this->id=$id;
        }

        function getUser()
        {
            return $this->user;
        }

        function setUser($user)
        {
            $this->user=$user;
        }

        function getCategorie()
        {
            return $this->categorie;
        }

        function setCategorie($categorie)
        {
            $this->categorie=$categorie;
        }

        function getInnovatie()
        {
            return $this->innovatie;
        }

        function setInnovatie($innovatie)
        {
            $this->innovatie=$innovatie;
        }

        function getDatum()
        {
            return $this->datum;
        }

        function setDatum($datum)
        {
            $this->datum=$datum;
        }

        function getRating()
        {
            return $this->rating;
        }

        function setRating($rating)
        {
            $this->rating=$rating;
        }

        function flush()
        {
            if(!empty($this->user) && !empty($this->datum) && !empty($this->categorie) && !empty($this->innovatie)){
                global $pdo;

                $sql = 'INSERT INTO innovatie(user, datum, categorie, innovatie, rating) VALUES(:user, :datum, :categorie, :innovatie, 0)';

                $statement = $pdo->prepare($sql);

                $statement->execute([
                    ':user' => $this->user,
                    ':datum' => $this->datum,
                    ':categorie' => $this->categorie,
                    ':innovatie' => $this->innovatie
                ]);

                $innovatie_id = $pdo->LastInsertId();
                $this->id = $innovatie_id;

                echo '<br>Het id van de nieuwe innovatie ' . $innovatie_id . ' is toegevoegd:';
            }
        }

        function updateRatingUp($ID){
            global $pdo;

            $sql = 'UPDATE innovatie SET rating = rating + 1 WHERE innovatie.ID = :id';

            $statement = $pdo->prepare($sql);

            $statement->execute([
                ':id' => $ID
            ]); 
        }

        function updateRatingDown($ID){
            global $pdo;

            $sql = 'UPDATE innovatie SET rating = rating - 1 WHERE innovatie.ID = :id';

            $statement = $pdo->prepare($sql);

            $statement->execute([
                ':id' => $ID
            ]); 
        }
    }
    
?>