<?php
class IzdanieTypeMap extends BaseMap {
    public function arrIzdanieTypes(){
        $res = $this->db->query("SELECT izdanie_type_id AS id, name AS
        value FROM izdanie_type");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findById($id = null){
        if ($id) {
            $res = $this->db->query("SELECT izdanie_type_id, name "
            . " FROM izdanie_type WHERE izdanie_type_id = $id");
            return $res->fetchObject("izdanie_type");
            }
        return new IzdanieType();
    }
    public function save(izdanie_type $izdanie_type){
        if ($izdanie_type->validate()) {
            if ($izdanie_type->izdanie_type_id == 0) {
            return $this->insert($izdanie_type);
            } else {
            return $this->update($izdanie_type);
            }
        }
        return false;
    }
    private function insert(izdanie_type $izdanie_type){
        $name = $this->db->quote($izdanie_type->name);
        if ($this->db->exec("INSERT INTO izdanie_type(name)" . " VALUES($name)") == 1) {
        $izdanie_type->izdanie_type_id = $this->db->lastInsertId();
        return true;
        }
        return false;
    }
    private function update(izdanie_type $izdanie_type){
        $name = $this->db->quote($izdanie_type->name);
        if ( $this->db->exec("UPDATE izdanie_type SET name = $name "
        . " WHERE izdanie_type_id = ".$izdanie_type->izdanie_type_id) == 1) {
        return true;
        }
        return false;
    }
    public function findAll($ofset = 0, $limit = 30){
        $res = $this->db->query("SELECT izdanie_type.izdanie_type_id,
        izdanie_type.name as name"
        . " FROM izdanie_type LIMIT $ofset,
        $limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM
        izdanie_type");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }
    public function findViewById($id = null) {
        if ($id) {
        $res = $this->db->query("SELECT izdanie_type.izdanie_type_id,
        izdanie_type.name as name"
        . " FROM izdanie_type WHERE izdanie_type_id =
        $id");
        return $res->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }
}
?>