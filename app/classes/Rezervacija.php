<?php

class Rezervacija extends Lista{
    protected $conn;

    public function __construct(){   
        global $conn;
        $this -> conn = $conn;
    }

    public function potvrdi_rezervaciju($korisnik_id,$filmovi_za_iznajmljivanje,$trenutni_datum, $datum_povratka){
        $sql = "INSERT INTO iznajmljivanja(korisnik_id, filmovi_za_iznajmljivanje, datum_iznajmljivanja, datum_povratka)
                            VALUES(?,?,?,?)";

        $stmt = $this -> conn -> prepare($sql);
        $stmt -> bind_param("isss", $korisnik_id, $filmovi_za_iznajmljivanje, $trenutni_datum, $datum_povratka);
        $result = $stmt -> execute();

        $this->brisanje_liste($korisnik_id);
        return $result;
    }    
}