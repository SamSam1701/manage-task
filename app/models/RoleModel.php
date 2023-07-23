<?php
class RoleModel extends Model {
    public $_table = 'USERS';

    public function changeRole($userID, $newRole) {
        $sql = "UPDATE {$this->_table}
            SET Role = '$newRole'
            WHERE UserID = '$userID'";
        $this->db->query($sql);
    }


}