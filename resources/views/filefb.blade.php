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
<p><h3>Файл</h3></p>
<hr>

<?php
if (isset($_GET['id']))
{
    if($_GET['id']=="Экспорт записей")
    {
        //подключение к бд
        $mysqli = new mysqli('localhost', 'root', '', 'myfb');
        $mysqli->set_charset("utf8");

        //cоздание файла
        $doc = new DOMDocument('1.0');
        $doc->encoding = 'utf8';
        $doc->formatOutput = true;

        $root = $doc->createElement('phonenumbers');
        $root = $doc->appendChild($root);

        //загрузка данных и запись в файл
        $query = "SELECT * FROM phonenumbers ORDER BY firstname, lastname";
        if ($result = $mysqli->query($query)) {
            while ($row = $result->fetch_assoc())
                {

        $phonenumber = $doc->createElement('phonenumber');
        $phonenumber = $root->appendChild($phonenumber);
                ///////////
                    $firstname = $doc->createElement('firstname');
                    $firstname = $phonenumber->appendChild($firstname);

                    $text = $doc->createTextNode($row['firstname']);
                    $text = $firstname ->appendChild($text);
                ///////////
                    $lastname = $doc->createElement('lastname');
                    $lastname = $phonenumber->appendChild($lastname);

                    $text1 = $doc->createTextNode($row['lastname']);
                    $text1 = $lastname->appendChild($text1);
                ///////////
                    $number = $doc->createElement('number');
                    $number = $phonenumber->appendChild($number);

                    $text2 = $doc->createTextNode($row['phonenumber']);
                    $text2 = $number->appendChild($text2);
                ///////////
                    $email = $doc->createElement('email');
                    $email = $phonenumber->appendChild($email);

                    $text3 = $doc->createTextNode($row['email']);
                    $text3 = $email->appendChild($text3);
                ///////////
                    $c_znakomie = $doc->createElement('znakomie');
                    $c_znakomie = $phonenumber->appendChild($c_znakomie);

                    $text4 = $doc->createTextNode($row['c_znakomie']);
                    $text4 = $c_znakomie->appendChild($text4);
                ///////////
                    $c_kolegi = $doc->createElement('kolegi');
                    $c_kolegi = $phonenumber->appendChild($c_kolegi);

                    $text5 = $doc->createTextNode($row['c_kolegi']);
                    $text5 = $c_kolegi->appendChild($text5);
                ///////////
                    $c_druzya = $doc->createElement('druzya');
                    $c_druzya = $phonenumber->appendChild($c_druzya);

                    $text6 = $doc->createTextNode($row['c_druzya']);
                    $text6 = $c_druzya->appendChild($text6);
                }
        }
        $result->close();
        $mysqli->close();
        echo 'Создан XML-файл: ' . $doc->save("db.xml") . ' bytes'; // Wrote: 72 bytes
    }
}

if(isset($_POST['send']))
{
    // инициализируем нужные переменные
    $filename = '';
    $filepath = '';
    $filetype = '';

    // проверяем, что файл загружался
    if(isset($_FILES['ufile']) &&
            $_FILES['ufile']['error'] != 4)
    {
        // проверяем, что файл загрузился без ошибок
        if($_FILES['ufile']['error'] != 1 &&
                $_FILES['ufile']['error'] != 0)
        {
            $error = $_FILES['ufile']['error'];
            $errors []= 'Ошибка: Файл не загружен.'.
                    ' Код ошибки: ' . $error;
        }
        else
        {
            // файл загружен на сервер

            // проверяем файл на максимальный размер
            $filesize = $_FILES['ufile']['size'];
            if($_FILES['ufile']['error'] == 1 ||
                    $filesize > 3145728)
            {
                $filesize = ($filesize != 0)?
                        sprintf('(%.2f Мб)' , $filesize / 1024): '';
                die('Ошибка: Размер прикреплённого файла '.
                        $filesize.' больше допустимого (3 Мб).');
            }
            else
            {
                $filename = $_FILES['ufile']['name'];
                $filepath = $_FILES['ufile']['tmp_name'];
                $filetype = $_FILES['ufile']['type'];
                if($filetype == null ||
                        $filetype == '')
                    $filetype = 'unknown/unknown';
            }
        }
    }

    echo 'Успешно открыт файл: ' . $filename;
    echo "<br/>";
/*
// $filename - имя загруженого файла
    if(is_uploaded_file($filename))
        move_uploaded_file($filename,
                'files/' . basename($filename));
    // файл будет перемещён в каталог files/
*/
    $path = $_FILES['ufile']['tmp_name'];

    $xmlDoc = new DOMDocument();
    $xmlDoc->load($path);

    $x = $xmlDoc->documentElement;
    foreach ($x->childNodes AS $item)
    {
        print $item->nodeName . " = " . $item->nodeValue . "<br>";
    }

}
?>
<div id="page">
    <ul class="nav nav-tabs" id="tabs">
        <li class="current"><a href="/export">Экспорт записей</a></li>
        <li><a href="/import">Импорт записей</a></li>
    </ul>

    <div class="mytabs-container" id="tabs-container">
        Загрузка. Пожалуйста подождите...
    </div>

</div>

<script>
    var containerId = '#tabs-container';
    var tabsId = '#tabs';

    $(document).ready(function(){
        // Preload tab on page load
        if($(tabsId + ' LI.current A').length > 0){
            loadTab($(tabsId + ' LI.current A'));
        }

        $(tabsId + ' A').click(function(){
            if($(this).parent().hasClass('current')){ return false; }

            $(tabsId + ' LI.current').removeClass('current');
            $(this).parent().addClass('current');

            loadTab($(this));
            return false;
        });
    });

    function loadTab(tabObj){
        if(!tabObj || !tabObj.length){ return; }
        $(containerId).addClass('loading');
        $(containerId).fadeOut('fast');

        $(containerId).load(tabObj.attr('href'), function(){
            $(containerId).removeClass('loading');
            $(containerId).fadeIn('fast');
        });
    }

</script>
</body>
</html>


