<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prognoza pogody Wrocław</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <div id="lewy">
        <img src="logo.png" alt="meteo">
    </div>
    <div id="srodkowy">
        <h1>Prognoza dla Wrocławia</h1>
    </div>
    <div id="prawy">
        <p>maj, 2019 r.</p>
    </div>
    <div id="glowny">
        <table>
            <tr>
                <th>DATA</th>
                <th>TEMPERATURA W NOCY</th>
                <th>TEMPERATURA W DZIEŃ</th>
                <th>OPADY [mm/h]</th>
                <th>CIŚNIENIE [hPa]</th>
            </tr>
            
            <?php
                //sktypt 
                $polaczenie = mysqli_connect('localhost', 'root', '', 'prognoza');
                $zapytanie = "SELECT * FROM pogoda WHERE miasta_id = 1 ORDER BY data_prognozy ASC";
                $wynik = mysqli_query($polaczenie, $zapytanie);
                while($wiersz=mysqli_fetch_row($wynik)){
                    echo "<tr>
                            <td>$wiersz[2]</td>
                            <td>$wiersz[3]</td>
                            <td>$wiersz[4]</td>
                            <td>$wiersz[5]</td>
                            <td>$wiersz[6]</td>
                        </tr>";
                }
                mysqli_close($polaczenie);
            ?>
            
        </table>
    </div>
    <div id="dlewy">
        <img src="obraz.jpg" alt="Polska, Wrocław">
    </div>
    <div id="dprawy">
        <a href="kwerendy.txt">Pobierz kwerendy</a>
    </div>
    <div id="stopka">
        <p>Stronę wykonał: PESEL</p>
    </div>
</body>
</html>