<?php session_start();
include_once('./php/main.php');
include_once('./php/baza.php');
include_once('./php/korpa.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Knjizara | Nikola Mitic</title>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/proizvod.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <?php include_once './php/header.php'; ?>
    <nav>
        <ul>
            <?php include_once './php/menu.php'; ?>
        </ul>
    </nav>
    <div class="main">
        <div class="korpa">
            <?php

            if (!isset($_SESSION['username'])) {
                echo "<p>Morate biti prijavljeni da biste videli korpu.</p><br>";
                echo "<a href=\"./prijava.php\"><button type='button'>Prijavi se</button></a>";
            } else {
                $korpa->listajTabelu();
                echo "<hr>";
                echo "<a href=\"./php/isprazni.php\"> <button type='button'>Isprazni korpu</button></a>";
            }
            ?>
        </div>
        <?php
        if (isset($_SESSION['username'])) {
            echo "<a href=\"./php/naruci.php\"><button type='button'>Naruci</button></a>";
        }
        ?>
        <a href="./index.php"><button type='button'>Pocetna stranica</button></a>
    </div>
    <div class="clear"></div>

    <?php include_once './php/footer.php' ?>

</body>

</html>