<?php require_once 'template/header.php'; ?>
<?php
if (isset($_GET['id'])) {
$id = Helper::clearInt($_GET['id']);
$poluchenie = (new poluchenieMap())->findViewById($id);
$header = 'Просмотр Издания';
?>
<div class="row">
<div class="col-xs-12">
<div class="box">
<section class="content-header">
<h1><?=$header;?></h1>
<ol class="breadcrumb">
<li><a href="index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
<li><a href="list-poluchenie.php">Издания</a></li>
<li class="active"><?=$header;?></li>
</ol>
</section>
<div class="box-body">
<table class="table table-bordered table-hover">
<tr>
<th>Название</th>
<td><?=$poluchenie->izdanie;?></td>
</tr>
<tr>
<th>ФИО Сотрудника</th>
<td><?=$poluchenie->fio;?></td>
</tr>
<tr>
<th>Дата Получения</th>
<td><?=$poluchenie->dater;?></td>
</tr>
<tr>
<th>Тип подписки</th>
<td><?=$poluchenie->subscribe_type;?></td>
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