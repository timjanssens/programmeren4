<aside class="list">
    <?php
    if ($model['list']) { ?>
        <table>
            <tr>
                <th></th>
                <th>Naam</th>
            </tr>
            <?php
            foreach($model['list'] as $item) {
                ?>
                <tr>
                    <td>
                        <a class='tile'
                           href="/User/readingOne/<?php echo $item['Id'];?>">
                            <span class="icon-arrow-right"></span>
                            <span class="screen-reader-text">ReadingOne</span></a>
                    </td>
                    <td><?php echo $item['Name'];?></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    } else { ?>
        <p>Geen rijen gevonden in User tabel.</p>
        <p><?php echo $model['message'];?></p>
        <p><?php echo $model['error'];?></p>
        <?php
    } ?>
</aside>