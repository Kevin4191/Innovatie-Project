<?php

class User{
    private $ID;
    private $naam;
    private $studentnummer;
    private $rol;
    private $username;
    private $password;

    function getId(){
        return $this->ID;
    }

    function getNaam(){
        return $this->Naam;
    }

    function getStudentNummer(){
        return $this->studentnummer;
    }

    function getRol(){
        return $this->rol;
    }

    function getUsername(){
        return $this->username;
    }

    function getPassword(){
        return $this->password;
    }


}

?>