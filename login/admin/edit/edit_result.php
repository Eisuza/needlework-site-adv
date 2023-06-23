<?php session_start();
require_once("../../../func/db_connection.php");
require_once("../../../func/page_data.php");
require_once("../../../func/bd_edit.php");
require_once("../../../func/save_logs.php");?>

<!DOCTYPE html>
<html>
    <?php require("header_part_edit.php"); ?>
    <body>
    <?php
    if (!empty($_SESSION['user'])){ 
        $edit_type = $_POST['name'];
        $link = connect_to_db();
        switch ($edit_type){
            case "caption":
                $id = $_POST['id'];
                $caption = $_POST['caption'];
                $result = edit_caption($link, $id, $caption);
                break;
            case "record":
                $id = $_POST['id'];
                $record = $_POST['record'];
                $result = edit_record($link, $id, $record);
                break;
            case "button":
                $id = $_POST['id'];
                $button = $_POST['button'];
                $result = edit_button($link, $id, $button);
                break;
            case "placeholder":
                $id = $_POST['id'];
                $placeholder = $_POST['placeholder'];
                $result = edit_placeholder($link, $id, $placeholder);
                break;
            case "stylesheet":
                $id = $_POST['id'];
                $stylesheet = $_POST['stylesheet'];
                $result = edit_stylesheet($link, $id, $stylesheet);
                break;
            case "icon":
                $id = $_POST['id'];
                $icon = $_POST['icon'];
                $result = edit_icon($link, $id, $icon);
                break; 
            case "section":
                $id = $_POST['id'];
                $section = $_POST['section'];
                $slink = $_POST['link'];
                $result = edit_section($link, $id, $section, $slink);
                break;
            case "image":
                $id = $_POST['id'];
                $alt = $_POST['alt'];
                $slink = $_POST['link'];
                $result = edit_image($link, $id, $alt, $slink);
                break;
            case "article":
                $id = $_POST['id'];
                $title = $_POST['title'];
                $text = $_POST['text'];
                $result = edit_article($link, $id, $title, $text);
                break;
            case "postart":
                $id = $_POST['id'];
                $title = $_POST['title'];
                $slink = $_POST['link'];
                $alt = $_POST['alt'];
                $result = edit_postart($link, $id, $title, $slink, $alt);
                break;
            case "banner":
                $title = $_POST['title'];
                $result = edit_banner($link, $title);
                break;             
            case "template_link":
                $id_template = $_POST['id'];
                $template_link = $_POST['template_link'];
                $result = edit_template_link($link, $template_link, $id_template);
                break;
            default:
                $result = -1;
                break;
        }
        if ($result = 1){
            $result_phrase = "успешно";
            save_edit_record($edit_type, $_SESSION['user'], $result_phrase);
        } else{
            $result_phrase = "с ошибкой.";
            save_edit_record($edit_type, $_SESSION['user'], $result_phrase);
        }
    require("complete_part_edit.php");
    }
else {
        echo 'Не достаточно прав для просмотра.';?>
        <br><a href="/">На главную></a>
    <?php
    }
    ?>      
</body>
</html>