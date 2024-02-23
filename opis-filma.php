<?php 
    require_once "inc/header.php";
    require_once "app/classes/Film.php";
    require_once "app/classes/Lista.php";

    $film = new Film();
    $film = $film -> jedan_film($_GET['film_id']);

    if($_SERVER['REQUEST_METHOD'] == "POST") {

        if(isset($_SESSION['korisnik_id'])){
            $trenutni_korisnik_id = $_SESSION['korisnik_id'];
            $izabrani_film_id = $_GET['film_id'];
            $lista = new Lista();
            $dodato_u_listu = $lista -> dodaj_u_listu($trenutni_korisnik_id, $izabrani_film_id);
        }
        else{
            header("Location: prijava.php");
            exit();
        }
    }
?>
<main data-barba="container" data-barba-namespace="jedan-film">
<div id="opis-filma">
    <div class="wrapper">
        <div class="big-wrapper">
            <h1><?= $film['film_naziv'] ?></h1>
            <div class="opis-filma-wrapper">
                <div class="film-info">
                    <p>Reditelj: <?= $film['film_reditelj'] ?></p>
                    <p>Film traje: <?= $film['film_trajanje'] ?>min</p>
                    <p>Premijera: <?= $film['film_premijera'] ?></p>
                </div>
                <p id="film-description"><?= $film['film_opis'] ?></p>
                <form action="" method="POST">
                    <button type="submit">Dodaj u listu</button>
                </form>
                <a href="filmovi.php">Svi filmovi</a>
                <!-- <br>
                <br>
                <br> -->
                <?php
                    if(isset($_SESSION['korisnik_id'])){
                        echo "<a href='lista.php'>Lista filmova</a>";
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<?php require_once "inc/footer.php";?>