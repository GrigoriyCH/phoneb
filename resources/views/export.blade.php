<!DOCTYPE html>
<html>
<body>
<form>
    <input type="submit" name="id" value="Экспорт записей" onclick="gosave()"/>
</form>
<SCRIPT LANGUAGE="JavaScript">
    function gosave()
    {
        window.open("/save","","Toolbar=1,Location=1,Directories=1,Status=1, Menubar=1,Scrollbars=1,Resizable=1,Width=600,Height=400");
    }
</SCRIPT>
</body>
</html>