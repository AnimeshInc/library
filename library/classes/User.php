<?php
class User extends Table {
    public $user_id = 0;
    public $lastname = '';
    public $firstname = '';
    public $patronymic = '';
    public $role_id = 0;

    public function validate(){
    if (!empty($this->lastname) &&
        !empty($this->firstname) &&
        !empty($this->role_id)) {
            return true;
        }
        return false;
    }
}
?>