<?php
$link = connect_to_db();
$template_type = $_GET['edit'];
$id_template = get_id_template($link, $template_type);
$banners = get_banners_by_type($link, $id_template);


?><div class="text_color">
<?php foreach($banners as $banner):?>
    <form action="edit_result.php" method="POST">
        <p for="name">Наименование баннера <?=$banner['title']?></p>
        <input name="name" id="name" value="banner_title" style="display:none"><br>
        <label for="id">Новое значение:</label>        
        <input type="id" name="id_banner_title" class="text_field_input" value="<?=$banner['title']?>">
        <input type="submit" name="save" class="form_button" value="Сохранить изменения">
    </form>

        <?php $captions = get_banner_captions($link, $banner['id_banner']);
            foreach($captions as $caption): ?>
                <form action="edit_result.php" method="POST">
                    <label for="name">Текущее значение: <?=$caption['caption']?></label>
                    <input name="name" id="name" value="caption" style="display:none"><br>
                    <label for="id">Новое значение:</label>
                    <input name="id" id="id" value="<?=$caption['id']?>" style="display:none">
                    <input type="text" name="caption" class="text_field_input" value="<?=$caption['caption']?>">
                    <input type="submit" name="save" class="form_button" value="Сохранить изменения">
                </form>
            <?php endforeach;?>

        <?php $images = get_banner_images($link, $banner['id_banner']);
            foreach($images as $image): ?>
                <form action="edit_result.php" method="POST">
                    <label for="name">Текущее значение: <?=$image['link']?></label>
                    <input name="name" id="name" value="image" style="display:none"><br>
                    <label for="id">Новое значение:</label>
                    <input name="id" id="id" value="<?=$image['id']?>" style="display:none">
                    <input type="text" name="link" class="text_field_input" value="<?=$image['link']?>">
                    <input type="submit" name="save" class="form_button" value="Сохранить изменения">
            </form>
        <?php endforeach ?>

        <?php $buttons = get_banner_buttons($link, $banner['id_banner']);
            foreach($buttons as $button): ?>
                <form action="edit_result.php" method="POST">
                    <label for="name">Текущее значение: <?=$button['button']?></label>
                    <input name="name" id="name" value="button" style="display:none"><br>
                    <label for="id">Новое значение:</label>
                    <input name="id" id="id" value="<?=$button['id']?>" style="display:none">
                    <input type="text" name="button" class="text_field_input" value="<?=$button['button']?>">
                    <input type="submit" name="save" class="form_button" value="Сохранить изменения">
                </form>
        <?php endforeach ?>
<?php endforeach ?>         
</div>
