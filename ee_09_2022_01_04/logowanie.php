<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <div id="baner">
        <h1>Forum wielbicieli psów</h1>
    </div>
    <div id="lewy">
        <img src="obraz.jpg" alt="foksterier">
    </div>
    <div id="prawy1">
        <h2>Zapisz się</h2>
        <form action="logowanie.php" method="post">
            login: 
            <input type="text" name="login"> <br>
            hasło: 
            <input type="password" name="haslo"> <br>
            powtórz hasło: 
            <input type="password" name="phaslo"> <br>
            <input type="submit" value="Zapisz">
        </form>
        <?php
            //skrypt
            $polaczenie = mysqli_connect('localhost', 'root', '', 'psy');
            if(empty($_POST['login']) || empty($_POST['haslo']) || empty($_POST['phaslo'])){
                echo "<p>wypełnij wszystkie pola</p>";
            }else{
                $login = $_POST['login'];
                $haslo = $_POST['haslo'];
                $phaslo = $_POST['phaslo'];
                $zapytanie = "SELECT login FROM uzytkownicy WHERE login like '$login'";
                $wynik = mysqli_query($polaczenie, $zapytanie);
                $ile = mysqli_num_rows($wynik);
                if ($ile > 0){
                    echo "<p>login występuje w bazie danych, konto nie zostało dodane</p>";
                }else if($haslo != $phaslo){
                    echo "<p>hasła nie są takie same, konto nie zostało dodane</p>";
                }else{
                    $haslo_szyfr = sha1($haslo);
                    $zapytanie2 = "INSERT INTO uzytkownicy  VALUES (NULL, '$login', '$haslo_szyfr');";
                    $wynik2 = mysqli_query($polaczenie, $zapytanie2);
                    if($wynik2)
                        echo "<p>Konto zostało dodane</p>";
                }
            }
            mysqli_close($polaczenie);
        ?>
    </div>
    <div id="prawy2">
        <h2>Zapraszamy wszystkich</h2>
        <ol>
            <li>właścicieli psów</li>
            <li>weterynarzy</li>
            <li>tych, co chcą kupić psa</li>
            <li>tych, co lubią psy</li>
        </ol>
        <a href="reulamin.html">Przeczytaj regulamin forum</a>
    </div>
    <div id="stopka">
        Stronę wykonał: PESEL
    </div>
</body>
</html>