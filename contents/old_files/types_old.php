<?php $id_template = 7;?>

<div>
    <?php $images = get_images($link, $id_template);
    $articles = get_articles($link, $id_template);
    $article = 0;
        foreach($images as $image): ?>       
            <div class="caption">
                <img src="<?=$image['link']?>" alt="<?=$image['alt']?>">
                    <?=$articles[$article]['title']?>
            </div>
            <p><?=$articles[$article]['text']?></p>
            <?php $article +=1;
            endforeach ?>   
        </div>
