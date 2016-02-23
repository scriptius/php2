<?php
namespace App;

class Logger {
    /**
     * 
     * @param type $message
     * @param type $file
     * @param type $line
     * @param type $notice
     */
    public function __construct($message, $file, $line, $notice = 'Отсутствуют') {
       $handle = fopen($_SERVER['DOCUMENT_ROOT'] . '\App\log.txt', 'a');
        fwrite($handle, date('d-m-Y H:i:s', time()) . ' Ошибка:  ' . $message . PHP_EOL);
        fwrite($handle, date('d-m-Y H:i:s', time()) . ' Файл или ресурс где произошло ислючение:  ' . $file . PHP_EOL);
        fwrite($handle, date('d-m-Y H:i:s', time()) . ' Строка или имя функции, где возникла ошибка:  ' . $line . PHP_EOL);
        fwrite($handle, date('d-m-Y H:i:s', time()) . ' Дополнительные сведения:  ' . $notice . PHP_EOL);
        fwrite($handle, '==============================================================' . PHP_EOL);
        fclose($handle); 
    }
   
}