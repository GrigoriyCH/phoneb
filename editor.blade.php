<!DOCTYPE html>
<html>
<head>
    <title>Заголовок окна Редактор</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
<hr><p><h3>Редактировать запись</h3></p><hr>
<?php
        $id = $_GET['id'];
$mysqli = new mysqli('localhost', 'root', '', 'myfb');
$mysqli->set_charset("utf8");

if (isset($_GET['save']))
{
    $firstname = $_GET['firstname'];
    $lastname = $_GET['lastname'];
    $phonenumber = $_GET['phonenumber'];
    $email = $_GET['email'];
    if(isset($_GET['c_znakomie']))
        $c_znakomie = 1; else $c_znakomie= 0;
    if(isset($_GET['c_kolegi']))
        $c_kolegi = 1; else $c_kolegi= 0;
    if(isset($_GET['c_druzya']))
        $c_druzya = 1; else $c_druzya= 0;

     $av=$mysqli->query("update phonenumbers set  firstname='$firstname', lastname='$lastname' ,phonenumber='$phonenumber' , email='$email', c_znakomie = '$c_znakomie', c_kolegi = '$c_kolegi', c_druzya = '$c_druzya'
            where id = $id ");
    if (mysqli_query($mysqli, $av)) echo "Запись не обновлена.";
    else echo "Запись обновлена.";
}

$query = "SELECT * FROM phonenumbers
          WHERE id = $id  ";
$result = $mysqli->query($query);
$row = $result->fetch_assoc();

$result->close();
$mysqli->close();
?>

<form method="GET">
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <p>Имя<input type="text" name="firstname" value="<?php echo $row['firstname'];?>"/></p>
    <p>Фамилия<input type="text" name="lastname" value="<?php echo $row['lastname'];?>"/></p>
    <p>Номер телефона<input type="text" name="phonenumber" value="<?php echo $row['phonenumber'];?>"/></p>
    <p>Эмейл<input type="text" name="email" value="<?php echo $row['email'];?>"/></p>
    <p>Выберите категорию:</p>
    <p><INPUT TYPE=checkbox NAME=c_znakomie <?php if($row['c_znakomie'] == 1) echo('checked '); ?>>Знакомые</p>
    <p><INPUT TYPE=checkbox NAME=c_kolegi <?php if($row['c_kolegi'] == 1) echo('checked '); ?>>Колеги</p>
    <p><INPUT TYPE=checkbox NAME=c_druzya <?php if($row['c_druzya'] == 1) echo('checked '); ?>>Друзья</p>

    <input type="submit" name ="save" value="Сохранить" />
</form>

</body>
</html>