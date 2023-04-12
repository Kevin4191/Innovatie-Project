<?php
        if(!isset($_POST['InnovatieShow'])){
            echo "
                <form action='index.php' method='post'>
                <input type='submit' id='InnovatieShow' name='InnovatieShow' value='Nieuw innovatie toevoegen'>
                </form>";
            echo "
                <form action='index.php' method='post'>
                <label for='categorie'>Categorie:</label><br>
                <select name='selectCategorie' id='selectCategorie'>";
                foreach ($categorieën as $categorie) {
                    echo "<option value='".$categorie->getId()."'>".$categorie->getNaam()."</option>";
                }
            echo "
                </select><br>
                <input type='submit' value='Selecteer hier uw categorie'>
                </form>";  
                if(array_key_exists('like', $_POST)) {
                    $Innovatie->updateRatingUp($innovatie['ID']);
                }
                else if(array_key_exists('dislike', $_POST)) {
                    $Innovatie->updateRatingDown($innovatie['ID']);
                }
            echo "
                <form action='index.php' method='post'>
                <input type='submit' id='RatingSort' name='RatingSort' value='Sorteer op Rating'>
                </form>";   
        }
        else{
            echo "
                <form action='index.php' method='post'>
                <input type='submit' id='ShowInnovatie' name='ShowInnovatie' value='Show Innovaties'>
                </form>";
            echo "
                <form action='index.php' method='post'>
                <label for='user'>User:</label><br>
                <select name='user' id='user'>";
                foreach ($users as $user) {
                    echo "<option value='".$user->getId()."'>".$user->getNaam()."</option>";
                }
            echo "
                </select><br>
                <label for='categorie'>Categorie:</label><br>
                <select name='categorie' id='categorie'>";
                foreach ($categorieën as $categorie) {
                    echo "<option value='".$categorie->getId()."'>".$categorie->getNaam()."</option>";
                }
            echo '
                </select><br>
                <label for="innovatie">Innovatie:</label><br>
                <input type="text" id="innovatie" name="innovatie"><br>
                <label for="datum">Datum:</label><br>
                <input type="date" id="datum" name="datum"><br>
                <input type="submit">
                </form>'; 
            echo "
                <form action='index.php' method='post'>
                <input type='submit' id='RatingSort' name='RatingSort' value='Sorteer op Rating'>
                </form>";
         }

    
