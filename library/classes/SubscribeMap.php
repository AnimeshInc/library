<?php
class SubscribeMap extends BaseMap {
    public function arrSubscribes(){
        $res = $this->db->query("SELECT subscribe_id AS id, indexd AS
        value FROM subscribe");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findById($id = null){
        if ($id) {
            $res = $this->db->query("SELECT subscribe_id, indexd, price, subscribe_type_id, 
            izdanie_id, delivery_id "
            . " FROM subscribe WHERE subscribe_id = $id");
            return $res->fetchObject("subscribe");
            }
        return new Subscribe();
    }
    public function save(subscribe $subscribe){
        if ($subscribe->validate()) {
            if ($subscribe->subscribe_id == 0) {
            return $this->insert($subscribe);
            } else {
            return $this->update($subscribe);
            }
        }
        return false;
    }
    private function insert(subscribe $subscribe){
        $indexd = $this->db->quote($subscribe->indexd);
        $price = $this->db->quote($subscribe->price);
        if ($this->db->exec("INSERT INTO 
        subscribe(subscribe_type_id,
        price, indexd, 
        izdanie_id, delivery_id)" 
        . " VALUES($subscribe->subscribe_type_id, 
        $price, $indexd, 
        $subscribe->izdanie_id, 
        $subscribe->delivery_id)") == 1) {
        $subscribe->subscribe_id = $this->db->lastInsertId();
        return true;
        }
        return false;
    }
    public function qery1(){
        $res = $this->db->query("SELECT izdanie.name AS izdanie, 
        izdanie.data_issue AS datepub,
        izdanie_type.name AS izdanie_type, 
        subscribe.price AS price, 
        subscribe_type.date_begin AS dateb,
        subscribe_type.date_end AS datee
        FROM subscribe 
        INNER JOIN izdanie ON 
        subscribe.izdanie_id = izdanie.izdanie_id
        AND izdanie.data_issue > '2020-01-01'
        AND izdanie.data_issue < '2021-01-01'
        INNER JOIN izdanie_type ON
        izdanie.izdanie_type_id = izdanie_type.izdanie_type_id 
        INNER JOIN subscribe_type ON 
        subscribe.subscribe_type_id = subscribe_type.subscribe_type_id 
        ORDER BY subscribe_type.subscribe_type_id");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
    private function update(subscribe $subscribe){
        $indexd = $this->db->quote($subscribe->indexd);
        $price = $this->db->quote($subscribe->price);
        if ( $this->db->exec("UPDATE subscribe SET indexd = $indexd,
        subscribe_type_id = $subscribe->subscribe_type_id, price = $price,"
        . " izdanie_id = $subscribe->izdanie_id, delivery_id =
        $subscribe->delivery_id WHERE subscribe_id = ".$subscribe->subscribe_id) == 1) {
        return true;
        }
        return false;
    }
    public function findAll($ofset = 0, $limit = 30){
        $res = $this->db->query("SELECT subscribe.subscribe_id, izdanie.name AS izdanie, 
        subscribe.indexd, subscribe_type.name AS subscribe_type, subscribe.price,
        subscribe.subscribe_type_id, delivery.type AS delivery"
        . " FROM subscribe INNER JOIN subscribe_type ON
        subscribe.subscribe_type_id=subscribe_type.subscribe_type_id "
        . " INNER JOIN izdanie ON
        subscribe.izdanie_id=izdanie.izdanie_id  "
        . " INNER JOIN delivery ON
        subscribe.delivery_id=delivery.delivery_id LIMIT $ofset,
        $limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM
        subscribe");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }
    public function findViewById($id = null) {
        if ($id) {
        $res = $this->db->query("SELECT subscribe.subscribe_id, izdanie.name AS izdanie, 
        subscribe.indexd, subscribe_type.name AS subscribe_type, subscribe.price,
        subscribe.subscribe_type_id, delivery.type AS delivery"
        . " FROM subscribe INNER JOIN subscribe_type ON
        subscribe.subscribe_type_id=subscribe_type.subscribe_type_id "
        . " INNER JOIN izdanie ON
        subscribe.izdanie_id=izdanie.izdanie_id  "
        . " INNER JOIN delivery ON
        subscribe.delivery_id=delivery.delivery_id WHERE subscribe_id =
        $id");
        return $res->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }
}
?>