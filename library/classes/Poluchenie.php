<?php
class Poluchenie extends Table {
    public $poluchenie_id = 0;
    public $date = null;
    public $user_id = 0;
    public $subscribe_id = 0;
    public function validate(){
        if (!empty($this->date) &&
        !empty($this->user_id)&&
        !empty($this->subscribe_id)) {
        return true;
        }
        return false;
    }
}
?>