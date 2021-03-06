<?php
require_once 'template/header.php';
$size = 5;
if (isset($_GET['page'])) {
$page = Helper::clearInt($_GET['page']);
} else {
$page = 1;
}
$izdanieMap = new IzdanieMap();
$count = $izdanieMap->count();
$izdanies = $izdanieMap->findAll($page*$size-$size, $size);
$header = 'Список Изданий';
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
<a class="btn btn-success" href="add-izdanie.php">Добавить Издание</a>
</div>
<div class="box-body">
<?php
if ($izdanies) {
?>
<table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
<th>Название</th>
<th>Тип издания</th>
<th>Дата выпуска</th>
<th>Номер издания</th>
</tr>
</thead>
<tbody>
<?php
foreach ($izdanies as $izdanie) {
echo '<tr>';
echo '<td><a href="view-izdanie.php?id='.$izdanie->izdanie_id.'">'.$izdanie->name.'</a> '
. '<a href="add-izdanie.php?id='.$izdanie->izdanie_id.'"><i class="fa fa-pencil"></i></a></td>';
echo '<td>'.$izdanie->izdanie_type.'</td>';
echo '<td>'.date("d.m.Y",
strtotime($izdanie->data_issue)).'</td>';
echo '<td>'.$izdanie->izdanie_num.'</td>';
echo '</tr>';
}
?>
</tbody>
</table>
<?php } else {
echo 'Ни одного издания не найдено';
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