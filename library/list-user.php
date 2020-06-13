<?php require_once 'template/header.php'; ?>
<?php
$size = 5;
if (isset($_GET['page'])) {
$page = Helper::clearInt($_GET['page']);
} else {
$page = 1;
}
$userMap = new userMap();
$count = $userMap->count();
$users = $userMap->findAll($page*$size-$size, $size);
$header = 'Список сотрудников';
require_once 'template/header.php';
?>
<div class="row">
<div class="col-xs-12">
<div class="box">
<section class="content-header">
<h1>Список сотрудников</h1>
<ol class="breadcrumb">
<li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
<li class="active">Список сотрудников</li>
</ol>
</section>
<div class="box-body">
<a class="btn btn-success" href="add-user.php">Добавить Сотрудника</a>
</div>
<div class="box-body">
<?php
if ($users) {
?>

<table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
<th>Ф.И.О</th>
<th>Роль</th>
</tr>
</thead>
<tbody>
<?php
foreach ($users as $user) {
echo '<tr>';
echo '<td><a href="view-user.php?id='.$user->user_id.'">'.$user->fio.'</a> '
. '<a href="add-user.php?id='.$user->user_id.'"><i class="fa fa-pencil"></i></a></td>';
echo '<td>'.$user->role.'</td>';
echo '</tr>';
}
?>
</tbody>
</table>
<?php } else {
echo 'Ни одного сотрудника не найдено';
} ?>
</div>
<div class="box-body">
<?php Helper::paginator($count, $page, $size); ?>
</div>
</div>
</div>
</div>
<?php
require_once 'template/footer.php';
?>