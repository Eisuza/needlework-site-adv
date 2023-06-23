<?php
$link = connect_to_db();
$title_page = $_GET['edit'];
$id_page = get_id_page($link, $title_page);
$templates = get_templates($link, $id_page);

?><div class="caption"> ПОДКЛЮЧЕННЫЕ ШАБЛОНЫ</div><?php

foreach($templates as $template):?>
    <div>
        <p class="pages"><span>id: </span><?=$template['id_template']?> <span>Название: </span><?=$template['template_type']?> <span>Ссылка: </span><?=$template['link']?></p>
    </div>
<?php endforeach ?>

<div class="flex_box">
    <form class="item" action="edit_page_elements.php" method="POST">
        <input name="id_page" value="<?=$id_page?>" style="display:none">
        <input name="operation" value="file_edit" style="display:none">
        <input type="submit" name="change" class="form_button" value="Изменить файл">
    </form>
    <form class="item" action="edit_page_elements.php" method="POST">
        <input name="id_page" value="<?=$id_page?>" style="display:none">
        <input name="operation" value="places_change" style="display:none">
        <input type="submit" name="change" class="form_button" value="Функция скоро появится">
    </form>
    <form class="item" action="edit_page_elements.php" method="POST">
        <input name="id_page" value="<?=$id_page?>" style="display:none">
        <input name="operation" value="name_change" style="display:none">
        <input type="submit" name="change" class="form_button" value="Изменить название">
    </form>
</div>   