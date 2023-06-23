<?php
    require_once("func/db_connection.php");
    require_once("func/page_data.php");
    require_once("func/put_content.php");

    $link = connect_to_db();
    $id_page = 6;

    $content = "";
    $templates = get_templates($link, $id_page);
    foreach($templates as $template):
        $raw_content = file_get_contents("$template[link]");
        $content .= put_content($link, $raw_content, $template['id_template'], $id_page);
    endforeach;
  
    file_put_contents("temp", $content);
    include "temp";
    unlink("temp");
?>