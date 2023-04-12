<?php

class Controller
{
    function setInnovaties()
    {
        include("innovatie.php");

        if(isset($_POST['user']) && isset($_POST['categorie']) && isset($_POST['innovatie']) && isset($_POST['datum'])){
            
            $id = filter_input(INPUT_POST, 'ID');
            $user = filter_input(INPUT_POST, 'user');
            $categorie = filter_input(INPUT_POST, 'categorie');
            $innovatie = filter_input(INPUT_POST, 'innovatie');
            $datum = filter_input(INPUT_POST, 'datum');

            $innovatieC = new Innovatie();

            $innovatieC->setId($id);
            $innovatieC->setUser($user);
            $innovatieC->setCategorie($categorie);
            $innovatieC->setInnovatie($innovatie);
            $innovatieC->setDatum($datum);
            $innovatieC->flush();

           

        }
    }

    function getCategorieën()
    {
        global $pdo;

        $sql = 'SELECT * FROM categorieën';

        $statement = $pdo->query($sql);

        $categorieën = $statement->fetchAll(PDO::FETCH_CLASS, 'Categorie');
        return $categorieën;
    }

    function getUsers()
    {
        global $pdo;

        $sql = 'SELECT * FROM user';

        $statement = $pdo->query($sql);

        $users = $statement->fetchAll(PDO::FETCH_CLASS, 'User');
        return $users;
    }

    function getRating($ratingState)
    {
        global $pdo;

        if($ratingState == 'hl'){
            $sql = 'SELECT innovatie.ID, user.Naam as user, innovatie, categorieën.naam as categorie, datum, ratingMin, ratingPlus 
                    FROM innovatie
                    INNER JOIN categorieën on innovatie.categorie = categorieën.ID
                    INNER JOIN user on innovatie.user = user.ID
                    ORDER BY ratingPlus DESC';
        }
        elseif($ratingState == 'lh'){
            $sql = 'SELECT innovatie.ID, user.Naam as user, innovatie, categorieën.naam as categorie, datum, ratingMin, ratingPlus 
                FROM innovatie
                INNER JOIN categorieën on innovatie.categorie = categorieën.ID
                INNER JOIN user on innovatie.user = user.ID
                ORDER BY ratingPlus ASC';
        }

        $statement = $pdo->query($sql);

        $rating = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($rating as $row){
            echo "<br>";
                echo "Id: ", $row['ID'], "<br>";
		        echo "User: ", $row['user'], "<br>";
                echo "Categorie: ", $row['categorie'], "<br>";
                echo "Innovatie: ", $row['innovatie'], "<br>";
                echo "Datum: ", $row['datum'], "<br>";
                echo "Like: ", $row['ratingPlus'], "<br>";
                echo "Dislike: ", $row['ratingMin'], "<br>";
                echo '
                <form method="post"><input type="hidden" name="id"
                value="'.$row['ID'].'">
                <input type="submit" name="like"
                class="button" value="like" />
                </form>';

                echo '
                <form method="post"> <input type="hidden" name="id"
                value="'.$row['ID'].'">
                <input type="submit" name="dislike"
                class="button" value="dislike" />
                </form>';               
        }
    }

    function updateLike($ID){
        global $pdo;

        $sql = 'UPDATE innovatie SET ratingPlus = ratingPlus + 1 WHERE innovatie.ID = :id';

        $statement = $pdo->prepare($sql);

        $statement->execute([
            ':id' => $ID
        ]); 
    }

    function updateDislike($ID){
        global $pdo;

        $sql = 'UPDATE innovatie SET ratingMin = ratingMin + 1 WHERE innovatie.ID = :id';

        $statement = $pdo->prepare($sql);

        $statement->execute([
            ':id' => $ID
        ]); 
    }
}

?>