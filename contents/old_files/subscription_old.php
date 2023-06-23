<?php $id_template = 13;
$captions = get_captions($link, $id_template);
$placeholders = get_placeholders($link, $id_template);
$images = get_images($link, $id_template); ?>
<div class="subscription">

    <h1><?=$captions[0]['caption']?></h1>
    <form action = "<?=page_refresh_link($link, $id_page)?>" method = "POST" class="email">
        <?php
        $user_email = "";
        if(isset($_POST['subscribe'])){
            $user_email = $_POST['email'];
            ?><div class="alert"><?=add_email($link, $user_email)?></div><?php
            $user_email = "";   
        }
        ?>
        <input type="email" placeholder="<?=$placeholders[0]['placeholder']?>" name="email" required value="<?php echo $user_email ?>">
        <img src="<?=$images[0]['link']?>" alt="<?=$images[0]['alt']?>" class="icon">
        <button type="submit" name="subscribe"><?=get_button($link, $id_template)?></button>
</form>
</div>
