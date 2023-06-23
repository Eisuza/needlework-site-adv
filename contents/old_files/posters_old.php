<?php $id_template = 5;?>

<br><br>
        <div>
        <?php $images = get_images($link, $id_template);
        foreach($images as $image): ?>           
            <div class ="pictures">
                <img src="<?=$image['link']?>" alt="<?=$image['alt']?>" style="max-width:100%">
            </div>
        <?php endforeach ?>             
        </div>
