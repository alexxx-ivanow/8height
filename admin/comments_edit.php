<?php
include '../inc/head.php';
?>
<div class="logout">
    <a href="?logout">Выйти</a>
</div>

<?

    if (isset($_GET['succ']) && $_GET['succ'] !== NULL) {
        switch ($_GET['succ']) {
            case 1:
                echo '<p style="text-align: center; font-weight: 600; margin-top: 40px; color: green">Запись обновлена</p>';
                break;
            case 2:
                echo '<p style="text-align: center; font-weight: 600; margin-top: 40px; color: red">Не удалось обновить редактируемый комментарий</p>';
                break;
            default :
        }
    }

    //выход из админки
    if (isset($_GET['logout']) && ($_GET['logout'] !== NULL)) {
        unset($_SESSION['admin']);
        echo '<meta http-equiv="refresh" content="0;URL=/admin">';
    }
    //редактирование комментария в админке
    if (isset($_GET['edit']) && ($_GET['edit'] !== NULL)) {
        include 'edit_form.php';
    }
    //сохранение отредактированного комментария в админке
    if (isset($_POST['submitComment'])) {
        if ($admin->editComment($_POST['comment_id'])) {
            echo '<meta http-equiv="refresh" content="0;URL=/admin/?succ=1">';
            //echo '<p style="text-align: center; font-weight: 600; margin-top: 40px; color: green">Запись обновлена</p>';
        }else{
            echo '<meta http-equiv="refresh" content="0;URL=/admin/?succ=2">';
            //echo '<p style="text-align: center; font-weight: 600; margin-top: 40px; color: red">Не удалось обновить редактируемый комментарий</p>';
        }
    }
    //удаление комментария из админки
    if (isset($_GET['del']) && ($_GET['del'] !== NULL)) {
        if ($admin->delComment($_GET['del'])) {
        echo '<p style="text-align: center; font-weight: 600; margin-top: 40px; color: red">Комментарий успешно удален</p>';
        }else{
            echo '<p style="text-align: center; font-weight: 600; margin-top: 40px; color: red">Не удалось найти комментарий для удаления</p>';
        }
    }
?>
    <!--вывод списка комментариев в админке-->
    <div class="container adminList">
        <div class="row">
            <?= $admin->getComments() ?>
        </div>
    </div>

<?php
include '../inc/footer.php';
?>