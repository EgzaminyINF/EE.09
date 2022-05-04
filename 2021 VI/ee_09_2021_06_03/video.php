<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video On Demand</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <div id="baner1">
        <h1>Internetowa wypożyczalnia filmów</h1>
    </div>
    <div id="baner2">
        <table>
            <tr>
                <td>Kryminał</td>
                <td>Horror</td>
                <td>Przygodowy</td>
            </tr>
            <tr>
                <td>20</td>
                <td>30</td>
                <td>20</td>
            </tr>
        </table>
    </div>
    <div id="polecamy">
        <h3>Polecamy</h3>
        <?php
            //skrypt 1
            $polaczenie = mysqli_connect('localhost', 'root', '', 'dane3');
            $zapytanie1 = "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE id IN (18,22,23,25)";
            $wynik1 = mysqli_query($polaczenie, $zapytanie1);
            while($wiersz1 = mysqli_fetch_array($wynik1)){
                echo "<div class='film'>
                        <h4>$wiersz1[0]. $wiersz1[1]</h4>
                        <img src='$wiersz1[3]' alt='film'>
                        <p>$wiersz1[2]</p>
                      </div>";
            }
        ?>
    </div>
    <div id="fantastyczne">
        <h3>Filmy fantastyczne</h3>
        <?php
            //skrypt 2
            $zapytanie2 = "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE Rodzaje_id = 12";
            $wynik2 = mysqli_query($polaczenie, $zapytanie2);
            while($wiersz2 = mysqli_fetch_array($wynik2)){
                echo "<div class='film'>
                        <h4>$wiersz2[0]. $wiersz2[1]</h4>
                        <img src='$wiersz2[3]' alt='film'>
                        <p>$wiersz2[2]</p>
                      </div>";
            }
        ?>
    </div>
    <div id="stopka">
        <form action="video.php" method="post">
            Usuń film nr: <input type="number" name="id">
            <input type="submit" value="Usuń film">
        </form>
        <?php
            if(isset($_POST['id'])){
                $id = $_POST['id'];
                $zapytanie3 = "DELETE FROM produkty WHERE id = $id";
                $wynik3 = mysqli_query($polaczenie,$zapytanie3);
            }
            mysqli_close($polaczenie);
        ?>
        <br>
        Stronę wykonał: <a href="mailto:ja@poczta.com">PESEL</a>
    </div>
</body>
</html>