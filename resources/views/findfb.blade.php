<!DOCTYPE html>
<html>
<head>
    <title>Заголовок окна Home</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
<input type="button" class="button" value="Главная" onclick="location.href='/'" />
<input type="button" class="button" value="Файл" onclick="location.href='/file'" />
<input type="button" class="button" value="Запись" onclick="location.href='/edit'" />
<input type="button" class="button" value="Поиск" onclick="location.href='/find'" />
<hr>
<p><h3>Поиск</h3></p>
<hr>
<form method="get">
<p><INPUT TYPE=RADIO NAME=id VALUE="name"CHECKED>Поиск по имени или фамилии</p>
<p><INPUT TYPE=RADIO NAME=id VALUE="phonenumber">Поиск по номеру телефона</p>
<p><INPUT TYPE=RADIO NAME=id VALUE="email">Поиск по эмейлу</p>
<p>Введите, что нужно найти.<INPUT TYPE=text NAME=text VALUE=""><input type="submit" value="Поиск"></p>
</form>
<?php
        if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $text = $_GET['text'];

                $mysqli = new mysqli('localhost', 'root', '', 'myfb');
                $mysqli->set_charset("utf8");
?>

<table border="1">
    <tr><th>Имя</th><th>Фамилия</th><th>Номер телефона</th><th>Эмейл</th></tr>

    <?php
        if($id == 'name')
            {$query = "SELECT * FROM phonenumbers WHERE firstname = '$text' or lastname ='$text' ORDER BY firstname, lastname";}
        else
            {$query = "SELECT * FROM phonenumbers WHERE $id = '$text' ORDER BY firstname, lastname";}

    if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc())
    {
    ?>
    <tr><td><?php echo $row['firstname'] ?></td><td><?php echo $row['lastname'] ?></td><td><?php echo $row['phonenumber'] ?></td><td><?php echo $row['email'] ?></td></tr>
    <?php
    }
    ?>
    <?php
        }
    ?>
</table>
<?php
$result->close();
$mysqli->close();
}
?>
</body>
</html>


