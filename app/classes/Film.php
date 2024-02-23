<?php

class Film {

    protected $conn;
    public function __construct(){
        global $conn;
        
        $this -> conn = $conn;
    }

    public function prikazi_sve_filmove() {
        $sql = "SELECT * FROM filmovi";
        
        $result = $this -> conn -> query($sql);

        return $result -> fetch_all(MYSQLI_ASSOC);
    }

    public function jedan_film($film_id) {

        $sql = "SELECT * FROM filmovi WHERE film_id = ?";
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> bind_param("i", $film_id);
        $stmt -> execute();
        $result = $stmt -> get_result();

        return $result -> fetch_assoc();
    }

    public function pretraga(){
        
    }
}