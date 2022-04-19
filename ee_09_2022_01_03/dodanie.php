<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $polaczenie = mysqli_connect('localhost', 'root', '', 'ee09');
        $nrkaretki = $_POST['nrkaretki'];
        $pierwszy = $_POST['pierwszy'];
        $drugi = $_POST['drugi'];
        $trzeci = $_POST['trzeci'];
        $zapytanie = "INSERT INTO ratownicy  VALUES (NULL, '$nrkaretki', '$pierwszy', '$drugi', '$trzeci'); ";
        $wynik = mysqli_query($polaczenie, $zapytanie);
        if($wynik)
            echo "Do bazy zostało wysłane zapytanie: $zapytanie";
        mysqli_close($polaczenie);
    ?>
</body>
</html>