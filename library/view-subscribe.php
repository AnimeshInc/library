<?php require_once 'template/header.php'; ?>
<?php
if (isset($_GET['id'])) {
$id = Helper::clearInt($_GET['id']);
$subscribe = (new SubscribeMap())->findViewById($id);
$header = 'Просмотр Издания';
?>
<div class="row">
<div class="col-xs-12">
<div class="box">
<section class="content-header">
<h1><?=$header;?></h1>
<ol class="breadcrumb">
<li><a href="index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
<li><a href="list-subscribe.php">Издания</a></li>
<li class="active"><?=$header;?></li>
</ol>
</section>
<div class="box-body">
<a class="btn btn-success" href="add-subscribe.php?id=<?=$id;?>">Изменить</a>
</div>
<div class="box-body">
<table class="table table-bordered table-hover">
<tr>
<th>Тип Подписки</th>
<td><?=$subscribe->subscribe_type;?></td>
</tr>
<tr>
<th>Индекс</th>
<td><?=$subscribe->indexd;?></td>
</tr>
<tr>
<th>Цена</th>
<td><?=$subscribe->price;?></td>
</tr>
<tr>
<th>Издание</th>
<td><?=$subscribe->izdanie;?></td>
</tr>
<tr>
<th>Доставка</th>
<td><?=$subscribe->delivery;?></td>
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