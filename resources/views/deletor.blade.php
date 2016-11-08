<!DOCTYPE html>
<html>
<head>
    <title>Заголовок окна Удалено</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
<hr><p><h3>Удаление записи...</h3></p><hr>
<?php
        $id = $_GET['id'];
$mysqli = new mysqli('localhost', 'root', '', 'myfb');
$mysqli->set_charset("utf8");
$av=$mysqli->query("DELETE FROM phonenumbers WHERE id = $id  ");

if (mysqli_query($mysqli, $av)) echo "Запись не удалена.";
else echo "Запись удалена.";
$mysqli->close();
?>

</body>
</html>