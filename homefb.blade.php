<!DOCTYPE html>
<html>
<head>
    <title>Заголовок окна Home</title>
    <link rel="stylesheet" href={{asset('css/tabs.css')}}/>
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

    <div id="page">

        <h3>Главная</h3>
        <hr>

        <ul class="nav nav-tabs" id="tabs">
            <li class="active"><a href="/sendkontakt?id=1">Знакомые</a></li>
            <li><a href="/sendkontakt?id=2">Колеги</a></li>
            <li><a href="/sendkontakt?id=3">Друзья</a></li>
            <li><a href="/sendkontakt?id=4">Без категории</a></li>
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
        if($(tabsId + ' LI.active A').length > 0){
            loadTab($(tabsId + ' LI.active A'));
        }

        $(tabsId + ' A').click(function(){
            if($(this).parent().hasClass('active')){ return false; }

            $(tabsId + ' LI.active').removeClass('active');
            $(this).parent().addClass('active');

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
    </div>
</body>
</html>


