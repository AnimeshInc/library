<?php
require_once 'secure.php';
if (!Helper::can('admin') && !Helper::can('manager')) {
    header('Location: 404.php');
    exit();
}
$id = Helper::clearInt($_GET['id']);
$idTeacher = Helper::clearInt($_GET['idTeacher']);
(new libraryMap())->delete($id);
header('Location: list-library.php?id='.$idTeacher);
?>