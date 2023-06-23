<?php
function get_data_after_search($request, $link, $table)
{
    $request = trim(strip_tags(stripcslashes(htmlspecialchars($request))));
    $query = "SELECT p.* FROM $table AS p WHERE p.title LIKE '%$request%'";
    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));

    $amount = mysqli_num_rows($result);
    $rows = array();

    for ($i = 0; $i < $amount; $i++) {
        $row = mysqli_fetch_assoc($result);
        $rows[] = $row;
    }

    return $rows;
}

function get_templates($link, $id_page)
{            // no banners
    $query = "SELECT templates.id_template, templates.link, templates.template_type FROM templates JOIN pages JOIN pages_templates
    ON ($id_page = pages_templates.id_page) AND (templates.id_template = pages_templates.id_template) GROUP BY id ORDER BY id";
    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));

    $amount = mysqli_num_rows($result);
    $rows = array();

    for ($i = 0; $i < $amount; $i++) {
        $row = mysqli_fetch_assoc($result);
        $rows[] = $row;
    }
    return $rows;
}

function get_id_template($link, $template_type)
{
    $query = "SELECT id_template, template_type FROM templates WHERE template_type = '$template_type'";
    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));
    $id_template = $result->fetch_assoc();
    return $id_template['id_template'];
}

function get_template_link($link, $id_template)
{
    $query = "SELECT templates.link FROM templates WHERE id_template = '$id_template' ";
    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));
    $template_link = $result->fetch_assoc();
    return $template_link['link'];
}

function get_stylesheet($link, $id_template)
{
    $query = "SELECT stylesheet FROM stylesheets JOIN templates JOIN templates_stylesheets
    ON ($id_template = templates_stylesheets.id_template) AND (stylesheets.id = templates_stylesheets.id_stylesheet) GROUP BY templates_stylesheets.id";
    $result = mysqli_query($link, $query);
    $stylesheet = $result->fetch_assoc();
    return $stylesheet['stylesheet'];
}

function get_stylesheets($link, $id_template)
{
    $query = "SELECT stylesheet, stylesheets.id FROM stylesheets JOIN templates JOIN templates_stylesheets
    ON ($id_template = templates_stylesheets.id_template) AND (stylesheets.id = templates_stylesheets.id_stylesheet) GROUP BY templates_stylesheets.id";
    $result = mysqli_query($link, $query);

    $amount = mysqli_num_rows($result);
    $stylesheets = array();

    for ($i = 0; $i < $amount; $i++) {
        $stylesheet = mysqli_fetch_assoc($result);
        $stylesheets[] = $stylesheet;
    }
    return $stylesheets;
}

function get_icon($link, $id_template)
{
    $query = "SELECT icon FROM icons JOIN templates JOIN templates_icons
    ON ($id_template = templates_icons.id_template) AND (icons.id = templates_icons.id_icon)";
    $result = mysqli_query($link, $query);
    $icon = $result->fetch_assoc();
    return $icon['icon'];
}

function get_icons($link, $id_template)
{
    $query = "SELECT DISTINCT icon, icons.id FROM icons JOIN templates JOIN templates_icons
    ON ($id_template = templates_icons.id_template) AND (icons.id = templates_icons.id_icon)";
    $result = mysqli_query($link, $query);
    $amount = mysqli_num_rows($result);
    $icons = array();

    for ($i = 0; $i < $amount; $i++) {
        $icon = mysqli_fetch_assoc($result);
        $icons[] = $icon;
    }
    return $icons;
}

function get_sections($link, $id_template)
{
    $query = "SELECT sections.link, sections.id, section FROM sections JOIN templates JOIN templates_sections
    ON ($id_template = templates_sections.id_template) AND (sections.id = templates_sections.id_section) GROUP BY id ORDER BY id";
    $result = mysqli_query($link, $query);

    $amount = mysqli_num_rows($result);
    $sections = array();

    for ($i = 0; $i < $amount; $i++) {
        $section = mysqli_fetch_assoc($result);
        $sections[] = $section;
    }
    return $sections;
}
function get_captions($link, $id_template)
{
    $query = "SELECT caption, captions.id  FROM captions JOIN templates JOIN templates_captions
    ON ($id_template = templates_captions.id_template) AND (captions.id = templates_captions.id_caption) GROUP BY id ORDER BY id";
    $result = mysqli_query($link, $query);

    $amount = mysqli_num_rows($result);
    $captions = array();

    for ($i = 0; $i < $amount; $i++) {
        $caption = mysqli_fetch_assoc($result);
        $captions[] = $caption;
    }
    return $captions;
}

function get_placeholders($link, $id_template)
{
    $query = "SELECT placeholder, placeholders.id FROM placeholders JOIN templates JOIN templates_placeholders
    ON ($id_template = templates_placeholders.id_template) AND (placeholders.id = templates_placeholders.id_placeholder) GROUP BY templates_placeholders.id";
    $result = mysqli_query($link, $query);

    $amount = mysqli_num_rows($result);
    $placeholders = array();

    for ($i = 0; $i < $amount; $i++) {
        $placeholder = mysqli_fetch_assoc($result);
        $placeholders[] = $placeholder;
    }
    return $placeholders;
}

function get_button($link, $id_template)
{
    $query = "SELECT button FROM buttons JOIN templates JOIN templates_buttons
    ON ($id_template = templates_buttons.id_template) AND (buttons.id = templates_buttons.id_button)";
    $result = mysqli_query($link, $query);
    $button = $result->fetch_assoc();
    return $button['button'];
}

function get_buttons($link, $id_template)
{
    $query = "SELECT DISTINCT button, buttons.id FROM buttons JOIN templates JOIN templates_buttons
    ON ($id_template = templates_buttons.id_template) AND (buttons.id = templates_buttons.id_button)";
    $result = mysqli_query($link, $query);

    $amount = mysqli_num_rows($result);
    $buttons = array();

    for ($i = 0; $i < $amount; $i++) {
        $button = mysqli_fetch_assoc($result);
        $buttons[] = $button;
    }
    return $buttons;
}

function get_postarts($link, $id_template)
{
    $query = "SELECT postarts.title, postarts.link, postarts.alt, postarts.id FROM postarts JOIN templates JOIN templates_postarts
    ON ($id_template = templates_postarts.id_template) AND (postarts.id = templates_postarts.id_postart) GROUP BY postarts.id";
    $result = mysqli_query($link, $query);

    $amount = mysqli_num_rows($result);
    $postarts = array();

    for ($i = 0; $i < $amount; $i++) {
        $postart = mysqli_fetch_assoc($result);
        $postarts[] = $postart;
    }
    return $postarts;
}

function get_images($link, $id_template)
{
    $quary = "SELECT images.link, images.alt, images.id FROM images JOIN templates JOIN templates_images
    ON ($id_template = templates_images.id_template) AND (images.id = templates_images.id_image) GROUP BY images.id";
    $result = mysqli_query($link, $quary);

    $amount = mysqli_num_rows($result);
    $images = array();

    for ($i = 0; $i < $amount; $i++) {
        $image = mysqli_fetch_assoc($result);
        $images[] = $image;
    }
    return $images;
}

function get_records($link, $id_template)
{
    $quary = "SELECT record, records.id FROM records JOIN templates JOIN templates_records
    ON ($id_template = templates_records.id_template) AND (records.id = templates_records.id_record) GROUP BY records.id";
    $result = mysqli_query($link, $quary);

    $amount = mysqli_num_rows($result);
    $records = array();

    for ($i = 0; $i < $amount; $i++) {
        $record = mysqli_fetch_assoc($result);
        $records[] = $record;
    }
    return $records;
}

function get_articles($link, $id_template)
{
    $quary = "SELECT articles.title, articles.text, articles.id FROM articles JOIN templates JOIN templates_articles
    ON ($id_template = templates_articles.id_template) AND (articles.id = templates_articles.id_article) GROUP BY articles.id";
    $result = mysqli_query($link, $quary);

    $amount = mysqli_num_rows($result);
    $articles = array();

    for ($i = 0; $i < $amount; $i++) {
        $article = mysqli_fetch_assoc($result);
        $articles[] = $article;
    }
    return $articles;
}

function page_refresh_link($link, $id_page)
{
    $quary = "SELECT link FROM pages WHERE id_page  = $id_page";
    $result = mysqli_query($link, $quary);
    $refresh_link = $result->fetch_assoc();
    return $refresh_link['link'];
}

function add_email($link, $user_email)
{
    if (filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        $quary = "SELECT email FROM subscriptions WHERE email = '$user_email'";
        $result = mysqli_query($link, $quary);

        if (mysqli_num_rows($result) > 0) {
            return "Данный ящик уже присутствует в списке.";
        } else {
            $quary = "INSERT INTO subscriptions(email) VALUES ('$user_email')";

            if (!mysqli_query($link, $quary))
                die(mysqli_error($link));
            return "Теперь вы подписаны!";
        }
    } else {
        return "Почтовый ящик указан с ошибкой";
    }
}

function get_ad_captions_by_page($link, $id_page)
{                       // удалить
    $quary = "SELECT caption, captions.id FROM captions JOIN pages_banners JOIN banners_list JOIN banners_list_captions  
    ON($id_page = pages_banners.id_page) AND (pages_banners.id_banner = banners_list.id_banner)
    AND (banners_list.id_banner = banners_list_captions.id_banner) 
    AND (banners_list_captions.id_caption = captions.id) GROUP BY captions.id ORDER BY captions.id";
    $result = mysqli_query($link, $quary);

    $amount = mysqli_num_rows($result);
    $captions = array();

    for ($i = 0; $i < $amount; $i++) {
        $caption = mysqli_fetch_assoc($result);
        $captions[] = $caption;
    }
    return $captions;
}
function get_ad_images_by_page($link, $id_page)
{
    $quary = "SELECT images.link, images.id, banners_list_images.id FROM images JOIN pages_banners JOIN banners_list JOIN banners_list_images  
    ON($id_page = pages_banners.id_page) AND(pages_banners.id_banner = banners_list.id_banner)
    AND (banners_list.id_banner = banners_list_images.id_banner) 
    AND (banners_list_images.id_image = images.id) GROUP BY banners_list_images.id ORDER BY banners_list_images.id";
    $result = mysqli_query($link, $quary);

    $amount = mysqli_num_rows($result);
    $images = array();

    for ($i = 0; $i < $amount; $i++) {
        $image = mysqli_fetch_assoc($result);
        $images[] = $image;
    }
    return $images;
}
function get_ad_buttons_by_page($link, $id_page)
{
    $quary = "SELECT button, buttons.id FROM buttons JOIN pages_banners JOIN banners_list JOIN banners_list_buttons  
    ON($id_page = pages_banners.id_page) AND(pages_banners.id_banner = banners_list.id_banner)
    AND (banners_list.id_banner = banners_list_buttons.id_banner) 
    AND (banners_list_buttons.id_button = buttons.id) GROUP BY buttons.id ORDER BY buttons.id";
    $result = mysqli_query($link, $quary);

    $amount = mysqli_num_rows($result);
    $buttons = array();

    for ($i = 0; $i < $amount; $i++) {
        $button = mysqli_fetch_assoc($result);
        $buttons[] = $button;
    }
    return $buttons;
}
function get_banners_by_type($link,  $id_template)
{
    $quary = "SELECT banners_list.title, id_banner FROM banners_list WHERE id_template = ' $id_template' ";
    $result = mysqli_query($link, $quary);

    $amount = mysqli_num_rows($result);
    $banners = array();

    for ($i = 0; $i < $amount; $i++) {
        $banner = mysqli_fetch_assoc($result);
        $banners[] = $banner;
    }
    return $banners;
}

function get_banner_captions($link, $id_banner)
{
    $quary = "SELECT caption, captions.id FROM captions JOIN banners_list JOIN banners_list_captions  
    ON ($id_banner = banners_list.id_banner) AND (banners_list.id_banner = banners_list_captions.id_banner) 
    AND (banners_list_captions.id_caption = captions.id) GROUP BY captions.id ORDER BY captions.id";
    $result = mysqli_query($link, $quary);

    $amount = mysqli_num_rows($result);
    $captions = array();

    for ($i = 0; $i < $amount; $i++) {
        $caption = mysqli_fetch_assoc($result);
        $captions[] = $caption;
    }
    return $captions;
}

function get_banner_images($link, $id_banner)
{
    $quary = "SELECT images.link, images.id FROM images JOIN banners_list JOIN banners_list_images  
    ON ($id_banner = banners_list.id_banner) AND (banners_list.id_banner = banners_list_images.id_banner) 
    AND (banners_list_images.id_image = images.id) GROUP BY images.id ORDER BY images.id";
    $result = mysqli_query($link, $quary);

    $amount = mysqli_num_rows($result);
    $images = array();

    for ($i = 0; $i < $amount; $i++) {
        $image = mysqli_fetch_assoc($result);
        $images[] = $image;
    }
    return $images;
}

function get_banner_buttons($link, $id_banner)
{
    $quary = "SELECT button, buttons.id FROM buttons JOIN banners_list JOIN banners_list_buttons  
    ON ($id_banner = banners_list.id_banner) AND (banners_list.id_banner = banners_list_buttons.id_banner) 
    AND (banners_list_buttons.id_button = buttons.id) GROUP BY buttons.id ORDER BY buttons.id";
    $result = mysqli_query($link, $quary);

    $amount = mysqli_num_rows($result);
    $buttons = array();

    for ($i = 0; $i < $amount; $i++) {
        $button = mysqli_fetch_assoc($result);
        $buttons[] = $button;
    }
    return $buttons;
}

function get_pages($link, $id_site)
{
    $quary = "SELECT id_page, title_page, pages.link FROM pages WHERE site = '$id_site' ";
    $result = mysqli_query($link, $quary);

    $amount = mysqli_num_rows($result);
    $pages = array();

    for ($i = 0; $i < $amount; $i++) {
        $page = mysqli_fetch_assoc($result);
        $pages[] = $page;
    }
    return $pages;
}
function get_id_page($link, $title_page)
{
    $quary = "SELECT id_page FROM pages WHERE title_page = '$title_page' ";
    $result = mysqli_query($link, $quary);
    if (!$result)
        die(mysqli_error($link));
    $id_page = $result->fetch_assoc();
    return $id_page['id_page'];
}

function get_users($link)
{
    $quary = "SELECT * FROM user";
    $result = mysqli_query($link, $quary);
    $amount = mysqli_num_rows($result);
    $users = array();

    for ($i = 0; $i < $amount; $i++) {
        $user = mysqli_fetch_assoc($result);
        $users[] = $user;
    }
    return $users;
}
function get_ips($link)
{
    $quary = "SELECT * FROM iplist ORDER BY amount DESC";
    $result = mysqli_query($link, $quary);
    $amount = mysqli_num_rows($result);
    $ips = array();

    for ($i = 0; $i < $amount; $i++) {
        $ip = mysqli_fetch_assoc($result);
        $ips[] = $ip;
    }
    return $ips;
}
function get_user_email($link, $login){
    $quary = "SELECT email FROM user WHERE login = '$login'";
    $result = mysqli_query($link, $quary);
    if (!$result)
        die(mysqli_error($link));
    $email = $result->fetch_assoc();
    return $email['email'];
}
function get_emails_for_notifications($link){
    $quary = "SELECT email FROM subscriptions GROUP BY email";
    $result = mysqli_query($link, $quary);
    $amount = mysqli_num_rows($result);
    $emails = array();

    for ($i = 0; $i < $amount; $i++) {
        $email = mysqli_fetch_assoc($result);
        $emails[] = $email;
    }
    return $emails;
}