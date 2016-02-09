
<?php
if (isset($singleNews) AND !empty($singleNews)){ ?>
        <h1><?php echo $singleNews->title; ?></h1>
        <p><font size="5"><?php echo $singleNews->text; ?></font></p>

        <?php
    } else {echo 'Такой страницы не существеет';}
