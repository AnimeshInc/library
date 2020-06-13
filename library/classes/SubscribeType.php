<?php
class SubscribeType extends Table {
    public $subscribe_type_id = 0;
    public $date_begin = null;
    public $date_end = null;
    public $name = '';
    public function validate(){
        if (!empty($this->subscribe_type_id) &&
        !empty($this->date_begin)&&
        !empty($this->date_end)&&
        !empty($this->name)) {
        return true;
        }
        return false;
    }
}
?>