<?php
if (isset($_SESSION['username'])) {
    $prijava = "Odjavi se";
} else {
    $prijava = "Prijavi se";
}

$menu = [["Pocetna", "index.php"], ["Ponuda", "ponuda.php"], ["Korpa", "korpa.php"], ["O nama", "onama.php"], ["$prijava", "prijava.php"]];

$connection = new mysqli("localhost", "root", "", "projekat");

$proizvodi = $connection->query("SELECT * FROM proizvodi;");

function getNazivById($id)
{
    global $connection;
    $rez = $connection->query("SELECT naziv FROM proizvodi WHERE id = $id;");
    $rezultat = $rez->fetch_assoc();
    return $rezultat['naziv'];
}

function getCenaById($id) {
    global $connection;
    $rez = $connection->query("SELECT cena FROM proizvodi WHERE id = $id;");
    $rezultat = $rez->fetch_assoc();
    return $rezultat['cena'];
}

function getPopustById($id) {
    global $connection;
    $rez = $connection->query("SELECT popust FROM proizvodi WHERE id = $id;");
    $rezultat = $rez->fetch_assoc();
    return $rezultat['popust'];
}

function prodajnaCena($id) {
    if(getPopustById($id) == 0) {
        return getCenaById($id);
    } else {
        $cena = getCenaById($id) - ((getCenaById($id) * getPopustById($id)) / 100);
        return $cena;
    }
}

