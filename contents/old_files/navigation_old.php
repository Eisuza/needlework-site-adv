<?php $id_template = 2;?> 
<?php $sections = get_sections($link, $id_template);
      $captions = get_captions($link, $id_template);?>
        <div>
            <nav>
                <ul>
                    <?php foreach($sections as $section): ?>
                    <li><a href="<?=$section['link']?>"><?=$section['section']?></a></li>
                    <?php endforeach ?>                   
                </ul>
            </nav>
        </div>
         <div class="flex_container ">
            <div class="flex_item_left">
                <ul>
                    <li><i class="fa-solid fa-bars"></i>
                        <ul class = "submenu">
                            <?php foreach($sections as $section): ?>
                            <li><a href="<?=$section['link']?>"><?=$section['section']?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="flex_item_right">
                <?=$captions[0]['caption']?>
            </div>
        </div>