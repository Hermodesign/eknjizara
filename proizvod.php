<?php
session_start();
include_once('./php/main.php');
include_once('./php/baza.php');
include_once('./php/proizvod.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knjizara | Nikola Mitic</title>
    <link rel="stylesheet" href='./css/main.css'>
    <link rel="stylesheet" href="./css/proizvod.css">
</head>

<body>

    <?php include_once 'php/header.php'; ?>
    <nav>
        <ul>
            <?php include_once 'php/menu.php'; ?>
        </ul>
    </nav>
    <div class="clear"></div>
    <div class="centar">
        <?php
        if (isset($_GET['id'])) {
            $id=$_GET['id']; 
        }
        foreach ($proizvodi as $kljuc => $proizvod) {
            $proizvod = new Proizvod($proizvod['id'], $proizvod['naziv'], $proizvod['cena'], $proizvod['opis'], $proizvod['popust'], $proizvod['kolicina'], $proizvod['slika']);
            if($kljuc == $id - 1) {
                echo $proizvod;
            }
        }
        ?>
                    <script>
                const naruci = (_id) => {
                    data = {
                        id: _id
                    };
                    data = JSON.stringify(data);
                    fetch('./php/porudzbina.php', {
                        method: "POST",
                        body: data,
                    }).then((response) => {
                        response.json().then((data) => {
                            console.log(data);
                            // if (data.response == 'success') {
                            //     alert('uspeh!');
                            // } else {
                            //     alert('greska!');
                            // }
                        });
                    })
                }
            </script>
    </div>
    <?php include_once './php/footer.php';
    ?>
</body>

</html>