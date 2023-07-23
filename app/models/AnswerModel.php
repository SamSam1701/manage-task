<?php
class AnswerModel extends Model {
    public $_table = 'ANSWERS';


    public function getListAnswers($page, $limit, $questionID) {

        $start = ($page - 1) * $limit;

        $sql = "SELECT a.*, u.userName 
                FROM {$this->_table} AS a
                INNER JOIN USERS AS u ON a.UserID = u.UserID
                WHERE a.QuestionID = '$questionID'";
        $statement = $this->db->query($sql);
        $answers = $statement->fetchAll(PDO::FETCH_ASSOC);
    
        return $answers;
    }

    public function getTotalRecords() {
        $data = $this->db->query("SELECT COUNT(*) FROM $this->_table")->fetchColumn();
        return $data;
    }

    public function getLastest() {
        $sql = "SELECT a.* , u.userName
                FROM {$this->_table} as a
                INNER JOIN USERS AS u ON a.UserID = u.UserID
                ORDER BY CreatedDate ASC";
        $statement = $this->db->query($sql);
        $answers = $statement->fetchAll(PDO::FETCH_ASSOC);
    
        return $answers;
    }

    public function saveAnswer($answer,$questionID, $reference, $userID, $numberEvaluaters, $dateCreate ){
        $data = array(
            'QuestionID' => intval($questionID),
            'UserID' => $userID,
            'Answer' => $answer,
            'Reference' => $reference,
            'NumberEvaluaters' => $numberEvaluaters,
            'CreatedDate' => $dateCreate
        );
        $status = $this->db->insert($this->_table, $data); 
        if ($status) {
            return true;
        } else {
            return false;
        }
    }

}