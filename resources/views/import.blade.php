<!DOCTYPE html>
<html>
<body>
<form action="/file" method="post"
      enctype="multipart/form-data">

    Выберите xml-файл для загрузки:
    <input type="hidden" value="{!! csrf_token() !!}" name="_token">
    <input type="file" name="ufile" /><br />

    <input type="submit" name="send" value="Открыть!" />
</form>

</body>
</html>