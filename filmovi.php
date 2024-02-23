<?php 
    require_once "inc/header.php";
    require_once "app/classes/Film.php";

    $filmovi = new Film();

    $filmovi = $filmovi -> prikazi_sve_filmove();

?>
<main data-barba="container" data-barba-namespace="filmovi">
<section id="filmovi">
    <div class="wrapper">
        <h1>Filmovi</h1>
        <!-- <div class="pretraga-wrapper">
            <form action="" method="get">
                <div class="input-wrapper">
                    <label for="movie_name">Naziv</label>
                    <input type="text" name="movie_name" id="movie_name">
                </div>
                <div class="checkboxes-wrapper">
                    <div class="checkboxes">
                        <input type="checkbox" name="ljubavni" id="ljubavni">
                        <label for="ljubavni">Ljubavni</label>
                    </div>
                    <div class="checkboxes">
                        <input type="checkbox" name="komedija" id="komedija">
                        <label for="komedija">Komedija</label>
                    </div>
                    <div class="checkboxes">
                        <input type="checkbox" name="triler" id="triler">
                        <label for="triler">Triler</label>
                    </div>
                    <div class="checkboxes">
                        <input type="checkbox" name="misterija" id="misterija">
                        <label for="misterija">Misterija</label>
                    </div>
                    <div class="checkboxes">
                        <input type="checkbox" name="avantura" id="avantura">
                        <label for="avantura">Avantura</label>
                    </div>
                    <div class="checkboxes">
                        <input type="checkbox" name="naucna_fantastika" id="naucna_fantastika">
                        <label for="naucna_fantastika">Naučna fantastika</label>
                    </div>
                </div>
                <button type="submit">Filtriraj</button>
            </form>
        </div> -->
        <div class="filmovi-output">
            <div class="wrapper">
                <div class="big-wrapper">
                    <div class="all-searched">
                        <?php foreach ($filmovi as $film): ?>
                        <div class="film-info-wrapper">
                            <img src="public/images/<?= $film['film_slika'] ?>" alt="">
                            <h2><?= $film['film_naziv'] ?></h2>
                            <a  href="opis-filma.php?film_id=<?= $film['film_id'] ?>">
                                <svg width="131" height="54" viewBox="0 0 131 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 25.1045H118.32" stroke="#2F68DC" stroke-width="10" stroke-linecap="round"/>
                                    <path d="M97.1407 5.28638C99.3711 5.55884 101.498 7.37436 103.456 8.69012C108.142 11.8387 112.497 15.6077 117.023 19.1345C117.524 19.525 127.451 25.3735 124.761 26.688C120.374 28.8317 116.033 31.5366 112.009 34.7078C107.931 37.9219 104.427 42.0557 100.541 45.6185C99.734 46.3585 98.7096 46.8009 98.3899 48.0897" stroke="#2F68DC" stroke-width="10" stroke-linecap="round"/>
                                </svg>
                            </a>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once "inc/footer.php" ?>
