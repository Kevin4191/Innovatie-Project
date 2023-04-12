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
                echo "Like: ", $Innovatie['ratingPlus'], "<br>";
                echo "Dislike: ", $Innovatie['ratingMin'], "<br>";
                echo '
                <form method="post"><input type="hidden" name="id"
                value="'.$Innovatie['ID'].'">
                <input type="submit" name="like"
                class="button" value="like" />
                </form>';

                echo '
                <form method="post"> <input type="hidden" name="id"
                value="'.$Innovatie['ID'].'">
                <input type="submit" name="dislike"
                class="button" value="dislike" />
                </form>';
            

	        }
        } 
    }

    if(isset($_POST['RatingSort'])){
        $controller->getRating($_POST['rating']);
    }

    if(isset($_POST['like'])){
        $controller->updateLike($_POST['id']);
    }
    
    
    if(isset($_POST['dislike'])){
        $controller->updateDislike($_POST['id']);
    } 

     
?>