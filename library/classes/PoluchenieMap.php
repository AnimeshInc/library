<?php
class PoluchenieMap extends BaseMap {
    public function arrPoluchenies(){
        $res = $this->db->query("SELECT poluchenie_id AS id, date AS
        value FROM poluchenie");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findById($id = null){
        if ($id) {
            $res = $this->db->query("SELECT poluchenie_id, date, "
            . " user_id, subscribe_id "
            . " FROM poluchenie WHERE poluchenie_id = $id");
            return $res->fetchObject("poluchenie");
            }
        return new Poluchenie();
    }
    public function findAll($ofset = 0, $limit = 30){
        $res = $this->db->query("SELECT poluchenie.poluchenie_id,
        poluchenie.date, CONCAT(user.lastname,' ', user.firstname, ' ',
        user.patronymic) AS fio, subscribe_type.name AS subscribe_type, izdanie.name AS  izdanie
         FROM poluchenie INNER JOIN user ON
        poluchenie.user_id=user.user_id 
        INNER JOIN subscribe ON
        poluchenie.subscribe_id=subscribe.subscribe_id 
        INNER JOIN izdanie ON
        subscribe.izdanie_id=izdanie.izdanie_id 
        INNER JOIN subscribe_type ON
        subscribe.subscribe_type_id=subscribe_type.subscribe_type_id 
        LIMIT $ofset, $limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
    public function qery2(){
        $res = $this->db->query("SELECT izdanie.name AS izdanie, 
        poluchenie.date AS datepol,
        izdanie.data_issue AS datepub, 
        subscribe_type.date_begin AS dateb,
        (DATE_FORMAT(CURRENT_DATE, '%d.%m.%Y')) AS datenow
        FROM poluchenie 
    
        INNER JOIN subscribe ON 
        poluchenie.subscribe_id = subscribe.subscribe_id
        AND poluchenie.date < '2020-04-10'
    
        INNER JOIN subscribe_type ON
        subscribe.subscribe_type_id = subscribe_type.subscribe_type_id 
    
        INNER JOIN izdanie ON 
        subscribe.izdanie_id = izdanie.izdanie_id ");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
    public function qery3(){
        $res = $this->db->query("SELECT CONCAT(user.lastname,' ', user.firstname, ' ',
        user.patronymic) AS fio, 
        role.name AS role,
        izdanie.name AS izdanie,
        izdanie.data_issue AS datepub,
        poluchenie.date AS datepol
        FROM poluchenie 
    
        INNER JOIN subscribe ON
        poluchenie.subscribe_id = subscribe.subscribe_id 
        AND poluchenie.date < '2020-05-31'
        AND poluchenie.date > '2020-05-01'
    
        INNER JOIN izdanie ON 
        subscribe.izdanie_id = izdanie.izdanie_id
        AND izdanie.name = 'Тополь'
    
        INNER JOIN user ON 
        poluchenie.user_id = user.user_id
    
        INNER JOIN role ON 
        user.role_id = role.role_id ");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM
        poluchenie");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }
    public function findViewById($id = null) {
        if ($id) {
        $res = $this->db->query("SELECT poluchenie.poluchenie_id,
        poluchenie.date as dater, CONCAT(user.lastname,' ', user.firstname, ' ',
        user.patronymic) AS fio, subscribe_type.name AS subscribe_type, izdanie.name AS  izdanie
         FROM poluchenie INNER JOIN user ON
        poluchenie.user_id=user.user_id 
        INNER JOIN subscribe ON
        poluchenie.subscribe_id=subscribe.subscribe_id 
        INNER JOIN izdanie ON
        subscribe.izdanie_id=izdanie.izdanie_id 
        INNER JOIN subscribe_type ON
        subscribe.subscribe_type_id=subscribe_type.subscribe_type_id 
         WHERE poluchenie_id = $id");
        return $res->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }
}
?>