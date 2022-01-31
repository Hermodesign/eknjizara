<?php

class Konekcija
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

    function proveriKorisnika($user, $pass): bool
    {
        $prepared = $this->prepareSelectUser();
        $prepared->bind_param("s", $user);
        $prepared->execute();
        $res = $prepared->get_result();
        if($res->num_rows == 1) {
            $row = $res->fetch_assoc();
            return password_verify($pass,$row['password']);
        }
        return false;
    }
}

$connection = new Konekcija();

