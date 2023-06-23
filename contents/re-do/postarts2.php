<?php $id_template = 4;?>
<?php $captions = get_captions($link, $id_template);?>
<?php $postarts = get_postarts($link, $id_template);?>

<div class = "content_box">
    <div class="caption"><?=$captions[0]['caption']?></div>
        <div class="item_wrapper">
           
            <?php foreach($postarts as $postart): ?>           
                <div class="item">
                    <img src="<?=$postart['link']?>" alt="<?=$postart['alt']?>">
                    <?=$postart['title']?>
                </div>
            <?php endforeach ?>   
        </div>
</div>