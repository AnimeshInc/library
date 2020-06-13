<?php
require_once 'template/header.php';
$id = 0;
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
}
$user = (new userMap())->findById($id);
$header = (($id)?'Редактировать':'Добавить').' Издание';
?>
<section class="content-header">
    <h1><?=$header;?></h1>
    <ol class="breadcrumb">
        <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="list-user.php">Издания</a></li>
        <li class="active"><?=$header;?></li>
    </ol>
</section>
<div class="box-body">
    <form action="save-user.php" method="POST">
    <div class="form-group">
            <label>Фамилия</label>
            <input type="text" class="form-control" name="lastname" required="required" value="<?=$user->lastname;?>">
        </div>
        <div class="form-group">
            <label>Имя</label>
            <input type="text" class="form-control" name="firstname" required="required" value="<?=$user->firstname;?>">
        </div>
        <div class="form-group">
            <label>Отчество</label>
            <input type="text" class="form-control" name="patronymic" required="required" value="<?=$user->patronymic;?>">
        </div>
        <div class="form-group">
            <label>Роль</label>
            <select class="form-control" name="role_id">
            <?= Helper::printSelectOptions($user->role_id, (new RoleMap())->arrRoles());?>
        </select>
        </div>
        <div class="form-group">
            <button type="submit" name="saveuser" class="btn btn-primary">Сохранить</button>
        </div>
        <input type="hidden" name="user_id" value="<?=$id;?>"/>
    </form>
</div>
<?php
require_once 'template/footer.php';
?>