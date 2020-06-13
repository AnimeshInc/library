<?php require_once 'template/header.php'; ?>
<?php
if (isset($_GET['id'])) {
$id = Helper::clearInt($_GET['id']);
$delivery = (new deliveryMap())->findViewById($id);
$header = 'Просмотр Издания';
?>
<div class="row">
<div class="col-xs-12">
<div class="box">
<section class="content-header">
<h1><?=$header;?></h1>
<ol class="breadcrumb">
<li><a href="index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
<li><a href="list-delivery.php">Издания</a></li>
<li class="active"><?=$header;?></li>
</ol>
</section>
<div class="box-body">
<table class="table table-bordered table-hover">
<tr>
<th>Тип доставки</th>
<td><?=$delivery->type;?></td>
</tr>
<tr>
<th>Дата Доставки</th>
<td><?=$delivery->dater;?></td>
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