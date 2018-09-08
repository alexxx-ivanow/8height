<?php
include 'config/config.php';
include 'ajax.php';
$comm = mysqli_query($db, "SELECT * FROM `comments` WHERE publish=1 ORDER BY id DESC") ;
include 'inc/head.php';
?>

<div class="container wrap-comments">
    <h1>Список комментариев:</h1>

    <? if(mysqli_num_rows($comm) > 0) : ?>
            <? while ($commRes = mysqli_fetch_assoc($comm)){  ?>
                <div class="row">
                    <div class="col-sm-2 user_name">
                        <strong><?= $commRes['name']; ?></strong>
                    </div>
                    <div class="col-sm-10">
                        <?= $commRes['text']; ?>
                    </div>
                </div>
            <?	} ?>

    <? endif;?>

</div>

<?
include 'inc/form_comment.php';
include 'inc/footer.php';
?>