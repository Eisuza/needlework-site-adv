<?php $id_template = 14;?>
<?php $banner = get_banner($link, $id_page)?>
<div class="banner_container">
    <div class="banner">
        <div class="main_picture">
            <img src="<?=$banner[1][0]['link']?>" alt="">
        </div>
        <div class="content">
            <span><?=$banner[0][0]['caption']?></span>
            <h3><?=$banner[0][1]['caption']?></h3>
            <p><?=$banner[0][2]['caption']?></p>
            <a href="<?=$banner[1][2]['link']?>" class="btn"><?=$banner[2][0]['button']?></a>
        </div>
        <div class="secondary_picture">
            <img src="<?=$banner[1][1]['link']?>" alt="">
        </div>
    </div>
</div>