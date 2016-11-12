<!DOCTYPE html>
<html>
<head>
    <title>Заголовок окна Edit</title>

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
<p><h3>Запись</h3></p>
<hr>
<form>

    <input type="button" value="Добавить запись" onclick="goadd()"/>

</form>
<SCRIPT LANGUAGE="JavaScript">
    function goadd()
    {
        window.open("/edit/add","","width=300,height=500");
    }

    function goeditor(id)
    {
        window.open("/edit/editor?id="+id+"","","width=300,height=500");
    }

    function deletor(id)
    {
        if(confirm('Хотите удалить запись?'))
            window.open("/edit/deletor?id="+id+"","","width=300,height=500");
    }
</SCRIPT>
<?php
$mysqli = new mysqli('localhost', 'o99106wx_phoneb', '123456', 'o99106wx_phoneb');
  if (mysqli_connect_errno())
  /* Of course, your error handling is nicer... */
  die(sprintf("[%d] %s\n", mysqli_connect_errno(), mysqli_connect_error()));
    
$mysqli->set_charset("utf8");
?>
<table border="1">
    <tr><th>Имя</th><th>Фамилия</th><th>Номер телефона</th><th>Эмейл</th><th>Знакомые</th><th>Колеги</th><th>Друзья</th></tr>
    <?php
    $query = "SELECT * FROM phonenumbers ORDER BY firstname, lastname";
    if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc())
    {
    ?>
    <tr><td><?php echo $row['firstname'] ?></td><td><?php echo $row['lastname'] ?></td><td><?php echo $row['phonenumber'] ?></td><td><?php echo $row['email'] ?></td><td><?php echo $row['c_znakomie'] ?></td><td><?php echo $row['c_kolegi'] ?></td><td><?php echo $row['c_druzya'] ?></td><td><input type="button" name ="button" value="Редактировать" onclick="goeditor(<?php echo $row['id'] ?>)"/></td><td><input type="button" name ="buttond" value="Удалить" onclick="deletor(<?php echo $row['id'] ?>)"/></td></tr>

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