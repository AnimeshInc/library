<?php
require_once 'secure.php';
if (isset($_GET['id'])) {
$id = Helper::clearInt($_GET['id']);
$Izdanie = (new IzdanieMap())->findViewById($id);
$header = 'Просмотр Издания';
require_once 'template/header.php';
?>
<div class="row">
<div class="col-xs-12">
<div class="box">
<section class="content-header">
<h1><?=$header;?></h1>
<ol class="breadcrumb">
<li><a href="index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
<li><a href="list-Izdanie.php">Издания</a></li>
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
<td><?=$Izdanie->name;?></td>
</tr>
<tr>
<th>Тип Издания</th>
<td><?=$Izdanie->izdanie_type;?></td>
</tr>
<tr>
<th>Дата Выпуска</th>
<td><?=date("d.m.Y", strtotime($Izdanie->data_issue));?></td>
</tr>
<tr>
<th>Номер Издания</th>
<td><?=$Izdanie->izdanie_num;?></td>
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