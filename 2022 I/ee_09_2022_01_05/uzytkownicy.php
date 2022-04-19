<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal społecznościowy</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <div id="lbaner">
        <h2>Nasze osiedle</h2>
    </div>
    <div id="pbaner">
        <?php
            //skrypt1
            $polaczenie = mysqli_connect('localhost', 'root', '', 'portal');
            $zapytanie1 = "SELECT COUNT(*) FROM dane";
            $wynik1 = mysqli_query($polaczenie, $zapytanie1);
            $wiersz = mysqli_fetch_row($wynik1);
            echo "<h5>Liczba użytkowników portalu: $wiersz[0]</h5>";
        ?>
    </div>
    <div id="lewy">
        <h3>Logowanie</h3>
        <form action="uzytkownicy.php" method="post">
            login <br>
            <input type="text" name="login"> <br>
            hasło <br>
            <input type="password" name="haslo"> <br>
            <input type="submit" value="Zaloguj">
        </form>
    </div>
    <div id="prawy">
        <h3>Wizytówka</h3>
        <div id="wizytowka">
            <?php
                //skrypt2
                if(!empty($_POST['login']) && !empty($_POST['haslo'])){
                    $login = $_POST['login'];
                    $haslo = $_POST['haslo'];
                    $zapytanie2 = "SELECT haslo FROM uzytkownicy WHERE login LIKE '$login' ";
                    $wynik2 = mysqli_query($polaczenie, $zapytanie2);
                    $ile = mysqli_num_rows($wynik2);
                    if($ile == 0){
                        echo "login nie istnieje";
                    }else{
                        $wiersz2 = mysqli_fetch_row($wynik2);
                        $haslo_szyfr = sha1($haslo);
                        if($haslo_szyfr == $wiersz2[0]){
                            $zapytanie3 = "SELECT uzytkownicy.login, dane.rok_urodz, dane.przyjaciol, dane.hobby, dane.zdjecie FROM uzytkownicy, dane WHERE uzytkownicy.id=dane.id AND uzytkownicy.login LIKE '$login'";
                            $wynik3 = mysqli_query($polaczenie, $zapytanie3);
                            $wiersz3 = mysqli_fetch_row($wynik3);
                            $wiek = 2022-$wiersz3[1];
                            echo "
                                <img src='$wiersz3[4]' alt='osoba'>
                                <h4>$wiersz3[0] ($wiek)</h4>
                                <p>hobby: $wiersz3[3]</p>
                                <h1><img src='icon-on.png'> $wiersz3[2]</h1>
                                <a href='dane.html'><button class='przycisk'>Więcej informacji</button></a>
                            ";
                        } else {
                            echo "hasło nieprawidłowe";
                        }
                    }
                }
                mysqli_close($polaczenie);
            ?>
        </div>
    </div>
    <div id="stopka">
        Stronę wykonał: PESEL
    </div>
</body>
</html>