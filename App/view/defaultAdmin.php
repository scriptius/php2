<table border="0" cellpadding="30" cellspacing="0">
    <tr>
        <td>
            <form  method="POST" action="http://scriptius/app/admin/save.php">
                <input type="hidden" name="id" size="48" value="<?= $article->id ; ?>" >
                <br><input type="text" name="title" size="48" value="<?= $article->title; ?>" > <br>
                <br><textarea cols="50" maxlength="10000" rows="20" name="text"><? echo $article->text; ?></textarea><br>
                <br><input type="text" name="date" size="48" value="<?= date('Y-m-d H:i:s', time()); ?>" > <br>
                <br><input type="submit" value="Опубликовать">
            </form>
        </td>
    </tr>
</table>
