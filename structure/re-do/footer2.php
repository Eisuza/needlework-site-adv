<?php $id_template = 3;?>

<?php $captions = get_captions($link, $id_template);?>
<?php $records = get_records($link, $id_template);?>
<?php $cnt = 0;?>

    <div class="footer">
        <div class="caption"><?=$captions[0]['caption']?></div>
        <div>
            <div>
                <?php foreach($records as $record): ?>
                    <?php if($cnt%2 == 0){ ?>
                    <span class="left"><?=$record['record']?></span>
                     <?php }else{ ?>
                      <span class="right"><?=$record['record']?></span><br>
                      <?php } $cnt++?>                         
                <?php endforeach ?>
            </div>
        </div>
    </div>
</body>
</html>