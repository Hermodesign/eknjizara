<?php
class Korpa
{
    function __construct()
    {
        if (!isset($_SESSION['item_cart'])) {
            $_SESSION['item_cart'] = [];
        }
    }

    function dodajUKorpu($id, $amount)
    {
        if (isset($_SESSION['item_cart'][$id])) {
            $_SESSION['item_cart'][$id] += $amount;
        } else {
            $_SESSION['item_cart'][$id] = $amount;
        }
    }

    function listajKorpu()
    {
        $ukupnaCena = 0;
        foreach ($_SESSION['item_cart'] as $id => $amount) {
            echo "Stavka pod nazivom " . getNazivById($id) . " koja ima ID: $id je u korpi $amount puta, a njegova cena je: " . getCenaById($id) . "<br>";
            $ukupnaCena = prodajnaCena($id) + $ukupnaCena;
        }
        echo $ukupnaCena;
    }

    function listajTabelu()
    {

        if (count($_SESSION['item_cart']) == 0) {
            echo "<p>Vasa korpa je prazna.</p>";
            echo "<p>Vratite se nazad da biste nastavili sa kupovinom.</p>";
        } else {
            $i = 1;
            $ukupnaCena = 0;
            echo "<table class=\"tabela\"><tr><th>Redni broj</th><th>Naziv</th><th>Cena</th><th>Kolicina</th></tr><tr>";
            foreach ($_SESSION['item_cart'] as $id => $amount) {
                echo "<td>" . $i++ . ".</td><td>" . getNazivById($id) . "</td><td>" . prodajnaCena($id) . "</td><td>" . $amount . "</td></tr>";
                $ukupnaCena = (prodajnaCena($id) * $amount) + $ukupnaCena;
            }
            echo "<tr><td colspan=\"4\"><strong>Ukupna cena za placanje: $ukupnaCena dinara.</strong></td></tr>";
            echo "</table><br>";
        }
    }

    function naruci()
    {
        $connection = new mysqli("localhost", "root", "", "projekat");
        foreach ($_SESSION['item_cart'] as $id => $amount) {
            $upit_insert = "INSERT INTO porudzbine (username, id_proizvoda, kolicina) VALUES (?, ?, ?)";
            $statement = $connection->prepare($upit_insert);
            $id_proizvoda = $id;
            $username = $_SESSION['username'];
            $kolicina = $amount;
            $statement->bind_param("ssi", $username, $id_proizvoda, $kolicina);
            $statement->execute();
        }
    }

    function getBroj()
    {
        $i = 0;
        foreach ($_SESSION['item_cart'] as $id => $amount) {
            $i = $i + $amount;
        }
        return "$i";
    }

    function isprazniKorpu()
    {
        $_SESSION['item_cart'] = [];
    }

}

$korpa = new Korpa();
