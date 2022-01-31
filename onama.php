<?php include_once('./php/main.php');
include_once('./php/baza.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>O nama</title>
    <link rel="stylesheet" href="./css/main.css">
</head>

<body>
    <?php include_once 'php/header.php'; ?>
    <nav>
        <ul>
            <?php include_once 'php/menu.php'; ?>
        </ul>
    </nav>
    <div class="main">
        <div class="desk txt">
            <h1>Dobrodošli u nasu knjizaru</h1>
            <p>Knjižara Nikola Mitić je osnovana 2022. god. Osnovao ju je programer Nikola Mitić, u okviru projekta na ITBootcampu kursu za PHP programere.</p><br>
            <p>Još uvek je na početku razvoja.</p><br><br>
            <p>Bibpoteke se ne prave, one rastu. – Agustin Birel</p>
            <p>Birajte pisca kao što biste birap prijatelja. – Ventvort Dilon</p>
            <p>Veći greh od spaljivanja knjiga je ne čitati knjige. – Josif Brodski</p>
            <p>Više vrednih ideja se može naći u najmanjoj knjižari nego u čitavoj istoriji televizije. – Endru Ros</p>
            <p>Gete je nekom pripkom rekao: “On je dosadan čovek. Da je knjiga, ja ga ne bih čitao.” – Džejms Brajs </p>
            <p>Deo sam svake knjige koju sam pročitao. – John Kieran</p>
            <p>Dobri prijatelji, dobre knjige i čista savest: to je idealan život. – Mark Tven</p>
            <p>Dobru knjigu čini dobar čitalac. – Ralf Voldo </p>
            <p>I samo saznanje da te na kraju dana čeka dobra knjiga čini dan vesepjim. – Ketpn Noris</p>
            <p>Ideje koje su mi promenile život dobila sam čitajući. – Bel Huks</p>
            <a href="./index.php">
                <div class="btn">Pocetna stranica</div>
            </a>
        </div>
        <div class="desk img">
            <img src="./images/book.jpg" alt="IT Bootcamp">
        </div>
    </div>
    <div class="clear"></div>

    <?php include_once './php/footer.php' ?>

</body>

</html>