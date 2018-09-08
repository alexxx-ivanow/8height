<? include '../config/config.php';
$edit = $_GET['edit'];
$comment_edit = mysqli_query($db, "SELECT * FROM `comments` WHERE id='$edit' LIMIT 1");
if(mysqli_num_rows($comment_edit) > 0){
    $comment_item = mysqli_fetch_assoc($comment_edit);
    if ($comment_item['publish'] == 1) {
        $publish = 'checked';
    }else{
        $publish = '';
    }
}else{
    exit('<p style="text-align: center; font-weight: 600; margin-top: 40px; color: red;">Комментарий для редактирования не найден...</p><br><a href="/admin" style="text-align: center; display: block; font-weight: 600; margin-top: 40px">Вернуться к списку коментариев</a>');
} ?>

<div class="container editCommentForm">
    <h3>Правка комментария номер <?= $comment_item['id'] ?></h3>
    <div class="row wrapFormComments">

        <form id="CommentEdit" name="CommentEdit" method="POST" class="col-sm-12" action="/admin/">
            <input type="hidden" name="comment_id" value="<?= $comment_item['id'] ?>">
            <div class="form-group">
                <label for="name">Отредактируйте имя</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $comment_item['name'] ?>">
            </div>
            <div class="form-group">
                <label for="email">Отредактируйте свою почту</label>
                <input type="email" class="form-control" name="email" id="email" value="<?= $comment_item['email'] ?>">
            </div>
            <div class="form-group">
            <label for="textarea">Отредактируйте текст сообщения</label>
            <textarea class="form-control" name="text" id="text" rows="7"><?= $comment_item['text'] ?></textarea>
    </div>
    <div class="form-check">
        <input class="form-check-input" name="publish_check" type="checkbox" <?= $publish ?> value="1" id="check">
        <label class="form-check-label" for="check">
            Комментарий опубликован
        </label>
    </div>
    <input type="submit" id="submitComment" name="submitComment" class="btn btn-primary mb-2" value="Отправить">

       </form>
    </div></div>
</div>