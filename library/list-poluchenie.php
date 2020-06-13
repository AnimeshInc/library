<?php
require_once 'template/header.php';
$size = 5;
if (isset($_GET['page'])) {
$page = Helper::clearInt($_GET['page']);
} else {
$page = 1;
}
$poluchenieMap = new poluchenieMap();
$count = $poluchenieMap->count();
$poluchenies = $poluchenieMap->findAll($page*$size-$size, $size);
$header = 'Список получений';
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
<?php
if ($poluchenies) {
?>
<table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
<th>Название</th>
<th>ФИО Сотрудника</th>
<th>Дата Получения</th>
<th>Тип подписки</th>
</tr>
</thead>
<tbody>
<?php
foreach ($poluchenies as $poluchenie) {
echo '<tr>';
echo '<td><a href="view-poluchenie.php?id='.$poluchenie->poluchenie_id.'">'.$poluchenie->izdanie.'</a> ';
echo '<td>'.$poluchenie->fio.'</td>';
echo '<td>'.date("d.m.Y", strtotime($poluchenie->date)).'</td>';
echo '<td>'.$poluchenie->subscribe_type.'</td>';
echo '</tr>';
}
?>
</tbody>
</table>
<?php } else {
echo 'Нет получений';
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