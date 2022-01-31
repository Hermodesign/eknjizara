<?php

class Proizvod
{
    protected $id;
    protected $naziv;
    protected $cena;
    protected $opis;
    protected $popust;
    protected $kolicina;
    protected $slika;

    function __construct(int $id, string $n, int $c, string $o, int $p, int $k, string $s)
    {
        $this->id = $id;
        $this->naziv = $n;
        $this->cena = $c;
        $this->opis = $o;
        $this->popust = $p;
        $this->kolicina = $k;
        $this->slika = $s;
    }

    function onClick () {
        if(isset($_SESSION['username'])) {
            return "naruci(". $this->id . ")";
        } else {
            return "location.href =\"./prijava.php\"";
        }
    }

    function popust() {
        
        $popust = $this->cena - (($this->cena * $this->popust)/100);
        if($this->popust != 0) {
            return "Cena sa popustom: <span>$popust</span></p>";
        } else {
            return "Cena proizvoda je: $this->cena";
        }
    }

    function getNaziv() {
        return $this->nazi;
    }

    function __toString()
    {
        $toReturn = "";
        $toReturn .= "<div class=\"card\">";
        $toReturn .= "<a href=\"./proizvod.php?id=$this->id\"><img src=\"./images/$this->slika\" alt=\"$this->naziv\"></a>";
        $toReturn .= "<h2 id=\"$this->id\">$this->naziv</h2>";
        $toReturn .= "<div class=\"description\"><p>$this->opis</p></div>";
        $toReturn .= "<p class=\"cena\">" . $this->popust();
        $toReturn .= "<h2><button type='button' onclick='". $this->onClick() ."' >Kupi ovde</button>";
        // $toReturn .= "<h2><button type='button' onclick='naruci(". $this->id .")' >Kupi ovde</button>";
        $toReturn .= "</div>";
        return $toReturn;
    }
}

?>

