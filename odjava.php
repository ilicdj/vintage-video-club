<?php
session_start();
require_once "app/config/config.php";
require_once "app/classes/Korisnik.php";

$korisnik = new Korisnik();

$korisnik -> odjava_korisnika();

header("Location:index.php");
exit();
