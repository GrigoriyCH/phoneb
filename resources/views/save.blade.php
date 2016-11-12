<?php
 /////////скачивание файла
        $file = 'db.xml';
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="db.xml"');
        readfile($file);
?>