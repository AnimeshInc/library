<?php
require_once 'template/header.php';
$size = 5;
if (isset($_GET['page'])) {
$page = Helper::clearInt($_GET['page']);
} else {
$page = 1;
}
$subscribeMap = new SubscribeMap();
$count = $subscribeMap->count();
$subscribes = $subscribeMap->qery1($page*$size-$size, $size);
$header = 'Запрос №1';
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
if ($subscribes) {
?>
<table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
<th>Название</th>
<th>Дата выпуска</th>
<th>Тип издания</th>
<th>Цена</th>
<th>Дата начала подписки</th>
<th>Дата конца подписки</th>
</tr>
</thead>
<tbody>
<?php
foreach ($subscribes as $subscribe) {
echo '<tr>';
echo '<td>'.$subscribe->izdanie.'</td>';
echo '<td>'.date("d.m.Y", strtotime($subscribe->datepub)).'</td>';
echo '<td>'.$subscribe->izdanie_type.'</td>';
echo '<td>'.$subscribe->price.'</td>';
echo '<td>'.date("d.m.Y", strtotime($subscribe->dateb)).'</td>';
echo '<td>'.date("d.m.Y", strtotime($subscribe->datee)).'</td>';
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