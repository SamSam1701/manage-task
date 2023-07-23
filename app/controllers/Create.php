<?php
class Create extends Controller{

    public $model_question;

    public function __construct(){
        $this->model_question = $this->model('QuestionModel');
    }

    public function createTask(){
        $this->data['sub_content']['page_title'] = 'Tạo mới task';
        $this->data['content'] = 'create/create_task';
        $this->render('layouts/client_layout', $this->data);
    }

    public function createQuestionPage(){
        $this->data['sub_content']['page_title'] = 'Create New Question';
        // $this->data['sub_content']['id'] = $userID;
        $this->data['content'] = 'create/create_question';
        $this->render('layouts/client_layout', $this->data);
    }

    public function createQuestion(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $question = $_POST["question"];
            $tags = $_POST["tags"];

            $userID = intval($_SESSION["UserID"]);

            $numberAnswerers = 0;

            $dateCreate = date('Y-m-d');

            $created = $this->model_question->createQuestion($question, $tags, $userID, $dateCreate, $numberAnswerers);
        
            if ($created) {
                echo "Question created successfully.";
            } else {
                echo "Error creating question.";
            }
        }
    }

}