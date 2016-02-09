<?php

namespace App\view;

if (isset($resNews) and ! empty($resNews)) {
    foreach ($resNews as $obj) {
        ?>

        <br><br><font size="5"><a href="http://scriptius/article.php?id=<?php echo $obj->id ?>"> <?php echo $obj->title; ?> </a></font>
        - Обновлено: <?php echo $obj->date; ?>
    <?php
    }
} else {
    echo 'Новостей нет!';
}
