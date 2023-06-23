<?php $id_template = 8;?>

<?php $captions = get_captions($link, $id_template);?>
<div class="caption"><?=$captions[0]['caption']?></div>
        <div class="item_wrapper">
        <?php $products = get_postarts($link, $id_template);
            foreach($products as $product): ?>
        <div class="item">
            <img class="item_img" src="<?=$product['link']?>" alt="<?=$product['alt']?>">
            <div class="item_text"><?=$product['title']?></div>
        </div>
        <?php endforeach ?>   
        </div>
