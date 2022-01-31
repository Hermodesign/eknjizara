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
    <div class="main">
        <div class="block b01">
            <img src="images/<?php echo $slika ?>" alt="" />
        </div>
        <div class="block b02">
            <p>
                Наручите преко е-корпе, е-писмом нон-стоп.<br>
                Телефоном: 0655310496
            </p>
        </div>
        <div class="block b03">
            <p><?php echo $poruka; ?></p>
        </div>
        <div class="clear"></div>
        <div class="ponuda">
            <?php
            foreach ($proizvodi as $proizvod) {
                if (++$i == 6) break;
                $proizvod = new Proizvod($proizvod['id'], $proizvod['naziv'], $proizvod['cena'], $proizvod['opis'], $proizvod['popust'], $proizvod['kolicina'], $proizvod['slika']);
                echo $proizvod;
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
    </div>
    <?php include_once './php/footer.php';
    ?>
</body>
</html>