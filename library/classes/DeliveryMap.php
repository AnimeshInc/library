<?php
class deliveryMap extends BaseMap {
    public function arrdeliverys(){
        $res = $this->db->query("SELECT delivery_id AS id, type AS
        value FROM delivery");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findById($id = null){
        if ($id) {
            $res = $this->db->query("SELECT delivery_id,
            type, delivery_date"
            . " FROM delivery  WHERE delivery_id = $id");
            return $res->fetchObject("delivery");
            }
        return new delivery();
    }
    public function findAll($ofset = 0, $limit = 30){
        $res = $this->db->query("SELECT delivery.delivery_id,
        delivery.type, delivery.delivery_date"
        . " FROM delivery LIMIT $ofset,
        $limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM
        delivery");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }
    public function findViewById($id = null) {
        if ($id) {
        $res = $this->db->query("SELECT delivery_id,
        type, delivery_date as dater"
        . " FROM delivery WHERE delivery_id = $id");
        return $res->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }
}
?>