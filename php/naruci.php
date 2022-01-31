<?php
session_start();
include_once('./php/korpa.php');
$korpa->naruci();
header('Location: ./index.php');
