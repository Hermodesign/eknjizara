<?php
session_start();
include_once('./korpa.php');
$korpa->naruci();
header('Location: ../index.php');
