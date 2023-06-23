<?php
function save_login_admin($user){
    $date = date("Y-m-d H:i:s");
    $filename = "logs/admin_logs.txt";
    $expression = "Вход в административную панель";          
    $logcontent = $date . "\t" .  $user . "\t" . $expression . "\n";       
    if (is_writable($filename)) {
        if (!$fp = fopen($filename, 'a')) {
            echo "Проблема с отрытием файла ($filename)";
            exit;
        }
        if (fwrite($fp, $logcontent) === FALSE) {
            echo "Проблема при записи в файл ($filename)";
            exit;
        }
        fclose($fp);
    } else {
        echo "Файл $filename недоступен для записи";
    }
}
function save_template_view($template_type, $user){
    $date = date("Y-m-d H:i:s");
    $filename = "../../../logs/admin_logs.txt";
    $expression = "Вход в панель редактирования шаблона ";          
    $logcontent = $date . "\t" .  $user . "\t" . $expression . $template_type . "\n";       
    if (is_writable($filename)) {
        if (!$fp = fopen($filename, 'a')) {
            echo "Проблема с отрытием файла ($filename)";
            exit;
        }
        if (fwrite($fp, $logcontent) === FALSE) {
            echo "Проблема при записи в файл ($filename)";
            exit;
        }
        fclose($fp);
    } else {
        echo "Файл $filename недоступен для записи";
    }
}
function save_edit_record($edit_type, $user, $result_phrase){
    $date = date("Y-m-d H:i:s");
    $filename = "../../../logs/admin_logs.txt";
    $expression = "Внесение изменений в элемент ";          
    $logcontent = $date . "\t" .  $user . "\t" . $expression . $edit_type . " выполнено " . $result_phrase . "\n";       
    if (is_writable($filename)) {
        if (!$fp = fopen($filename, 'a')) {
            echo "Проблема с отрытием файла ($filename)";
            exit;
        }
        if (fwrite($fp, $logcontent) === FALSE) {
            echo "Проблема при записи в файл ($filename)";
            exit;
        }
        fclose($fp);
    } else {
        echo "Файл $filename недоступен для записи";
    }
}
?>