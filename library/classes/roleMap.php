<?php
class RoleMap extends BaseMap {
    public function arrRoles(){
        $res = $this->db->query("SELECT role_id AS id, name AS
        value FROM role");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findById($id = null){
        if ($id) {
            $res = $this->db->query("SELECT role_id, name, sys_name "
            . " FROM role WHERE role_id = $id");
            return $res->fetchObject("role");
            }
        return new Role();
    }
    public function save(role $role){
        if ($role->validate()) {
            if ($role->role_id == 0) {
            return $this->insert($role);
            } else {
            return $this->update($role);
            }
        }
        return false;
    }
    private function insert(role $role){
        $name = $this->db->quote($role->name);
        $sys_name = $this->db->quote($role->sys_name);
        if ($this->db->exec("INSERT INTO role(name, sys_name) " 
        . " VALUES($name, $sys_name)") == 1) {
        $role->role_id = $this->db->lastInsertId();
        return true;
        }
        return false;
    }
    private function update(role $role){
        $name = $this->db->quote($role->name);
        $sys_name = $this->db->quote($role->sys_name);
        if ( $this->db->exec("UPDATE role SET name = $name, "
        . " sys_name = $sys_name WHERE role_id = ".$role->role_id) == 1) {
        return true;
        }
        return false;
    }
    public function findAll($ofset = 0, $limit = 30){
        $res = $this->db->query("SELECT role.role_id, role.sys_name AS sysname, 
        role.name as name "
        . " FROM role LIMIT $ofset, $limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM
        role");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }
    public function findViewById($id = null) {
        if ($id) {
        $res = $this->db->query("SELECT role.role_id, role.name AS name, 
        role.sys_name as sys_name "
        . " FROM role  WHERE role_id =
        $id");
        return $res->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }
}
?>