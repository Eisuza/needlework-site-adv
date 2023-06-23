<?php $id_template = 3;?>

    <?php $captions = get_captions($link, $id_template);?>
    <div class="caption">
         <?=$captions[0]['caption']?>
    </div>
        <div class="footer">
            <table>
                <?php $records = get_records($link, $id_template);
                foreach($records as $record): ?>
             <tr>
                <td><?=$record['record']?></td>
            </tr>
            <?php endforeach ?>
            </table>
         </div>
</body>
</html>