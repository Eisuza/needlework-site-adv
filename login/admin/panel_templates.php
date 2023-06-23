<?php
    require_once("func/db_connection.php");
    require_once("func/page_data.php");
    $link = connect_to_db();

    $edits = get_templates($link, $id_page);
    foreach($edits as $edit): ?>
        <form action="login/admin/edit/edit_template.php" method="GET">
            <p><input type="submit" name="edit" class="form_button" value="<?=$edit['template_type']?>"></p>
        </form>
    <?php endforeach ?>
    <br>
    <?php
        $edits = get_templates($link, $id_page+1);
    foreach($edits as $edit): ?>
        <form action="login/admin/edit/edit_template_banner.php" method="GET">
            <p><input type="submit" name="edit" class="form_button" value="<?=$edit['template_type']?>"></p>
        </form>
<?php endforeach ?>