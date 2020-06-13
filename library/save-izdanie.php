<?php
require_once 'autoload.php';
if (isset($_POST['izdanie_id'])) {
    $izdanie = new Izdanie();
    $izdanie->izdanie_id = Helper::clearInt($_POST['izdanie_id']);
    $izdanie->name = Helper::clearString($_POST['name']);    
    $izdanie->izdanie_type_id = Helper::clearInt($_POST['izdanie_type_id']);
    $izdanie->data_issue = Helper::clearString($_POST['data_issue']);
    $izdanie->izdanie_num = Helper::clearString($_POST['izdanie_num']);
    if ((new IzdanieMap())->save($izdanie)) {
        header('Location: view-izdanie.php?id='.$izdanie->izdanie_id);
    } 
    else {
        if ($izdanie->izdanie_id) {
            header('Location: add-izdanie.php?id='.$izdanie->izdanie_id);
        }
        else {
            header('Location: add-izdanie.php');
        }
    }
}
?>