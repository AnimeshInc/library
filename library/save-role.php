<?php
require_once 'autoload.php';
if (isset($_POST['role_id'])) {
    $role = new role();
    $role->role_id = Helper::clearInt($_POST['role_id']);
    $role->name = Helper::clearString($_POST['name']);    
    $role->sys_name = Helper::clearString($_POST['sys_name']);
    if ((new roleMap())->save($role)) {
        header('Location: view-role.php?id='.$role->role_id);
    } 
    else {
        if ($role->role_id) {
            header('Location: add-role.php?id='.$role->role_id);
        }
        else {
            header('Location: add-role.php');
        }
    }
}
?>