<?php
require_once 'autoload.php';
if (isset($_POST['user_id'])) {
    $user = new User();
    $user->user_id= Helper::clearInt($_POST['user_id']);
    $user->lastname = Helper::clearString($_POST['lastname']);
    $user->firstname = Helper::clearString($_POST['firstname']);
    $user->patronymic = Helper::clearString($_POST['patronymic']);
    $user->role_id = Helper::clearInt($_POST['role_id']);
    if ((new UserMap())->save($user)) {
        header('Location: view-user.php?id='.$user->user_id);
    } 
    else {
        if ($user->user_id) {
            header('Location: add-user.php?id='.$user->user_id);
        }
        else {
            header('Location: add-user.php');
        }
    }
}
?>