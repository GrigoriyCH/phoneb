<!DOCTYPE html>
<html>
<head>
    <title>Заголовок окна Home</title>
</head>
<body>
<input type="button" class="button" value="Главная" disabled = "disabled" onclick="location.href='/'" />
<input type="button" class="button" value="Файл" onclick="location.href='/file'" />
<input type="button" class="button" value="Запись" onclick="location.href='/edit'" />
<input type="button" class="button" value="Поиск" onclick="location.href='/find'" />
<hr>
<p><h3>Главная</h3></p>
<hr>

<?php
$mysqli = new mysqli('localhost', 'root', '', 'myfb');
if ($mysqli->connect_error)
{
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
else
{
    echo "Соединение с базой данных успешно!". '<br>';
}

$mysqli->set_charset("utf8");
?>
<table border="1">
    <tr><th>Имя</th><th>Фамилия</th><th>Номер телефона</th><th>Эмейл</th></tr>
    <?php
    $query = "SELECT * FROM phonenumbers ORDER BY firstname, lastname, phonenumber, email";
    if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc())
    {
    ?>

    <tr><td><?php echo $row['firstname'] ?></td><td><?php echo $row['lastname'] ?></td><td><?php echo $row['phonenumber'] ?></td><td><?php echo $row['email'] ?></td></tr>
    <?php
    }
    ?>
</table>
<?php
/* удаление выборки */
$result->close();
}

$mysqli->close();
?>

</body>
</html>


