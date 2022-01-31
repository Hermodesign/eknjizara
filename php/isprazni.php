<?php
session_start();
include_once('./korpa.php');
    $korpa->isprazniKorpu();
    header('Location: ../index.php');
?>