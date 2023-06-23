<?php
$link = connect_to_db();
$template_type = $_GET['edit'];
$id_template = get_id_template($link, $template_type);
$template_link = get_template_link($link, $id_template);
$articles = get_articles($link, $id_template);
$buttons = get_buttons($link, $id_template);
$captions = get_captions($link, $id_template);
$icons = get_icons($link, $id_template);
$images = get_images($link, $id_template);
$placeholders = get_placeholders($link, $id_template);
$postarts = get_postarts($link, $id_template);
$records = get_records($link, $id_template);
$sections = get_sections($link, $id_template);
$stylesheets = get_stylesheets($link, $id_template);
save_template_view($template_type, $_SESSION['user']);
?>
<div class="text_color">
    <p>ФАЙЛ ШАБЛОНА:</p>
        <form action="edit_result.php" method="POST">
                <label for="name">Текущее значение: <?=$template_link?></label>
                <input name="name" id="name" value="template_link" style="display:none"><br>
                <label for="id">Новое значение:</label>
                <input name="id" id="id" value="<?=$id_template?>" style="display:none">
                <input type="text" name="template_link" class="text_field_input" value="<?=$template_link?>">
                <input type="submit" name="save" class="form_button" value="Сохранить изменения">
            </form>
    <p>Текстовые надписи, заголовки:</p>
        <?php foreach($captions as $caption): ?>
            <form action="edit_result.php" method="POST">
                <label for="name">Текущее значение: <?=$caption['caption']?></label>
                <input name="name" id="name" value="caption" style="display:none"><br>
                <label for="id">Новое значение:</label>
                <input name="id" id="id" value="<?=$caption['id']?>" style="display:none">
                <input type="text" name="caption" class="text_field_input" value="<?=$caption['caption']?>">
                <input type="submit" name="save" class="form_button" value="Сохранить изменения">
            </form>
        <?php endforeach ?>

    <p>Надписи со ссылками:</p>
        <?php foreach($sections as $section): ?>
            <form action="edit_result.php" method="POST">
            <div style="border:1px solid #4e0606;">
                <label for="name">Текущее значение: <?=$section['section']?></label>
                <input name="name" id="name" value="section" style="display:none"><br>
                <label for="id">Новое значение:</label>
                <input name="id" id="id" value="<?=$section['id']?>" style="display:none">
                <input type="text" name="section" class="text_field_input" value="<?=$section['section']?>"><br>
                <label>Текущее значение: <?=$section['link']?></label><br>
                <label>Новое значение:</label>
                <input type="text" name="link" class="text_field_input" value="<?=$section['link']?>">
                <input type="submit" name="save" class="form_button" value="Сохранить изменения">
            </div>
            </form>
        <?php endforeach ?> 

    <p>Картинки:</p>
        <?php foreach($images as $image): ?>
            <form action="edit_result.php" method="POST">
            <div style="border:1px solid #4e0606;">
                <label for="name">Текущее значение: <?=$image['link']?></label>
                <input name="name" id="name" value="image" style="display:none"><br>
                <label for="id">Новое значение:</label>
                <input name="id" id="id" value="<?=$image['id']?>" style="display:none">
                <input type="text" name="link" class="text_field_input" value="<?=$image['link']?>"><br>
                <label>Текущее значение: <?=$image['alt']?></label><br>
                <label>Новое значение:</label>
                <input type="text" name="alt" class="text_field_input" value="<?=$image['alt']?>">
                <input type="submit" name="save" class="form_button" value="Сохранить изменения">
            </div>
            </form>
        <?php endforeach ?>

    <p>Короткие записи без заголовка:</p>
        <?php foreach($records as $record): ?>
            <form action="edit_result.php" method="POST">
                <label for="name">Текущее значение: <?=$record['record']?></label>
                <input name="name" id="name" value="record" style="display:none"><br>
                <label for="id">Новое значение:</label>
                <input name="id" id="id" value="<?=$record['id']?>" style="display:none">
                <input type="text" name="record" class="text_field_input" value="<?=$record['record']?>">
                <input type="submit" name="save" class="form_button" value="Сохранить изменения">
            </form>
        <?php endforeach ?> 

    <p>Короткий текст с картинкой:</p> 
        <?php foreach($postarts as $postart): ?>
            <form action="edit_result.php" method="POST">
            <div style="border:1px solid #4e0606;">
                <label for="name">Текущее значение: <?=$postart['title']?></label>
                <input name="name" id="name" value="postart" style="display:none"><br>
                <label for="id">Новое значение:</label>
                <input name="id" id="id" value="<?=$postart['id']?>" style="display:none">
                <input type="text" name="title" class="text_field_input" value="<?=$postart['title']?>"><br>
                <label>Текущее значение: <?=$postart['link']?></label><br>
                <label>Новое значение:</label>
                <input type="text" name="link" class="text_field_input" value="<?=$postart['link']?>"><br>
                <label>Текущее значение: <?=$postart['alt']?></label><br>
                <label>Новое значение:</label>
                <input type="text" name="alt" class="text_field_input" value="<?=$postart['alt']?>">
                <input type="submit" name="save" class="form_button" value="Сохранить изменения">
            </div>
            </form>
        <?php endforeach ?> 

    <p>Тексты с заголовками:</p>     
        <?php foreach($articles as $article): ?>
            <form action="edit_result.php" method="POST">
            <div style="border:1px solid #4e0606;">
                <label for="name">Текущее значение: <?=$article['title']?></label>
                <input name="name" id="name" value="article" style="display:none"><br>
                <label for="id">Новое значение:</label>
                <input name="id" id="id" value="<?=$article['id']?>" style="display:none">
                <input type="text" name="title" class="text_field_input" value="<?=$article['title']?>"><br>
                <label>Текущее значение: <?=$article['text']?></label><br>
                <label>Новое значение:</label>
                <input type="text" name="text" class="text_field_input" value="<?=$article['text']?>">
                <input type="submit" name="save" class="form_button" value="Сохранить изменения">
            </div>
            </form>
        <?php endforeach ?> 

    <p>Кнопки (надписи на них):</p>
        <?php foreach($buttons as $button): ?>
            <form action="edit_result.php" method="POST">
                <label for="name">Текущее значение: <?=$button['button']?></label>
                <input name="name" id="name" value="button" style="display:none"><br>
                <label for="id">Новое значение:</label>
                <input name="id" id="id" value="<?=$button['id']?>" style="display:none">
                <input type="text" name="button" class="text_field_input" value="<?=$button['button']?>">
                <input type="submit" name="save" class="form_button" value="Сохранить изменения">
            </form>
        <?php endforeach ?> 


    <p>Фразы подсказок (placeholders):</p>
        <?php foreach($placeholders as $placeholder): ?>
            <form action="edit_result.php" method="POST">
                <label for="name">Текущее значение: <?=$placeholder['placeholder']?></label>
                <input name="name" id="name" value="placeholder" style="display:none"><br>
                <label for="id">Новое значение:</label>
                <input name="id" id="id" value="<?=$placeholder['id']?>" style="display:none">
                <input type="text" name="placeholder" class="text_field_input" value="<?=$placeholder['placeholder']?>">
                <input type="submit" name="save" class="form_button" value="Сохранить изменения">
            </form>
        <?php endforeach ?> 

    <p>Стили (адрес файлов .css):</p>
        <?php foreach($stylesheets as $stylesheet): ?>
            <form action="edit_result.php" method="POST">
                <label for="name">Текущее значение: <?=$stylesheet['stylesheet']?></label>
                <input name="name" id="name" value="stylesheet" style="display:none"><br>
                <label for="id">Новое значение:</label>
                <input name="id" id="id" value="<?=$stylesheet['id']?>" style="display:none">
                <input type="text" name="stylesheet" class="text_field_input" value="<?=$stylesheet['stylesheet']?>">
                <input type="submit" name="save" class="form_button" value="Сохранить изменения">
            </form>
        <?php endforeach ?> 

    <p>Иконки (адрес файла .ico):</p>
        <?php foreach($icons as $icon): ?>
            <form action="edit_result.php" method="POST">
                <label for="name">Текущее значение: <?=$icon['icon']?></label>
                <input name="name" id="name" value="icon" style="display:none"><br>
                <label for="id">Новое значение:</label>
                <input name="id" id="id" value="<?=$icon['id']?>" style="display:none">
                <input type="text" name="icon" class="text_field_input" value="<?=$icon['icon']?>">
                <input type="submit" name="save" class="form_button" value="Сохранить изменения">
            </form>
        <?php endforeach ?> 
</div>