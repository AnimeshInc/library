<?php
require_once 'secure.php';
if (isset($_POST['Izdanie_id'])) {
$Izdanie = new Izdanie();
$Izdanie->Izdanie_id =
Helper::clearInt($_POST['Izdanie_id']);
$Izdanie->name = Helper::clearString($_POST['name']);
$Izdanie->izdanie_type_id =
Helper::clearInt($_POST['izdanie_type_id']);
$Izdanie->data_issue =
Helper::clearString($_POST['data_issue']);
$Izdanie->izdanie_num =
Helper::clearInt($_POST['izdanie_num']);
if ((new IzdanieMap())->save($Izdanie)) {
header('Location: view-Izdanie.php?id='.$Izdanie->Izdanie_id);
} 
else {
if ($Izdanie->Izdanie_id) {
header('Location: add-Izdanie.php?id='.$Izdanie->Izdanie_id);
} 
else {
header('Location: add-Izdanie.php');
}
}
}
?>