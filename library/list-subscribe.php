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
$subscribes = $subscribeMap->findAll($page*$size-$size, $size);
$header = 'Список Подписок';
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
<a class="btn btn-success" href="add-subscribe.php">Оформить Подписку</a>
</div>
<div class="box-body">
<?php
if ($subscribes) {
?>
<table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
<th>Тип подписки</th>
<th>Индекс</th>
<th>Цена</th>
<th>Издание</th>
<th>Доставка</th>
</tr>
</thead>
<tbody>
<?php
foreach ($subscribes as $subscribe) {
echo '<tr>';
echo '<td><a href="view-subscribe.php?id='.$subscribe->subscribe_id.'">'.$subscribe->subscribe_type.'</a> '
. '<a href="add-subscribe.php?id='.$subscribe->subscribe_id.'"><i class="fa fa-pencil"></i></a></td>';
echo '<td>'.$subscribe->indexd.'</td>';
echo '<td>'.$subscribe->price.'</td>';
echo '<td>'.$subscribe->izdanie.'</td>';
echo '<td>'.$subscribe->delivery.'</td>';
echo '</tr>';
}
?>
</tbody>
</table>
<?php } else {
echo 'Нет подписок';
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