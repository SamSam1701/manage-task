<?php
class HomeModel extends Model{
    public $_table = 'TASK';

    public function getList(){
        $data = $this->db->query("select * from $this->_table")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }


    function login($username, $password){
        $sql = "SELECT * FROM USERS WHERE username = '$username' AND password = '$password'";
        $statement = $this->db->query($sql);
        $user = $statement->fetch(PDO::FETCH_ASSOC);
    
        if ($user) {
            // Thực hiện các xử lý cần thiết khi đăng nhập thành công
            // $role = $user['Role'];
            $result = array(
                'UserID' => $user['UserID'],
                'Role' => $user['Role']
            );
            return $result;
        } else {
            return null;
        }
    }

}