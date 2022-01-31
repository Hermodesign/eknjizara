<?php
include_once 'baza.php';
foreach ($menu as $stavka) {
    $link = '';
    $name = '';
    for ($i=0; $i<count($stavka); $i++) {
        if ($i == 0) {
            $name = $stavka[$i];
        } else {
            $link = $stavka[$i];
        }
    }
    echo "<a href=\"./$link\"><li>$name</li></a>";
}