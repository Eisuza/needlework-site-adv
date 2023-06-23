<?php $id_template = 1;?>
<!DOCTYPE html>
<html lang="ru">

    <?php
    $captions = get_captions($link, $id_template);
    $login_field = get_sections($link, $id_template);
    $placeholders = get_placeholders($link, $id_template);
    $stylesheets = get_stylesheets($link, $id_template);?>

    <head>
        <?php foreach($stylesheets as $stylesheet):?>
            <link rel="stylesheet" href="<?=$stylesheet['stylesheet']?>">
        <?php endforeach; ?>

        <title><?=$captions[0]['caption']?></title>   
        <meta charset="UTF-8">
        <link rel="icon" href="<?=get_icon($link, $id_template)?>" type="image/x-icon">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial_scale = 1.0">
        <script src="https://kit.fontawesome.com/9f7bbff4cf.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class = "header">
            <a href="<?=$login_field[0]['link']?>" class="login_phrase"><?=$login_field[0]['section']?></a>
            <h1> <?=$captions[1]['caption']?> </h1>
            <form action = "search.php" method = "post">
                <label for = "search"><?=$captions[2]['caption']?></label>

                <input id = "search"  name = "searchitem" type = "text" placeholder="<?=$placeholders[0]['placeholder']?>" required>
                <input type ="submit" value = "<?=get_button($link, $id_template)?>">
            </form>
        </div>
