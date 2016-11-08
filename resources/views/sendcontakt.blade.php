<?php
        if(isset($_GET['id']))
            {
$id = $_GET['id'];
$mysqli = new mysqli('localhost', 'root', '', 'myfb');
$mysqli->set_charset("utf8");

if ($id == 1)
{
    $query = "SELECT * FROM phonenumbers
          WHERE c_znakomie = 1  ";}
if ($id == 2)
{
    $query = "SELECT * FROM phonenumbers
          WHERE c_kolegi = 1  ";
}
if ($id == 3)
{
    $query = "SELECT * FROM phonenumbers
          WHERE c_druzya = 1  ";}
if ($id == 4)
{
    $query = "SELECT * FROM phonenumbers
          WHERE c_znakomie = 0 and c_druzya = 0 and c_kolegi = 0 ";}

$result = $mysqli->query($query);
$row = $result->fetch_assoc();
?>

<table border="1">
<tr><th>Имя и Фамилия</th><th>Номер телефона</th><th>Эмейл</th></tr>
<?php
if ($result = $mysqli->query($query)) {
while ($row = $result->fetch_assoc())
{
?>

<tr><td><?php echo $row['firstname']." ".$row['lastname'] ?></td><td><?php echo $row['phonenumber'] ?></td><td><?php echo $row['email'] ?></td></tr>
<?php
}}
?>
</table>
<?php
$result->close();
$mysqli->close();
        }
?>