<?php
require_once 'template/header.php';
if (isset($_GET['id'])) {
$id = Helper::clearInt($_GET['id']);
$izdanie = (new IzdanieMap())->findViewById($id);
$header = 'Просмотр Издания';
?>
<div class="row">
<div class="col-xs-12">
<div class="box">
<section class="content-header">
<h1><?=$header;?></h1>
<ol class="breadcrumb">
<li><a href="index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
<li><a href="list-izdanie.php">Издания</a></li>
<li class="active"><?=$header;?></li>
</ol>
</section>
<div class="box-body">
<a class="btn btn-success" href="add-izdanie.php?id=<?=$id;?>">Изменить</a>
</div>
<div class="box-body">
<table class="table table-bordered table-hover">
<tr>
<th>Название</th>
<td><?=$izdanie->name;?></td>
</tr>
<tr>
<th>Тип Издания</th>
<td><?=$izdanie->izdanie_type;?></td>
</tr>
<tr>
<th>Дата Выпуска</th>
<td><?=date("d.m.Y", strtotime($izdanie->data_issue));?></td>
</tr>
<tr>
<th>Номер Издания</th>
<td><?=$izdanie->izdanie_num;?></td>
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