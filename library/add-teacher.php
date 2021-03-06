<?php
require_once 'secure.php';
$id = 0;
if (isset($_GET['id'])) {
$id = Helper::clearInt($_GET['id']);
}
$izdane = (new izdaneMap())->findById($id);
$header = (($id)?'Редактировать данные':'Добавить').' преподавателя';
require_once 'template/header.php';?>
<section class="content-header">
<h1><?=$header;?></h1>
<ol class="breadcrumb">
<li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
<li><a href="list-izdane.php">Издания</a></li>
<li class="active"><?=$header;?></li>
</ol>
</section>
<div class="box-body">
<form action="save-user.php" method="POST">
<?php require_once '_formUser.php'; ?>
<div class="form-group">
<label>Тип</label>
<select class="form-control" name="izdanie_type_id">
<?= Helper::printSelectOptions($izdanie_type->name, $IzdanieTypeMap->arrRoles());?>
</select>
</div>
<div class="form-group">
<label>Номер</label>
<select class="form-control" name="otdel_id">
<?= Helper::printSelectOptions($izdane->otdel_id, (new OtdelMap())->arrOtdels());?>
</select>
</div>
<div class="form-group">
<label>Дата выпуска</label>
<select class="form-control" name="otdel_id">
<?= Helper::printSelectOptions($izdane->otdel_id, (new OtdelMap())->arrOtdels());?>
</select>
</div>
</div>
<div class="form-group">
<button type="submit" name="saveizdane"
class="btn btn-primary">Сохранить</button>
</div>
</form>
</div>
<?php
require_once 'template/footer.php';
?>