<?php $id_template = 9;?>

<?php $captions = get_captions($link, $id_template);?>
    <div class="caption"><?=$captions[0]['caption']?></div>
    <div class="feedback">
        <?=$captions[1]['caption']?><br>
        <?=$captions[2]['caption']?><br>
        <?=$captions[3]['caption']?><br>
        <?=$captions[4]['caption']?>
    </div>

    <div class="caption"><?=$captions[5]['caption']?></div>          
    <form action = "send.php" method = "post" class="feedback">
        <br>
        <?php $placeholders = get_placeholders($link, $id_template); ?>
        <label for = "senderName"><?=$captions[6]['caption']?></label>
        <input id = "senderName"  name = "name" type = "text" placeholder="<?=$placeholders[0]['placeholder']?>" required><br><br>
        <label for = "senderEmail"><?=$captions[7]['caption']?></label>
        <input id = "senderEmail" name = "email" type = "email" placeholder = "<?=$placeholders[1]['placeholder']?>"><br><br>
        <label for = "comment"><?=$captions[8]['caption']?></label><br>
        <textarea id = "comment" name = "comment" id = "" cols = "35" rows = "10" placeholder = "<?=$placeholders[2]['placeholder']?>"></textarea>
        <input type ="submit" value = "<?=get_button($link, $id_template)?>"><br>
        <br>
    </form>