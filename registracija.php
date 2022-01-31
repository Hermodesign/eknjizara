<?php

include_once('./php/main.php');
include_once('./php/registracija.php');

if (isset($_POST['ime']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['adresa']) && isset($_POST['grad']) && isset($_POST['telefon']) && isset($_POST['brojp'])) {
    $ime = $_POST['ime'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $adresa = $_POST['adresa'];
    $grad = $_POST['grad'];
    $telefon = $_POST['telefon'];
    $brojp = $_POST['brojp'];

    $criptPass = password_hash($password, PASSWORD_BCRYPT);

    if (!$connection->proveriKorisnika($username) && !$connection->proveriEmail($email)) {
        $connection->regustrujKorisnika($ime, $username, $criptPass, $email, $adresa, $grad, $telefon, $brojp, 0);
        header('Location: ./index.php');
    } else {
        $poruka_e = "Korisnik vec postoji";
    }

} else {
    echo "GRESKA";
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
        <form action="./registracija.php" method="post" id="forma">
            <fieldset>
                <legend>Molimo Vas popunite podatke</legend>
                <div class="left">
                    <label for="ime">Ime i preizme:</label>
                    <label for="username">Korisnicko ime:</label>
                    <label for="password">Password:</label>
                    <label for="email">Email:</label>
                    <label for="adresa">Adresa</label>
                    <label for="grad">Grad:</label>
                    <label for="telefon">Telefon:</label>
                    <label for="brojp">Postanski broj:</label>
                </div>
                <div class="right">
                    <input type="text" name="ime" placeholder="Unesi ime i perzime" required><br>
                    <input type="text" name="username" placeholder="Unesi username" required><br>
                    <input type="password" name="password" placeholder="Unesi sifru" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password mora imati bar jedan broj, jedno veliko i malo slovo i mora sadrzati najmanje 8 karaktera." required><br>
                    <input type="email" name="email" placeholder="Email" required><br>
                    <input type="text" name="adresa" placeholder="Adresa" required>
                    <input type="text" name="grad" placeholder="Unsei grad" required>
                    <input type="text" name="telefon" placeholder="Unsei svoj broj telefona" required>
                    <input type="text" name="brojp" placeholder="Unesi postanski broj" required>
                    <input type="submit" value="Registruj se">
                </div>
            </fieldset>
            <?php if (isset($poruka_e)) echo $poruka_e ?>
        </form>
    </div>
    <?php include_once './php/footer.php' ?>
</body>

</html>