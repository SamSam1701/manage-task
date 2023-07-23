<?php
class ManageAnswer extends Controller {
    public $model_answer;

    public function __construct(){
        $this->model_answer = $this->model("AnswerModel");
    }

    public function getListAnswer($QuestionID){
        $_SESSION['QuestionID'] = $QuestionID;
        
        $RoleUser = $_SESSION['Role'];
        $per_page = 5;
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $total_records = $this->model_answer->getTotalRecords();
        $total_pages = ceil($total_records / $per_page);
        $data = $this->model_answer->getListAnswers($current_page, $per_page, $QuestionID);

        $this->data['sub_content']['title']='List Answers';
        $this->data['sub_content']['answers'] = $data;
        $this->data['content'] ='listAnswer/list_answers';
        $this->data['sub_content']['RoleUser'] = $RoleUser;

        $this->data['sub_content']['current_page'] = $current_page;
        $this->data['sub_content']['total_pages'] = $total_pages;
        $this->render('layouts/client_layout', $this->data);

    }


    public function createAnswer()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $answer = $_POST['answer'];
            $reference = $_POST['reference'];
            $questionID =  $_SESSION['QuestionID'];
            echo $questionID;
            $userID = $_SESSION['UserID'];
            $numberEvaluaters = 0;
            $dateCreate = date('Y-m-d');
            $result = $this->model_answer->saveAnswer($answer,
            $questionID, 
            $reference, 
            $userID, 
            $numberEvaluaters, 
            $dateCreate );
    
            if ($result) {
                header("Location: /ManageAnswer/getListAnswer/$questionID");
                exit();
            } else {
                $error_message = "Lỗi khi lưu câu trả lời. Vui lòng thử lại.";
                $this->showError($error_message);
            }
        } else {
            $this->render('layouts/client_layout', $this->data);
        }
    }


    public function getLastestAnserwer(){
        $lastestAnswer = $this->model_answer-> getLastest();
        $this->data['sub_content']['title']='List Lastest Answers';
        $this->data['sub_content']['lastest_answers'] = $lastestAnswer;
        $this->data['content'] ='lastestAnswer/lastest_answers';
        $this->render('layouts/client_layout', $this->data);
    }
}