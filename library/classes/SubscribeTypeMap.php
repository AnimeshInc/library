<?php
class SubscribeTypeMap extends BaseMap {
    public function arrSubscribeTypes(){
        $res = $this->db->query("SELECT subscribe_type_id AS id, name AS
        value FROM subscribe_type");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findById($id = null){
        if ($id) {
            $res = $this->db->query("SELECT subscribe_type_id, date_begin,  
            date_end, name "
            . " FROM subscribe_type WHERE subscribe_type_id = $id");
            return $res->fetchObject("subscribe_type");
            }
        return new SubscribeType();
    }
    public function findAll($ofset = 0, $limit = 30){
        $res = $this->db->query("SELECT subscribe_type.subscribe_type_id, subscribe_type.date_begin
        subscribe_type.date_end, subscribe_type.name "
        . "  LIMIT $ofset,
        $limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM
        subscribe_type");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }
    public function findViewById($id = null) {
        if ($id) {
        $res = $this->db->query("SELECT subscribe_type.subscribe_type_id, subscribe_type.date_begin
        subscribe_type.date_end, subscribe_type.name  WHERE subscribe_type_id =
        $id");
        return $res->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }
}
?>