<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel administratora</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <div id="baner">
        <h3>Portal społecznościowy - panel administratora</h3>
    </div>
    <div id="lewy">
        <h4>Użytkownicy</h4>
        <?php
            //skrypt 1
            $polaczenie = mysqli_connect('localhost', 'root', '', 'dane4');
            $zapytanie1 = "SELECT id, imie, nazwisko, rok_urodzenia, zdjecie FROM osoby limit 30";
            $wynik1 = mysqli_query($polaczenie, $zapytanie1);
            while($wiersz1=mysqli_fetch_array($wynik1)){
                $wiek = 2022 - $wiersz1[3];
                echo "$wiersz1[0]. $wiersz1[1] $wiersz1[2], $wiek lat <br>";
            }
        ?>
        <a href="settings.html">Inne ustawienia</a>
    </div>
    <div id="prawy">
        <h4>Podaj id użytkownika</h4>
        <form action="users.php" method="post">
            <input type="number" name="id">
            <input type="submit" value="ZOBACZ">
        </form>
        <hr>
        <?php
            //skrypt 2
            if(isset($_POST['id'])){
                $id = $_POST['id'];
                $zapytanie2 = "SELECT osoby.imie, osoby.nazwisko, osoby.rok_urodzenia, osoby.opis, osoby.zdjecie, hobby.nazwa FROM osoby, hobby WHERE osoby.Hobby_id=hobby.id AND osoby.id = $id";
                $wynik2 = mysqli_query($polaczenie, $zapytanie2);
                $wiersz2=mysqli_fetch_array($wynik2);
                echo "<h2>$id. $wiersz2[0] $wiersz2[1]</h2>";
                echo "<img src='$wiersz2[4]' alt='$id'>";
                echo "<p>Rok urodzenia: $wiersz2[2]</p>";
                echo "<p>Opis: $wiersz2[3]</p>";
                echo "<p>Hobby: $wiersz2[5]</p>";
            }
            mysqli_close($polaczenie);
        ?>
    </div>
    <div id="stopka">
        Stronę wykonał: PESEL
    </div>
</body>
</html>