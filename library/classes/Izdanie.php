<?php
class Izdanie extends Table {
    public $izdanie_id = 0;
    public $name = '';
    public $izdanie_type_id = 0;
    public $data_issue = null;
    public $izdanie_num = '';
    public function validate(){
        if (!empty($this->name) &&
        !empty($this->izdanie_type_id)&&
        !empty($this->data_issue)&&
        !empty($this->izdanie_num)) {
        return true;
        }
        return false;
    }
}
?>