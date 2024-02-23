<?php 
require_once "inc/header.php"; 
require_once "app/classes/Lista.php";
require_once "app/classes/Korisnik.php";
require_once "app/classes/Rezervacija.php";

if(!$korisnik -> is_logged()) {
    header("Location: index.php");
    exit();
}

$lista = new Lista();
$korisnik_lista = $lista -> filmovi_u_listi();

if($_SERVER['REQUEST_METHOD'] == "GET" AND isset($_GET['film_id'])) {
    $korisnik_id = $_SESSION['korisnik_id'];
    $film_id_za_brisanje = $_GET['film_id'];

    $obrisan_provera = $lista -> brisanje_iz_liste($korisnik_id, $film_id_za_brisanje);

    if($obrisan_provera) {
        $korisnik_lista = $lista -> filmovi_u_listi();
    } else{
        echo "Doslo je do greske";
    }
}

$trenutni_datum = date("d.m.Y.");
$datum_povratka = date("d.m.Y.", strtotime("+7 days"));
$filmovi_za_iznajmljivanje = '';

$film_nazivi = array_column($korisnik_lista, 'film_naziv');

$filmovi_za_iznajmljivanje = implode(', ', $film_nazivi);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $korisnik_id = $_SESSION['korisnik_id'];
    $rezervacija = new Rezervacija();

    $rezervacija = $rezervacija -> potvrdi_rezervaciju($korisnik_id,$filmovi_za_iznajmljivanje,$trenutni_datum, $datum_povratka);

    if($rezervacija){
        echo "<script>alert('Uspesno ste rezervisali!')</script>";
    } else{
        echo "<script>alert('Greska pri rezervaciji, probajte ponovo!')</script>";
    }
} 

?>

<main data-barba="container" data-barba-namespace="lista">
    <section id="lista">
        <div class="wrapper">      
            <?php if(!$korisnik_lista == 0): ?>
                <h1>Lista</h1>
                <div class="all-listed">
                <?php foreach($korisnik_lista as $lista_film): ?>
                    <div class="listed-movies-wrapper">
                        <h2><?= $lista_film['film_naziv'] ?></h2>
                        <form action="" method="GET">
                            <input type="hidden" name="film_id" value="<?= $lista_film['film_id'] ?>">
                            <button type="submit">X</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="listed-info">
                <h3>Iznajmljivanje: <?= $trenutni_datum ?></h3>
                <h3>Datum povratka: <?= $datum_povratka ?></h3>
                <h3>Rezervacija traje do danas u 19:00h.</h3>
            </div>
            <form action="" method="POST">
                <button id="potvrda-btn" type="submit">Potvrdi rezervaciju</button>
            </form>
            <?php else: ?>
                <div class="empty-list-wrapper">
                    <img src="public/images/prazna_lista.png" alt="prazna-lista">
                </div>
            <?php endif; ?>
        </div>
    </section>

<?php require_once "inc/footer.php"; ?>