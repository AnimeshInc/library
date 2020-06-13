<?php
class role extends Table {
    public $role_id = 0;
    public $sys_name = '';
    public $name = '';
    public function validate(){
        if (!empty($this->sys_name) &&
        !empty($this->name)) {
        return true;
        }
        return false;
    }
}
?>