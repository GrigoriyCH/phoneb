<!DOCTYPE html>
<html>
<head>
    <title>Заголовок окна Добавить запись</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
<hr><p><h3>Добавить запись</h3></p><hr>
<form method="GET">
    <p>Имя<input type="text" name="firstname" value=""/></p>
    <p>Фамилия<input type="text" name="lastname" value=""/></p>
    <p>Номер телефона<input type="text" name="phonenumber" value=""/></p>
    <p>Эмейл<input type="text" name="email" value=""/></p>
<p>Выберите категорию:</p>
    <p><INPUT TYPE=checkbox NAME=c_znakomie >Знакомые</p>
    <p><INPUT TYPE=checkbox NAME=c_kolegi >Колеги</p>
    <p><INPUT TYPE=checkbox NAME=c_druzya >Друзья</p>

<input type="submit" name ="save" value="Сохранить" />
</form>
<?php

if(isset($_GET['save']))
{
    $sa = $_GET['firstname'];
    $sb = $_GET['lastname'];
    $sc = $_GET['phonenumber'];
    $sd = $_GET['email'];
    if(isset($_GET['c_znakomie']))
        $se = 1;else $se = 0;
    if(isset($_GET['c_kolegi']))
        $sf = 1;else $sf = 0;
    if(isset($_GET['c_druzya']))
        $sg = 1;else $sg = 0;

    $mysqli = new mysqli('localhost', 'root', '', 'myfb');
    if ($mysqli->connect_error)
    {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    $mysqli->set_charset("utf8");

    $query = "insert into phonenumbers (firstname, lastname ,phonenumber , email, c_znakomie, c_kolegi, c_druzya) value ('$sa', '$sb','$sc','$sd','$se','$sf','$sg')";

    if (mysqli_query($mysqli, $query)) echo "Запись добавлена.";
    else echo "Запись не добавлена.";
    $mysqli->close();
}

?>


</body>
</html>