<?php 
    require_once "inc/header.php";
    require_once "app/classes/Korisnik.php";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $korisnik_ime = $_POST['korisnik_ime'];
        $korisnik_prezime = $_POST['korisnik_prezime'];
        $korisnik_email = $_POST['korisnik_email'];
        $korisnik_adresa = $_POST['korisnik_adresa'];
        $korisnik_telefon = $_POST['korisnik_telefon'];
        $korisnik_username = $_POST['korisnik_username'];
        $korisnik_password = $_POST['korisnik_password'];

        $registrovan = $korisnik -> registruj_korisnika($korisnik_ime, $korisnik_prezime, $korisnik_email, $korisnik_adresa, $korisnik_telefon, $korisnik_username, $korisnik_password);

        if($registrovan) {
            $_SESSION['message']['text'] = "Uspesno registrovan nalog!";
            header("Location: index.php");
            exit();
        } else{
            $_SESSION['message']['text'] = "Greska pri registraciji!";
            header("Location: register.php");
            exit();
        }
    }

?>
<main data-barba="container" data-barba-namespace="registracija">
    <section id="register">
        <div class="wrapper">
            <div class="big-wrapper">
                <div class="heading-wrapper">
                    <h1>Registracija</h1>
                    <img src="./public/images/star.gif" alt="star gif">
                </div>
                <form action="" method="POST">
                    <div class="left">
                        <div class="input-wrapper">
                            <label for="korisnik_ime">Ime</label>
                            <input type="text" name="korisnik_ime" id="korisnik_ime" required>
                        </div>
                        <div class="input-wrapper">
                            <label for="korisnik_prezime">Prezime</label>
                            <input type="text" name="korisnik_prezime" id="korisnik_prezime" required>
                        </div>
                        <div class="input-wrapper">
                            <label for="korisnik_email">Email</label>
                            <input type="text" name="korisnik_email" id="korisnik_email" required>
                        </div>
                        <div class="input-wrapper">
                            <label for="korisnik_adresa">Adresa</label>
                            <input type="text" name="korisnik_adresa" id="korisnik_adresa" required>
                        </div>
                        <div class="input-wrapper">
                            <label for="korisnik_telefon">Telefon</label>
                            <input type="text" name="korisnik_telefon" id="korisnik_telefon" required>
                        </div>
                    </div>
                    <div class="right">
                        <div class="input-wrapper">
                            <label for="korisnik_username">Korisničko ime</label>
                            <input type="text" name="korisnik_username" id="korisnik_username" required>
                        </div>
                        <div class="input-wrapper">
                            <label for="korisnik_password">Šifra</label>
                            <input type="text" name="korisnik_password" id="korisnik_password" required>
                        </div>
                        <button type="submit">Potvrdi</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
<?php require_once "inc/footer.php"; ?>