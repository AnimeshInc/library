<?php
require_once 'secure.php';
$size = 1;
if (isset($_GET['page'])) {
$page = Helper::clearInt($_GET['page']);
} else {
$page = 1;
}
$izdanieMap = new IzdanieMap();
$count = $izdanieMap->count();
$Izdanies = $izdanieMap->findAll($page*$size-$size, $size);
$header = 'Список Изданий';
require_once 'template/header.php';
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
if ($Izdanies) {
?>
<table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
<th>Название</th>
<th>Дата выпуска</th>
<th>Тип издания</th>
<th>Номер издания</th>
</tr>
</thead>
<tbody>
<?php
foreach ($Izdanies as $Izdanie) {
echo '<tr>';
echo '<td><a href="view-izdanie.php?id='.$Izdanie->Izdanie_id.'">'.$Izdanie->name.'</a> '
. '<a href="add-izdanie.php?id='.$Izdanie->Izdanie_id.'"><i class="fa fa-pencil"></i></a></td>';
echo '<td>'.date("d.m.Y",
strtotime($Izdanie->data_issue)).'</td>';
echo '<td>'.$Izdanie->izdanie_type.'</td>';
echo '<td>'.$Izdanie->izdanie_num.'</td>';
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