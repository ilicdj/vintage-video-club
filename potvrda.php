<?php 
    require_once "inc/header.php";
    require_once "app/classes/Lista.php";

    if(!$korisnik->is_logged()) {
        header("Location: prijava.php");
        exit();
    }

    $lista = new Lista();
    $korisnik_lista = $lista -> filmovi_u_listi();
?>

<main data-barba="container" data-barba-namespace="potvrda">
    <section id="potvrda">
        <div class="wrapper">
            <h1>Checkout</h1>
            <form action="" method="POST">
                
            </form>
        </div>
    </section>

<?php require_once "inc/footer.php"; ?>