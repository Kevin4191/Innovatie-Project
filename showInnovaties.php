<?php
    if(isset($_POST['selectCategorie'])){

        if ($innovaties) {
	
	        foreach ($innovaties as $Innovatie) {
                echo "<br>";
                echo "Id: ", $Innovatie['ID'], "<br>";
		        echo "User: ", $Innovatie['user'], "<br>";
                echo "Categorie: ", $Innovatie['categorie'], "<br>";
                echo "Innovatie: ", $Innovatie['innovatie'], "<br>";
                echo "Datum: ", $Innovatie['datum'], "<br>";
                echo "Rating: ", $Innovatie['rating'], "<br>";
                echo '
                <form method="post">
                <input type="submit" name="like"
                class="button" value="like" />
         
                <input type="submit" name="dislike"
                class="button" value="dislike" />
                </form>';
                
	        }
        }  
    }

    if(isset($_POST['RatingSort'])){
        $controller->getRating();
    }
?>