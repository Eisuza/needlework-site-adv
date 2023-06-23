<?php
session_start();
if (isset($_COOKIE['visits'])) {
    $_COOKIE['visits'] .= ", " . date("Y-m-d H:i:s");
    setcookie('visits', $_COOKIE['visits'], time() + 60 * 60 * 24 * 365 * 2, '/');
    //var_dump($_COOKIE);
} else {
    setcookie('visits', date("Y-m-d H:i:s"), time() + 60 * 60 * 24 * 365 * 2, '/');
    //var_dump($_COOKIE);
}
if (isset($_COOKIE['user'])) {
    $_SESSION['user'] = $_COOKIE['user'];
}

if (!isset($_SESSION['ip_statistics'])) {
    $link = connect_to_db();
    require_once("func/statistics.php");
    $ip = get_user_ip();
    $_SESSION['ip_statistics'] = $ip;
    update_iplist($link, $ip);
}


require_once("page_data.php");

function put_content($link, $content, $id_template, $id_page)
{

    $stylesheets = get_stylesheets($link, $id_template);
    $icons = get_icons($link, $id_template);
    $sections = get_sections($link, $id_template);
    $captions = get_captions($link, $id_template);
    $placeholders = get_placeholders($link, $id_template);
    $buttons = get_buttons($link, $id_template);
    $postarts = get_postarts($link, $id_template);
    $images = get_images($link, $id_template);
    $records = get_records($link, $id_template);
    $articles = get_articles($link, $id_template);
    /*ads*/
    $ad_captions = get_ad_captions_by_page($link, $id_page);
    $ad_images = get_ad_images_by_page($link, $id_page);
    $ad_buttons = get_ad_buttons_by_page($link, $id_page);

    /*                          ARTICLES                                         */
    if ($articles) {
        $pattern = '/(<!--FOREACH_ARTICLE-->)(.*)(<!--ENDFOREACH_ARTICLE-->)/s';
        preg_match($pattern, $content, $matches);
        if ($matches) {
            $items_list = "";
            foreach ($articles as $article) :
                $item = $matches[2];
                $item = preg_replace('/{ARTICLE_TITLE}/s', $article['title'], $item);
                $item = preg_replace('/{ARTICLE_TEXT}/s', $article['text'], $item);
                $items_list .= $item;
            endforeach;

            $pattern = '/(<!--FOREACH_ARTICLE-->)(.*?)(<!--ENDFOREACH_ARTICLE-->)/s';
            $content = preg_replace($pattern, $items_list, $content);
        } else {
            foreach ($articles as $article) :
                $content = preg_replace('/{ARTICLE_TITLE}/s', $article['title'], $content, 1);
                $content = preg_replace('/{SECTION_SECTION}/s', $article['text'], $content, 1);
            endforeach;
        }
    }
    /*                          CAPTIONS                                        */
    if ($captions) {
        foreach ($captions as $caption) :
            $content = preg_replace('/{CAPTION}/s', $caption['caption'], $content, 1);
        endforeach;
    }
    /*                          RECORDS                                         */
    if ($records) {
        $pattern = '/(<!--FOREACH_RECORD-->)(.*)(<!--ENDFOREACH_RECORD-->)/s';
        preg_match($pattern, $content, $matches);
        $items_list = "";
        foreach ($records as $record) :
            $item = $matches[2];
            $item = preg_replace('/{RECORD}/s', $record['record'], $item);
            $items_list .= $item;
        endforeach;

        $pattern = '/(<!--FOREACH_RECORD-->)(.*?)(<!--ENDFOREACH_RECORD-->)/s';
        $content = preg_replace($pattern, $items_list, $content);
    }
    /*                          STYLESHEETS                                         */
    if ($stylesheets) {
        $pattern = '/(<!--FOREACH_STYLESHEET-->)(.*)(<!--ENDFOREACH_STYLESHEET-->)/s';
        preg_match($pattern, $content, $matches);
        $items_list = "";
        foreach ($stylesheets as $stylesheet) :
            $item = $matches[2];
            $item = preg_replace('/{STYLESHEET}/s', $stylesheet['stylesheet'], $item);
            $items_list .= $item;
        endforeach;

        $pattern = '/(<!--FOREACH_STYLESHEET-->)(.*?)(<!--ENDFOREACH_STYLESHEET-->)/s';
        $content = preg_replace($pattern, $items_list, $content);
    }

    /*                          ICONS                                        */
    if ($icons) {
        foreach ($icons as $icon) :
            $content = preg_replace('/{ICON}/s', $icon['icon'], $content, 1);
        endforeach;
    }
    /*                          SECTIONS                                         */
    if ($sections) {
        $pattern = '/(<!--FOREACH_SECTION-->)(.*)(<!--ENDFOREACH_SECTION-->)/s';
        preg_match($pattern, $content, $matches);
        if ($matches) {
            $items_list = "";
            foreach ($sections as $section) :
                $item = $matches[2];
                $item = preg_replace('/{SECTION_LINK}/s', $section['link'], $item);
                $item = preg_replace('/{SECTION_SECTION}/s', $section['section'], $item);
                $items_list .= $item;
            endforeach;

            $pattern = '/(<!--FOREACH_SECTION-->)(.*?)(<!--ENDFOREACH_SECTION-->)/s';
            $content = preg_replace($pattern, $items_list, $content);
            $pattern = '/(<!--FOREACH_SECTION#2-->)(.*)(<!--ENDFOREACH_SECTION#2-->)/s';
            $content = preg_replace($pattern, $items_list, $content);
        } elseif (isset($_SESSION['user'])) {
            foreach ($sections as $section) :
                $content = preg_replace('/{SECTION_LINK#}/s', "login/entry_control.php", $content, 1); //header logged in
                $content = preg_replace('/{SECTION_SECTION#}/s', $_SESSION['user'], $content, 1); //header logged in
                $content = preg_replace('/{SECTION_LINK#1}/s', "logout.php", $content, 1); //header logged in
                $content = preg_replace('/{SECTION_SECTION#1}/s', "Выход", $content, 1); //header logged in
                $content = preg_replace('/{SECTION_LINK}/s', $section['link'], $content, 1);
                $content = preg_replace('/{SECTION_SECTION}/s', $section['section'], $content, 1);
            endforeach;
        } else {
            $content = preg_replace('/{SECTION_LINK#1}/s', '{SECTION_LINK#}', $content, 1); //header logged out
            $content = preg_replace('/{SECTION_SECTION#1}/s', '{SECTION_SECTION#}', $content, 1); //header logged out
            foreach ($sections as $section) :
                $content = preg_replace('/{SECTION_LINK}/s', $section['link'], $content, 1);
                $content = preg_replace('/{SECTION_SECTION}/s', $section['section'], $content, 1);
                $content = preg_replace('/{SECTION_LINK#}/s', $section['link'], $content, 1); //header logged out
                $content = preg_replace('/{SECTION_SECTION#}/s', $section['section'], $content, 1); //header logged out
            endforeach;
        }
    }
    /*                          PLACEHOLDERS                                        */
    if ($placeholders) {
        foreach ($placeholders as $placeholder) :
            $content = preg_replace('/{PLACEHOLDER}/s', $placeholder['placeholder'], $content, 1);
        endforeach;
    }
    /*                          BUTTONS                                        */
    if ($buttons) {
        foreach ($buttons as $button) :
            $content = preg_replace('/{BUTTON}/s', $button['button'], $content, 1);
        endforeach;
    }
    /*                          POSTARTS                                         */
    if ($postarts) {
        $pattern = '/(<!--FOREACH_POSTART-->)(.*)(<!--ENDFOREACH_POSTART-->)/s';
        preg_match($pattern, $content, $matches);
        $items_list = "";
        foreach ($postarts as $postart) :
            $item = $matches[2];
            $item = preg_replace('/{POSTART_LINK}/s', $postart['link'], $item);
            $item = preg_replace('/{POSTART_ALT}/s', $postart['alt'], $item);
            $item = preg_replace('/{POSTART_TITLE}/s', $postart['title'], $item);
            $items_list .= $item;
        endforeach;

        $pattern = '/(<!--FOREACH_POSTART-->)(.*?)(<!--ENDFOREACH_POSTART-->)/s';
        $content = preg_replace($pattern, $items_list, $content);
    }
    /*                          IMAGES                                         */
    if ($images) {
        $pattern = '/(<!--FOREACH_IMAGE-->)(.*)(<!--ENDFOREACH_IMAGE-->)/s';
        preg_match($pattern, $content, $matches);
        if ($matches) {
            $items_list = "";
            foreach ($images as $image) :
                $item = $matches[2];
                $item = preg_replace('/{IMAGE_LINK}/s', $image['link'], $item);
                $item = preg_replace('/{IMAGE_ALT}/s', $image['alt'], $item);
                $items_list .= $item;
            endforeach;

            $pattern = '/(<!--FOREACH_IMAGE-->)(.*?)(<!--ENDFOREACH_IMAGE-->)/s';
            $content = preg_replace($pattern, $items_list, $content);
        } else {
            foreach ($images as $image) :
                $content = preg_replace('/{IMAGE_LINK}/s', $image['link'], $content, 1);
                $content = preg_replace('/{IMAGE_ALT}/s', $image['alt'], $content, 1);
            endforeach;
        }
    }
    /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ADVERTISING~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
    if ($ad_captions) {
        foreach ($ad_captions as $ad_caption) :
            $content = preg_replace('/{AD_CAPTION}/s', $ad_caption['caption'], $content, 1);
        endforeach;
    }

    if ($ad_images) {
        $pattern = '/(<!--FOREACH_AD_IMAGE-->)(.*)(<!--ENDFOREACH_AD_IMAGE-->)/s';
        preg_match($pattern, $content, $matches);
        if ($matches) {
            $items_list = "";
            foreach ($ad_images as $ad_image) :
                $item = $matches[2];
                $item = preg_replace('/{AD_IMAGE_LINK}/s', $ad_image['link'], $item);
                $items_list .= $item;
            endforeach;

            $pattern = '/(<!--FOREACH_AD_IMAGE-->)(.*?)(<!--ENDFOREACH_AD_IMAGE-->)/s';
            $content = preg_replace($pattern, $items_list, $content);
        } else {
            foreach ($ad_images as $ad_image) :
                $content = preg_replace('/{AD_IMAGE_LINK}/s', $ad_image['link'], $content, 1);
            endforeach;
        }
    }
    if ($ad_buttons) {
        foreach ($ad_buttons as $ad_button) :
            $content = preg_replace('/{AD_BUTTON}/s', $ad_button['button'], $content, 1);
        endforeach;
    }
    /*~~~~~~~~~~~~~~~~~~~~~~~~~~~SUBSCRIPTION~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/


    $pattern = '/(<!--IF_SUBSCRIPTION-->)(.*)(<!--CALLING_FUNCTION-->)(.*)(<!--ENDIF_SUBSCRIPTION-->)/s';
    preg_match($pattern, $content, $matches);
    if ($matches) {
        $content = preg_replace($pattern, "<?php \$user_email = ''; if(isset(\$_POST['subscribe'])){ \$user_email = \$_POST['email']; ?>  $matches[2]  <?=add_email(\$link, \$user_email)?>  $matches[4]  <?php \$user_email = '';} ?>", $content);
        $pattern = '/{USER_EMAIL}/';
        $replacement = "<?php echo \$user_email ?>";
        $content = preg_replace($pattern, $replacement, $content);
    }
    return $content;
}
