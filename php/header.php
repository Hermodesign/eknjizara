<?php
function uzmiBroj()
{
    if (isset($_SESSION['username'])) {
        global $korpa;
        $broj = $korpa->getBroj();
        if(!$broj == 0)
        return $broj;
    }
}
?>

<div class="sale">
    <p>Popusti i do 30%</p>
</div>
<header>
    <div class="top-line">
        <div class="logo">
            <a href="./index.php">
                <p>LOGO Knjizara</p>
            </a>
        </div>
        <div class="cart">
            <p><a href="./korpa.php"><i class="fas fa-shopping-cart"></i><span><?php include_once('./php/korpa.php'); echo uzmiBroj() ?></span></a></p>
        </div>
        <div class="clear"></div>
    </div>

    <div class="slider"></div>
</header>