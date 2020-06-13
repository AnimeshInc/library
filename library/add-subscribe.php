<?php
require_once 'template/header.php';
$id = 0;
if (isset($_GET['id'])) {
$id = Helper::clearInt($_GET['id']);
}
$subscribe = (new SubscribeMap())->findById($id);
$header = (($id)?'Редактировать':'Оформить').' Подписку';
?>
<section class="content-header">
    <h1><?=$header;?></h1>
    <ol class="breadcrumb">
        <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="list-subscribe.php">Подписки</a></li>
        <li class="active"><?=$header;?></li>
    </ol>
</section>
<div class="box-body">
    <form action="save-subscribe.php" method="POST">
        <div class="form-group">
            <label>Тип подписки</label>
            <select class="form-control" name="subscribe_type_id">
            <?= Helper::printSelectOptions($subscribe->subscribe_type_id, (new SubscribeTypeMap())->arrSubscribeTypes());?>
            </select>
        </div>
        <div class="form-group">
            <label>Индекс</label>
            <input type="text" class="form-control" name="indexd" required="required" value="<?=$subscribe->indexd;?>">
        </div>
        <div class="form-group">
            <label>Цена</label>
            <input type="text" class="form-control" name="price" required="required" value="<?=$subscribe->price;?>">
        </div>
        <div class="form-group">
            <label>Издание</label>
            <select class="form-control" name="izdanie_id">
            <?= Helper::printSelectOptions($subscribe->izdanie_id, (new IzdanieMap())->arrIzdanies());?>
            </select>        
        </div>
        <div class="form-group">
            <label>Доставка</label>
            <select class="form-control" name="delivery_id">
            <?= Helper::printSelectOptions($subscribe->delivery_id, (new DeliveryMap())->arrDeliverys());?>
            </select>          
        </div>
        <div class="form-group">
            <button type="submit" name="savesubscribe" class="btn btn-primary">Сохранить</button>
        </div>
        <input type="hidden" name="subscribe_id" value="<?=$id;?>"/>
    </form>
</div>
<?php
require_once 'template/footer.php';
?>