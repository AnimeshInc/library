<?php
require_once 'template/header.php';
if (isset($_GET['id'])) {
$id = Helper::clearInt($_GET['id']);
$role = (new roleMap())->findViewById($id);
$header = 'Просмотр Роли';
?>
<div class="row">
<div class="col-xs-12">
<div class="box">
<section class="content-header">
<h1><?=$header;?></h1>
<ol class="breadcrumb">
<li><a href="index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
<li><a href="list-role.php">Роли</a></li>
<li class="active"><?=$header;?></li>
</ol>
</section>
<div class="box-body">
<a class="btn btn-success" href="add-role.php?id=<?=$id;?>">Изменить</a>
</div>
<div class="box-body">
<table class="table table-bordered table-hover">
<tr>
<th>Системная роль</th>
<td><?=$role->name;?></td>
</tr>
<tr>
<th>Роль</th>
<td><?=$role->sys_name;?></td>
</tr>
</table>
</div>
</div>
</div>
</div>
<?php
}
require_once 'template/footer.php';
?>