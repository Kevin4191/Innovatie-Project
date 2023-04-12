<?php   
    session_start();
    require 'controller.php'; 
    require 'categorie.php';
    require 'connect.php';
    require 'user.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    if(isset($_SESSION['Valid'])){
        if($_SESSION['Valid'] == True){
            $controller = new Controller();
            $categorie = new Categorie();

            $categorieën = $controller->getCategorieën();
            $users = $controller->getUsers();
            
            $innovaties = $controller->setInnovaties();
            $ID = $categorie->getId();
            $innovaties = $categorie->searchInnovaties();

            include('form.php');
            include('showInnovaties.php');
        }
        else{
            if(isset($_POST['logIn'])){
                $_SESSION['Valid'] = '';
                $username = filter_input(INPUT_POST, 'Username');
                $password = filter_input(INPUT_POST, 'Password');

                $controller = new Controller();
                $users = $controller->getUsers();
                foreach ($users as $user){
                    $cUsername = $user->getUsername();
                    $cPassword = $user->getPassword();
                    if($cUsername == $username && $cPassword == $password){
                        $_SESSION['Valid'] = True;
                        echo "
                        <form action='index.php' method='post'>
                        <input type='submit' id='InnovatieShow' name='InnovatieShow' value='Nieuw innovatie toevoegen'>
                        </form>";
                    }
                    
                }
                if($_SESSION['Valid'] != True){
                    include('logIn.php');
                    echo "Wrong credentials, try again.";
                }
            }
        }
    }
    else{
        include('logIn.php');
        $_SESSION['Valid'] = False;
    }
?>
</body>
</html>