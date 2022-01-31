<?php

include_once('./php/main.php');
include_once('./php/initdb.php');
session_start();

// Ukoliko je sesija aktivna, brise je.
if (isset($_SESSION['username'])) {
    unset($_SESSION['username']);
}

//Proverava da li korisnik postoji u bazi i da li se uneti podaci slazu sa tim podacima iz baze. Ukoliko je TRUE, kreira se sesija i prazni se korpa.
if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($connection->proveriKorisnika($_POST['username'], $_POST['password'])) {
        $_SESSION['username'] = $_POST['username'];
        include_once('./korpa.php');
        $korpa->isprazniKorpu();
        header('Location: ./index.php');
    }
    $greska = true;
}

// Prikazuje gresku prilikom unosa pogresnih podataka i zaobilazi gresku prilikom ojave.
if(isset($_POST['username'])) {
    if (!$connection->proveriKorisnika($_POST['username'], $_POST['password'])) {
        $poruka_error = "Uneli ste pogresne podatke!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knjizara | Nikola Mitic</title>
    <link rel="stylesheet" href='./css/main.css'>
</head>

<body>
    <?php include_once 'php/header.php'; ?>
    <nav>
        <ul>
            <?php include_once 'php/menu.php'; ?>
        </ul>
    </nav>
    <div class="clear"></div>
    <div class="main">
        <form action="./prijava.php" method="post" id="forma">
            <fieldset>
                <legend>Molimo Vas popunite podatke</legend>
                <div class="left">
                    <label for="username">Korisnicko ime:</label>
                    <label for="password">Sifra:</label>
                </div>
                <div class="right">
                    <input type="text" name="username" placeholder="Unesi username" required><br>
                    <input type="password" name="password" placeholder="Unesi sifru" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password mora imati bar jedan broj, jedno veliko i malo slovo i mora sadrzati najmanje 8 karaktera." required><br>
                    <input type="submit" value="Prijavi se">
                </div>
            </fieldset>
            <label for="registracija">Ukoliko nemate nalog registrujte se <a href="./registracija.php">OVDE</a></label>
            <?php if (isset($poruka_error)) echo $poruka_error ?>
        </form>
    </div>
    <?php include_once './php/footer.php' ?>
</body>

</html>