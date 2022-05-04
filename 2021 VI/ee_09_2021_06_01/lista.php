<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista przyjaciół</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div id="baner">
        <h1>Portal społecznościowy - moje konto</h1>
    </div>
    <div id="glowny">
        <h2>Moje zainteresowania</h2>
        <ul>
            <li>muzyka</li>
            <li>film</li>
            <li>komputery</li>
        </ul>
        <h2>Moi znajomi</h2>
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'dane');
            $zapytanie = "SELECT imie, nazwisko, opis, zdjecie FROM osoby WHERE Hobby_id IN (1,2,6)";
            
            $wynik = mysqli_query($polaczenie, $zapytanie);
            while($wiersz = mysqli_fetch_array($wynik)){
                echo "<div id='zdjecie'><img src='$wiersz[3]' alt='przyjaciel'></div>";
                echo "<div id='opis'>
                        <h3>$wiersz[0] $wiersz[1]</h3>
                        <p>Ostatni wpis: $wiersz[2]</p>
                        </div>";
                echo "<div id='linia'><hr></div>";
            }
            mysqli_close($polaczenie);
        ?>
    </div>
    <div id="stopkal">
        Stronę wykonał: PESEL
    </div>
    <div id="stopkap">
        <a href="mailto:ja@portal.pl">napisz do mnie</a>
    </div>
</body>
</html>