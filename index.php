<?php 

require_once "inc/header.php"; 
?>
<main data-barba="container" data-barba-namespace="index">
<section id="hero">
    <div class="ball3"></div>
    <div class="wrapper">
    <svg width="53" height="49" viewBox="0 0 53 49" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path id="hero-svg-ch" d="M5.00977 20.7179C5.00977 25.2131 21.1859 44.1325 26.357 43.64C28.3266 43.4524 34.3876 26.1818 35.7183 23.8675C39.447 17.3829 43.1867 11.0495 47.5293 4.96997" stroke="#FBD008" stroke-width="9" stroke-linecap="round"/>
    </svg>
        <h1 id="hero-heading">
            Cuvamo kulturu video klubova
            <span><img src="./public/images/star.gif" alt="star-gif" id="hero-star"></span>
        </h1>
    </div>
    <svg id="hero-svg-line" width="984" height="17" viewBox="0 0 984 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M4.63989 11.5187C155.004 11.5187 305.368 11.5187 455.732 11.5187C589.515 11.5187 723.353 12.642 857.13 11.1687C898.108 10.7174 938.654 8.61822 979.439 5.21948" stroke="#FBD008" stroke-width="9" stroke-linecap="round"/>
    </svg>
</section>
<section id="about-club">
    <h2>O klubu</h2>
    <div class="wrapper">
        <div class="big-wrapper">
            <p>
                Vintage Video Klub, osnovan sredinom 80-ih godina, predstavlja vreme kada su videokasete bile nezamenjiv deo filmske zabave. U to vreme, ljubitelji filma nisu imali luksuz trenutnog strimovanja, već su se oslanjali na odlazak u video klub kako bi iznajmili svoje omiljene naslove.
            </p>
        </div>
    </div>
</section>
<section id="film-home">
    <div class="wrapper">
        <h2>Filmovi</h2>
        <div class="big-wrapper">
            <p>
                Ovaj simbol nostalgičnog doba, Vintage Video Klub, otvorio je svoja vrata kao oaza za filmofile, pružajući im priliku da istraže bogatstvo filmske kulture. Tokom godina, klub je evoluirao zajedno s tehnologijom, prelazeći s videokaseta na DVD-ove, a zatim i na digitalne platforme.
            </p>
            <div class="movie-images-wrapper">
                <img src="./public/images/movie1.png" alt="movie1">
                <img src="./public/images/movie2.png" alt="movie2">
                <img src="./public/images/movie3.png" alt="movie3">
                <img src="./public/images/movie4.png" alt="movie4">
                <img src="./public/images/movie5.png" alt="movie5">
                <img src="./public/images/movie6.png" alt="movie6">
            </div>
            <div class="caption">
                <div class="caption-info">
                    <a href="filmovi.php"><h3>Filmovi</h3></a>
                    <span>svih generacija</span>
                </div>
                <a href="filmovi.php">
                    <svg width="131" height="54" viewBox="0 0 131 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 25.1045H118.32" stroke="#2F68DC" stroke-width="10" stroke-linecap="round"/>
                        <path d="M97.1407 5.28638C99.3711 5.55884 101.498 7.37436 103.456 8.69012C108.142 11.8387 112.497 15.6077 117.023 19.1345C117.524 19.525 127.451 25.3735 124.761 26.688C120.374 28.8317 116.033 31.5366 112.009 34.7078C107.931 37.9219 104.427 42.0557 100.541 45.6185C99.734 46.3585 98.7096 46.8009 98.3899 48.0897" stroke="#2F68DC" stroke-width="10" stroke-linecap="round"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>
<?php if(!$korisnik -> is_logged()): ?>
<section id="register-or-login">
    <div class="wrapper">
        <a href="registracija.php" class="rol-wrapper">
            <h3>Registracija</h3>
            <img src="./public/images/star.gif" alt="star gif">
        </a>
        <a href="prijava.php" class="rol-wrapper">
            <h3>Prijava</h3>
            <img src="./public/images/star.gif" alt="star gif">
        </a>
    </div>
</section>
<?php endif; ?>
<?php require_once "inc/footer.php"; ?>