<?php
class IzdanieType extends Table {
    public $izdanie_type_id = 0;
    public $name = '';
    public function validate(){
        if (!empty($this->name)) {
        return true;
        }
        return false;
    }
}
?>