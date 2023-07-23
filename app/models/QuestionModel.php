<?php
class QuestionModel extends Model {
    public $_table = 'QUESTIONS';

    public function createQuestion($question, $tags, $userID, $dateCreate, $numberAnswerers) {
        $data = array(
            'Question' => $question,
            'Tags' => $tags,
            'UserID' => $userID,
            'CreatedDate' => $dateCreate,
            'NumberAnswerers' => $numberAnswerers
        );
        $status = $this->db->insert($this->_table, $data); 
        if ($status) {
            return true;
        } else {
            return false;
        }
    }


    public function getListQuestion($page, $limit) {

        $start = ($page - 1) * $limit;

        $sql = "SELECT q.*, u.userName 
                FROM {$this->_table} AS q
                INNER JOIN USERS AS u ON q.UserID = u.UserID
                LIMIT $start, $limit";
        $statement = $this->db->query($sql);
        $questions = $statement->fetchAll(PDO::FETCH_ASSOC);
    
        return $questions;
    }

    public function getTotalRecords() {
        $data = $this->db->query("SELECT COUNT(*) FROM $this->_table")->fetchColumn();
        return $data;
    }

    public function getTotalSearchTags($keyword) {
        $count = $this->db->query("SELECT COUNT(*) FROM $this->_table
            WHERE Tags LIKE '%$keyword%'")->fetchColumn();
        return $count;
    }

    public function getTotalSearchName($keyword) {
        $count = $this->db->query("SELECT COUNT(*) FROM $this->_table
            INNER JOIN USERS ON QUESTIONS.userID = USERS.userID
            WHERE USERS.UserName LIKE '%$keyword%'")->fetchColumn();
        return $count;
    }

    public function searchTags($keyword, $page, $limit)
    {
        $offset = ($page - 1) * $limit;
        $data = $this->db->query("SELECT q.*,  u.userName  
        FROM {$this->_table} as q 
        INNER JOIN USERS AS u ON q.UserID = u.UserID
        WHERE q.Tags LIKE '%$keyword%'
        LIMIT $limit OFFSET $offset")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function searchName($keyword, $page, $limit)
    {
        $offset = ($page - 1) * $limit;
        $data = $this->db->query("SELECT q.*,  u.userName  
        FROM {$this->_table} as q 
        INNER JOIN USERS AS u ON q.UserID = u.UserID
        WHERE u.userName LIKE '%$keyword%'
        LIMIT $limit OFFSET $offset")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

}