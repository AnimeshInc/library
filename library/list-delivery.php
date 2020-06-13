<?php
require_once 'template/header.php';
$size = 5;
if (isset($_GET['page'])) {
$page = Helper::clearInt($_GET['page']);
} else {
$page = 1;
}
$deliveryMap = new deliveryMap();
$count = $deliveryMap->count();
$deliverys = $deliveryMap->findAll($page*$size-$size, $size);
$header = 'Способ доставки';
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
if ($deliverys) {
?>
<table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
<th>Тип доставки</th>
<th>Дата доставки</th>
</tr>
</thead>
<tbody>
<?php
foreach ($deliverys as $delivery) {
echo '<tr>';
echo '<td><a href="view-delivery.php?id='.$delivery->delivery_id.'">'.$delivery->type.'</a> ';
echo '<td>'.date("d.m.Y",
strtotime($delivery->delivery_date)).'</td>';
echo '</tr>';
}
?>
</tbody>
</table>
<?php } else {
echo 'Способов доставки не надо';
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