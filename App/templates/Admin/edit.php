<?Php
//var_dump($forEdit);
//if (empty($forEdit)): ?>

<table border="0" cellpadding="30" cellspacing="0">
    <tr>
        <td>
            <form  method="POST" action="http://scriptius/index.php?ctrl=Admin&act=Save">
                <input type="hidden" name="id" size="48" value="<?= $forEdit->id ; ?>" >
                <input type="hidden" name="author_id" size="48" value="<?= $forEdit->author_id ; ?>" >
                <br><input type="text" name="title" size="48" value="<?= $forEdit->title; ?>" > <br>
                <br><textarea cols="50" maxlength="10000" rows="20" name="text"><? echo $forEdit->text; ?></textarea><br>
                <br><input type="text" name="date" size="48" value="<?= date('Y-m-d H:i:s', time()); ?>" > <br>
                <?php // endif;?>
                <br><input type="submit" value="Опубликовать">
            </form>
        </td>
    </tr>
</table>
