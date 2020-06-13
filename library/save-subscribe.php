<?php
require_once 'autoload.php';
if (isset($_POST['subscribe_id'])) {
    $subscribe = new Subscribe();
    $subscribe->subscribe_id = Helper::clearInt($_POST['subscribe_id']);
    $subscribe->subscribe_type_id = Helper::clearInt($_POST['subscribe_type_id']);
    $subscribe->indexd = Helper::clearInt($_POST['indexd']);
    $subscribe->price = Helper::clearInt($_POST['price']);
    $subscribe->izdanie_id = Helper::clearInt($_POST['izdanie_id']);
    $subscribe->delivery_id = Helper::clearInt($_POST['delivery_id']);
    if ((new SubscribeMap())->save($subscribe)) {
        header('Location: view-subscribe.php?id='.$subscribe->subscribe_id);
    } 
    else {
        if ($subscribe->subscribe_id) {
            header('Location: add-subscribe.php?id='.$subscribe->subscribe_id);
        }
        else {
            header('Location: add-subscribe.php');
        }
}
}
?>