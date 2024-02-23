<?php

class Korisnik {
    protected $conn;

    public function __construct() {
        global $conn;

        $this -> conn = $conn;
    }

    public function registruj_korisnika($korisnik_ime,$korisnik_prezime,$korisnik_email,$korisnik_adresa,$korisnik_telefon,$korisnik_username,$korisnik_password) {

        $hashed_password = password_hash($korisnik_password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO korisnici (korisnik_ime,korisnik_prezime,korisnik_email,korisnik_adresa,korisnik_telefon,korisnik_username,korisnik_password) VALUES (?,?,?,?,?,?,?)";

        $stmt = $this -> conn -> prepare($sql);
        $stmt -> bind_param("sssssss",$korisnik_ime, $korisnik_prezime, $korisnik_email, $korisnik_adresa, $korisnik_telefon, $korisnik_username, $hashed_password);
        $result = $stmt -> execute();

        if($result) {
            $_SESSION['korisnik_id'] = $this -> conn -> insert_id;
            return true;
        }else{
            return false;
        }
    }

    public function prijava_korisnika($korisnik_username, $korisnik_password) {
        $sql = "SELECT korisnik_id, korisnik_password FROM korisnici WHERE korisnik_username = ?";

        $stmt = $this -> conn -> prepare($sql);
        $stmt -> bind_param("s", $korisnik_username);
        $stmt -> execute();

        $results = $stmt -> get_result();

        if($results -> num_rows == 1) {
            $korisnik = $results -> fetch_assoc();

            if(password_verify($korisnik_password, $korisnik['korisnik_password'])) {
                $_SESSION['korisnik_id'] = $korisnik['korisnik_id'];
                return true;
            }
        }
        return false;
    }

    public function is_logged() {
        if(isset($_SESSION['korisnik_id'])) {
            return true;
        } else {
            return false;
        }
    }

    public function odjava_korisnika() {
       unset($_SESSION['korisnik_id']);
    }

    public function showAlert($poruka) {
        echo '<script>alert("'.$poruka.'")</script>';
    }
}
