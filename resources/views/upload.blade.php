<html>
	<body>
        <?php
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
	    $filename = $_FILES['file']['name'];
	   	$filepath = $_FILES['file']['tmp_name'];
	   	$filetype = $_FILES['file']['type'];
	   	if($this->filetype == null ||
            $this->filetype == '')
	   	  $this->filetype = 'unknown/unknown';
	  }
	}
  }

  echo 'Успешно загружен файл: ' . $filename;

?>
	</body>
</html>
