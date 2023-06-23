<?php $id_template = 10;?>

<?php $captions = get_captions($link, $id_template);?>
<div class="caption"><?=$captions[0]['caption']?></div>

    <?php $sections = get_sections($link, $id_template); 
        foreach($sections as $section): ?>
        <div>
            <a class="menu_title" href="<?=$section['link']?>"><?=$section['section']?></a>
        </div>
        <?php endforeach ?>