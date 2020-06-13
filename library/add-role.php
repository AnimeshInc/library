<?php
require_once 'template/header.php';
$id = 0;
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
}
$role = (new roleMap())->findById($id);
$header = (($id)?'Редактировать':'Добавить').' Роль';
?>
<section class="content-header">
    <h1><?=$header;?></h1>
    <ol class="breadcrumb">
        <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="list-role.php">Роли</a></li>
        <li class="active"><?=$header;?></li>
    </ol>
</section>
<div class="box-body">
    <form action="save-role.php" method="POST">
        <div class="form-group">
            <label>Роль</label>
            <input type="text" class="form-control" name="name" required="required" value="<?=$role->name;?>">
        </div>
        <div class="form-group">
            <label>Системная Роль</label>
            <input type="text" class="form-control" name="sys_name" required="required" value="<?=$role->sys_name;?>">
        </div>
        <div class="form-group">
            <button type="submit" name="saverole" class="btn btn-primary">Сохранить</button>
        </div>
        <input type="hidden" name="role_id" value="<?=$id;?>"/>
    </form>
</div>
<?php
require_once 'template/footer.php';
?>