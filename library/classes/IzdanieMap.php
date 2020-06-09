<?php
class IzdanieMap extends BaseMap {
    public function arrIzdanies(){
        $res = $this->db->query("SELECT izdanie_id AS id, name AS
        value FROM izdanie");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findById($id = null){
        if ($id) {
            $res = $this->db->query("SELECT izdanie_id, name,
            data_issue, izdanie_num, izdanie_type_id "
            . " FROM izdanie WHERE izdanie_id = $id");
            return $res->fetchObject("izdanie");
            }
        return new izdanie();
    }
    public function save(izdanie $izdanie){
        if ($izdanie->validate()) {
            if ($izdanie->izdanie_id == 0) {
            return $this->insert($izdanie);
            } else {
            return $this->update($izdanie);
            }
        }
        return false;
    }
    private function insert(izdanie $izdanie){
        $name = $this->db->quote($izdanie->name);
        $data_issue = $this->db->quote($izdanie->data_issue);
        $izdanie_num = $this->db->quote($izdanie->izdanie_num);
        if ($this->db->exec("INSERT INTO izdanie(name, izdanie_type_id,
        data_issue, izdanie_num)" . " VALUES($name, $izdanie->izdanie_type_id, $data_issue, $izdanie_num)") == 1) {
        $izdanie->izdanie_id = $this->db->lastInsertId();
        return true;
        }
        return false;
    }
    private function update(izdanie $izdanie){
        $name = $this->db->quote($izdanie->name);
        $data_issue = $this->db->quote($izdanie->data_issue);
        $izdanie_num = $this->db->quote($izdanie->izdanie_num);
        if ( $this->db->exec("UPDATE izdanie SET name = $name,
        izdanie_type_id = $izdanie->izdanie_type_id,"
        . " data_issue = $data_issue, izdanie_num =
        $izdanie_num WHERE izdanie_id = ".$izdanie->izdanie_id) == 1) {
        return true;
        }
        return false;
    }
    public function findAll($ofset = 0, $limit = 30){
        $res = $this->db->query("SELECT izdanie.izdanie_id,
        izdanie.name, izdanie_type.name AS izdanie_type, izdanie.data_issue,
        izdanie.izdanie_num"
        . " FROM izdanie INNER JOIN izdanie_type ON
        izdanie.izdanie_type_id=izdanie_type.izdanie_type_id LIMIT $ofset,
        $limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM
        izdanie");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }
    public function findViewById($id = null) {
        if ($id) {
        $res = $this->db->query("SELECT izdanie.izdanie_id,
        izdanie.name, izdanie_type.name AS izdanie_type, izdanie.data_issue,
        izdanie.izdanie_num"
        . " FROM izdanie INNER JOIN izdanie_type ON
        izdanie.izdanie_type_id=izdanie_type.izdanie_type_id WHERE izdanie_id =
        $id");
        return $res->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }
}
?>