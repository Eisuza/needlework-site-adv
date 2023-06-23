<?php
    //session_start();


    require_once("func/db_connection.php");
    require_once("func/page_data.php");
    require_once("func/put_content.php");
    require_once("func/cache.php");

    $link = connect_to_db();
    $id_page = 1;

    $cache_folder = "cache/";
    $url = page_refresh_link($link, $id_page);                      //получение адреса текукщей страницы
    $cache_status = check_status_cache_page($cache_folder, $url);   //проверка статуса/существования кэш файла

    if ($cache_status){                                             //если файл годен
       $content = get_cache($cache_folder, $url);                   //помещяем весь его контент на вывод
    } else {
        $content = "";                                              //если файл не годен начинаем его формировать
        $templates = get_templates($link, $id_page);                //получаем все ссылки на шаблоны принадлежащие этой странице
        foreach($templates as $template):                           //и для каждого: 
            $url_template = $template['link'];                                          //получаем адрес шаблона
            $cache_status_template = check_status_cache($cache_folder, $url_template);  //проверяем статус кэш файла шаблона 
            if($cache_status_template){                                                 //если файл годен
                $content_template = get_cache($cache_folder, $url_template);            //помещаем его содержимое в переменную
                $content .= $content_template;                                          //содержимое которой присоединяем к формируемому контенту
            } else {                                                                            //если файл не годен
            $raw_content = file_get_contents($url_template);                                    //получаем контент из шаблона (для его сборки)
            $content_template = put_content($link, $raw_content, $template['id_template'], $id_page);   //собираем шаблон и записываем его в переменную
            $content .= $content_template;                                                      //присоединяем шаблон ко всему контенту
            create_cache($cache_folder, $url_template, $content_template);                      //записываем в кэш файл собранный шаблон
            }
        endforeach;
        create_cache($cache_folder, $url, $content);                //после сборки всех шаблонов записываем в кэш файл всю страницу
    }
    file_put_contents("temp", $content);
    include "temp";
    unlink("temp");
?>