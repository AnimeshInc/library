<?php
class IzdaneMap extends BaseMap {
    public function arrIzdanes(){
        $res = $this->db->query("SELECT Izdane_id AS id, name AS
        value FROM Izdane");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findById($id = null){
        if ($id) {
            $res = $this->db->query("SELECT Izdane_id, name,
            special_id, date_begin, date_end "
            . " FROM Izdane WHERE Izdane_id = $id");
            return $res->fetchObject("Izdane");
            }
        return new Izdane();
    }
    public function save(Izdane $izdane){
        if ($izdane->validate()) {
            if ($izdane->Izdane_id == 0) {
            return $this->insert($izdane);
            } else {
            return $this->update($izdane);
            }
        }
        return false;
    }
    private function insert(Izdane $izdane){
        $name = $this->db->quote($izdane->name);
        $date_begin = $this->db->quote($izdane->date_begin);
        $date_end = $this->db->quote($izdane->date_end);
        if ($this->db->exec("INSERT INTO Izdane(name, special_id,
        date_begin, date_end)" . " VALUES($name, $izdane->special_id, $date_begin, $date_end)") == 1) {
        $izdane->Izdane_id = $this->db->lastInsertId();
        return true;
        }
        return false;
    }
    private function update(Izdane $izdane){
        $name = $this->db->quote($izdane->name);
        $date_begin = $this->db->quote($izdane->date_begin);
        $date_end = $this->db->quote($izdane->date_end);
        if ( $this->db->exec("UPDATE Izdane SET name = $name,
        special_id = $izdane->special_id,"
        . " date_begin = $date_begin, date_end =
        $date_end WHERE Izdane_id = ".$izdane->Izdane_id) == 1) {
        return true;
        }
        return false;
    }
    public function findAll($ofset = 0, $limit = 30){
        $res = $this->db->query("SELECT Izdane.Izdane_id,
        Izdane.name, special.name AS special, Izdane.date_begin,
        Izdane.date_end"
        . " FROM Izdane INNER JOIN special ON
        Izdane.special_id=special.special_id LIMIT $ofset,
        $limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM
        Izdane");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }
    public function findViewById($id = null) {
        if ($id) {
        $res = $this->db->query("SELECT Izdane.Izdane_id,
        Izdane.name, special.name AS special, Izdane.date_begin,
        Izdane.date_end"
        . " FROM Izdane INNER JOIN special ON
        Izdane.special_id=special.special_id WHERE Izdane_id =
        $id");
        return $res->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }
}
?>