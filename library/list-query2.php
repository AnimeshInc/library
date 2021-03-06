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
$poluchenies = $poluchenieMap->qery2($page*$size-$size, $size);
$header = 'Запрос №2';
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
<th>Издание</th>
<th>Дата Получения</th>
<th>Дата Публикации</th>
<th>Дата Подписки</th>
<th>Дата Отчёта</th>
</tr>
</thead>
<tbody>
<?php
foreach ($poluchenies as $poluchenie) {
echo '<tr>';
echo '<td>'.$poluchenie->izdanie.'</td>';
echo '<td>'.date("d.m.Y", strtotime($poluchenie->datepol)).'</td>';
echo '<td>'.date("d.m.Y", strtotime($poluchenie->datepub)).'</td>';
echo '<td>'.date("d.m.Y", strtotime($poluchenie->dateb)).'</td>';
echo '<td>'.date("d.m.Y", strtotime($poluchenie->datenow)).'</td>';
echo '</tr>';
}
?>
</tbody>
</table>
<?php } else {
echo 'Упс...';
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