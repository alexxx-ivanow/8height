<? include '../config/config.php';
   $comm = mysqli_query($db, "SELECT * FROM `comments` ORDER BY id DESC"); ?>
<div class="container wrap-comments">
    <h1>Список комментариев для редактирования:</h1>

        <? if(mysqli_num_rows($comm) > 0) : ?>
            <? while ($comments = mysqli_fetch_assoc($comm)){  ?>
    <div class="row">
                <div class="col-lg-2">
                    <?= $comments['name']; ?>
                </div>
                <div class="col-lg-2">
                    <?= $comments['email']; ?>
                </div>
                <div class="col-lg-4">
                    <?= $comments['text']; ?>
                </div>
                <div class="col-lg-2">
                    <? if ($comments['publish'] == 1) : ?>
                        <strong>опубл.</strong>
                    <? else : ?>
                        <strong>неопубл.</strong>
                    <? endif; ?>
                </div>
                <div class="col-lg-1">
                    <a href="?edit=<?= $comments['id'] ?>">Ред.</a>
                </div>
                <div class="col-lg-1">
                    <a class="delComment" href="?del=<?= $comments['id'] ?>">Удалить</a>
                </div>
    </div>
            <? } ?>

        <? endif;?>

</div>