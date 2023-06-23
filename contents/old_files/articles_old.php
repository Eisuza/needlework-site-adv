<?php $id_template = 6;
$captions = get_captions($link, $id_template);
$articles = get_articles($link, $id_template);
?>

<div class="caption"><?=$captions[0]['caption']?></div>
    <div>
        <?php foreach($articles as $article): ?>
            <div class="article">
            <div class="article_title"><?=$article['title']?></div>
            <div class="article_text" ><?=$article['text']?></div>
    </div>
        <?php endforeach ?>
</div>
