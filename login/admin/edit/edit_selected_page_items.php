<?php
switch($operation){
            case "file_edit":
                foreach($templates as $template):?>
                <form action="edit_result.php" method="POST">
                    <label for="name">Текущее значение: <?=$template['link']?></label>
                    <input name="name" id="name" value="template_link" style="display:none"><br>
                    <label for="id">Новое значение:</label>
                    <input name="id" id="id" value="<?=$template['id_template']?>" style="display:none">
                    <input type="text" name="template_link" class="text_field_input" value="<?=$template['link']?>">
                    <input type="submit" name="save" class="form_button" value="Сохранить изменения">
                </form>
                <?php endforeach;
                break;
            case "places_change":  //еще нет
                ?><p>Расставить id в нужном порядке</p><?php
                foreach($templates as $template):?>
                <form action="edit_result.php" method="POST">
                    <label for="name">Шаблон:<?=$template['template_type']?> его id: <?=$template['id_template']?></label>
                    <input name="name" id="name" value="place_switch" style="display:none"><br>
                    <label for="id">Новое значение:</label>
                    <input name="id" id="id" value="<?=$template['id_template']?>" style="display:none">
                    <input type="text" name="template_link" class="text_field_input" value="<?=$template['id_template']?>">
                    <input type="submit" name="save" class="form_button" value="Сохранить изменения">
                </form>
                <?php endforeach;
                break;
            case "name_change":     //еще нет
                foreach($templates as $template):?>
                <form action="edit_result.php" method="POST">
                    <label for="name">Текущее значение: <?=$template['template_type']?></label>
                    <input name="name" id="name" value="template_type" style="display:none"><br>
                    <label for="id">Новое значение:</label>
                    <input name="id" id="id" value="<?=$template['id_template']?>" style="display:none">
                    <input type="text" name="template_type" class="text_field_input" value="<?=$template['template_type']?>">
                    <input type="submit" name="save" class="form_button" value="Сохранить изменения">
                </form>
                <?php endforeach;
                break;
            default: break;
        }
?>