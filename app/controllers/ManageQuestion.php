<?php
class ManageQuestion extends Controller {
    public $model_question;

    public function __construct(){
        $this->model_question = $this->model("QuestionModel");
    }

    public function getListQuestion(){

        $per_page = 5;
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $total_records = $this->model_question->getTotalRecords();
        $total_pages = ceil($total_records / $per_page);
        $data = $this->model_question->getListQuestion($current_page, $per_page);

        $this->data['sub_content']['title']='List Questions';
        $this->data['sub_content']['questions'] = $data;
        $this->data['content'] ='listQuestion/list_questions';


        $this->data['sub_content']['current_page'] = $current_page;
        $this->data['sub_content']['total_pages'] = $total_pages;
        $this->render('layouts/client_layout', $this->data);

    }

    public function searchTags(){
        $keyword = isset($_GET['search']) ? $_GET['search'] : '';
        $per_page = 5; 
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1; 
        $total_records = $this->model_question->getTotalSearchTags($keyword);
        $total_pages = ceil($total_records / $per_page);
        $data = $this->model_question->searchTags($keyword, $current_page, $per_page);
      
        $this->data['sub_content']['title']='List Questions';
        $this->data['sub_content']['questions'] = $data;
        $this->data['content'] ='listQuestion/list_questions';
      
        $this->data['sub_content']['current_page'] = $current_page;
        $this->data['sub_content']['total_pages'] = $total_pages;
        $this->render('layouts/client_layout', $this->data);
    }

    public function searchName(){
        $keyword = isset($_GET['search']) ? $_GET['search'] : 'qwdqw';
        $per_page = 5; 
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1; 
        $total_records = $this->model_question->getTotalSearchName($keyword);
        $total_pages = ceil($total_records / $per_page);
        $data = $this->model_question->searchName($keyword, $current_page, $per_page);
    
        echo $data;

        $this->data['sub_content']['title']='List Questions';
        $this->data['sub_content']['questions'] = $data;
        $this->data['content'] ='listQuestion/list_questions';
      
        $this->data['sub_content']['current_page'] = $current_page;
        $this->data['sub_content']['total_pages'] = $total_pages;
        $this->render('layouts/client_layout', $this->data);
    }
}