<?php
session_start();
require_once "app/config/config.php";
require_once "app/classes/Korisnik.php";

// if(isset($_SESSION['korisnik_id'])){
//     echo "<h1>Logovan sam</h1>";
//     // unset($_SESSION['korisnik_id']);
// }else{
//     echo "<h1>Nisam logovan</h1>";
// }

$korisnik = new Korisnik();
?>
<?php
    if(isset($_SESSION['message'])){
        $korisnik -> showAlert($_SESSION["message"]["text"]);
        unset($_SESSION['message']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/universally.css">
    <title>VVC</title>
</head>
<body data-barba="wrapper">
    <!-- <form action="" method="GET">
        <button type="submit" id="movie-suggestion">Predloži film</button>
    </form> -->
    <!-- <div class="preloader">
        <div class="split"></div>
        <div class="split"></div>
        <div class="split"></div>
        <p id="title-preloader-split">VVC</p>
    </div> -->
    <div style="position:relative;">
        <header>
            <div class="wrapper">
                <nav>
                    <a href="./index.php">VVC</a>
                    <ul>
                        <li><a href="index.php">Pocetna</a></li>
                        <li><a href="filmovi.php">Filmovi</a></li>
                        <?php if(!$korisnik -> is_logged()): ?>
                            <li><a href="prijava.php">Prijava</a></li>
                            <li><a href="registracija.php">Registracija</a></li>
                        <?php else: ?>
                            <li><a href="lista.php">Lista</a></li>
                            <li><a href="odjava.php" data-barba-prevent="self">Log out</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </header>
    </div>
    <?php
    if(isset($_SESSION['message'])){
        echo '<div class="' . $_SESSION["message"]["type"] . '">' . $_SESSION["message"]["text"] . '</div>';
        unset($_SESSION['message']);
    }
    ?>