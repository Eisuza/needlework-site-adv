<?php
    require_once("func/db_connection.php");
    require_once("func/page_data.php");
    $link = connect_to_db();
    $id_site = 1;

    $edits = get_pages($link, $id_site);
    foreach($edits as $edit): ?>
        <form action="login/admin/edit/edit_page.php" method="GET">
            <p><input type="submit" name="edit" class="form_button" value="<?=$edit['title_page']?>"></p>
        </form>
    <?php endforeach ?>
