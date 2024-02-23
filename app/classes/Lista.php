<?php

require_once "app/classes/Korisnik.php";

$korisnik = new Korisnik();

class Lista{
    protected $conn;

    public function __construct(){   
        global $conn;

        $this -> conn = $conn;
    }

    public function dodaj_u_listu($korisnik_id, $film_id){
        $sql = "INSERT INTO lista (korisnik_id, film_id) VALUES(?,?)";

        $stmt = $this -> conn -> prepare($sql);
        $stmt -> bind_param("ii", $korisnik_id, $film_id);
        $stmt -> execute();
    }

    public function filmovi_u_listi() {
        $sql = "SELECT filmovi.film_id, filmovi.film_naziv
                FROM filmovi, lista
                WHERE (filmovi.film_id = lista.film_id) 
                AND lista.korisnik_id = ?";
        $stmt = $this -> conn -> prepare($sql);

        $stmt -> bind_param("i", $_SESSION['korisnik_id']);
        $stmt -> execute();
        $result = $stmt -> get_result();
        return $result -> fetch_all(MYSQLI_ASSOC);
    }

    public function brisanje_iz_liste($korisnik_id, $film_id) {
        $sql = "DELETE FROM lista WHERE korisnik_id = ? AND film_id = ?";

        $query = $this -> conn -> prepare($sql);
        $query -> bind_param("ii", $korisnik_id, $film_id);
        $query -> execute();
        
        if($query -> affected_rows > 0) {
            return true;
        }
    }

    public function brisanje_liste($korisnik_id) {
        $sql = "DELETE FROM lista WHERE korisnik_id = ?";
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> bind_param("i", $korisnik_id);
        $stmt->execute();
    }
}