<?php
require_once 'template/header.php';
$size = 5;
if (isset($_GET['page'])) {
$page = Helper::clearInt($_GET['page']);
} else {
$page = 1;
}
$roleMap = new roleMap();
$count = $roleMap->count();
$roles = $roleMap->findAll($page*$size-$size, $size);
$header = 'Список Ролей';
?>
<div class="row">
<div class="col-xs-12">
<div class="box">
<section class="content-header">
<h1><?=$header;?></h1>
<ol class="breadcrumb">
<li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
<li class="active"><?=$header;?></li>
</ol>
</section>
<div class="box-body">
<a class="btn btn-success" href="add-role.php">Добавить Роль</a>
</div>
<div class="box-body">
<?php
if ($roles) {
?>
<table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
<th>Системная роль</th>
<th>Роль</th>
</tr>
</thead>
<tbody>
<?php
foreach ($roles as $role) {
echo '<tr>';
echo '<td><a href="view-role.php?id='.$role->role_id.'">'.$role->sysname.'</a> '
. '<a href="add-role.php?id='.$role->role_id.'"><i class="fa fa-pencil"></i></a></td>';
echo '<td>'.$role->name.'</td>';
echo '</tr>';
}
?>
</tbody>
</table>
<?php } else {
echo 'Ошибка';
} ?>
</div>
<div class="box-body">
<?php Helper::paginator($count, $page,$size); ?>
</div>
</div>
</div>
</div>
<?php
require_once 'template/footer.php';
?>