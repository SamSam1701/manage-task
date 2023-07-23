<?php
class EvaluateModel extends Model {
    public $_table = 'ANSWER_EVALUATES';

    public function getLastest() {
        $sql = "SELECT a.*, u.userName, ans.Answer, q.Question
                FROM {$this->_table} AS a
                INNER JOIN USERS AS u ON a.UserID = u.UserID
                INNER JOIN ANSWERS AS ans ON a.AnswerID = ans.AnswerID
                INNER JOIN QUESTIONS AS q ON ans.QuestionID = q.QuestionID
                ORDER BY a.CreatedDate ASC";
        $statement = $this->db->query($sql);
        $evaluate = $statement->fetchAll(PDO::FETCH_ASSOC);
    
        return $evaluate;
    }

}