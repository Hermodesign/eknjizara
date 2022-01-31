<?php

class Registracija
{
    private $connection;
    function __construct()
    {
        $this->connection = new mysqli("localhost", "root", "", "projekat");
    }

    private function prepareSelectUser()
    {
        return $this->connection->prepare("SELECT * FROM korisnici WHERE username = ?;");
    }

    private function prepareSelectEmail()
    {
        return $this->connection->prepare("SELECT * FROM korisnici WHERE email = ?;");
    }

    function proveriKorisnika($user): bool
    {
        $prepared = $this->prepareSelectUser();
        $prepared->bind_param("s", $user);
        $prepared->execute();
        return $prepared->get_result()->num_rows == 1;
    }

    function proveriEmail($email): bool
    {
        $prepared = $this->prepareSelectEmail();
        $prepared->bind_param("s", $email);
        $prepared->execute();
        return $prepared->get_result()->num_rows == 1;
    }

    function regustrujKorisnika($ime, $username, $password, $email, $adresa, $grad, $telefon, $broj, $privilegija)
    {
        $upit_insert = "INSERT INTO korisnici (ime, username, password, email, adresa, grad, telefon, broj, privilegija) VALUES (?,?,?,?,?,?,?,?,?)";
        $statement = $this->connection->prepare($upit_insert);
        $statement->bind_param("ssssssssi", $ime, $username, $password, $email, $adresa, $grad, $telefon, $broj, $privilegija);
        $statement->execute();
    }
}
$connection = new Registracija();
