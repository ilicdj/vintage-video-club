<?php 
    require_once "inc/header.php";
    require_once "app/classes/Korisnik.php";

    

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $entered_username =  $_POST['korisnik_username'];
        $entered_password = $_POST['korisnik_password'];

        $provera_podataka = $korisnik -> prijava_korisnika($entered_username, $entered_password);

        if(!$provera_podataka) {
            $_SESSION['message']['text'] = "Netacan username ili sifra!";
            header("Location: prijava.php");
            exit();
        }
        header("Location: index.php");
        exit();
    }
?>
<main data-barba="container" data-barba-namespace="prijava">
<section id="login">
    <div class="wrapper">
        <div class="big-wrapper">
            <div class="heading-wrapper">
                <h1>Prijava</h1>
                <img src="./public/images/star.gif" alt="star gif">
            </div>
            <form action="" method="POST">
                <div class="input-wrapper">
                    <label for="korisnik_username">Korisničko ime</label>
                    <input type="text" name="korisnik_username" id="korisnik_username">
                </div>
                <div class="input-wrapper">
                    <label for="korisnik_password">Šifra</label>
                    <input type="password" name="korisnik_password" id="korisnik_password">
                </div>
                <button type="submit">Potvrdi</button>
            </form>
        </div>
    </div>
</section>
<?php 
    require_once "inc/footer.php" 
?>