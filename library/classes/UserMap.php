<?php
class UserMap extends BaseMap {
    public function findById($id = null){
        if ($id) {
            $res = $this->db->query("SELECT user_id, lastname,
            firstname, patronymic, role_id "
            . " FROM user WHERE user_id = $id");
            $user = $res->fetchObject("User");
            if ($user) {
            return $user;
            }
        }
        return new User();
    }
    public function save(User $user){
        if ($user->validate()) {
        if ($user->user_id == 0) {
        return $this->insert($user);
        }
        else {
        return $this->update($user);
        }
        }
        return false;
    }
    private function insert(User $user){
        $lastname = $this->db->quote($user->lastname);
        $firstname = $this->db->quote($user->firstname);
        $patronymic = $this->db->quote($user->patronymic);
        if ($this->db->exec("INSERT INTO user (lastname, 
        firstname, patronymic, role_id)"
        . " VALUES ($lastname, $firstname, $patronymic,
        $user->role_id)") == 1) {
        $user->user_id = $this->db->lastInsertId();
        return true;
        }
        return false;
    }
    private function update(User $user){
        $lastname = $this->db->quote($user->lastname);
        $firstname = $this->db->quote($user->firstname);
        $patronymic = $this->db->quote($user->patronymic);
        if ( $this->db->exec("UPDATE user SET lastname =
        $lastname, firstname = $firstname, patronymic =
        $patronymic,"
        . " role_id = $user->role_id "
        . " WHERE user_id = ".$user->user_id) == 1) {
            return true;
        }
        return false;
    }
    public function findViewById($id = null){
        if ($id) {
            $res = $this->db->query("SELECT user.user_id,
            CONCAT(user.lastname,' ', user.firstname, ' ',
            user.patronymic) AS fio, "
            . " role.name AS role FROM user "
            . " INNER JOIN role ON
            user.role_id=role.role_id WHERE user.user_id = $id");
            return $res->fetch(PDO::FETCH_OBJ);
            }
            return false;
    }
    public function findAll($ofset = 0, $limit = 30){
        $res = $this->db->query("SELECT user.user_id,
        CONCAT(user.lastname,' ', user.firstname, ' ',
        user.patronymic) AS fio, "
        . " role.name AS role FROM user "
        . " INNER JOIN role ON
        user.role_id=role.role_id  LIMIT
        $ofset, $limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM
        user");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }
    public function identity($id){
        if ($this->findById($id)->validate()) {
        return self::USER;
        }
        return null;
    }
}
?>