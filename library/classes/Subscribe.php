<?php
class Subscribe extends Table {
    public $subscribe_id = 0;
    public $subscribe_type_id = 0;
    public $indexd = '';
    public $price = '';
    public $izdanie_id = 0;
    public $delivery_id = 0;
    public function validate(){
        if (!empty($this->subscribe_type_id) &&
        !empty($this->indexd)&&
        !empty($this->price)&&
        !empty($this->izdanie_id)&&
        !empty($this->delivery_id)) {
        return true;
        }
        return false;
    }
}
?>