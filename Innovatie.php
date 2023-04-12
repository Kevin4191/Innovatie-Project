<?php
    class Innovatie
    {
        private $id;
        private $user;
        private $categorie;
        private $innovatie;
        private $datum;
        private $ratingMin;
        private $ratingPlus;

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


        function flush()
        {
            if(!empty($this->user) && !empty($this->datum) && !empty($this->categorie) && !empty($this->innovatie)){
                global $pdo;

                $sql = 'INSERT INTO innovatie(user, datum, categorie, innovatie, ratingPlus, ratingMin) VALUES(:user, :datum, :categorie, :innovatie, 0, 0)';

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

    }
    
?>