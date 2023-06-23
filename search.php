<?php
    require_once("func/db_connection.php");
    require_once("func/page_data.php");
    require_once("func/put_content.php");

    $link = connect_to_db();
    $id_page = 7;
    $content = "";
    $templates = get_templates($link, $id_page);
    foreach($templates as $template):
        $raw_content = file_get_contents("$template[link]");
        $content .= put_content($link, $raw_content, $template['id_template'], $id_page);
    endforeach;

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['searchitem'])){
        $searches = get_data_after_search($_POST['searchitem'], $link, 'postarts');
/*                              COOKIE                                          */
        if(isset($_COOKIE['searches'])){
            $_COOKIE['searches'] .= ", " . $_POST['searchitem'];
            setcookie('searches', $_COOKIE['searches'], time() + 60*60*24*365*2 ,'/' );       
            //var_dump($_COOKIE);
        } else {
            setcookie('searches', $_POST['searchitem'], time() + 60*60*24*365*2 ,'/');
            //var_dump($_COOKIE);
        }
    }
    /*                          SEARCHES                                         */
    if($searches){
    $pattern = '/(<!--FOREACH_SEARCH-->)(.*)(<!--ENDFOREACH_SEARCH-->)/s';
    preg_match($pattern, $content, $matches);
    $items_list = "";
    foreach($searches as $search):
        $item = $matches[2];
        $item = preg_replace('/{SEARCH_LINK}/s', $search['link'], $item);
        $item = preg_replace('/{SEARCH_ALT}/s', $search['alt'], $item);
        $item = preg_replace('/{SEARCH_TITLE}/s', $search['title'], $item);
        $items_list .= $item;
    endforeach;

    $pattern = '/(<!--FOREACH_SEARCH-->)(.*?)(<!--ENDFOREACH_SEARCH-->)/s';
    $content = preg_replace($pattern, $items_list, $content);
}
    file_put_contents("temp", $content);
    include "temp";
    unlink("temp");
?>