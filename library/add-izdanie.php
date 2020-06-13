<?php
require_once 'template/header.php';
$id = 0;
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
}
$izdanie = (new IzdanieMap())->findById($id);
$header = (($id)?'Редактировать':'Добавить').' Издание';
?>
<section class="content-header">
    <h1><?=$header;?></h1>
    <ol class="breadcrumb">
        <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="list-izdanie.php">Издания</a></li>
        <li class="active"><?=$header;?></li>
    </ol>
</section>
<div class="box-body">
    <form action="save-izdanie.php" method="POST">
        <div class="form-group">
            <label>Название</label>
            <input type="text" class="form-control" name="name" required="required" value="<?=$izdanie->name;?>">
        </div>
        <div class="form-group">
            <label>Тип Издания</label>
            <select class="form-control" name="izdanie_type_id">
                <?= Helper::printSelectOptions($izdanie->izdanie_type_id, (new IzdanieTypeMap())->arrIzdanieTypes());?>
            </select>
        </div>
        <div class="form-group">
            <label>Дата публикации</label>
            <input type="date" class="form-control" name="data_issue" required="required" value="<?=$izdanie->data_issue;?>">
        </div>
        <div class="form-group">
            <label>Номер издания</label>
            <input type="text" class="form-control" name="izdanie_num" required="required" value="<?=$izdanie->izdanie_num;?>">
        </div>
        <div class="form-group">
            <button type="submit" name="saveIzdanie" class="btn btn-primary">Сохранить</button>
        </div>
        <input type="hidden" name="izdanie_id" value="<?=$id;?>"/>
    </form>
</div>
<?php
require_once 'template/footer.php';
?>