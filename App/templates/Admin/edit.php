<?php
if (!empty($errors)) {
    foreach ($errors as $key => $value) {
        echo $value->getMessage() . '<br>';
    }
}
?>

<table border="0" cellpadding="30" cellspacing="0">
    <tr>
        <td>
            <form  method="POST" action="http://scriptius/App/Controllers/Admin/Save">
                <input type="hidden" name="id" size="48" value="<?= $dataForFields['id']; ?>" > 
                <input type="hidden" name="author_id" size="48" value="<?= $dataForFields['author_id']; ?>" >
                <select name="author" autofocus="" required="">
                    <?php foreach ($authors as $key => $author): ?>
                        <option value="<?= $author->name; ?>"> <?= $author->name; ?></option>
                    <?php endforeach; ?>
                </select><br>
                <br><input required="" type="text" name="title" size="48" value="<?= $dataForFields['title']; ?>" > <br>
                <br><textarea required="" cols="50" maxlength="10000" rows="20" name="text"><?= $dataForFields['text']; ?></textarea><br>
                <br><input required="" type="text" name="date" size="48" value="<?= date('Y-m-d H:i:s', time()); ?>" > <br>

                <br><input type="submit" value="Опубликовать">
            </form>
        </td>
    </tr>
</table>
