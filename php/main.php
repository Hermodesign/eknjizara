<?php
    $vreme = (int) date("H");
    $kraj = 17 - $vreme;
    $pocetak = 9 - $vreme;

    if ($vreme >= 9 && $vreme <= 16) {
        $poruka =  "Jos uvek radimo, zatvaramo za  $kraj sata.";
    } else if ($vreme > 0 && $vreme < 8) {
        $poruka = "Nismo još uvek krenuli sa radom. Krećemo sa radom za $pocetak sata";
    } else if ($vreme >= 17) {
        $poruka = "Radno vreme je već završeno.";
    }
    
    if ($vreme >= 9 && $vreme <= 16) {
        $slika = "open.png";
    } else {
        $slika = "closed.png";
    }